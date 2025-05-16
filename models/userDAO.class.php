<?php
    class userDAO extends Conn
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert(User $user)
        {
            try{
                $sql = "INSERT INTO users (nome, senha, perfil) VALUES (:nome, :senha, :perfil)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':nome', $user->getNome());
                $stmt->bindValue(':senha', password_hash($user->getSenha(), PASSWORD_DEFAULT));
                $stmt->bindValue(':perfil', $user->getPerfil());
                $stmt->execute();
                //fecha a conexão
                $this->db = null;
                return "Usuario cadastrado com sucesso!";
            }
            catch(PDOException $e){
				echo $e->getCode();
				echo $e->getMessage();
				die();
			}
        }
        public function logout()
        {
            session_destroy();
            header("Location: ../index.php");
        }
    }
?>