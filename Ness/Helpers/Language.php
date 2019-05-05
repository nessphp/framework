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
    use Ness\IO\SpecialDirectory as sd;

    /**
     * Language class is used to create applications with multiple language.
     */
    class Language
    {
        /** @ignore */
        private $lang_file = '';
        /** @ignore */
        private $var_name = 'data';

        public function __construct()
        {
            $this->lang_file = '';
            $this->var_name = '';

            return $this;
        }

        /**
         * @param string $langiage_file_name Language file name, example: default.en.php
         */
        public static function isAvailable($langiage_file_name = 'Default.php')
        {
            if (file_exists(sd::LanguageFolder().DIRECTORY_SEPARATOR.$langiage_file_name)) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Set a language file.
         *
         * @param string $langiage_file_name Language file name, example: default.en.php
         */
        public function setLanguage($langiage_file_name = 'Default.php')
        {
            $this->lang_file = sd::LanguageFolder().DIRECTORY_SEPARATOR.$langiage_file_name;

            return $this;
        }

        /**
         * This function is used to lookup for a array varriable name in
         * your language file. by default $data.
         *
         * @param type $variable_name variable name ehich contains your keywords
         */
        public function setVariable($variable_name = 'data')
        {
            $this->var_name = $variable_name;

            return $this;
        }

        /**
         * Get the value in your language file.
         *
         * @param type $array_key Label key in your array
         *
         * @return strıng
         */
        public function bindLanguage()
        {
            if (file_exists($this->lang_file)) {
                include $this->lang_file;

                $var = $this->var_name;
                $data = ${$var};

                return $data;
            }
        }

        /**
         * @ignore
         */
        private function clearVariables()
        {
            $this->var_name = '';
            $this->lang_file = '';
        }
    }
}
