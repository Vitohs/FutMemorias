<?php
	class routes
	{
		public array $rotas = [];
		
		public function get(string $nome_rota, array $dados)
		{
			$this->rotas["GET"][$nome_rota] = $dados;
		}
		
		public function post(string $nome_rota, array $dados)
		{
			$this->rotas["POST"][$nome_rota] = $dados;
		}
		
		public function verificar_rota($metodo, $nome_rota)
		{
			if(isset($this->rotas[$metodo][$nome_rota]))
			{
				$dados = $this->rotas[$metodo][$nome_rota];
				$method = $dados[1];
				$obj = new $dados[0]();
				return $obj->$method();
			}
            require 'views/404.php';
            exit;
		}
	}

	$route = new routes();
	//home
	$route->get("/",[InicioController::class,"inicio"]);

	//cadastro
	$route->get("/cadastro",[CadastroController::class, "cadastro"]);
	//cadastro:post
	$route->post("/cadastro",[CadastroController::class, "cadastro"]);

	//login
	$route->get("/login",[CadastroController::class, "login"]);
	//login:post
	$route->post("/login",[CadastroController::class, "login"]);

	//logout
	$route->get("/logout",[CadastroController::class, "logout"]);

	//jogo
	$route->get("/jogar",[InicioController::class, "jogar"]);

	//game
	$route->get("/game", [InicioCOntroller::class, "game"]);
?>