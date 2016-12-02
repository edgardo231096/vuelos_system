<?php
require('fpdf/fpdf.php');
require("php/DB.php");
$pdf=new FPDF();
$pdf->AddPage();
$servidor="localhost";
    $usuario="root";
    $cont="";
    $bd="VUELOS_DB";
    $nombre=$_POST['nombre'];
    $conn=new DB();
    $resp = $conn->query("select * from CLIENTES where titular = $nombre");
    if($fila = $resp->fetch_row()){
        $id=$fila[0];
        $email=$fila[1];
        $tel=$fila[2];
        $domicilio=$fila[3];
        
        $texto="ID: ".$id."\nCliente: ".$nombre."\nEmail: ".$email."\nDomicilio: ".$domicilio."\nTelefono: ".$tel;
        
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(50,10,'Información del usuario',1,1,'L');
     
        $pdf->Cell(50,5,'salto de linea',1,1);
     
        $pdf->SetFont('Arial','B',10);
        $pdf->MultiCell(190,5,$texto);
     
        $pdf->Output();
    }else{
        header("location:index.php");
    }
?>
