<?php

$input = file_get_contents(__DIR__ . '/inputs/01.txt');
$position = 50;
$password = 0;

foreach (explode("\n", trim($input)) as $line) {
    $direction = match (substr($line, 0, 1)) {
        'R' => 1,
        'L' => -1,
    };
    $length = (int)substr($line, 1);

    for ($i = 0; $i < $length; $i++) {
        $position += $direction;

        if ($position < 0) $position += 100;
        elseif ($position > 99) $position -= 100;

        if ($position === 0) $password++;
    }
}

echo $password . PHP_EOL;
