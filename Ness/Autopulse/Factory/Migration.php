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
    use Ness\Autopulse\DbCommand;

     /**
     * Migration class is used to manage; create
     * and drop database operations of your project.
     */
    class Migration
    {
        /**
         * Create a database from the given schema.
         *
         * @param $schema An instance of Schema class
         * @param $db_instance An instance of your database connection
         *
         * @return bool Returns true if migration completed.
         */
        public static function Up($schema, $db_instance){
            if(self::will_update_run($schema->getVersion(), $schema->getName())){
                $generated_script = '';
                $generated_script .= 'DROP DATABASE IF EXISTS '.$schema->getName()."; \r\n";
                $generated_script .= 'CREATE DATABASE IF NOT EXISTS '.$schema->getName()."; \r\n";
                $generated_script .= 'USE '.$schema->getName()."; \r\n\r\n";
                $generated_script .= $schema->getCreateTableScript()."\r\n";
                $generated_script .= $schema->getForeignKey()."\r\n";

                try {
                    $cmd_create = new DbCommand($generated_script, $db_instance->Source());
                    $cmd_create->Execute();
                    $cmd_create->CloseCommand();
                    self::update_schema_version($schema->getVersion(), $schema->getName());
                    return true;
                } catch (Exception $e) {
                    return false;
                }
            }else{
                return false;
            }

            /***
            
            **/

            return true;
        }

        /**
         * Drop a database from the given schema.
         *
         * @param $schema An instance of Schema class
         * @param $db_instance An instance of your database connection
         *
         * @return bool
         */
        public static function Down($schema, $db_instance){
            try{
                $drop_command_string = "DROP DATABASE IF EXISTS ".$schema->getName().";";
                $drop_command = new DbCommand($drop_command_string, $db_instance->Source());
                $drop_command->Execute();
                $drop_command->CloseCommand();
                $db_instance->Close();
                return true;
            }catch(Exception $e){
                return false;
            }
        }

        /**
         * Keep your database continuously updated independent
         * from version number. Not recommended in production.
         *
         * @param $schema An instance of Schema class
         * @param $db_instance An instance of your database connection
         *
         * @return bool
         */
        public static function Synch($schema, $db_instance){
            $generated_script = '';
            $generated_script .= 'DROP DATABASE IF EXISTS '.$schema->getName()."; \r\n";
            $generated_script .= 'CREATE DATABASE IF NOT EXISTS '.$schema->getName()."; \r\n";
            $generated_script .= 'USE '.$schema->getName()."; \r\n\r\n";
            $generated_script .= $schema->getCreateTableScript()."\r\n";
            $generated_script .= $schema->getForeignKey()."\r\n";
            try {
                $cmd_create = new DbCommand($generated_script, $db_instance->Source());
                $cmd_create->Execute();
                $cmd_create->CloseCommand();
                self::update_schema_version($schema->getVersion(), $schema->getName());
                return true;
            } catch (Exception $e) {
                return false;
            }
        }

        /**
         * Check the version number of the last successful migration. 
         * If Schema version number is greater than current database version number 
         * drop all tables and re-create.
         * @param $schema_name String.
         * @param $schema_version Integer
         * @return bool
         */
        private static function will_update_run($schema_version='-1', $schema_name='default'){
            $dbv_path = dirname(dirname(dirname(__DIR__))).DIRECTORY_SEPARATOR.'ness_logs'.DIRECTORY_SEPARATOR.$schema_name.'.dbv';
            $dbv = "-1";

            #Return true for proceed to migration
            if(is_file($dbv_path)){
                //Check the version number of schema
                $dbv = file_get_contents($dbv_path);
                if($dbv < (int)$schema_version || empty($dbv)){
                    //local database version is greater than remote database
                    return true;
                }else{
                    return false;
                }
            }else{
                //Check if available log file exists.
                if(file_exists($dbv_path)){
                    //Can not track the version number of Schema file from log. Do not proceed.
                    return false; 
                }else{
                    //This is probably the first time of Migration::Up command. Proceed to table creation.
                    return true;
                }
            }
        }


        /**
         * Try to update the log file to track and compare version numbers of local schema class and remote database.
         * {schema_name}.dbv means (d)ata(b)ase(v)ersion.
         * Ness PHP keeps tracking the version number of migration on each development run (not in production).
         * @param $schema_name String.
         * @param $schema_version Integer
         * @return void
         */
        private static function update_schema_version($schema_version='-1', $schema_name='default'){
            $dbv_path = __DIR__.DIRECTORY_SEPARATOR.'ness_logs'.DIRECTORY_SEPARATOR.$schema_name.'.dbv';
            if(is_file($dbv_path)){
                //log exists update version number
                if(is_writable($dbv_path)){
                    //log file is writable, update 
                    file_put_contents($dbv_path, (string)$schema_version);
                }else{
                    //give permission to log file.
                    chmod($dbv_path, 0755);
                    file_put_contents($dbv_path, (string)$schema_version);
                }
            }else{
                //probably first run create log file with lsat version of schema.
                mkdir(dirname(dirname(dirname(__DIR__))).DIRECTORY_SEPARATOR.'ness_logs');
                $handle = fopen($dbv_path, 'w');
                fclose($handle);
                file_put_contents($dbv_path, (string)$schema_version);
            }
        }
    }
}