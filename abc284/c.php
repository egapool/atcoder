<?php

$cc_list = [];
list($n, $m) = explode(' ', trim(fgets(STDIN)));

for ($i = 0; $i < $m; $i++) {
    list($u, $v) = explode(' ', trim(fgets(STDIN)));
    $u_in_cc = null;
    $v_in_cc = null;
    foreach ($cc_list as $key => $cc) {
        if (in_array($u, $cc)) {
            $cc_list[$key][] = $v;
            $cc_list[$key] = array_unique($cc_list[$key], SORT_NUMERIC);
            $u_in_cc = $key;
        }
        if (in_array($v, $cc)) {
            $cc_list[$key][] = $u;
            $cc_list[$key] = array_unique($cc_list[$key], SORT_NUMERIC);
            $v_in_cc = $key;
        }
    }

    // 新しい連結成分
    if ($u_in_cc === null && $v_in_cc === null) {
        $cc_list[] = [$u, $v];
    } else if ($u_in_cc !== null && $v_in_cc !== null) {
        if ($u_in_cc !== $v_in_cc) {
            // 二つの連結成分を結合して一つの連結成分を生成する
            $cc_list[$u_in_cc] = array_unique(array_merge($cc_list[$u_in_cc], $cc_list[$v_in_cc]));
            unset($cc_list[$v_in_cc]);
        }
    }
}
// 一度も入力がなかった頂点の数
$add_count = 0;
foreach (range(1, $n) as $node) {
    $hit = false;
    foreach ($cc_list as $cc) {
        if (in_array($node, $cc)) {
            $hit = true;
            break;
        }
    }
    if ($hit === false) {
        $add_count++;
    }
}
echo (count($cc_list) + $add_count) . PHP_EOL;
