<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace Ness\Log
{

    /**
     * This class provides log types for logger class.
     */
    class LogTypeProvider
    {
        /**
         * Log Output Type: Error.
         *
         * @return string
         */
        public static function Error()
        {
            return 0;
        }

        /**
         * Log Output Type: Warning.
         *
         * @return string
         */
        public static function Warning()
        {
            return 1;
        }

        /**
         * Log Output Type: OutputMessage.
         *
         * @return string
         */
        public static function OutputMessage()
        {
            return 2;
        }
    }
}
