<?php
require("db.php");

$result =mysqli_query($con,"SELECT bloodonor.fname,bloodonor.lname,bloodonor.id_num,bloodonor.email,bloodonor.gender,bloodonor.age,bloodonor.weight,bloodonor.county,bloodonor.phone,submit_details.dtype FROM bloodonor,submit_details WHERE bloodonor.id=submit_details.b_id ORDER BY bloodonor.id");
$header =mysqli_query($con,"SELECT * 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='project_db' 
    AND `TABLE_NAME`='bloodonor'");

require('fpdf/fpdf.php');
$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetX(10);
$pdf->Cell(28,6,'First Name',0,0,'C',1);
$pdf->Cell(28,6,'Last Name',0,0,'C',1);
$pdf->Cell(28,6,'ID No.',0,0,'C',1);
$pdf->Cell(28,6,'Email',0,0,'C',1);
$pdf->Cell(28,6,'Gender',0,0,'C',1);
$pdf->Cell(28,6,'Age',0,0,'C',1);
$pdf->Cell(28,6,'Weight',0,0,'C',1);
$pdf->Cell(28,6,'County',0,0,'C',1);
$pdf->Cell(28,6,'Phone',0,0,'C',1);
$pdf->Cell(29,6,'Donation Type',0,0,'C',1);


foreach($result as $row) {

	$pdf->SetFont('Arial','',9);	
	$pdf->Ln();
	foreach($row as $column){
		$pdf->Cell(28,20,$column,0,0, "C");
    }
}
$pdf->Output();
?>


<?php

/* $pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);
$pdf->Cell(30,6,'CODE',1,0,'L',1);
$pdf->Cell(100,6,'NAME',1,0,'L',1);
$pdf->Cell(30,6,'PRICE',1,0,'R',1);

$y_axis = $y_axis + $row_height;

//Select the Products you want to show in your PDF file
$result=mysql_query('select Code,Name,Price from Products ORDER BY Code',$link);

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;

while($row = mysql_fetch_array($result))
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetY($y_axis_initial);
        $pdf->SetX(25);
        $pdf->Cell(30,6,'CODE',1,0,'L',1);
        $pdf->Cell(100,6,'NAME',1,0,'L',1);
        $pdf->Cell(30,6,'PRICE',1,0,'R',1);
        
        //Go to next row
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    $code = $row['Code'];
    $price = $row['Price'];
    $name = $row['Code'];

    $pdf->SetY($y_axis);
    $pdf->SetX(25);
    $pdf->Cell(30,6,$code,1,0,'L',1);
    $pdf->Cell(100,6,$name,1,0,'L',1);
    $pdf->Cell(30,6,$price,1,0,'R',1);

    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;
}

mysql_close($link);

//Send file
$pdf->Output();*/
?>