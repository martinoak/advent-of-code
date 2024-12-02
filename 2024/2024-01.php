<?php

$input = file_get_contents('inputs/01.txt');

$left = $right = [];
foreach (explode("\n", $input) as $line) {
    $exploded = explode('   ', $line);
    $left[] = $exploded[0];
    $right[] = $exploded[1];
}

sort($left);
sort($right);

$diff = 0;
for ($i = 0; $i < count($left); $i++) {
    $diff += abs($left[$i] - $right[$i]);
}

echo $diff;
