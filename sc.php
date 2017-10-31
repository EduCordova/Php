<?php

require 'dom_php.php';

$url = "http://www.genbetadev.com/";
$html = file_get_html($url);

$posts = $html->find('div[class=abstract-content]');

foreach ($posts as $post){
    $link = $post->find('h2 a',0);
    $url = $link->attr['href'];
    $title = $link->innertext;

    echo $title,"<br>",$url,"<br><br>";
}
