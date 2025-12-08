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
    $digits = str_split($bank);
    $toRemove = count($digits) - 12;

    for ($removed = 0; $removed < $toRemove; $removed++) {
        $removeIndex = -1;
        for ($i = 0; $i < count($digits) - 1; $i++) {
            if ($digits[$i] < $digits[$i + 1]) {
                $removeIndex = $i;
                break;
            }
        }

        if ($removeIndex == -1) {
            $removeIndex = count($digits) - 1;
        }

        array_splice($digits, $removeIndex, 1);
    }

    return intval(implode('', $digits));
}

echo $sum . PHP_EOL;
