<?php

//路径 被定义为一条从树中任意节点出发，沿父节点-子节点连接，达到任意节点的序列。同一个节点在一条路径序列中 至多出现一次 。该路径 至少包含一个 节点，且不
//一定经过根节点。 
//
// 路径和 是路径中各节点值的总和。 
//
// 给你一个二叉树的根节点 root ，返回其 最大路径和 。 
//
// 
//
// 示例 1： 
//
// 
//输入：root = [1,2,3]
//输出：6
//解释：最优路径是 2 -> 1 -> 3 ，路径和为 2 + 1 + 3 = 6 
//
// 示例 2： 
//
// 
//输入：root = [-10,9,20,null,null,15,7]
//输出：42
//解释：最优路径是 15 -> 20 -> 7 ，路径和为 15 + 20 + 7 = 42
// 
//
// 
//
// 提示： 
//
// 
// 树中节点数目范围是 [1, 3 * 104] 
// -1000 <= Node.val <= 1000 
// 
// Related Topics 树 深度优先搜索 递归 
// 👍 942 👎 0


//leetcode submit region begin(Prohibit modification and deletion)

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    private $ans = PHP_INT_MIN;

    /**
     * @param  TreeNode  $root
     * @return Integer
     */
    function maxPathSum($root)
    {
        //问题的核心: 最长子树 = min (所有节点的(节点长度 + 左子树最大长度(小于0则舍弃左子树) + 右子树的最大长度(小于0则舍弃右子树)))
        $this->maxGin($root);
        return $this->ans;
    }


    /**
     * 获取最长路径
     * @param $root
     * @return int|mixed
     */
    function maxGin($root){
        if($root == null){
            return 0;
        }
        //如果后面的最大路径小于0,那么就不连
        $leftMax = max($this->maxGin($root->left), 0);
        $rightMax = max($this->maxGin($root->right), 0);

        //保存每一步的最大路径
        $this->ans = max($this->ans, $leftMax + $rightMax + $root->val);
        return max($leftMax, $rightMax) + $root->val;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}