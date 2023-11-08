<?php

namespace Formatters;
use Traits\Format;

class QuestionFormatter
{
    use Format;
    public $questions;
    public function __construct($questions){
        $this->questions    =   $questions;
    }
}

?>