<?php

$input = file_get_contents(__DIR__ . '/inputs/03.txt');
$sum = 0;

$banks = explode("\n", $input);
foreach ($banks as $bank) {
    if (empty($bank)) { continue; }
    $sum += findHighestJolt($bank);
}

function findHighestJolt(string $bank): int
{
    $highest = array_map('intval', str_split(substr($bank, 0, -1)));
    $max = [0, 0];
    foreach ($highest as $index => $value) {
        if ($value > $max[1]) {
            $max = [$index, $value];
        }
    }

    $secondHighest = array_map('intval', str_split($bank));
    $secondMax = 0;
    foreach ($secondHighest as $index => $value) {
        if ($index <= $max[0]) {
            continue;
        } elseif ($value > $secondMax) {
            $secondMax = $value;
        }
    }

    return $max[1] . $secondMax;
}

echo $sum . PHP_EOL;
