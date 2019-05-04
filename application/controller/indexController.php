<?php

use ness\Controller as myController;

class indexController extends myController
{
    public function indexAction($param = 0)
    {
        /**
         * Test Framework libraries 
         */
        $this->View->Render('welcome.php');
    }
}
