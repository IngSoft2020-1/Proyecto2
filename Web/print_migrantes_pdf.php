<?php
    require_once "fpdf182/fpdf.php";

    class pdfMigrantes extends FPDF{

        function cabezera()
        {
            setlocale(LC_TIME, "spanish");
            $fecha= strftime("A %A, %d de %B de %Y");
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
            $db= new PDO('mysql:host=localhost;dbname=derechoscopio','root','');
            $this->SetFont("Arial","",12);
            $stmt= $db->query('Select fecha_llegada, Nombre from visitante');
            while ($info=$stmt->fetch(PDO::FETCH_OBJ)) 
            {
                $llegada=date("d/m/Y",strtotime($info->fecha_llegada));
                $this->Cell(50,8,utf8_decode($llegada),1,0,"C");
                $this->Cell(0,8,utf8_decode($info->Nombre),1,0,"L");
                $this->Ln();
            } 
        }
    }
    $pdf= new pdfMigrantes();
    $pdf->AddPage('P','A4',0);
    $pdf->SetMargins(20,20);
    $pdf->cabezera();
    /* $pdf->piePagina(); */
    $pdf->cabezeraTabla();
    $pdf->contenidoTabla();
    
    $pdf->Output("Esperados.pdf","F");

    header("Content-type: application/pdf");
    header("Content-disposition: attachment; filename= Esperados.pdf");
    readfile("Esperados.pdf");
    unlink("Esperados.pdf");
?>