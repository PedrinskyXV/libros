<?php
    class InformeModelo extends Model{       

        public function __construct(){
            parent::__construct();
        }

        public function reporteSucursal()
        {
            $arreglo = [];
            $sql = "SELECT a.codigoArea AS Codigo, a.nombre AS Nombre, a.telefono AS Telefono, s.nombre AS Sucursal
            FROM area a
            INNER JOIN sucursal s on a.codigoSucursal = s.codigoSucursal;
            ";
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_object()){
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function reporteEmpleados($campo,$valor)
        {
            $arreglo = [];
            $where = ($campo==1)?'e.codigoEmpleado='.$valor:'e.codigoEmpleado='.$valor;
            $sql = "SELECT e.codigoEmpleado AS 'Codigo', e.nombre AS 'Nombre', a.nombre AS 'Area', s.nombre AS 'Sucursal', e.sueldoBase AS 'Sueldo Base', FORMAT((e.sueldoBase -((e.sueldoBase*0.07)+(e.sueldoBase*0.0925)+(e.sueldoBase*0.1))), 2) AS 'Sueldo Final' FROM empleado e
            INNER JOIN area a ON e.codigoArea = a.codigoArea
            INNER JOIN sucursal s on a.codigoSucursal = s.codigoSucursal WHERE ".$where;
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_object()){
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

    }
?>