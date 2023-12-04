<?php

$input = file_get_contents('inputs/2023-01.txt');
$total = 0;

$lines = explode("\n", $input);
foreach ($lines as $line) {
    $line = preg_replace('/[a-z]/', '', $line);
    $line = str_split($line);
    $total += (($line[0] * 10) + $line[count($line) - 1]);
}

echo $total;