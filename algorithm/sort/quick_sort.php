<?php

$case1 = [7, 6, 5, 4, 3, 2, 1, 8, 9];
$case2 = [1];
$case3 = [];

var_dump($case1);
quick_sort($case1);
var_dump($case1);


/**
 * 插入排序
 * @param $arr
 */
function quick_sort(&$arr)
{
    (new QuickSort())->sort($arr);
    return $arr;
}


class QuickSort
{
    public function sort(&$arr)
    {
        $this->quick($arr, 0, count($arr) - 1);
        return $arr;
    }

    private function quick(&$arr, $left, $right)
    {
//        echo $left . ' ' . $right . PHP_EOL;
        if ($left >= $right) {
            return;
        }
        $p = $this->part($arr, $left, $right);

        $this->quick($arr, $left, $p - 1);
        $this->quick($arr, $p + 1, $right);
    }

    private function part(&$arr, $left, $right)
    {
        $p = $arr[$left];

        while ($left < $right) {
            //先从右端开始
            while ($left < $right && $arr[$right] >= $p) {
                $right--;
            }
            $this->swap($arr, $left, $right);

            while ($left < $right && $arr[$left] <= $p) {
                $left++;
            }
            $this->swap($arr, $left, $right);
        }

        return $left;
    }

    private function swap(&$arr, $i, $j)
    {
        $tmp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
    }
}