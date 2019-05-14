<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace Ness\System
{
    /**
     * FrameworkInfo class contains information and version data of the framework.
     */
    class FrameworkInfo
    {
        /**
         * Returns version number of Ness PHP.
         */
        public static function VersionNumber()
        {
            return '1.0.0@development';
        }

        /**
         * Last configuration on core framework files of the Ness PHP.
         */
        public static function LastUpdate()
        {
            return '1.0 Initial Release';
        }
    }

}
