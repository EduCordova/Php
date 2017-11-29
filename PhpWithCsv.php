<?php
require "simple_html_dom.php";

$html = new simple_html_dom();

$html -> load_file("http://www.genbetadev.com/");

$tile = $html->find('h2 a');
$csvArry = [];

foreach ($tile as $ti){
    $nti = $ti->innertext;
    $csvArry[][]=$nti;
}
$filename = "dat.csv";

$fp = fopen($filename,'w');

fprintf( $fp, "\xEF\xBB\xBF");
foreach ($csvArry as $datos){
    fputcsv($fp,$datos);
}
fclose($fp);
