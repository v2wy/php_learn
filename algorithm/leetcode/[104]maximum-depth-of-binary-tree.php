<?php
//给定一个二叉树，找出其最大深度。 
//
// 二叉树的深度为根节点到最远叶子节点的最长路径上的节点数。 
//
// 说明: 叶子节点是指没有子节点的节点。 
//
// 示例： 
//给定二叉树 [3,9,20,null,null,15,7]， 
//
//     3
//   / \
//  9  20
//    /  \
//   15   7 
//
// 返回它的最大深度 3 。 
// Related Topics 树 深度优先搜索 递归 
// 👍 824 👎 0


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
     * @return Integer
     */
    function maxDepth($root)
    {
        if($root == null){
            return 0;
        }
        $queue = [];

        $queue[] = $root;

        $depth = 0;

        while ($queue) {
            $queueCount = count($queue);
            for ($i = 0; $i < $queueCount; $i++) {
                $node = array_shift($queue);
                if ($node->left != null) {
                    $queue[] = $node->left;
                }
                if ($node->right != null) {
                    $queue[] = $node->right;
                }
            }
            $depth++;
        }
        return $depth;
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

    /**
     * @param $array
     * @return TreeNode|null
     */
    public static function build($array)
    {
        if (empty($array)) {
            return null;
        }
        $queue = [];
        $rootVal = array_shift($array);
        $root = new self($rootVal);
        $queue[] = $root;
        while ($array && $queue) {
            for ($i = 0; $i < $queue; $i++) {
                $node = array_shift($queue);
                if (!$array) {
                    break;
                }
                $nodeVal = array_shift($array);
                $left = new self($nodeVal);
                $queue[] = $left;
                $node->left = $left;
                if (!$array) {
                    break;
                }
                $nodeVal = array_shift($array);
                $right = new self($nodeVal);
                $queue[] = $right;
                $node->right = $right;
            }
        }

        return $root;
    }
}

if (!function_exists('p')) {
    function p()
    {
        $args = func_get_args();
        $debug_backtrace = debug_backtrace();
        if (PHP_SAPI == 'cli') {
            foreach ($args as $v) {
                echo "\n------- start ------- {$debug_backtrace[0]['file']} : {$debug_backtrace[0]['line']} -------\n";
                print_r($v);
                echo "\n-------- end --------\n";
            }
        } else {
            echo '<div style="text-align: left;">' . "{$debug_backtrace[0]['file']} : {$debug_backtrace[0]['line']}";
            foreach ($args as $k => $v)
            {
                echo "<xmp>";
                print_r($v);
                echo "</xmp>";
            }
            echo '</div>';
        }
    }
}

$array = [3, 9, 20, null, null, 15, 7];
$res = (new Solution())->maxDepth(TreeNode::build($array));
p($res, TreeNode::build($array));


