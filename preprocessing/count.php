<?php
$filename = '../data/area.txt';
$data = file($filename, FILE_IGNORE_NEW_LINES);
sort($data);
$distinct = array_count_values($data);
$keys = array_keys($distinct);
foreach($keys as $k) echo strtoupper($k).'<br>';
pp($distinct);
function pp($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
