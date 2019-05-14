<?php

use Ness\Controller as myController;

class indexController extends myController
{
    public function indexAction($param = 0)
    {
        /**
         * Show the start page for
         * Ness PHP Framework
         * (This is just a test page you can write your own view files)
         */
        $this->View->Render('startpage.php');        
    }
}
