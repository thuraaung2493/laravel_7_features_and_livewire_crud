<?php

namespace App;

class Schedule
{
    public $start;
    public $end;

    public function __construct($start, $end) {
        $this->start = $start;
        $this->end = $end;
    }
}
