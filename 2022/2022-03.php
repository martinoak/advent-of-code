<?php

$input = file_get_contents('inputs/2022-03.txt');

$rucksacks = explode(PHP_EOL, $input);
$letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

$priority = 0;

foreach ($rucksacks as $rucksack) {
    //vive la optimisation
    $letter = implode(array_unique(array_intersect(str_split(substr($rucksack,0,strlen($rucksack)/2)), str_split(substr($rucksack,strlen($rucksack)/2)))));

    $priority += array_search($letter, $letters) + 1;
}

echo $priority;