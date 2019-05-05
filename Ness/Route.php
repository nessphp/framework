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

use const null;
use function is_null;

/**
 * This class is used to simply manage routes of your application.
 * All functions of this class must be used in Application Register Function.
 */
class Route extends Configuration
{
    /**
     * Map new route name.
     *
     * @param string $mapname        The map name.
     * @param string $mapdestination The map destination.
     *
     * @return void Returns nothing.
     */
    public static function MapNew($mapname = 'index', $mapdestination = 'index/index/0')
    {
        $application_static_routes = parent::getStaticRoute();
        $application_static_routes[$mapname] = Configuration::getApplicationUrl().'/'.$mapdestination;
        parent::setStaticRoute($application_static_routes);
    }

    /**
     * Returns a redirectable url from map name.
     *
     * @param type $mapname The map name.
     *
     * @return string The resolved static map.
     */
    public static function ResolveMap($mapname = null)
    {
        $application_static_routes = Configuration::getStaticRoute();
        if (!is_null($mapname)) {
            return $application_static_routes[$mapname];
        } else {
            return $application_static_routes;
        }
    }

    /**
     * This function is used to redirect your application with headers.
     *
     * @param type $mapname      The map name.
     * @param type $setparameter The parameter.
     *
     * @return void Returns nothing.
     */
    public static function ForceRedirect($mapname = 'index', $setparameter = null)
    {
        $application_static_routes = Configuration::getStaticRoute();
        if (isset($application_static_routes[$mapname])) {
            if (!is_null($setparameter)) {
                $tagToReplace = '{@}';
                $application_static_routes[$mapname] = str_replace($tagToReplace, $setparameter, $application_static_routes[$mapname]);
                header('location: '.$application_static_routes[$mapname]);
                exit();
            } else {
                $tagToReplace = '{@}';
                $application_static_routes[$mapname] = str_replace($tagToReplace, '', $application_static_routes[$mapname]);
                header('location: '.$application_static_routes[$mapname]);
                exit();
            }
        }
    }

    /**
     * Clear all mapped routes.
     *
     * @return void Returns nothing.
     */
    public static function ClearMaps()
    {
        Configuration::setStaticRoute([]);
    }

    /**
     * This function is used to get url typed in an array. You can use this when you are creating queries in url.
     *
     * @param type $requested Requested index from array.
     *
     * @return mixed Return uri requests.
     */
    public static function ExplodeUrlArray($requested = null)
    {
        if (!is_null($requested)) {
            $toks = explode('/', rtrim($_SERVER['REQUEST_URI']));

            return $toks[$requested];
        } else {
            return explode('/', rtrim($_SERVER['REQUEST_URI']));
        }
    }
}
