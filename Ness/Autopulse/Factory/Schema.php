<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness\Autopulse\Factory {

    /**
     * This class is used in migrations. You can create your database with the help of Table and Column class.
     */
    class Schema
    {
        /** @ignore */
        private $version;

        /** @ignore */
        private $database_name;

        /** @ignore */
        private $table_generation;

        /** @ignore */
        private $fk_generated;


        /**
         * Initialize a new Schema
         * @param $database_name String Name of your database.
         * @return An instance of Schema class
         */
        public function __construct($database_name = 'default')
        {
            $this->database_name = $database_name;
            return $this;
        }


        /**
         * Set a new name for your database.
         * @param $database_name String Name of your database.
         * @return Schema
         */
        public function Name($database_name = 'default')
        {
            $this->database_name = $database_name;
            return $this;
        }


        /**
         * Get name of database from Schema.
         * @return String
         */
        public function getName()
        {
            return $this->database_name;
        }


        /**
         * Set version number to track your migrations
         * @param $database_version Integer
         * @return Schema
         */
        public function Version($database_version = 1)
        {
            $this->version = $database_version;
            return $this;
        }


        /**
         * Get the version number of Schema
         * @return Integer
         */
        public function getVersion($database_version = 1)
        {
            return $this->version;
        }

        /**
         * Add your tables to Schema.
         * @param Table Create  table data with the help of Table class
         * @return Schema
         */
        public function Tables()
        {
            if (func_num_args() > 0) {
                foreach (func_get_args() as $tables) {
                    $this->table_generation .= $tables;
                }
            }
            return $this;
        }


        /**
         * Set Foreign Keys for tables.
         * @param $table1 String Reference Table
         * @param $key1 String Reference Column name
         * @param $table2 String Source table name
         * @param $key2 Source column name
         * @return Schema
         */
        public function ForeignKey($table1 = 'table1', $key1 = 'column1', $table2 = 'table2', $key2 = 'column2')
        {
            $this->fk_generated .= "ALTER TABLE {$table1} ADD FOREIGN KEY ({$key1}) REFERENCES {$table2}({$key2}); \r\n";
            return $this;
        }

        /**
         * Get created foreign keys. (Sql Generate Script)
         * @return String
         */
        public function getForeignKey()
        {
            return $this->fk_generated;
        }


        /**
         * Get create table script for sql
         * @return String
         */
        public function getCreateTableScript()
        {
            return $this->table_generation;
        }

        /**
         * Get create table script for sql
         * @return String
         */
        public function __toString()
        {
            return $this->table_generation;
        }
    }
}
