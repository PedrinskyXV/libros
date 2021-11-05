<?php
class Graficos extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (isset($_SESSION["rol"]) ) {

            if($_SESSION["rol"] != 3){
                $this->getView()->loadView('Inicio/login');
            }                
        } else {
            $this->getView()->loadView('Inicio/login');
        }
    }

    public function lineal()
    {
        if (isset($_SESSION["rol"])) {

            if ($_SESSION["rol"] != 3) {
                $this->getView()->loadView('Inicio/login');
            } else {
                $p = new chartphp();
                $datos[] = $this->getModel()->graficoLinea();
                $p->data = $datos;
                $p->chart_type = "line";
                // Diseño
                $p->title = "Cantidad de libros por Autor"; // Título
                $p->xlabel = "Autores"; //Título eje x
                $p->ylabel = "Cantidad"; //Título eje y
                $p->color = "#00A6FF"; // Colores de las barras
                $p->theme = "dark"; // default light
                // Renderizar gráfico
                $out = $p->render('c1');
                $this->getView()->grafico = $out;
                $pagina = 'Graficos/lineal';
                $this->getView()->loadView($pagina);
            }
        } else {
            $this->getView()->loadView('Inicio/login');
        }

    }

    public function anillo()
    {
        if (isset($_SESSION["rol"])) {

            if ($_SESSION["rol"] != 3) {
                $this->getView()->loadView('Inicio/login');
            } else {
                $p = new chartphp();
                // Contenido
                $datos[] = $this->getModel()->graficoAnillo();
                $p->data = $datos;
                $p->chart_type = "donut"; 
                // Diseño
                $p->title = "Cantidad de libros por Autor"; // Título
                $p->color = "metro"; // Colores
                $p->theme = "dark"; // default light
                // Renderizar gráfico
                $out = $p->render('c1');
                $this->getView()->grafico = $out;
                $pagina = 'Graficos/anillo';
                $this->getView()->loadView($pagina);
            }
        } else {
            $this->getView()->loadView('Inicio/login');
        }

    }
}
