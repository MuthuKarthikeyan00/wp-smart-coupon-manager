<?php

namespace App\Conditions;
defined('ABSPATH') or die('not access');
abstract class Base
{
    public $name = NULL;
    abstract function check($is_valid,$coupon_code);
    public function name()
    {
        return $this->name;
    }
}

