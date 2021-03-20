<?php
//给你一个二叉树，请你返回其按 层序遍历 得到的节点值。 （即逐层地，从左到右访问所有节点）。 
//
// 
//
// 示例： 
//二叉树：[3,9,20,null,null,15,7], 
//
// 
//    3
//   / \
//  9  20
//    /  \
//   15   7
// 
//
// 返回其层序遍历结果： 
//
// 
//[
//  [3],
//  [9,20],
//  [15,7]
//]
// 
// Related Topics 树 广度优先搜索 
// 👍 812 👎 0


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

    /**
     * @param  TreeNode  $root
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        if ($root == null) {
            return [];
        }
        $queue = [];
        $queue[] = $root;

        $ans = [];
        while ($queue) {
            $queueCount = count($queue);
            $row = [];
            for ($i = 0; $i < $queueCount; $i++) {
                $node = array_shift($queue);
                if ($node->left != null) {
                    $queue[] = $node->left;
                }
                if ($node->right != null) {
                    $queue[] = $node->right;
                }
                $row[] = $node->val;
            }
            $ans[] = $row;
        }
        return $ans;
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