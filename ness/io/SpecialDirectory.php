<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace ness\io
{
    use ness\Configuration;

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
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'ness';
        }

        /**
         * Controller directory of Ness framework.
         *
         * @return string
         */
        public static function ControllerFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'controller';
        }

        /**
         * Config directory of Ness framework.
         *
         * @return string
         */
        public static function ConfigFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'config';
        }

        /**
         * Library  directory of Ness framework.
         *
         * @return string
         */
        public static function LibraryFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'library';
        }

        /**
         * Language  directory of Ness framework.
         *
         * @return string
         */
        public static function LanguageFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'language';
        }

        /**
         * Model directory of Ness framework.
         *
         * @return string
         */
        public static function ModelFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'model';
        }

        /**
         * Output directory of Ness framework.
         *
         * @return string
         */
        public static function OutputFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'output';
        }

        /**
         * Template directory of Ness framework.
         *
         * @return string
         */
        public static function TemplateFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'template';
        }

        /**
         * View directory of Ness framework.
         *
         * @return string
         */
        public static function ViewFolder()
        {
            return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.Configuration::getApplicationFolder().DIRECTORY_SEPARATOR.'view';
        }
    }
}
