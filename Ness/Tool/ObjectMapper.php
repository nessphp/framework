<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness\Tool {
    /**
     *		Object mapper tool for Ness PHP
     *		Use it to map such a configuration to use globally in your code.
     *		Objects can be defined in Application Class / Register() Function.
     **/
    class ObjectMapper
    {
        /**
         * @ignore (!) stored object list
         */
        private static $objList = [];

        /**
         *	Map new variable for use it globally.
         *
         *	@param string $objName Name for configuration
         *	@param string  $objPath data you want to map
         *
         *	@return void
         */
        public static function MapNew($objName, $objPath)
        {
            self::$objList[$objName] = $objPath;
        }

        /**
         *	Get a value from map list.
         *
         *	@param string $objName Name of object
         *
         *	@return mixed type
         */
        public static function GetValue($objName)
        {
            return self::$objList[$objName];
        }
    }
}
