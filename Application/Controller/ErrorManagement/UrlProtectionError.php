<?php

/**
 * Please do not remove or rename this class and methods. Some part of class are required for core framework module.
 * You can add your own error handlers and edit view files for custom error messages.
 */
use Ness\Controller as ErrorHandlingController;

class UrlProtectionError extends ErrorHandlingController
{

    public function ShowErrorPage($url = 'NOT DEFINED', $charset = 'NOT DEFINED')
    {
        $this->View->page_title = 'Ness Security Guard';
        $this->View->page_message = "Hey! It is so sad to say you can not continue to our website with the parameter <b>[{$charset}]</b>. Please check the <b>{$url}</b> in the url and try again.";
        $this->View->Render('systemArea'.DIRECTORY_SEPARATOR.'protectionerrorView.php');
    }
}
