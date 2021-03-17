<?php

$case1 = [7, 6, 5, 4, 3, 2, 1, 8, 9];
$case2 = [1];
$case3 = [];

var_dump($case1);
merge_sort($case1);
var_dump($case1);


/**
 * 归并排序
 * 先拆分再合并
 * @param $arr
 */
function merge_sort(&$arr)
{
    (new MergeSort())->sort($arr);
    return $arr;
}

class MergeSort
{
    public function sort(&$arr)
    {
        $this->splitMerge($arr, 0, count($arr));
    }

    private function splitMerge(&$arr, $left, $right)
    {
        if ($left >= $right) {
            return;
        }

        $middle = floor(($left + $right) / 2);
        $this->splitMerge($arr, $left, $middle);
        $this->splitMerge($arr, $middle + 1, $right);
        $this->merge($arr, $left, $middle, $right);
    }

    /**
     * $arr[$left ~ $middle]这个区间也是顺序的
     * $arr[$middle + 1 ~ $right]这个区间是顺序的
     * 先把左右两个数组合成一个,然后再修改原数组
     * 合并的话
     * @param $arr
     * @param $left
     * @param $middle
     * @param $right
     */
    private function merge(&$arr, $left, $middle, $right)
    {
        $temp = [];
        $l = $left;
        $r = $middle + 1;
        while ($l <= $middle && $r <= $right) {
            if ($arr[$l] <= $arr[$r]) {
                $temp[] = $arr[$l];
                $l++;
            } else {
                $temp[] = $arr[$r];
                $r++;
            }
        }

        while ($l <= $middle) {
            $temp[] = $arr[$l];
            $l++;
        }
        while ($r <= $right) {
            $temp[] = $arr[$r];
            $r++;
        }

        for ($i = 0; $i < count($temp); $i++) {
            $arr[$left + $i] = $temp[$i];
        }
    }
}