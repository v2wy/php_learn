<?php

$case1 = [7, 6, 5, 4, 3, 2, 1, 8, 9];
$case2 = [1];
$case3 = [];

var_dump($case1, select_sort($case1));
var_dump($case2, select_sort($case2));
var_dump($case3, select_sort($case3));

/**
 * 选择排序
 * @param $arr
 * @return mixed
 */
function select_sort(&$arr)
{
    $arrLength = count($arr);
    for ($i = 0; $i < $arrLength - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $arrLength; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        //交换$minIndex和$i
        if ($i != $minIndex) {
            swap($arr, $i, $minIndex);
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