<?php

/**
 * Please do not remove or rename this class and methods. Some part of class are required for core framework module.
 * You can add your own error handlers and edit view files for custom error messages.
 */

use Ness\Controller as MaintenanceModeController;
use Ness\Configuration;

class MaintenanceMode extends MaintenanceModeController
{

    public function ShowMessageScreen()
    {
        if(Configuration::isMaintenanceEnabled())
        {
            $this->View->Render('systemArea'.DIRECTORY_SEPARATOR.'maintenancemodeView.php');
            //$this->Content->Render('Application is Under Maintenance');
        }
    }
}