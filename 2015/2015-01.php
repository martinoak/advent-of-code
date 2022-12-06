<?php
$input = file_get_contents('inputs/2015-01.txt');
$chars = 0;
$counter = 0;
foreach (str_split($input) as $char) {
    if ($char == '(') {
        $counter++;
        $chars++;
    } elseif ($char == ')') {
        $counter--;
        $chars++;
    }
    if($counter == -1) {
        echo $chars;
        break;
    }
}