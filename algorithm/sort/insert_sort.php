<?php
$case1 = [7, 6, 5, 4, 3, 2, 1, 8, 9];
$case2 = [1];
$case3 = [];

var_dump($case1, insert_sort($case1));
var_dump($case2, insert_sort($case2));
var_dump($case3, insert_sort($case3));


/**
 * 插入排序
 * @param $arr
 * @return mixed
 */
function insert_sort(&$arr)
{
    $arrLength = count($arr);
    for ($i = 0; $i < $arrLength - 1; $i++) {
        for ($j = $i + 1; $j < $arrLength; $j++) {
            if ($arr[$j] < $arr[$i]) {
                exchange($arr, $i, $j);
            }
        }
    }

    return $arr;
}

function exchange(&$arr, $i, $j)
{
    $jvalue = $arr[$j];
    for (; $j > $i; $j--) {
        $arr[$j] = $arr[$j - 1];
    }
    $arr[$i] = $jvalue;
    return $arr;
}