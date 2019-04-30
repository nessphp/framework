<?php

use ness\Controller as myController;

class indexController extends myController
{
    public function indexAction($param = 0)
    {
        echo "<br>called first controller.";
    }

    public function viewAction($param = 0)
    {
        $this->View->Render('welcome.php');
    }
}
