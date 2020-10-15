<?php
// Read Data
$filename = '../data/selected.txt';
$data = file($filename, FILE_IGNORE_NEW_LINES);
sort($data);

foreach($data as $k => $v){
    $code  = $k+100;
    echo $code.' - '.strtoupper($v).'<br>';
}


// Function to print data beautifully
function pp($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
