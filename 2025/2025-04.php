<?php

$input = file_get_contents(__DIR__ . '/inputs/04.txt');

$paperRollCharacter = '@';
$emptyCharacter = '.';
$grid = array_map('str_split', explode("\n", $input));
$area = [[-1, -1],[-1, 0],[-1, 1],[0, -1],[0, 1],[1, -1],[1, 0],[1, 1]];
$movableCount = 0;

foreach ($grid as $row => $line) {
    foreach ($line as $column => $character) {
        if ($character === $paperRollCharacter) {
            $paperRollCount = 0;
            foreach ($area as [$areaRow, $areaColumn]) {
                $areaCharacter = $grid[$row + $areaRow][$column + $areaColumn] ?? $emptyCharacter;
                if ($areaCharacter === $paperRollCharacter) {
                    $paperRollCount++;
                }
            }

            $paperRollCount < 4 && $movableCount++;
        }
    }
}

echo $movableCount . PHP_EOL;
