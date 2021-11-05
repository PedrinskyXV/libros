<?php
    class Inicio extends Controller{
        public function __construct(){
            parent::__construct(); 
        }

        public function index(){
            $pagina = 'Inicio/index';
            if(!empty($_POST)){
                $this->getModel()->setUsuario($_POST['txtUsuario']);
                $this->getModel()->setContrasena($_POST['txtContrasena']);
                //Invocar función del validación
                $data = $this->getModel()->validarLogin();
                                
                if(!empty($data)){
                    // Crear variables de sesión
                    $_SESSION['usuario'] = $_POST['txtUsuario'];

                    foreach($data as $item)
                    {
                        $_SESSION['rol'] = $item['rol'];
                        $_SESSION['foto'] = $item['foto'];
                    }                    
                    //var_dump($_SESSION);
                    // Mostrar pantalla de inicio
                    $this->getView()->loadView($pagina);
                } else {
                    // Mostrar pantalla de login
                    $login = 'Inicio/login';
                    $this->getView()->loadView($login);
                }
            } else {                 
                if(isset($_SESSION["rol"])){
                    $this->getView()->loadView($pagina);
                } else {
                    $this->getView()->loadView('Inicio/login'); 
                } 
            }                         
        }

        public function login(){
            $pagina = 'Inicio/login';
            $this->getView()->loadView($pagina);
        }

        public function logout(){
            session_destroy();
            $pagina = 'Inicio/login';
            $this->getView()->loadView($pagina);
        }

    }
?>