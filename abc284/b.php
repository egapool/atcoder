<?php

$t = trim(fgets(STDIN));
$ans = [];
for($i=0;$i<$t;$i++) {
    fgets(STDIN);
    $a = explode(' ', trim(fgets(STDIN)));
    $ans[] = count(array_filter($a, function($x) {
        return (int) $x % 2 === 1;
    }));
}
echo implode(PHP_EOL, $ans) . PHP_EOL;
