<?php
$input = file_get_contents('inputs/2015-05.txt');
$input = explode("\n", $input);
$nice = 0;

foreach ($input as $line) {
    if (isNice($line)) {
        $nice++;
    }
}

function isNice($line): bool
{
    return hasPairTwice($line) && hasRepeatingLetterWithOneBetween($line);
}

function hasPairTwice($line): bool
{
    $pairs = [];
    for ($i = 0; $i < strlen($line) - 1; $i++) {
        $pair = $line[$i] . $line[$i + 1];
        if (isset($pairs[$pair]) && $pairs[$pair] < $i - 1) {
            return true;
        }
        if (!isset($pairs[$pair])) {
            $pairs[$pair] = $i;
        }
    }
    return false;
}

function hasRepeatingLetterWithOneBetween($line): bool
{
    for ($i = 0; $i < strlen($line) - 2; $i++) {
        if ($line[$i] == $line[$i + 2]) {
            return true;
        }
    }
    return false;
}

echo $nice . PHP_EOL;