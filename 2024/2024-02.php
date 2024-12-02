<?php

$input = file_get_contents('inputs/02.txt');

$minOffset = 1;
$maxOffset = 3;
$safeCount = 0;

foreach (explode("\n", $input) as $line) {
    $levels = array_map('intval', explode(' ', $line));

    if (checkSequence($levels, $minOffset, $maxOffset)) {
        $safeCount++;
    }
}

function checkSequence(array $row, int $minOffset, int $maxOffset): bool
{
    if (isSafe($row, $minOffset, $maxOffset)) {
        return true;
    }

    for ($i = 0; $i < count($row); $i++) {
        $newRow = $row;
        array_splice($newRow, $i, 1);
        if (isSafe($newRow, $minOffset, $maxOffset)) {
            return true;
        }
    }

    return false;
}

function isSafe(array $row, int $minOffset, int $maxOffset): bool
{
    $previous = null;
    $direction = null;

    foreach ($row as $value) {
        if ($previous !== null) {
            $diff = $value - $previous;

            if ($direction === null) {
                $direction = $diff > 0 ? 'inc' : 'dec';
            }

            if (($direction === 'inc' && $diff <= 0) || ($direction === 'dec' && $diff >= 0)) {
                return false;
            }

            if (abs($diff) < $minOffset || abs($diff) > $maxOffset) {
                return false;
            }
        }

        $previous = $value;
    }

    return true;
}

echo $safeCount . PHP_EOL;