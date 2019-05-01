<?php

/**
 * Please do not remove or rename this class and methods. Some part of class are required for core framework module.
 * You can add your own error handlers and edit view files for custom error messages.
 */
use ness\Controller as ErrorHandlingController;

class UrlProtectionError extends ErrorHandlingController
{

    public function ShowErrorPage($url = 'NOT DEFINED', $charset = 'NOT DEFINED')
    {
        $this->View->lblMsg = "Sorry for this restriction but we found <b> {$charset} </b> a bit harmful for our application. Please check  <b>{$url} </b> and load this page again.";
        $this->Content->Render($this->View->lblMsg);
    }
}
