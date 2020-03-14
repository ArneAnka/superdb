<?php

namespace App;

class ColumnChange {

    /**
     * [$column description]
     * @var [type]
     */
    public $column;

    /**
     * [$from description]
     * @var [type]
     */
    public $from;

    /**
     * [$to description]
     * @var [type]
     */
    public $to;

    /**
     * [__construct description]
     * @param [type] $column [description]
     * @param [type] $from   [description]
     * @param [type] $to     [description]
     */
    public function __construct($column, $from, $to){
        $this->column = $column;
        $this->from = $from;
        $this->to = $to;
    }
}
