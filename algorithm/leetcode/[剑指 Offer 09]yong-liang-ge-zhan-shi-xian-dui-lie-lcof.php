<?php
//用两个栈实现一个队列。队列的声明如下，请实现它的两个函数 appendTail 和 deleteHead ，分别完成在队列尾部插入整数和在队列头部删除整数的
//功能。(若队列中没有元素，deleteHead 操作返回 -1 ) 
//
// 
//
// 示例 1： 
//
// 输入：
//["CQueue","appendTail","deleteHead","deleteHead"]
//[[],[3],[],[]]
//输出：[null,null,3,-1]
// 
//
// 示例 2： 
//
// 输入：
//["CQueue","deleteHead","appendTail","appendTail","deleteHead","deleteHead"]
//[[],[],[5],[2],[],[]]
//输出：[null,-1,null,null,5,2]
// 
//
// 提示： 
//
// 
// 1 <= values <= 10000 
// 最多会对 appendTail、deleteHead 进行 10000 次调用 
// 
// Related Topics 栈 设计 
// 👍 247 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
##############################################################################
### 一个入栈 一个出栈 加元素的时候从入栈push 出元素的时候从出栈pop 出栈没有元素去入栈取 ###
##############################################################################
class CQueue
{

    protected $pushStack;
    protected $popStack;

    /**
     */
    function __construct()
    {
        $this->pushStack = new SplStack();
        $this->popStack = new SplStack();
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function appendTail($value)
    {
        $this->pushStack->push($value);
    }

    /**
     * @return Integer
     */
    function deleteHead()
    {
        if (!$this->popStack->count()) {
            while ($this->pushStack->count()) {
                $this->popStack->push($this->pushStack->pop());
            }
        }

        return $this->popStack->count() ? $this->popStack->pop() : -1;
    }
}

/**
 * Your CQueue object will be instantiated and called as such:
 * $obj = CQueue();
 * $obj->appendTail($value);
 * $ret_2 = $obj->deleteHead();
 */
//leetcode submit region end(Prohibit modification and deletion)
