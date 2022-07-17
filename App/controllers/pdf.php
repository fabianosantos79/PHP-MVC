<?php

    use App\core\Controller;
    use Dompdf\Dompdf;

    class Pdf extends Controller{

        public function index(){

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            //$dompdf->loadHtml('<h1>Olá Mundo</h1><hr><p>Conteúdo do parágrafo</p>');
            
            ob_start();
            require 'teste.php';
            $dompdf->loadHtml(ob_get_clean());

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream("Arquivo Fabiano", ["Attachment" => false]);
            
            $this->view('pdf/index');

        }
    }
?>