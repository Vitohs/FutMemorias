<?php
    class UserDAO extends Conn
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert(User $user)
        {
            try{
                $sql = "SELECT COUNT(*) FROM users WHERE nome = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(1, $user->getNome());
                $stmt->execute();
                if($stmt->fetchColumn() > 0){
                    return "Esse nick já está sendo usado!";
                }

                $sql = "INSERT INTO users (nome, senha, perfil) VALUES (?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(1, $user->getNome());
                $stmt->bindValue(2, password_hash($user->getSenha(), PASSWORD_DEFAULT));
                $stmt->bindValue(3, $user->getPerfil());
                $stmt->execute();
                $this->db = null;
                return "Usuario cadastrado com sucesso!";
            }
            catch(PDOException $e){
                echo $e->getCode();
                echo $e->getMessage();
                die();
            }
        }
        public function login(User $user){
            try{
                $sql = "SELECT * FROM users WHERE nome = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(1, $user->getNome());
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->db = null;
                if($result && password_verify($user->getSenha(), $result['senha'])){
                    return $result;
                }else{
                    return false;
                }
            }
            catch(PDOException $e){
                echo $e->getCode();
				echo $e->getMessage();
				die();
            }
        }
        public function all(){
            try{
                $sql = "SELECT * FROM users";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->db = null;
            }
            catch(PDOException $e){
                echo $e->getCode();
                echo $e->getMessage();
                die();
            }
        }
    }
?>