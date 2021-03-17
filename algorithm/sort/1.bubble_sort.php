<?php


$case1 = [1, 2, 3, 3, 4, 7, 6, 5];
$case2 = [3,2,1];
$case3 = [];
$case4 = [2, 4, 2, 1, 2, 3, 4, 53, 2, 23, 32, 1, 2];

var_dump($case1, bubble_sort($case1));
var_dump($case2, bubble_sort($case2));
var_dump($case3, bubble_sort($case3));
var_dump($case4, bubble_sort($case4));

/**
 * 冒泡排序
 * 第一层循环确定最小元素下标
 * 第二层循环从后往前把最小元素交换到最小下标位置
 * @param $arr
 * @return mixed
 */
function bubble_sort(&$arr)
{
    $arrLength = count($arr);
    for ($i = 0; $i < $arrLength; $i++) {
        //$i从0开始 那么$j要从后面往前面冒泡
        for ($j = $arrLength - 1; $j > $i; $j--) {
            if ($arr[$j] < $arr[$j - 1]) {
                swap($arr, $j, $j - 1);
            }
        }
    }

    return $arr;
}

function swap(&$arr, $i, $j)
{
    $tmp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tmp;
}