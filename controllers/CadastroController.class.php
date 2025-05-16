<?php
    if(!isset($_SESSION))
	{
		session_start();
	}
    class CadastroController{
        
        public function Cadastro(){
                if($_POST){
            $erro = false;
            // Validações
            if(!isset($_POST['Nome']) || empty(trim($_POST['Nome']))){
                $erro = true;
                $_SESSION['msg'] = "Campo nome não pode ser vazio";
            }
            if(!isset($_POST['Senha']) || empty($_POST['Senha'])){
                $erro = true;
                $_SESSION['msg'] = "Campo senha não pode ser vazio";
            }
            if(!isset($_POST['SenhaConfirm']) || empty($_POST['SenhaConfirm'])){
                $erro = true;
                $_SESSION['msg'] = "Campo confirmar senha não pode ser vazio";
            }
            if(!$erro && $_POST['Senha'] !== $_POST['SenhaConfirm']){
                $erro = true;
                $_SESSION['msg'] = "As senhas não coincidem";
            }

            // Se não houver erro, salva no banco
            if(!$erro){
               $userDAO = new userDAO();

                // Verifica se usuário já existe
                if(method_exists($userDAO, 'existeUsuario') && $userDAO->existeUsuario($nome)){
                    $_SESSION['msg'] = "Usuário já cadastrado!";
                } else {
                    $user = new User();
                    $user->setNome($nome);
                    $user->setSenha($_POST['Senha']);
                    $user->setPerfil('usuario');
                    $salvou = $userDAO->insert($user);
                    if($salvou){
                        $_SESSION['msg'] = "Cadastro realizado com sucesso!";
                        header("Location: /login");
                        exit;
                    } else {
                        $_SESSION['msg'] = "Erro ao cadastrar usuário!";
                    }
                }
            }
        }
            require_once "views/cadastro.php";
        }
        public function Logout(){
            $userDAO = new userDAO();
            $userDAO->logout();
        }
        
        public function Login(){
            if($_POST){
                $erro = false;
                // Validações
                if(!isset($_POST['Nome']) || empty(trim($_POST['Nome']))){
                    $erro = true;
                    $_SESSION['msg'] = "Campo nome não pode ser vazio";
                }
                if(!isset($_POST['Senha']) || empty($_POST['Senha'])){
                    $erro = true;
                    $_SESSION['msg'] = "Campo senha não pode ser vazio";
                }
                if(!$erro){
                    $userDAO = new userDAO();
                    $user = $userDAO->login($_POST['Nome'], $_POST['Senha']);
                    if($user){
                        $_SESSION['user'] = $user;
                        header("Location: /");
                        exit;
                    } else {
                        $_SESSION['msg'] = "Usuário ou senha inválidos!";
                    }
                }
            }
            require_once "views/login.php";
        }
    }
?>