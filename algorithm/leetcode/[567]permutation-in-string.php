<?php
//给定两个字符串 s1 和 s2，写一个函数来判断 s2 是否包含 s1 的排列。 
//
// 换句话说，第一个字符串的排列之一是第二个字符串的 子串 。 
//
// 
//
// 示例 1： 
//
// 
//输入: s1 = "ab" s2 = "eidbaooo"
//输出: True
//解释: s2 包含 s1 的排列之一 ("ba").
// 
//
// 示例 2： 
//
// 
//输入: s1= "ab" s2 = "eidboaoo"
//输出: False
// 
//
// 
//
// 提示： 
//
// 
// 输入的字符串只包含小写字母 
// 两个字符串的长度都在 [1, 10,000] 之间 
// 
// Related Topics 双指针 Sliding Window 
// 👍 324 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  String  $s1
     * @param  String  $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2)
    {
        $need = $window = [];
        $s1Length = strlen($s1);
        for ($i = 0; $i < $s1Length; $i++) {
            $need[$s1[$i]]++;
        }

        $left = $right = 0;
        $s = $s2;
        $length = strlen($s);

        $valid = 0;
        $needLength = count($need);

        while ($right < $length) {
            $rightChar = $s[$right];
            $right++;
            if (isset($need[$rightChar])) {
                $window[$rightChar]++;
                if ($window[$rightChar] == $need[$rightChar]) {
                    $valid++;
                }
            }

            while ($right - $left >= $s1Length) {
                if ($valid == $needLength) {
                    return true;
                }
                $leftChar = $s[$left];
                $left++;
                if (isset($need[$leftChar])){
                    if ($window[$leftChar] == $need[$leftChar]) {
                        $valid--;
                    }
                    $window[$leftChar]--;
                }

            }

        }

        return false;
    }
}
//leetcode submit region end(Prohibit modification and deletion)

// 判断 s 中是否存在 t 的排列
/*bool checkInclusion(string t, string s) {
    unordered_map<char, int> need, window;
    for (char c : t) need[c]++;

    int left = 0, right = 0;
    int valid = 0;
    while (right < s.size()) {
        char c = s[right];
        right++;
        // 进行窗口内数据的一系列更新
        if (need.count(c)) {
            window[c]++;
            if (window[c] == need[c])
                valid++;
        }

        // 判断左侧窗口是否要收缩
        while (right - left >= t.size()) {
            // 在这里判断是否找到了合法的子串
            if (valid == need.size())
                return true;
            char d = s[left];
            left++;
            // 进行窗口内数据的一系列更新
            if (need.count(d)) {
                if (window[d] == need[d])
                    valid--;
                window[d]--;
            }
        }
    }
    // 未找到符合条件的子串
    return false;
}*/