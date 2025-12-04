<?php

$input = file_get_contents(__DIR__ . '/inputs/02.txt');
$sum = 0;
$idRanges = explode(',', $input);

foreach ($idRanges as $idRange) {
    [$min, $max] = explode('-', $idRange);

    foreach (range($min, $max) as $integer) {
        if (isValid($integer)) {
            $sum += $integer;
        }
    }
}

function isValid(int $integer): bool
{
    return preg_match('/^(.+)\1+$/', $integer) === 1;
}

echo $sum . PHP_EOL;
