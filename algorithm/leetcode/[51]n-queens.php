<?php

//n 皇后问题 研究的是如何将 n 个皇后放置在 n×n 的棋盘上，并且使皇后彼此之间不能相互攻击。 
//
// 给你一个整数 n ，返回所有不同的 n 皇后问题 的解决方案。 
//
// 
// 
// 每一种解法包含一个不同的 n 皇后问题 的棋子放置方案，该方案中 'Q' 和 '.' 分别代表了皇后和空位。 
//
// 
//
// 示例 1： 
//
// 
//输入：n = 4
//输出：[[".Q..","...Q","Q...","..Q."],["..Q.","Q...","...Q",".Q.."]]
//解释：如上图所示，4 皇后问题存在两个不同的解法。
// 
//
// 示例 2： 
//
// 
//输入：n = 1
//输出：[["Q"]]
// 
//
// 
//
// 提示： 
//
// 
// 1 <= n <= 9 
// 皇后彼此不能相互攻击，也就是说：任何两个皇后都不能处于同一条横行、纵行或斜线上。 
// 
// 
// 
// Related Topics 回溯算法 
// 👍 793 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    private $board = [];
    private $ans = [];

    /**
     * @param  Integer  $n
     * @return String[][]
     */
    function solveNQueens($n)
    {
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $this->board[$i][$j] = '.';
            }
        }
        $this->backtrace($n, 0);
        return $this->ans;
    }

    function backtrace($n, $row)
    {
        if ($row == $n) {
            $this->ans[] = $this->formatRes($this->board);
            return;
        }
        for ($i = 0; $i < $n; $i++) {
            if ($this->isOk($this->board, $row, $i)) {
                $this->board[$row][$i] = 'Q';
                $this->backtrace($n, $row + 1);
                $this->board[$row][$i] = '.';
            }
        }
    }

    function isOk($board, $row, $col)
    {
        //查看这个棋子正上方有没有棋子
        for ($i = 0; $i < $row; $i++) {
            if ($board[$i][$col] == 'Q') {
                return false;
            }
        }
        //查看这个棋子左上方有没有棋子
        for ($i = $row, $j = $col; $i >= 0 && $j >= 0; $j--, $i--) {
            if ($board[$i][$j] == 'Q') {
                return false;
            }
        }
        //查看这个棋子右上方有没有棋子
        $n = count($board);
        for ($i = $row, $j = $col; $i >= 0 && $j < $n; $j++, $i--) {
            if ($board[$i][$j] == 'Q') {
                return false;
            }
        }
        return true;
    }

    function formatRes($board)
    {
        $res = [];
        foreach ($board as $key => $value) {
            $str = '';
            foreach ($value as $v) {
                $str .= $v;
            }
            $res[] = $str;
        }

        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
