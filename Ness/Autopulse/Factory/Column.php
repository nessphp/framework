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
     * A simple class to generate columns for your database tables. ma.
     */
    class Column
    {
        /** @ignore */
        private $name;

        /** @ignore */
        private $type;

        /** @ignore */
        private $attributes;

        /**
         * Initialize a column for table
         * @param $name String Name of the column
         * @param $type Type of the column
         * @param $attributes Set other attributes for column, ex; PRIMARY KEY AUTO_INCREMENT NOT NULL etc.
         * @return Mixed
         */
        public function __construct($name = 'column1', $type = 'int', $attributes = ''){
            $this->name = $name;
            $this->type = $type;
            $this->attributes = $attributes;
            return $this;
        }

        /**
         * Table class accepts string values only for creating a column.
         * @return String
         */
        public function __toString(){
            return "{$this->name} {$this->type} {$this->attributes}";
        }
    }
}