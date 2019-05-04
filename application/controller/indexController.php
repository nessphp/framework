<?php

use ness\Controller as myController;
use ness\ui\HtmlTags as htag;

class indexController extends myController
{
    public function indexAction($param = 0)
    {
        /**
         * Test Framework libraries 
         */
        echo htag::h2("Test HtmlTags Class");
        
         $ul = htag::ul();
         echo $ul->li('mysql')
                    ->li('java')
                    ->li('php')
                    ->li('c#')
                    ->Create();
        
        $ol = htag::ol();
        echo $ol->li('anne')
                ->li('baba')
                ->li('kardes')
                ->Create();



    }
}
