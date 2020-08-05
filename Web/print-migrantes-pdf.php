<?php
    session_start();
    require_once "fpdf182/fpdf.php";
    
    /* ESTABLECER HORA Y LEGUAJE */
    date_default_timezone_set('America/Tijuana');
    setlocale(LC_TIME, 'spanish');
    /* ------------------------- */

    class pdfMigrantes extends FPDF{

        function cabezera()
        {

            $fecha = utf8_encode(strftime("A %A, %d de %B de %Y"));
            $this->Image("img/logocentro32.png",70,10,70);
            $this->SetY(50);
            $this->SetFont("Arial","",12);
            $this->Cell("");
            $this->Ln();
            $this->Cell(0,8,utf8_decode("Derechoscopio A.C."),0,0,"R");
            $this->Ln();
            $this->Cell(0,8,utf8_decode("Tijuana, Baja California, México"),0,0,"R");
            $this->Ln();
            $this->Cell(0,8,utf8_decode("$fecha"),0,0,"R");
            $this->Ln();
            $this->Cell(0,8,utf8_decode("Hotel Villa de Zaragoza"),0,0,"L");
            $this->Ln();
        }
        /* function piePagina()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Pagina'.$this->PageNo().'/{nb}',0,0,'C');
        } */
        function cabezeraTabla()
        {
            $this->SetFont("Arial","B",14);
            $this->Cell(0,8,utf8_decode("Lista de los huéspedes"),0,0,"C");
            $this->Ln();
            $this->SetFont("Arial","B",12);
            $this->Cell(50,8,utf8_decode("Fecha de llegada"),1,0,"C");
            $this->Cell(0,8,utf8_decode("Nombre"),1,0,"C");
            $this->Ln();
        }
        function contenidoTabla()
        {
            /* JALAMOS LA LISTA DE PERSONAS DE LA CONSULTA */
            $json = $_POST['lista'];
            $tabla=json_decode($json);
            $this->SetFont("Arial","",12);

            for ($i=0; $i < count($tabla); $i++) { 
                $this->Cell(50,8,utf8_decode($tabla[$i]->fechall),1,0,"C");
                $this->Cell(0,8,utf8_decode($tabla[$i]->nombre),1,0,"L");
                $this->Ln();
            }
        }
    }
   

    $pdf= new pdfMigrantes();
    $pdf->AddPage('P','A4',0);
    $pdf->SetMargins(20,20);
    $pdf->cabezera();
    $pdf->cabezeraTabla();
    $pdf->contenidoTabla();
    
    $pdf->Output("Esperados.pdf","F");
?>