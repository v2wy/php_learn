<?php

//给定一个按照升序排列的整数数组 nums，和一个目标值 target。找出给定目标值在数组中的开始位置和结束位置。 
//
// 如果数组中不存在目标值 target，返回 [-1, -1]。 
//
// 进阶： 
//
// 
// 你可以设计并实现时间复杂度为 O(log n) 的算法解决此问题吗？ 
// 
//
// 
//
// 示例 1： 
//
// 
//输入：nums = [5,7,7,8,8,10], target = 8
//输出：[3,4] 
//
// 示例 2： 
//
// 
//输入：nums = [5,7,7,8,8,10], target = 6
//输出：[-1,-1] 
//
// 示例 3： 
//
// 
//输入：nums = [], target = 0
//输出：[-1,-1] 
//
// 
//
// 提示： 
//
// 
// 0 <= nums.length <= 105 
// -109 <= nums[i] <= 109 
// nums 是一个非递减数组 
// -109 <= target <= 109 
// 
// Related Topics 数组 二分查找 
// 👍 903 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  Integer[]  $nums
     * @param  Integer  $target
     * @return Integer[]
     */
    function searchRange($nums, $target)
    {
        return [
            $this->findLeft($nums, 0, count($nums) - 1, $target), $this->findRight($nums, 0, count($nums) - 1, $target)
        ];
    }

    function findLeft($nums, $left, $right, $target)
    {
        while ($left <= $right) {
            $mid = $left + (($right - $left) >> 1);
            if ($nums[$mid] == $target) {
                $right = $mid - 1;
            } elseif ($nums[$mid] < $target) {
                $left = $mid + 1;
            } elseif ($nums[$mid] > $target) {
                $right = $mid - 1;
            }
        }

        if ($left >= count($nums) || $nums[$left] != $target) {
            return -1;
        }

        return $left;
    }

    function findRight($nums, $left, $right, $target)
    {
        while ($left <= $right) {
            $mid = $left + (($right - $left) >> 1);
            if ($nums[$mid] == $target) {
                $left = $mid + 1;
            } elseif ($nums[$mid] < $target) {
                $left = $mid + 1;
            } elseif ($nums[$mid] > $target) {
                $right = $mid - 1;
            }
        }

        if ($right < 0 || $nums[$right] != $target) {
            return -1;
        }

        return $right;
    }
}
//leetcode submit region end(Prohibit modification and deletion)