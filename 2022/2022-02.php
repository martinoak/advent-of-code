<?php

$input = file_get_contents('inputs/2022-02.txt');

$iterations = explode(PHP_EOL, $input);
$score = 0;

foreach ($iterations as $iteration) {
    if       ($iteration == "A X") {
        $score += 3; // 3 + 0
    } elseif ($iteration == "B X") {
        $score += 1; // 1 + 0
    } elseif ($iteration == "C X") {
        $score += 2; // 2 + 0
    } elseif ($iteration == "A Y") {
        $score += 4; // 1 + 3
    } elseif ($iteration == "B Y") {
        $score += 5; // 2 + 3
    } elseif ($iteration == "C Y") {
        $score += 6; // 3 + 3
    } elseif ($iteration == "A Z") {
        $score += 8; // 2 + 6
    } elseif ($iteration == "B Z") {
        $score += 9; // 3 + 6
    } elseif ($iteration == "C Z") {
        $score += 7; // 1 + 6
    }
}

echo $score;