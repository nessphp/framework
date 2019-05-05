<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace Ness\Autopulse\Factory
{
    /**
     * A helper class for Schema.
     * This class is used to generate table data.
     */
    class Table
    {
        /** @ignore */
        private $table_name;

         /** @ignore */
        private $columns;

        /**
         * Initialize table class
         * @param ... Columns
         */
        public function __construct(){
            $func_args = $this->convert_args_to_array(func_get_args());
            $this->table_name = $func_args[0];
            $this->columns = '';
            foreach (array_slice($func_args, 1) as  $x) {
                $this->columns .= $x.',';
            }
            $this->columns = rtrim($this->columns, ',');
        }

        /**
         * Get the generated column data for create table script.
         * @return String
         */
        public function __toString(){
            $str_table_to_generate = '';
            $str_table_to_generate .= 'CREATE TABLE IF NOT EXISTS '.$this->table_name." ( \r\n";
            $str_table_to_generate .= $this->columns."); \r\n\r\n";

            return $str_table_to_generate;
        }


        /**
         * Helper method to split function arguements
         * @param Object
         * @return Array
         */
        private function convert_args_to_array($objects){
            $otoa = [];
            foreach ($objects as $object) {
                $otoa[] = $object;
            }
            return $otoa;
        }
    }
}
