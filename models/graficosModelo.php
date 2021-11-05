<?php
    class GraficosModelo extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function graficoLinea(){
            $arreglo = [];
            $sql = "SELECT a.nombre AS Autor , COUNT(l.codigoLibro) AS Cantidad FROM autor a
            INNER JOIN libro l ON a.codigoLibro = l.codigoLibro
            GROUP BY a.nombre;
            ";
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_row()){
                $arreglo [] = $fila;
            }
            return $arreglo;
        }
        public function graficoAnillo(){
            $arreglo = [];
            $sql = "SELECT a.nombre AS Autor , COUNT(l.codigoLibro) AS Cantidad FROM autor a
            INNER JOIN libro l ON a.codigoLibro = l.codigoLibro
            GROUP BY a.nombre;
            ";
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_row()){
                $arreglo [] = $fila;
            }
            return $arreglo;
        }          
    }
?>