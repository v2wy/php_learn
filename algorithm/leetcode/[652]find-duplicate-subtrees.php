<?php

//给定一棵二叉树，返回所有重复的子树。对于同一类的重复子树，你只需要返回其中任意一棵的根结点即可。 
//
// 两棵树重复是指它们具有相同的结构以及相同的结点值。 
//
// 示例 1： 
//
//         1
//       / \
//      2   3
//     /   / \
//    4   2   4
//       /
//      4
// 
//
// 下面是两个重复的子树： 
//
//       2
//     /
//    4
// 
//
// 和 
//
//     4
// 
//
// 因此，你需要以列表的形式返回上述重复子树的根结点。 
// Related Topics 树 
// 👍 247 👎 0


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

    private $countMap = [];
    private $res = [];

    /**
     * @param  TreeNode  $root
     * @return TreeNode[]
     */
    function findDuplicateSubtrees($root)
    {
        $this->find($root);
        return $this->res;
    }

    /**
     * @param $root TreeNode
     * @return string
     */
    function find($root)
    {
        if ($root == null) {
            return '#';
        }

        $left = $this->find($root->left);
        $right = $this->find($root->right);

        $ser = $left.','.$right.','.$root->val;

        $this->countMap[$ser]++;
        if ($this->countMap[$ser] == 2) {
            $this->res[] = $root;
        }

        return $ser;
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
