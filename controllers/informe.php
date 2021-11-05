<?php    
    class Informe extends Controller{
        public function __construct(){
            parent::__construct();
            if (isset($_SESSION["rol"]) ) {

                if($_SESSION["rol"] != 2){
                    $this->getView()->loadView('Inicio/login');
                }                
            } else {
                $this->getView()->loadView('Inicio/login');
            }
        }

        public function reporteBase(){
            $pdf = new TCPDF();
            $pdf->setHeaderMargin(10);
            $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Título', 'Subtitulo');
            $pdf->SetMargins(20, 30, 20);
            $contenido = '<h1>Contenido del pdf</h1>';           
            $pdf->AddPage();
            $pdf->writeHTML($contenido);
            $pdf->Output();
        }

        public function pdfEditorial(){
            $pdf = new TCPDF();
            $pdf->setHeaderMargin(10);
            $pdf->setHeaderData(PDF_HEADER_LOGO, 60, 'Reporte', 'Areas');
            $pdf->SetMargins(20, 30, 20);
            // Consulta a bd
            $sucursal = $this->getModel()->reporteEditorial();
            //var_dump($sucursal);
            $html = '<table border="1" cellpadding="1">
            <tr style="background-color: black; color: white; text-align:center;">
            <td>Editorial</td>
            <td>Cod. Libro</td>
            <td>Libro</td>
            <td>ISBN</td>
            </tr>';
            foreach ($sucursal as $key => $value) {
                $html .= '<tr>
                <td style="background-color: gray; text-align:center;">'.$value['Editorial'].'</td>
                <td>'.$value['Codigo'].'</td>
                <td>'.$value['Nombre'].'</td>
                <td>'.$value['ISBN'].'</td>
                </tr>';
            }            
            $html .= '</table>';            
            $pdf->AddPage();
            $pdf->writeHTML($html);
            $pdf->Output();
        }

        public function pdfAutores(){
            if(!empty($_POST)){
                // Capturar datos
                if(!empty($_POST['txtCodigo'])){
                    $datos = $this->getModel()->reporteAutor(1,  $_POST['txtCodigo']);
                }
                //var_dump($datos);
                // Crear PDF
                $pdf = new TCPDF();
                $pdf->setHeaderMargin(10);
                $pdf->setHeaderData(PDF_HEADER_LOGO, 60, 'Reporte', 'Autores');
                $pdf->SetMargins(20, 30, 20);
                if(!empty($datos)){
                    $html = '<table border="1" cellpadding="3">
                    <tr style="background-color: black; color: white; text-align:center;">
                    <td>Código</td>
                    <td>Nombre</td>
                        <td>Libro</td>
                        <td>Editorial</td>
                        <td>Precio con IVA</td>
                    </tr>';
                    foreach ($datos as $key => $value) {
                        $html .= '<tr>
                        <td style="background-color: gray; text-align:center;">'.$value['Codigo'].'</td>
                        <td>'.$value['Nombre'].'</td>
                        <td>'.$value['Libro'].'</td>
                        <td>'.$value['Editorial'].'</td>
                        <td> $'.$value['Precio'].'</td>
                        </tr>';
                    }            
                    $html .= '</table>'; 
                } else{
                    $html = '<h1 style="text-align:center">Sin registros</h1>';
                }                           
                $pdf->AddPage();
                $pdf->writeHTML($html);
                $pdf->Output();

            } else {
                $this->getView()->editorial = $this->getModel()->reporteEditorial();
                $pagina = 'Informe/pdfAutores';
                $this->getView()->loadView($pagina);
            }            
        }
    }
?>