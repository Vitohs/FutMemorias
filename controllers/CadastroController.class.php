<?php
    if(!isset($_SESSION))
	{
		session_start();
	}
    class CadastroController{
        
        public function Cadastro(){
            if($_POST){
               $erro = false;
               if(empty($_POST['Nome']) || empty($_POST['Senha'])){
                   $erro = true;
                   $_SESSION['msg'] = "Preencha todos os campos!";
               }
               else{
                   $user = new User();
                   $user->setNome($_POST['Nome']);
                   $user->setSenha($_POST['Senha']);
                   $user->setPerfil("user");
                   
                   $usuarioDAO = new UserDAO();
                   $resultado = $usuarioDAO->insert($user);
                   if($resultado === "Usuario cadastrado com sucesso!"){
                        $_SESSION['msg'] = $resultado;
                        header("Location: /login");
                        exit;
                    }else{
                        $_SESSION['msg'] = $resultado; 
                        $erro = true;
                    }
               }
            }
            require_once "views/cadastro.php";
        }
        public function Login(){
            if($_POST){
                $erro = false;
                if(empty($_POST['Nome']) || empty($_POST['Senha'])){
                    $erro = true;
                    $_SESSION['msg'] = "Preencha todos os campos!";
                }
                else{
                    $user = new User();
                    $user->setNome($_POST['Nome']);
                    $user->setSenha($_POST['Senha']);
                    
                    $usuarioDAO = new UserDAO();
                    $userData = $usuarioDAO->login($user);
                    if($userData){
                        $_SESSION['user'] = [
                            'id'     => $userData['id'],
                            'nome'   => $userData['nome'],
                            'perfil' => $userData['perfil'],
                            'tempo'  => $userData['tempo'] ?? null
                        ];
                        $_SESSION['msg'] = "Login realizado com sucesso!";
                        header("Location: /");
                        exit;
                    }else{
                        $_SESSION['msg'] = "Usuário ou senha incorretos!";
                        $erro = true;
                    }
                }
            }
            require_once "views/login.php";
        }
        public function Logout(){
            $_SESSION = array();
            session_destroy();
            header("Location: /");
            exit;
        }
    }
?>