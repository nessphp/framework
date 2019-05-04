<?php

use ness\Controller as myController;
use ness\Model;

class indexController extends myController
{
    public function indexAction($param = 0)
    {
        /**
         * Test Framework libraries 
         */
        echo "<br>called first controller.<br>";
        Model::Load('indexModel');
        $x = new indexModel();

    }
}
