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

        public function pdfSucursal(){
            $pdf = new TCPDF();
            $pdf->setHeaderMargin(10);
            $pdf->setHeaderData(PDF_HEADER_LOGO, 60, 'Reporte', 'Areas');
            $pdf->SetMargins(20, 30, 20);
            // Consulta a bd
            $sucursal = $this->getModel()->reporteSucursal();
            //var_dump($sucursal);
            $html = '<table border="1" cellpadding="1">
            <tr style="background-color: black; color: white; text-align:center;">
            <td>Código</td>
            <td>Nombre</td>
            <td>Telefono</td>
            <td>Sucursal</td>
            </tr>';
            foreach ($sucursal as $key => $value) {
                $html .= '<tr>
                <td style="background-color: gray; text-align:center;">'.$value['Codigo'].'</td>
                <td>'.$value['Nombre'].'</td>
                <td>'.$value['Telefono'].'</td>
                <td>'.$value['Sucursal'].'</td>
                </tr>';
            }            
            $html .= '</table>';            
            $pdf->AddPage();
            $pdf->writeHTML($html);
            $pdf->Output();
        }

        public function pdfEmpleados(){
            if(!empty($_POST)){
                // Capturar datos
                if(!empty($_POST['txtCodigo'])){
                    $datos = $this->getModel()->reporteEmpleados(1,  $_POST['txtCodigo']);
                }
                //var_dump($datos);
                // Crear PDF
                $pdf = new TCPDF();
                $pdf->setHeaderMargin(10);
                $pdf->setHeaderData(PDF_HEADER_LOGO, 60, 'Reporte', 'Empleado');
                $pdf->SetMargins(20, 30, 20);
                if(!empty($datos)){
                    $html = '<table border="1" cellpadding="3">
                    <tr style="background-color: black; color: white; text-align:center;">
                    <td>Código</td>
                    <td>Nombre</td>
                        <td>Area</td>
                        <td>Sucursal</td>
                        <td>Sueldo Base</td>
                        <td>Sueldo Final</td>
                    </tr>';
                    foreach ($datos as $key => $value) {
                        $html .= '<tr>
                        <td style="background-color: gray; text-align:center;">'.$value['Codigo'].'</td>
                        <td>'.$value['Nombre'].'</td>
                        <td>'.$value['Area'].'</td>
                        <td>'.$value['Sucursal'].'</td>
                        <td>'.$value['Sueldo Base'].'</td>
                        <td>'.$value['Sueldo Final'].'</td>
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
                $this->getView()->marcas = $this->getModel()->reporteSucursal();
                $pagina = 'Informe/pdfEmpleados';
                $this->getView()->loadView($pagina);
            }            
        }
    }
?>