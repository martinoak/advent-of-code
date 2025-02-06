<?php

$input = file_get_contents('inputs/2015-07.txt');
$instructions = explode("\n", trim($input));
$wires = [];

function getSignal($wire) {
    global $wires;

    if (is_numeric($wire)) {
        return (int)$wire;
    }

    if (!isset($wires[$wire])) {
        return null;
    }

    if (is_numeric($wires[$wire])) {
        return (int)$wires[$wire];
    }

    $parts = explode(' ', $wires[$wire]);

    if (count($parts) == 1) {
        $signal = getSignal($parts[0]);
    } elseif (count($parts) == 2) {
        $signal = ~getSignal($parts[1]) & 0xFFFF;
    } elseif (count($parts) == 3) {
        $left = getSignal($parts[0]);
        $right = getSignal($parts[2]);
        switch ($parts[1]) {
            case 'AND':
                $signal = $left & $right;
                break;
            case 'OR':
                $signal = $left | $right;
                break;
            case 'LSHIFT':
                $signal = ($left << $right) & 0xFFFF;
                break;
            case 'RSHIFT':
                $signal = $left >> $right;
                break;
        }
    }
    $wires[$wire] = $signal;

    return $signal;
}

foreach ($instructions as $instruction) {
    [$expr, $wire] = explode(' -> ', $instruction);
    $wires[$wire] = $expr;
}

echo getSignal('a') . PHP_EOL;
