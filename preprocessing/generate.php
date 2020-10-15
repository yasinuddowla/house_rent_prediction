<?php
$num = 3078;
$min = 100;
$max = 134;

for($i = 1; $i <= $num; $i++){
    echo rand($min, $max).'<br>';
}