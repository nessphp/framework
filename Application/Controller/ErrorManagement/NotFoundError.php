<?php

/**
 * Please do not remove or rename this class and methods. Some part of class are required for core framework module.
 * You can add your own error handlers and edit view files for custom error messages.
 */
use Ness\Controller as ErrorHandlingController;

class NotFoundError extends ErrorHandlingController
{
    /**
     * Run when a controller not found.
     */
    public function ControllerNotFound()
    {
        $this->View->page_title = 'Controller Not Found';
        $this->View->page_message = 'Hey! the page you are looking for is not available in our database. We are sorry for that.';
        $this->View->Render('systemArea'.DIRECTORY_SEPARATOR.'notfoundView.php');
    }

    /**
     * Run when an action not found.
     */
    public function ActionNotFound($parameter = null)
    {
        // This Action will be called if a method called in url is not found. This feature needs to be enabled
        // in base class of framework. Please check framework.php::Run method.
        $this->View->page_title = 'Action Not Found';
        $this->View->page_message = 'Hey! the page you are looking for is not available in our database. We are sorry for that.';
        $this->View->Render('systemArea'.DIRECTORY_SEPARATOR.'notfoundView.php');
    }
}
