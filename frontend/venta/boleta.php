<?php
session_start();

require '../../backend/fpdf/fpdf.php';
 
date_default_timezone_set('America/Lima');
class PDF extends FPDF
{
    // Cabecera de página
   

    function Header()
{

    $this->setY(12);
    $this->setX(10);
    
    $this->Image('../../backend/img/rt.png',25,5,33);
    
    $this->SetFont('times', 'B', 13);
    
    $this->Text(75, 15, utf8_decode('NOMBRE EMPRESA Hotel MI CIELO'));
    $this->Text(77, 21, utf8_decode('6ª av. Los Angeles, California'));
    $this->Text(88,27, utf8_decode('Tel: 7785-8223'));
    $this->Text(78,33, utf8_decode('hotelmicielo@gmail.com'));
    
    $this->Image('../../backend/img/ico.png',160,5,33);


//información de # de factura
    $this->SetFont('Arial','B',10);   
    $this->Text(150,48, utf8_decode('BOLETA N°:'));
    $this->SetFont('Arial','',10);  
    $this->Text(176,48, '');
    
    // Agregamos los datos del cliente
    $this->SetFont('Arial','B',10);    
    $this->Text(10,48, utf8_decode('Fecha:'));
    $this->SetFont('Arial','',10);    
    $this->Text(25,48, date('d/m/Y'));
    
    // Agregamos los datos de la factura
    $this->SetFont('Arial','B',10);    
    $this->Text(10,54, utf8_decode('Vendedor:'));
    $this->SetFont('Arial','',10);    
    $this->Text(30,54, $_SESSION['nombre']);
    
    $this->Ln(50);


  

}

function Footer()
{
     $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(95,5,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->Line(10,287,200,287);
        $this->Cell(0,5,utf8_decode("Mi_cielo © Todos los derechos reservados."),0,0,"C");
        
}

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);



$pdf->setY(60);$pdf->setX(135);
    $pdf->Ln();
// En esta parte estan los encabezados
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(65, 7, utf8_decode('Cliente'),1,0,'C',0);
    $pdf->Cell(35, 7, utf8_decode('Fecha'),1,0,'C',0);
    $pdf->Cell(70, 7, utf8_decode('Productos'),1,0,'C',0);
    $pdf->Cell(25, 7, utf8_decode('Subtotal'),1,1,'C',0);
   
    $pdf->SetFont('Arial','',10);

    //Aqui inicia el for con todos los productos

    


    require '../../backend/config/Conexion.php';
    $id = $_GET['id'];
    $stmt = $connect->prepare("SELECT orders.idord, clientes.iddn, clientes.dnic, clientes.numc, clientes.nomc, clientes.apec, orders.method, orders.total_products, orders.total_price, orders.placed_on, orders.tipc ,orders.payment_status FROM orders INNER JOIN clientes ON orders.user_cli = clientes.iddn WHERE orders.idord= '$id'");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();

while($row = $stmt->fetch()){

    $pdf->Cell(65, 7, utf8_decode($row['nomc'] ."\n".  $row['apec']),1,0,'R',0);
    $pdf->Cell(35, 7, utf8_decode($row['placed_on']),1,0,'L',0);
    $pdf->Cell(70, 7, utf8_decode($row['total_products']),1,0,'L',0);
    $pdf->Cell(25, 7, 'S/'.($row['total_price']),1,1,'R',0);



//// Apartir de aqui esta la tabla con los subtotales y totales

        $pdf->Ln(10);

        $pdf->setX(95);
        $pdf->Cell(40,6,'Subtotal',1,0);
        $pdf->Cell(60,6,'S/'.($row['total_price']),'1',1,'R');
        $pdf->setX(95);
        
        $pdf->Cell(40,6,'Total',1,0);
        $pdf->Cell(60,6,'S/'.($row['total_price']),'1',1,'R');


}




 



$pdf->Output('boleta.pdf', 'D');



?>