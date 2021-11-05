<?php
class LibroModelo extends Model
{
    private $codigo;
    private $nombre;
    private $isbn;
    private $precio;
    private $codigoEditorial;
    private $estado;

    /**
     * Get the value of codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

        /**
     * Get the value of isbn
     */ 
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set the value of isbn
     *
     * @return  self
     */ 
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

        /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

        /**
     * Get the value of codigoEditorial
     */ 
    public function getCodigoEditorial()
    {
        return $this->codigoEditorial;
    }

    /**
     * Set the value of codigoEditorial
     *
     * @return  self
     */ 
    public function setCodigoEditorial($codigoEditorial)
    {
        $this->codigoEditorial = $codigoEditorial;

        return $this;
    }
    
    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function listarLibros()
    {
        $arreglo = [];
        $sql = "SELECT
            l.codigoLibro,
            l.nombre,
            l.isbn,
            l.precio,
            l.codigoEditorial,
            e.nombre as Editorial,
            l.estado
        FROM
            libro l
        INNER JOIN
            editorial e ON l.codigoEditorial = e.codigoEditorial         
        ORDER BY l.codigoLibro ASC";

        $datos = $this->getDb()->conectar()->query($sql);
        while ($fila = $datos->fetch_object()) {
            $arreglo[] = json_decode(json_encode($fila), true);
        }
        return $arreglo;
    }

    public function listadoEditorial()
    {
        $arreglo = [];
        $sql = "SELECT * FROM editorial";
        $datos = $this->getDb()->conectar()->query($sql);
        while ($fila = $datos->fetch_object()) {
            $arreglo[] = json_decode(json_encode($fila), true);
        }
        return $arreglo;
    }

    public function insertarLibros()
    {
        $sql = "INSERT INTO libro (nombre, isbn, precio, codigoEditorial) values
             ('" . $this->nombre . "'," . $this->isbn . "," . $this->precio . "," . $this->codigoEditorial . ")";
        $res = $this->getDb()->conectar()->query($sql);
        return ($res === true) ? true : false;
    }

    public function libroFiltrado()
    {
        $arreglo = [];
        $sql = "SELECT * FROM libro WHERE codigoLibro=" . $this->codigo;
        $datos = $this->getDb()->conectar()->query($sql);
        while ($fila = $datos->fetch_object()) {
            $arreglo[] = json_decode(json_encode($fila), true);
        }
        return $arreglo;
    }

    public function modificarLibro()
    {
        try {
            $sql = "UPDATE libro
            SET
            nombre = '" . $this->nombre . "',
            isbn = " . $this->isbn . ",
            precio = " . $this->precio . ",
            codigoEditorial = " . $this->codigoEditorial . ",
            estado = " . $this->estado . "
            WHERE codigoLibro = " . $this->codigo;
            $res = $this->getDb()->conectar()->query($sql);

            //print_r($sql);            

            return ($res === true) ? true : false;
        } catch (Throwable $th) {
            //var_dump($th->getMessage());
            return $th->getMessage();
        }

    }

    public function eliminarLibro()
    {

        $sql = "DELETE FROM libro WHERE codigoLibro = " . $this->codigo;

        $res = $this->getDb()->conectar()->query($sql);

        return ($res === true) ? true : false;

    }
}
