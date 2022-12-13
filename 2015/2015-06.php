<?php

$input = file_get_contents('inputs/2015-06.txt');

$pattern = preg_match_all('/(turn on|turn off|toggle) (\d+),(\d+) through (\d+),(\d+)/', $input, $matches);

$lights = array_fill(0, 1000, array_fill(0, 1000, 0));

foreach ($matches[0] as $key => $match) {
    $command = $matches[1][$key];
    $x1 = $matches[2][$key];
    $y1 = $matches[3][$key];
    $x2 = $matches[4][$key];
    $y2 = $matches[5][$key];

    for ($x = $x1; $x <= $x2; $x++) {
        for ($y = $y1; $y <= $y2; $y++) {
            switch ($command) {
                case 'turn on':
                    $lights[$x][$y] = 1;
                    break;
                case 'turn off':
                    $lights[$x][$y] = 0;
                    break;
                case 'toggle':
                    $lights[$x][$y] = $lights[$x][$y] ? 0 : 1;
                    break;
            }
        }
    }
}

echo array_sum(array_map('array_sum', $lights));