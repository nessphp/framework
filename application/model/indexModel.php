<?php
use ness\Model;

class indexModel extends Model {
    public $test_var = 0;

    function __construct()
    {
        echo "test model.<br>";
        //print_r(parent::toArray());
    }
}