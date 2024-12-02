<?php

$input = file_get_contents('inputs/01.txt');

$left = $right = [];
foreach (explode("\n", $input) as $line) {
    $exploded = explode('   ', $line);
    $left[] = $exploded[0];
    $right[] = $exploded[1];
}

$sum = 0;
$rightValues = array_count_values($right);
for ($i = 0; $i < count($left); $i++) {
    if (!isset($rightValues[$left[$i]])) {
        continue;
    }
    $sum += $left[$i] * $rightValues[$left[$i]];
}

echo $sum;
