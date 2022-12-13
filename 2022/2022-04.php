<?php

$input = file_get_contents('inputs/2022-04.txt');
$counter = 0;
$intersects = explode(PHP_EOL, $input);

foreach ($intersects as $intersect) {
    $half = explode(',', $intersect);
    $first = explode('-', $half[0])[0];
    $second = explode('-', $half[0])[1];
    $third = explode('-', $half[1])[0];
    $fourth = explode('-', $half[1])[1];

    if (($third >= $first && $fourth <= $second) || ($first >= $third && $second <= $fourth)) {
        $counter++;
    }
}

echo $counter;