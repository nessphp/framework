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

    use Ness\Configuration as conf;

    /*
     * @ignore
     */

    define('ModeRequire', 0);

    /*
     * @ignore
     */
    define('ModeRequireOnce', 1);
    /*
     * @ignore
     */
    define('ModeInclude', 2);
    /*
     * @ignore
     */
    define('ModeDefault', 2);
    /*
     * @ignore
     */
    define('ModeIncludeOnce', 3);

    /**
     * A helper class to load thir party libraries to your code.
     **/
    class Library
    {
        private static function checkFile($filepath)
        {
            if (file_exists($filepath)) {
                return true;
            } else {
                return false;
            }
        }

        /**
         *	Loads a third party class. (Class must be in Library folder).
         *
         *	@param string $filename File name.
         *	@param mixed $type Load type for class (Available Modes:ModeDefault,ModeRequire,ModeRequireOnce,ModeInclude,ModeIncludeOnce)
         *
         *	@return void
         */
        public static function Load($filename = '', $type = 2)
        {
            $filepath = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . conf::getApplicationFolder() . DIRECTORY_SEPARATOR . 'Library' . DIRECTORY_SEPARATOR . $filename;
            if (self::checkFile($filepath)) {
                switch ($type) {
                    case 0:
                        //mode:require
                        require $filepath;
                        break;
                    case 1:
                        //mode:Require_Once
                        require_once $filepath;
                        break;
                    case 2:
                        //mode:include
                        include $filepath;
                        break;

                    case 3:
                        //mode:include_once
                        include_once $filepath;
                        break;

                    default:
                        include_once $filepath;
                        break;
                }
            }
        }

        /**
         *	Loads a Ness PHP configuration file (File must not be in Library folder.).
         *
         *	@param string $filename File name.
         *	@param mixed $type Load type for class (Available Modes:ModeDefault,ModeRequire,ModeRequireOnce,ModeInclude,ModeIncludeOnce)
         *
         *	@return void
         */
        public static function LoadConfig($filename = '', $type = 2)
        {
            $filepath = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . conf::getApplicationFolder() . DIRECTORY_SEPARATOR . $filename;
            if (self::checkFile($filepath)) {
                switch ($type) {
                    case 0:
                        //mode:require
                        require $filepath;
                        break;
                    case 1:
                        //mode:Require_Once
                        require_once $filepath;
                        break;
                    case 2:
                        //mode:include
                        include $filepath;
                        break;

                    case 3:
                        //mode:include_once
                        include_once $filepath;
                        break;

                    default:
                        include_once $filepath;
                        break;
                }
            }
        }

        /**
         *	Checks if file is available.
         *
         *	@param string $filename File path and file name ex: "Library\test.php"
         *
         *	@return bool
         */
        public static function isAvailable($filename = null)
        {
            $filepath = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . conf::getApplicationFolder() . DIRECTORY_SEPARATOR . 'Library' . DIRECTORY_SEPARATOR . $filename;
            if (file_exists($filepath)) {
                return true;
            } else {
                return false;
            }
        }
    }
}
