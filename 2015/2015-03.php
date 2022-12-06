<?php
$input = file_get_contents('inputs/2015-03.txt');

$houses = ["0 0"];
$x = 0;
$y = 0;
$rx = 0;
$ry = 0;
$counter = 1;
foreach (str_split($input) as $char) {
    if ($counter % 2 == 0) {
        switch ($char) {
            case '^':
                $x++;
                break;
            case 'v':
                $x--;
                break;
            case '<':
                $y--;
                break;
            case '>':
                $y++;
                break;
        }
        $house = $x." ".$y;
    }
    else {
        switch ($char) {
            case '^':
                $rx++;
                break;
            case 'v':
                $rx--;
                break;
            case '<':
                $ry--;
                break;
            case '>':
                $ry++;
                break;
        }
        $house = $rx." ".$ry;
    }
    if (!in_array($house, $houses)) {
        $houses[] = $house;
    }
    $counter++;
    print_r($houses);
}
echo count($houses);