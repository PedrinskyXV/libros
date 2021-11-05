<?php
    class Database {
        private $host;
        private $user;
        private $pass;
        private $db;

        public function __construct(){
            $this->host = 'localhost';
            $this->user = 'root';
            $this->pass = '1523';
            $this->db = 'exFinal';
        }

        public function conectar(){
            $con = new mysqli($this->host, $this->user, $this->pass, $this->db);
            return $con;
        }
    }
?>