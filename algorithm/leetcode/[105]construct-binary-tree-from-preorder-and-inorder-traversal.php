<?php

//根据一棵树的前序遍历与中序遍历构造二叉树。 
//
// 注意: 
//你可以假设树中没有重复的元素。 
//
// 例如，给出 
//
// 前序遍历 preorder = [3,9,20,15,7]
//中序遍历 inorder = [9,3,15,20,7] 
//
// 返回如下的二叉树： 
//
//     3
//   / \
//  9  20
//    /  \
//   15   7 
// Related Topics 树 深度优先搜索 数组 
// 👍 939 👎 0


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
     * @param  Integer[]  $preorder
     * @param  Integer[]  $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder)
    {
        $map = [];
        foreach ($inorder as $k => $v) {
            $map[$v] = $k;
        }

        return $this->build($preorder, 0, count($preorder) - 1, $inorder, 0, count($inorder) - 1, $map);
    }

    function build($preorder, $preStart, $preEnd, $inorder, $inStart, $inEnd, $inMap)
    {
        if ($preStart > $preEnd || $inStart > $inEnd) {
            return null;
        }
        $val = $preorder[$preStart];
        $root = new TreeNode($val);
        $inRoot = $inMap[$val];

        $leftLength = $inRoot - $inStart;

        $root->left = $this->build($preorder, $preStart + 1, $preStart + $leftLength, $inorder, $inStart,
            $inStart + $leftLength, $inMap);
        $root->right = $this->build($preorder, $preStart + 1 + $leftLength, $preEnd, $inorder, $inRoot + 1, $inEnd,
            $inMap);

        return $root;
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