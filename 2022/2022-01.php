<?php

$input = file_get_contents('inputs/2022-01.txt');

$groups = explode("\n\n", $input);
$max = 0;
foreach ($groups as $group) {
    $sum = array_sum(explode("\n", $group));
    if ($sum > $max) {
        $max = $sum;
    }
}

echo $max;