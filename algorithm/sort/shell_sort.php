<?php

$case1 = [7, 6, 5, 4, 3, 2, 1, 8, 9];
$case2 = [1];
$case3 = [];

var_dump($case1);
merge_sort($case1);
var_dump($case1);


/**
 * 希尔排序 插入排序的变种
 * 第一层排序 确定gap
 * 第二三层排序 插入排序
 * @param $arr
 */
function merge_sort(&$arr)
{
    $length = count($arr);
    for ($gap = floor($length / 2); $gap > 0; $gap = floor($gap / 2)) {
        for ($i = 1; $i * $gap < $length; $i++) {
            $tmp = $arr[$i * $gap];
            for ($j = $i - 1; $j >= 0; $j--) {
                if ($arr[$j * $gap] > $tmp) {
                    $arr[($j + 1) * $gap] = $arr[$j * $gap];
                    $arr[$j * $gap] = $tmp;
                } else {
                    break;
                }
            }
        }
    }
}