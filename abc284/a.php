<?php

$n = trim(fgets(STDIN));
$res = [];
for ($i=0;$i<$n;$i++) {
    $res[] = trim(fgets(STDIN));
}

krsort($res);
echo implode(PHP_EOL, $res);
