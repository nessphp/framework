<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace Ness\Helpers
{
    /**
     * Reverse an array horizontally
     */
    define('REVERSE_HORIZONTAL', 'h');

    /**
     * Reverse an array vertically
     */
    define('REVERSE_VERTICAL', 'v');

    /**
     * This is a helper class for arrays. It's adds various features to arrays.
     */
    class Arrays
    {
        /**
         * Select one or more element from an array.
         *
         * @param type $array_name Search in array
         * @param type $choose     String for one element, or array for multiple elements
         *
         * @return mixed
         */
        public static function getElement(&$array_name, $choose = '')
        {
            if (is_array($choose)) {
                $ret = [];
                foreach ($choose as $v) {
                    if (array_key_exists($v, (array)$array_name)) {
                        $ret[$v] = $array_name[$v];
                    }
                }

                return $ret;
            } else {
                if (array_key_exists($choose, (array)$array_name)) {
                    return $array_name[$choose];
                }
            }
        }

        /**
         * Sets element(s) of array to empty.
         *
         * @param type $array_name Operate in array
         * @param type $element    array key to set empty
         */
        public static function setEmpty(&$array_name, $element = '')
        {
            if (is_array($element)) {
                foreach ($element as $v) {
                    if (array_key_exists($v, (array)$array_name)) {
                        $array_name[$v] = '';
                    }
                }
            } else {
                if (array_key_exists($element, (array)$array_name)) {
                    $array_name[$element] = '';
                }
            }
        }

        /**
         * Sets element(s) of array to NULL.
         *
         * @param type $array_name Operate in array
         * @param type $element    array key to set empty
         */
        public static function setNull(&$array_name, $element = '')
        {
            if (is_array($element)) {
                foreach ($element as $v) {
                    if (array_key_exists($v, (array)$array_name)) {
                        $array_name[$v] = null;
                    }
                }
            } else {
                if (array_key_exists($element, (array)$array_name)) {
                    $array_name[$element] = null;
                }
            }
        }

        /**
         * Reverse an array horizontally or vertically.
         *
         * @param type $array_name Array to operate on
         * @param type $type       REVERSE_HORIZONTAL or REVERSE_VERTICAL
         */
        public static function Reverse(&$array_name, $type = 'h')
        {
            $created = [];
            switch ($type) {
                case 'h':
                    foreach ($array_name as $key => $value) {
                        $created[$value] = $key;
                    }
                    $array_name = $created;
                    break;
                case 'v':
                    $created = array_reverse($array_name, true);
                    $array_name = $created;
                    break;
                default:
                    break;
            }

            return $created;
        }
    }
}
