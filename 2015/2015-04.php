<?php
$input = "ckczppom";
$password = "";
$i = 0;
while (strlen($password) < 8) {
    $hash = md5($input . $i);
    if (str_starts_with($hash, "000000")) {
        $password .= substr($hash, 5, strlen($hash) - 5);
    }
    $i++;
}
echo $i-1;
