<?php
require('fpdf/fpdf.php'); // Asegúrate de que la ruta sea correcta

session_start();
$name = $_SESSION['cuenta'];

// Crear una instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Establecer la coordenada para la imagen
$imagenX = 10;
$imagenY = 20;
$centrado = $pdf->GetPageWidth()/4;
$final = $pdf->GetPageWidth();

// // Agregar la imagen al PDF
// $imagePath = 'img/logotipo.png'; // Reemplaza con la ruta de tu imagen
// $pdf->Image($imagePath, 0, 5 , 40);

// Establecer la fuente y tamaño de fuente
$pdf->SetFont('Arial', 'B', 20);

// Establecer la coordenada para el primer dato debajo de la imagen
$datoX = $imagenX + 10;
$datoY = $imagenY + 30;

// Agregar los datos al PDF debajo de la imagen
$pdf->SetXY($centrado - 12,15);
$pdf->Cell(0, 10, "InovaTech Solutions",0, 1);
$pdf->SetFont('Arial', '', 15);
$pdf->SetX($centrado - 12);
$pdf->Cell(0, 10, '"Transformando Ideas en Codigo, Innovando tu Futuro"', 0 ,1);

$pdf->SetFont('Arial', '', 12);
$pdf->SetXY($final - 129, $datoY);
$pdf->Cell(0, 0, "ASUNTO: SOLICITUD PARA APLICACION DE EXAMEN", 0, 1);

$pdf->SetXY($final - 107, $pdf->GetY() + 10);
$pdf->Cell(0, 10, "CENTRO DE ATENCION DEPARTAMENTAL", 0 ,1);

$pdf->SetXY($final -46, $pdf->GetY());
// $pdf->Cell(0, 0, "A $fecha_actual", 0 , 1 );
$pdf->Cell(0,10,"",0,1);

$pdf->SetXY($datoX, $pdf->GetY() + 10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0,10, "A QUIEN SE LE INFORMA", 0 ,1);
$pdf->SetFont('Arial', '', 12);

$pdf->SetRightMargin(20);
$pdf->SetXY($datoX, $pdf->GetY() + 5);
// $pdf->MultiCell(0, 10, "LOS DATOS PROPORCIONADOS A CONTINUACION CORRESPONDEN A EL ASPIRANTE $nombre $last_name1 $last_name2 QUE BUSCA FORMAR PARTE DE NUESTRO EQUIPO EN INOVATECH SOLUTIONS. AGRADECEMOS SU INTERES EN UNIRSE A NUESTRA ORGANIZACION Y LE INVITAMOS A COMPLETAR EL SIGUIENTE EXAMEN PARA TERMINAR DE VER SI ES LO QUE BUSCAMOS EN NUESTRO EQUIPO. LA INFORMACION PROPORCIONADA SERA TRATADA CON LA MAXIMA CONFIDENCIALIDAD Y SE UTILIZARA UNICAMENTE CON EL PROPOSITO DE EVALUACION Y CONTACTO RELACIONADO CON EL PROCESO DE SELECCION. LE AGRADECEMOS POR CONSIDERAR UNA CARRERA EN INOVATECH SOLUTIONS.", 0, 'J');

$pdf->SetXY($centrado + 16, $pdf->GetY() + 10);
$pdf->SetFont('Times', 'B', 15);
$pdf->Cell(0,10, "H A C E   M E N C I O N  A", 0 ,1);
$pdf->SetFont('Arial', '', 12);

// $imagePath2 = 'perfil/'.$file; // Reemplaza con la ruta de tu imagen
// $pdf->Image($imagePath2, $centrado + 25, $pdf->GetY() + 5 , 50);

// $pdf->SetY($pdf->GetY() + 55);
// $pdf->SetRightMargin(20);
// $pdf->SetXY($datoX, $pdf->GetY() + 10);
// $pdf->MultiCell(0, 10, "$nombre $last_name1 $last_name2 COMO POSIBLE NUEVO INTEGRANTE DE NUESTRA EMPRESA NACIDO EL $day/$month/$year CON UN DOMINIO DE LENGUAJES EN:", 0, 'J');
// if(!empty($_POST['op'])){
//     foreach($_POST["op"] as $op) {
//         $pdf->SetXY($datoX,$pdf->GetY());
//         $pdf->Cell(0, 10,"->$op",0, 1);
//     }
// }else{
//     $pdf->SetFont('Times', 'B', 9);
//     $pdf->SetXY($datoX,$pdf->GetY());
//     $pdf->MultiCell(0, 10,"SIN DOMINIO DE LENGUAJES, LO MÁS PROBABLE ES QUE NO QUEDES EN EL TRABAJO SOLICITADO",0, 'J');
// }
// $pdf->SetFont('Times', '', 12);
// $pdf->setxy($datoX, $pdf->GetY());
// $pdf->MultiCell(0, 10, "CONTACTALO AL: $tel .EL APLICANTE $dis ES CAPAZ DE HACER VIAJES, TAMBIEN CONSULTANDO MAS A FONDO $dis2 ES CAPAZ DE QUEDARSE INDEFINIDAMENTE PARA CAMBIO DE RESIDENCIA POR EL TRABAJO Y $english CUENTA CON UN DOMINIO DEL INGLES PARA ESTE TRABAJO, ASI MISMO APLICA POR UN PUESTO DE:", 0, 'J');
// if(!empty($_POST['op2'])){
//     foreach($_POST["op2"] as $op) {
//         $pdf->SetXY($datoX,$pdf->GetY());
//         $pdf->Cell(0, 10,"->$op",0, 1);
//     }
// }else{
//     $pdf->SetFont('Times', 'B', 9);
//     $pdf->SetXY($datoX + 15,$pdf->GetY());
//     $pdf->Cell(0, 10,"SIN PUESTOS A APLICAR, SE LE ASIGNARA EL MAS CONVENIENTE SEGUN SU PERFIL",0, 1);
// }
$pdf->SetFont('Times', '', 12);
$pdf->SetRightMargin(20);
$pdf->SetXY($datoX, $pdf->GetY());
// $pdf->MultiCell(0, 10, "UTILIZAR $llave COMO TU LLAVE DE ACCESO AL EXAMEN PREVIO A LA ADMISION", 0 ,'J');

$pdf->SetXY($centrado + 25, $pdf->GetY() + 5);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0,10, "A T E N T A M E N T E", 0 ,1);    
$pdf->SetFont('Arial', '', 11);

// $imagePath2 = 'img/firma.png';// Reemplaza con la ruta de tu imagen
// $pdf->Image($imagePath2, $centrado + 30, $pdf->GetY() - 5 , 40);

$pdf->SetFont('Arial', '', 9);
$pdf->SetXY($centrado + 17, $pdf->GetY() + 20);
$lineY = $pdf->GetY();
$lineX1 = $centrado + 22;
$lineX2 = 130; // Ancho de la línea
$pdf->Line($lineX1, $lineY, $lineX2, $lineY);
$pdf->Cell(0,10, "LIC. CARLOS JESUS CATELLANOS PERERA", 0 ,1);

$lineY = $pdf->GetY() + 10;
$lineX1 = 10;
$lineX2 = 200; // Ancho de la línea
$pdf->Line($lineX1, $lineY, $lineX2, $lineY);

// Generar el PDF en el navegador
$pdf->Output();