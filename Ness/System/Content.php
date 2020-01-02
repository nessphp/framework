<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness\System {
    /**
     * Content class
     * This class is used to create responses except Views.
     */
    class Content
    {
        /**
         * Print values to screen.
         *
         * @param string $format
         * @param type   $args
         */
        public function Render($value = '')
        {
            echo $value;
        }
    }
}
