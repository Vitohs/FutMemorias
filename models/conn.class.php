<?php
    class Conn {
        public function __construct(protected $db = null)
        {
            $servername = "localhost";
            $username = "root";
            $password = "Ovocelente@06";
            $dbname = "Fut";
            try 
            {
                $this->db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } 
            catch (PDOException $e) 
            {
                echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
            }
        }
    }