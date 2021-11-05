<?php
    class InformeModelo extends Model{       

        public function __construct(){
            parent::__construct();
        }

        public function reporteEditorial()
        {
            $arreglo = [];
            $sql = "SELECT e.nombre AS Editorial, l.codigoLibro AS Codigo, l.nombre AS Nombre, l.isbn AS ISBN FROM libro l
            INNER JOIN editorial e on l.codigoEditorial = e.codigoEditorial;
            ";
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_object()){
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function reporteAutor($campo,$valor)
        {
            $arreglo = [];
            $where = ($campo==1)?'a.codigoAutor='.$valor:
            $sql = "SELECT a.codigoAutor AS Codigo, a.nombre AS Nombre, l.nombre AS Libro, e.nombre AS Editorial, FORMAT((l.precio + (l.precio*0.13)), 2) AS Precio FROM autor a
            INNER JOIN libro l ON a.codigoLibro = l.codigoLibro
            INNER JOIN editorial e on l.codigoEditorial = e.codigoEditorial
            WHERE".$where;
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_object()){
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

    }
?>