<?php
$input = file_get_contents('inputs/2015-02.txt');

$input = explode("\n", $input);
$total = 0;
$ribbon = 0;
foreach ($input as $line) {
    $line = explode("x", $line);
    $l = $line[0];
    $w = $line[1];
    $h = $line[2];
    $total += 2 * (int)$l * (int)$w + 2 * (int)$w * (int)$h + 2 * (int)$h * (int)$l + min((int)$l * (int)$w, (int)$w * (int)$h, (int)$h * (int)$l);

    $ribbon += (int)$l * (int)$w * (int)$h + min((int)$l + (int)$l + (int)$w + (int)$w, (int)$w + (int)$w + (int)$h + (int)$h, (int)$h + (int)$h + (int)$l + (int)$l);
}
echo $total."\n".$ribbon."\n";
