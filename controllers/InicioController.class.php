<?php
    CLass InicioController{
        
        public function inicio(){
            require_once "views/home.php";
        }
        public function jogar(){
            require_once "views/confirma.php";
        }
        public function game(){
            require_once "views/game.php";
        }
    }
?>