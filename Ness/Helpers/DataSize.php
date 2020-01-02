<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness\Helpers {

    /**
     * This class is a helper class for data size conversion.
     */
    class DataSize
    {
        /**
         * Convert Bytes to MB.
         *
         * @param type $byte Numeric value
         */
        public static function ByteToMegabyte($byte = 0)
        {
            return ($byte / 1024) / 1024;
        }

        /**
         * Convert MB to GB.
         *
         * @param type $mb Numeric value
         */
        public static function MegabyteToGigabyte($mb = 0)
        {
            return $mb / 1024;
        }

        /**
         * Convert MB to TB.
         *
         * @param type $mb Numeric value
         */
        public static function MegabyteToTerabyte($mb = 0)
        {
            return $mb / (1024 * 1024);
        }

        /**
         * Convert GB to TB.
         *
         * @param type $gb Numeric value
         */
        public static function GigabyteToTerabyte($gb = 0)
        {
            return $gb / 1024;
        }

        /**
         * Convert TB to MB.
         *
         * @param type $tb Numeric value
         */
        public static function TerabyteToMegabyte($tb = 0)
        {
            return $tb * (1024 * 1024);
        }

        /**
         * Convert TB to GB.
         *
         * @param type $tb Numeric value
         */
        public static function TerabyteToGigabyte($tb)
        {
            return $tb * 1024;
        }
    }
}
