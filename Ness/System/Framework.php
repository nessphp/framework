<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness\System;


use Ness\Configuration as conf;
use Ness\Url as purl;
use const E_USER_ERROR;
use const false;
use const true;
use function class_exists;
use function file_exists;
use function method_exists;
use function strpos;
use function trigger_error;

/**
 * Core Module of Ness Framework
 * [Note]: Modification on this file is not recommended you may break the operation of you application.
 */
class Framework
{
    /** @ignore */
    protected static $areas = '';

    /**
     * This method is used to load configuration file, must be called with a valid
     * configuration before Running framework.
     *
     * @param string $configFile app_config.php file.
     * @return void Returns nothing.
     */
    public static function LoadConfig($configFile = 'app_config.php')
    {
        $filename = $configFile;
        if (file_exists($filename)) {
            require_once $filename;
            $class_name = 'Application';
            if (class_exists($class_name) && method_exists($class_name, 'Register')) {
                $appclass = new $class_name();
                $appclass->Register();
            }
        } else {
            trigger_error('[ERROR 101] Could not find application configuration, please check configuration file and try again. See user manual for more information.', E_USER_ERROR);
        }
    }

    /**
     * This function is entry point of your application.
     * Makes configurations check for paths.
     * Initialize the application.
     *
     * @return void Returns nothing.
     */
    public static function Run()
    {
        if (!isset($_SERVER['REQUEST_URI'])) {
            $_SERVER['REQUEST_URI'] = '';
        }

        // explode query data to array for using with security check.
        $url_spr_act = explode('?', rtrim($_SERVER['REQUEST_URI']));
        $tokens = explode('/', $url_spr_act[0]);

        // if query available in $url_spr_act check and clean parameters of url.
        if (!empty($url_spr_act[1])) {
            // 2nd level security [must run]
            purl::_clear_url_parameters($url_spr_act[1]);
        }

        // Create token index
        $tk1 = 1;
        $tk2 = 2;
        $tk3 = 3;
        $tk4 = 4;

        // get configurations from app_config and look if app is in root or not.
        if (!conf::isRoot()) {
            $tk1 = 1 + 1;
            $tk2 = 2 + 1;
            $tk3 = 3 + 1;
            $tk4 = 4 + 1;
        }

        // Check for area before calling controller
        $url_areas = new purl();
        $area = $url_areas->getArea();

        // Look app_config.php if security enabled check for unwanted query or parameter in url.
        // 1st level security.[optional: can be controlled via app_config.php]
        self::checkUrlProtection($tokens);

        //Check if maintenance mode enabled. Show 'under maintenance' message if enabled.
        self::checkMaintenanceMode();


        // Look for controllers and run the app.
        $controllerName = $tokens[$tk1] . 'Controller';
        if (file_exists(conf::getApplicationFolder() . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . $area . $controllerName . '.php')) {
            require_once conf::getApplicationFolder() . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . $area . $controllerName . '.php';
            $controller = new $controllerName();
            if (isset($tokens[$tk2]) && ($tokens[$tk2] != '')) {
                $actionName = $tokens[$tk2] . 'Action';
                if (isset($tokens[$tk3])) {
                    if (method_exists($controller, $actionName)) {
                        //Action available with parameters, Load Action
                        $controller->{$actionName}($tokens[$tk3]);
                    } else {
                        //Action Not available show error screen
                        require_once conf::getApplicationFolder() . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ErrorManagement' . DIRECTORY_SEPARATOR . 'NotFoundError.php';
                        $controllerName = 'NotFoundError';
                        $controller = new $controllerName();
                        $controller->ActionNotFound();
                    }
                } else {
                    if (method_exists($controller, $actionName)) {
                        //Action available without parameters, Load Action
                        $controller->{$actionName}();
                    } else {
                        //Action Not available show error screen
                        require_once conf::getApplicationFolder() . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ErrorManagement' . DIRECTORY_SEPARATOR . 'NotFoundError.php';
                        $controllerName = 'NotFoundError';
                        $controller = new $controllerName();
                        $controller->ActionNotFound();
                    }
                }
            } else {
                // Default entry point (IndexAction), if action not specified
                $controller->IndexAction();
            }
        } else {
            // Check if controller defined in url, if not look for Index.php controller and IndexAction by default.
            if ($tokens[$tk1] == '') {
                if (file_exists(conf::getApplicationFolder() . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'indexController.php')) {
                    require_once conf::getApplicationFolder() . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'indexController.php';
                    $controllerName = 'indexController';
                    $controller = new $controllerName();
                    $controller->indexAction();
                }
            } else {
                // if not found an entry point(also indexController.php & IndexAction ) load a 404 error.
                require_once conf::getApplicationFolder() . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ErrorManagement' . DIRECTORY_SEPARATOR . 'NotFoundError.php';
                $controllerName = 'NotFoundError';
                $controller = new $controllerName();
                $controller->ControllerNotFound();
            }
        }
    }

    /**
     * @ignore
     */
    private static function checkUrlProtection($tokens_array)
    {
        // see the config file if secured url is enabled, if true
        if (conf::isUrlProtected()) {
            // look for each parameter in url
            foreach ($tokens_array as $value) {
                foreach (conf::getUnwantedParameters() as $unwanted) {
                    // check each url token with each unwanted parameter if contains it.
                    if (strpos($value, $unwanted) !== false) {
                        // force redirect to ErrorHandling Controller
                        require_once conf::getApplicationFolder() . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ErrorManagement' . DIRECTORY_SEPARATOR . 'UrlProtectionError.php';
                        $controllerName = 'UrlProtectionError';
                        $controller = new $controllerName();
                        $controller->ShowErrorPage($value, $unwanted);
                        exit();
                    }
                }
            }
        }
    }

    /**
     * @ignore
     */
    private static function checkMaintenanceMode()
    {
        if (conf::isMaintenanceEnabled()) {
            $file = conf::getApplicationFolder() . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'ErrorManagement' . DIRECTORY_SEPARATOR . 'MaintenanceMode.php';
            if (file_exists($file)) {
                require_once $file;
                $controllerName = 'MaintenanceMode';
                $controller = new $controllerName();
                $controller->ShowMessageScreen();
                exit();
            }
        }
    }
}
