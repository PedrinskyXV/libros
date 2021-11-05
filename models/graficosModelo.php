<?php
    class GraficosModelo extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function graficoLinea(){
            $arreglo = [];
            $sql = "SELECT a.nombre AS 'Area' , COUNT(e.codigoEmpleado) AS 'Cantidad' FROM empleado e
            INNER JOIN area a ON e.codigoArea = a.codigoArea
            GROUP BY a.nombre;";
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_row()){
                $arreglo [] = $fila;
            }
            return $arreglo;
        }       
    }
?>