<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace Ness\IO
{
    use Ness\Configuration;

    /**
     * This library contains functions which provides you access to special application directories
     * like controller folder, view folder etc..
     */
    class SpecialDirectory
    {
        /**
         * Get where application is running from.
         *
         * @return string
         */
        public static function ApplicationFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder();
        }

        /**
         * Special directory of Ness framework.
         *
         * @return string
         */
        public static function FrameworkFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'Ness';
        }

        /**
         * Controller directory of Ness framework.
         *
         * @return string
         */
        public static function ControllerFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'Controller';
        }

        /**
         * Config directory of Ness framework.
         *
         * @return string
         */
        public static function ConfigFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'Config';
        }

        /**
         * Library  directory of Ness framework.
         *
         * @return string
         */
        public static function LibraryFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'Library';
        }

        /**
         * Language  directory of Ness framework.
         *
         * @return string
         */
        public static function LanguageFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'Language';
        }

        /**
         * Model directory of Ness framework.
         *
         * @return string
         */
        public static function ModelFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'Model';
        }

        /**
         * Output directory of Ness framework.
         *
         * @return string
         */
        public static function OutputFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'Output';
        }

        /**
         * Template directory of Ness framework.
         *
         * @return string
         */
        public static function TemplateFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'Template';
        }

        /**
         * View directory of Ness framework.
         *
         * @return string
         */
        public static function ViewFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'View';
        }

        /**
         * Content directory of Ness framework
         * 
         * @return string
         */
        public static function ContentFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'Content';
        }
    }
}
