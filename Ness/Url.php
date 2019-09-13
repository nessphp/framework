<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace Ness;

use Ness\Configuration as conf;
use const null;
use const true;
use function explode;
use function is_null;

/**
 * An url Helper class to manage your application's routing and navigating actions.
 */
class Url
{
    /**
     * This function returns a redirectable url from your controllers's actions.
     * For example you can use this with html's <a> tags href attribute.
     * Route redirect.
     *
     * @param string $controllerName Controller.
     * @param string $action         Action.
     * @param mixed  $parameter      Parameter null by default.
     *
     * @return string Returns the app url.
     */
    public static function RedirectToAction($controllerName, $action, $parameter = null)
    {
        if (isset($parameter) && !is_null($parameter)) {
            return conf::getApplicationUrl().'/'.$controllerName.'/'.$action.'/'.$parameter;
        } else {
            return conf::getApplicationUrl().'/'.$controllerName.'/'.$action;
        }
    }

    /**
     * This function returns a redirectable url from your controllers's actions in an Area.
     * For example you can use this with html's <a> tags href attribute.
     * Route redirect.
     *
     * @param string $Area           Area name.
     * @param string $controllerName Controller.
     * @param string $action         Action.
     * @param mixed  $parameter      Parameter null by default.
     *
     * @return string
     */
    public static function RedirectToArea($Area = '', $controllerName = '', $action = '', $parameter = null)
    {
        $addArea = '?p='.$Area;
        if (isset($parameter) && !is_null($parameter)) {
            return conf::getApplicationUrl().'/'.$controllerName.'/'.$action.'/'.$parameter.$addArea;
        } else {
            return conf::getApplicationUrl().'/'.$controllerName.'/'.$action.$addArea;
        }
    }

    /**
     * @ignore
     */
    public static function getArea($willWork = true)
    {
        $application_query_data = conf::getQuery();
        if (!empty($application_query_data['p'])) {
            return $application_query_data['p'].'Area'.DIRECTORY_SEPARATOR;
        } else {
            return '';
        }
    }

    /**
     * Simple redirect url
     * For example you can use this with html's < a > tags href attribute.
     *
     * @param string $url  Url.
     * @param string $secs Time to wait before redirect.
     *
     * @return void Returns nothing.
     */
    public static function Redirect($url = '', $secs = '0')
    {
        if (!headers_sent()) {
            header('Location: '.$url);
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="'.$secs.'";url='.$url.'" />';
            echo '</noscript>';
        }
        exit;
    }

    /**
     * Returns current page url.
     *
     * @return string Return the current url.
     */
    public static function getUrl()
    {
        return (isset($_SERVER['HTTPS']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    /**
     * Returns posted values in your url with 'get' method.
     *
     * @param string $paramid Name of your entry
     *
     * @return string Application query data.
     */
    public static function getData($paramid = null)
    {
        $application_query_data = conf::getQuery();
        if (is_null($paramid)) {
            return $application_query_data;
        } else {
            if (empty($application_query_data[$paramid])) {
                return '-1';
            } else {
                return $application_query_data[$paramid];
            }
        }
    }

    /**
     * @ignore
     */
    public static function _clear_url_parameters($query_params = null)
    {
        $application_query_data = conf::getQuery();
        $temp_data = [];
        $qprm_a = explode('&', $query_params);
        foreach ($qprm_a as $url_data) {
            if (!empty($url_data)) {
                $qprm_b = explode('=', $url_data);
                $temp_data[$qprm_b[0]] = $qprm_b[1];
            }
        }
        $application_query_data = $temp_data;
    }
}
