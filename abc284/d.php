<?php

fscanf(STDIN, '%d', $t);

$ans = [];
for ($i=0;$i<$t;$i++) {
    fscanf(STDIN, '%d', $n);

    for ($p=2;$p<=$n;$p++) {
        if ($n % $p !== 0) {
            continue;
        }
        $s = $n / $p;
        if ($n % ($p*$p) === 0) {
            $q = $n / ($p * $p);
            $ans[] = $p . ' ' . $q;
            break;
        }
        
    }
}
echo implode(PHP_EOL, $ans);
