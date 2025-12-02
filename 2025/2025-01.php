<?php

$input = file_get_contents(__DIR__ . '/inputs/01.txt');
$position = 50;
$direction = 0;
$password = 0;

foreach (explode("\n", $input) as $line) {
    if (empty($line)) { continue; }

    $direction = match (substr($line, 0, 1)) {
        'R' => 1,
        'L' => -1,
    };
    $length = (int)substr($line, 1);
    $position = $position + $length * $direction;

    if ($position < 0) {
        incrementBy100($position);
    } elseif ($position > 99) {
        decrementBy100($position);
    }

    if ($position === 0) { $password++; }
}

function incrementBy100(int &$position): void
{
    $position = $position + 100;
    if ($position < 0) { incrementBy100($position); }
}

function decrementBy100(int &$position): void
{
    $position = $position - 100;
    if ($position > 99) { decrementBy100($position); }
}

echo ($password) . PHP_EOL;
