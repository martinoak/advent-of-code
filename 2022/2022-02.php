<?php

$input = file_get_contents('inputs/2022-02.txt');

$iterations = explode(PHP_EOL, $input);
$score = 0;

foreach ($iterations as $iteration) {
    if ($iteration == "A X") {
        $score += 4;
    } elseif ($iteration == "B X") {
        $score += 1;
    } elseif ($iteration == "C X") {
        $score += 7;
    } elseif ($iteration == "A Y") {
        $score += 8;
    } elseif ($iteration == "B Y") {
        $score += 5;
    } elseif ($iteration == "C Y") {
        $score += 2;
    } elseif ($iteration == "A Z") {
        $score += 3;
    } elseif ($iteration == "B Z") {
        $score += 9;
    } elseif ($iteration == "C Z") {
        $score += 6;
    }
}

echo $score;