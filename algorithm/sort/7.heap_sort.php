<?php

$case1 = [7, 6, 5, 4, 3, 2, 1, 8, 9];
$case2 = [1];
$case3 = [];

var_dump($case1);
heap_sort($case1);
var_dump($case1);


/**
 * 希尔排序 插入排序的变种
 * 第一层排序 确定gap
 * 第二三层排序 插入排序
 * @param $arr
 */
function heap_sort(&$arr)
{
    (new HeapSort2())->sort($arr);
}

class HeapSort
{
    public function sort(&$arr)
    {
        for ($i = (count($arr) >> 1) - 1; $i >= 0; $i--) {
            $this->adjust($arr, $i, count($arr));
        }

        for ($i = count($arr) - 1; $i >= 0; $i--) {
            $this->swap($arr, $i, 0);
            $this->adjust($arr, 0, $i);
        }
    }

    private function adjust(&$arr, $i, $length)
    {
        $iVal = $arr[$i];
        for ($j = ($i << 1) + 1; $j < $length; $j = ($j << 1) + 1) {
            if ($j + 1 < $length && $arr[$j] < $arr[$j + 1]) {
                $j++;
            }
            if ($arr[$j] > $iVal) {
                $arr[$i] = $arr[$j];
                $i = $j;
            } else {
                break;
            }
        }
        $arr[$i] = $iVal;
    }

    private function swap(&$arr, $i, $j)
    {
        $tmp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
    }
}


class HeapSort2
{
    public function sort(&$arr)
    {
        for ($i = floor(count($arr) / 2) - 1; $i >= 0; $i--) {
            $this->adjust($arr, $i, count($arr));
        }

        for ($i = count($arr) - 1; $i >= 0; $i--) {
            $this->swap($arr, 0, $i);
            $this->adjust($arr, 0, $i);
        }
    }

    private function adjust(&$arr, $i, $length)
    {
        $tmp = $arr[$i];
        for ($j = $i * 2 + 1; $j < $length; $j = $j * 2 + 1) {
            if ($j + 1 < $length && $arr[$j] < $arr[$j + 1]) {
                $j++;
            }
            if ($arr[$j] > $tmp) {
                $arr[$i] = $arr[$j];
                $i = $j;
            } else {
                break;
            }
        }
        $arr[$i] = $tmp;
    }

    private function swap(&$arr, $i, $j)
    {
        $tmp = $arr[$j];
        $arr[$j] = $arr[$i];
        $arr[$i] = $tmp;
    }
}