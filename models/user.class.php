<?php
    class User
    {
       public function __construct(
            private $id = 0,
            private $nome = "",
            private $senha = "",
            private $perfil = "user",
            private $tempo = null
       ) {}

          // Getters
         public function getId()
         {
              return $this->id;
         }
         public function getNome()
         {
              return $this->nome;
         }
         public function getSenha()
         {
              return $this->senha;
         }
         public function getPerfil()
         {
              return $this->perfil;
         } 
         public function getTempo() 
         {
               return $this->tempo;
         }
         
         // Setters
         public function setNome($nome)
         {
              $this->nome = $nome;
         }
         public function setSenha($senha)
         {
              $this->senha = $senha;
         }
         public function setPerfil($perfil)
         {
              $this->perfil = $perfil;
         }
         public function setTempo($tempo) 
         {
              $this->tempo = $tempo;
         }
    }
?>