<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;


$htmlString = '';
ob_start();

include('template.html');
$htmlString .= ob_get_clean();

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($htmlString);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();


$output = $dompdf->output();
file_put_contents('C:\filename.pdf', $output);
// Output the generated PDF to Browser
//$dompdf->stream();

// Output the generated PDF (1 = download and 0 = preview)
#$dompdf->stream("codex",array("Attachment"=>0));
?>


