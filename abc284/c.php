<?php

list($n, $m) = explode(' ', trim(fgets(STDIN)));
$uf = new UnionFind($n);
for ($i = 0; $i < $m; $i++) {
    list($u, $v) = explode(' ', trim(fgets(STDIN)));
    $uf->union($u - 1, $v - 1);
}
$ans = 0;
for ($i = 0; $i < $n; $i++) {
    if ($uf->root($i) === $i) {
        $ans++;
    }
}
echo $ans;


class UnionFind
{
    private $pr = [];
    private $sz = [];

    public function __construct($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->pr[$i] = $i;
            $this->sz[$i] = 1;
        }
    }

    public function root($a)
    {
        // 自身がrootならroot発見
        if ($this->pr[$a] === $a) {
            return $a;
        }
        // 再帰的に親のrootを探索する
        return $this->root($this->pr[$a]);
    }

    public function union($a, $b)
    {
        $a = $this->root($a);
        $b = $this->root($b);

        // rootが同じなら何もしない
        if ($a === $b) {
            return;
        }

        if ($this->sz[$a] < $this->sz[$b]) {
            list($a, $b) = [$b, $a];
        }
        // sizeが小さい方のrootに大きい方のrootをセットする
        $this->pr[$b] = $a;
        $this->sz[$a] += $this->sz[$b];
    }

    public function isSame($a, $b)
    {
        return $this->root($a) === $this->root($b);
    }
}
