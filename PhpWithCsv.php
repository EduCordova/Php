<?php
require "simple_html_dom.php";

$html = new simple_html_dom();

$html -> load_file("https://www.reddit.com/r/AskReddit/comments/7g9otu/whats_your_i_dont_care_what_anyone_says_i_like/");

$tile = $html->find('div.commentarea  form p');
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
