<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/11/2017
 * Time: 11:13 PM
 */

namespace Sort;


class MultiNumberSort implements iSort
{
    private $_order;

    private $_index;

    function __construct($index, $order = 'ascending') {
        $this->_index = $index;
        $this->_order = $order;
    }

    function sort(array $list) {
        // Thay đổi thuật toán phù hợp với thiết lập
        if ($this->_order == 'ascending') {
            uasort($list, array($this, 'ascSort'));
        } else {
            uasort($list, array($this, 'descSort'));
        }
        return $list;
    }
    // Phương thức so sánh hai giá trị
    function ascSort($x, $y) {
        return ($x[$this->_index] > $y[$this->_index]);
    }
    function descSort($x, $y) {
        return ($x[$this->_index] < $y[$this->_index]);
    }
}