<?php
$input = file_get_contents('inputs/2015-05.txt');

$input = explode("\n", $input);
$nice = 0;
foreach ($input as $line) {
    $vowel = 0;
    $substr = false;
    $double = false;
    if (str_contains($line, "ab") || str_contains($line, "cd") || str_contains($line, "pq") || str_contains($line, "xy")) {
        $substr = true;
    }
    foreach (str_split($line) as $key2 => $value2) {
        if ($value2 == "a" || $value2 == "e" || $value2 == "i" || $value2 == "o" || $value2 == "u") {
            $vowel++;
        }
        if ($key2 > 0 && $value2 == $line[$key2 - 1]) {
            $double = true;
        }
    }
    if ($vowel >= 3 && $double && !$substr) {
        $nice++;
    }
    echo $line . " " . $nice . "\n";
}
echo $nice;