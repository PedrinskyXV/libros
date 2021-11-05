<?php
class Libro extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (isset($_SESSION["rol"]) ) {

            if($_SESSION["rol"] != 1){
                $this->getView()->loadView('Inicio/login');
            }            
        } else {
            $this->getView()->loadView('Inicio/login');
        }
    }

    public function index()
    {
        if (isset($_SESSION["rol"]) ) {

            if($_SESSION["rol"] != 1){
                $this->getView()->loadView('Inicio/login');
            }
            else{
                $pagina = 'Libro/index';
                $this->getView()->loadView($pagina);
            }
        } else {
            $this->getView()->loadView('Inicio/login');
        }
    }

    public function mostrarLibros()
    {

        $datos = $this->getModel()->listarLibros();
        $tr = '';
        foreach ($datos as $value) {
            $urlEditar = constant('URL') . "libro/modificar?codigo=" . $value['codigoEmpleado'];
            $urlEliminar = constant('URL') . "libro/eliminar?codigo=" . $value['codigoEmpleado'];

            $tr .= '<tr>
                    <th>' . $value['codigoEmpleado'] . '</th>
                    <td>' . $value['nombre'] . '</td>
                    <td>' . $value['edad'] . '</td>
                    <td> $' . $value['sueldoBase'] . '</td>
                    <td>' . $value['Area'] . '</td>
                    <td class="text-center">
                        <div class="btn-group">';
            if ($_SESSION['rol'] == 1) {
                $tr .= '<a href="' . $urlEliminar . '" class="btn btn-primary btn-sm" id="btnEliminar">Eliminar</a>';
            }
            $tr .= '<a href="' . $urlEditar . '"class="btn btn-dark btn-sm">Modificar</a>
                        </div>
                    </td>
                </tr>';
        }
        echo $tr;
    }

    public function nuevo()
    {
        if (isset($_SESSION["rol"])) {
            $this->getView()->marcas = $this->getModel()->listadoEditorial();
            $pagina = 'libro/nuevo';
            $this->getView()->loadView($pagina);
        } else {
            $this->getView()->loadView('Inicio/login');
        }
    }

    public function agregar()
    {

        if (!empty($_POST)) {
            $this->getModel()->setNombre($_POST["txtNombre"]);
            $this->getModel()->setEdad($_POST["txtEdad"]);
            $this->getModel()->setSueldoBase($_POST["txtSueldoBase"]);
            $this->getModel()->setCodigoArea($_POST["sArea"]);
            //$this->getModel()->setEstado($_POST["txtEstado"]);
            $respuesta = $this->getModel()->insertarLibros();
            echo $respuesta;
        }
    }

    public function modificar()
    {

        if (isset($_SESSION["rol"])) {
            if (isset($_GET["codigo"])) {
                $codigo = $_GET["codigo"];
                // Enviar marcas a la vista
                $this->getView()->marcas = $this->getModel()->listadoEditorial();
                // Enviar datos a la vista
                $this->getModel()->setCodigo($codigo);
                $this->getView()->datos = $this->getModel()->libroFiltrado();
                // Mostrar vista
                $pagina = 'libro/modificar';
                $this->getView()->loadView($pagina);
            } else {
                var_dump($_POST);

                if (!empty($_POST)) {
                    // Capturar datos
                    $this->getModel()->setCodigo($_POST["txtCodigo"]);
                    $this->getModel()->setNombre($_POST["txtNombre"]);
                    $this->getModel()->setEdad($_POST["txtEdad"]);
                    $this->getModel()->setSueldoBase($_POST["txtSueldoBase"]);
                    $this->getModel()->setCodigoArea($_POST["sArea"]);
                    $this->getModel()->setEstado($_POST["sEstado"]);
                    // Invocar función de modificación
                    $respuesta = $this->getModel()->modificarLibro();                    
                    echo $respuesta;
                }
                else{
                    echo "POST vacio !";
                }
            }
        } else {
            $this->getView()->loadView('Inicio/login');
        }
    }

    public function eliminar()
    {
        if (isset($_GET["codigo"])) {
            $codigo = $_GET["codigo"];
            $this->getModel()->setCodigo($codigo);
            $respuesta = $this->getModel()->eliminarLibro();
            echo $respuesta;
        }
    }
}
