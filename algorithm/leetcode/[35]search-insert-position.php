<?php

//给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。如果目标值不存在于数组中，返回它将会被按顺序插入的位置。 
//
// 你可以假设数组中无重复元素。 
//
// 示例 1: 
//
// 输入: [1,3,5,6], 5
//输出: 2
// 
//
// 示例 2: 
//
// 输入: [1,3,5,6], 2
//输出: 1
// 
//
// 示例 3: 
//
// 输入: [1,3,5,6], 7
//输出: 4
// 
//
// 示例 4: 
//
// 输入: [1,3,5,6], 0
//输出: 0
// 
// Related Topics 数组 二分查找 
// 👍 854 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  Integer[]  $nums
     * @param  Integer  $target
     * @return Integer
     */
    function searchInsert($nums, $target)
    {
        $length = count($nums);
        $left = 0;
        $right = $length - 1;
        while ($left <= $right) {
            $mid = $left + (($right - $left) >> 1);
            if ($nums[$mid] == $target) {
                return $mid;
            } elseif ($nums[$mid] < $target) {
                $left = $mid + 1;
            } elseif ($nums[$mid] > $target) {
                $right = $mid - 1;
            }
        }
        //为什么返回$left
        //最后一次循环肯定是$left=$right=$mid
        //此时:如果$nums[$mid]<$target 要插在后一位
        //如果$nums[$mid]>$target $mid的位置
        //恰好是$left的值
        return $left;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
