<?php

$case1 = [7, 6, 5, 4, 3, 2, 1, 8, 9];
$case2 = [1];
$case3 = [];

var_dump($case1, insert_sort($case1));
var_dump($case2, insert_sort($case2));
var_dump($case3, insert_sort($case3));


/**
 * 插入排序
 * 第一层确定要插入前面有序序列的元素的下标
 * 第二层循环依次跟前面有序数组做比较,并插入合适的位置
 * @param $arr
 * @return mixed
 */
function insert_sort(&$arr)
{
    $arrLength = count($arr);
    for ($i = 1; $i < $arrLength; $i++) {
        $tmp = $arr[$i];
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($arr[$j] > $tmp) {
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
            } else {
                break;
            }
        }
    }

    return $arr;
}