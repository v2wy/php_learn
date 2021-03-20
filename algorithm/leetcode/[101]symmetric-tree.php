<?php
//给定一个二叉树，检查它是否是镜像对称的。 
//
// 
//
// 例如，二叉树 [1,2,2,3,4,4,3] 是对称的。 
//
//     1
//   / \
//  2   2
// / \ / \
//3  4 4  3
// 
//
// 
//
// 但是下面这个 [1,2,2,null,3,null,3] 则不是镜像对称的: 
//
//     1
//   / \
//  2   2
//   \   \
//   3    3
// 
//
// 
//
// 进阶： 
//
// 你可以运用递归和迭代两种方法解决这个问题吗？ 
// Related Topics 树 深度优先搜索 广度优先搜索 
// 👍 1295 👎 0


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
     * @return Boolean
     */
    function isSymmetric($root)
    {
        return $this->isSymmetricTow($root, $root);
    }

    /**
     * @param $left TreeNode
     * @param $right TreeNode
     */
    function isSymmetricTow($left, $right)
    {
        if ($left == null && $right == null) {
            return true;
        }
        if ($left == null || $right == null) {
            return false;
        }
        return $left->val == $right->val && $this->isSymmetricTow($left->left,
                $right->right) && $this->isSymmetricTow($right->left, $left->right);
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
/**
 * class Solution {
 * public boolean isSymmetric(TreeNode root) {
 * return check(root, root);
 * }
 *
 * public boolean check(TreeNode p, TreeNode q) {
 * if (p == null && q == null) {
 * return true;
 * }
 * if (p == null || q == null) {
 * return false;
 * }
 * return p.val == q.val && check(p.left, q.right) && check(p.right, q.left);
 * }
 * }
 */