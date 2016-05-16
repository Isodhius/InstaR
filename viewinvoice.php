<?php 
require('pdf/fpdf.php');

			if(isset($_GET['invoiceid']))
			{

						$pdf = new FPDF();
$pdf->AddPage();



									$pdf->output();





			}







?>