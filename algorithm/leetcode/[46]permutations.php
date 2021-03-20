<?php

//给定一个 没有重复 数字的序列，返回其所有可能的全排列。 
//
// 示例: 
//
// 输入: [1,2,3]
//输出:
//[
//  [1,2,3],
//  [1,3,2],
//  [2,1,3],
//  [2,3,1],
//  [3,1,2],
//  [3,2,1]
//] 
// Related Topics 回溯算法 
// 👍 1215 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    private $ans = [];

    /**
     * @param  Integer[]  $nums
     * @return Integer[][]
     */
    function permute($nums)
    {
        //回溯(搜索树)
        $this->backtrace($nums, []);
        return $this->ans;
    }

    function backtrace($nums, $track)
    {
        if (count($nums) == count($track)) {
            $this->ans[] = $track;
            return;
        }
        foreach ($nums as $k => $num) {
            if (in_array($num, $track)) {
                continue;
            }

            $track[] = $num;
            $this->backtrace($nums, $track);
            array_pop($track);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
