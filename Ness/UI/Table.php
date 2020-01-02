<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness\UI {
    /**
     * Simple html table class for Ness Framework.
     **/
    class Table
    {
        const EOL = "\n";
        private $tableBase;
        private $TableHeaderAttributes;
        private $RowAttributes;

        /**
         *	initialize table class.
         *
         *	@param array $attributes  class attributes, key as tag and value as data
         *
         *	@return void
         */
        public function __construct($attributes = null)
        {
            $this->tableBase = '<table>' . self::EOL;
            if (!isset($attributes)) {
                $this->tableBase = '<table>' . self::EOL;
            } else {
                $this->tableBase = '<table ';
                foreach ($attributes as $key => $value) {
                    $this->tableBase .= ' ' . $key . '="' . $value . '"';
                }
                $this->tableBase .= ' >' . self::EOL;
            }
        }

        /**
         *	set attributes for table header.
         *
         *	@param array $attributes class attributes, key as tag and value as data
         *
         *	@return void
         */
        public function HeaderAttributes($attributes = null)
        {
            $this->TableHeaderAttributes = '';

            if (isset($attributes)) {
                foreach ($attributes as $key => $value) {
                    $this->TableHeaderAttributes .= ' ' . $key . '="' . $value . '"';
                }
            }
        }

        /**
         *	Set headers for table.
         *
         *	@param array $headers header text to show
         *	@param array $attributes class attributes, key as tag and value as data
         *
         *	@return $this
         */
        public function TableHeaders($headers = null, $attributes = null)
        {
            $headerItem = '';
            $headerContents = '';
            if (!isset($this->TableHeaderAttributes)) {
                $headerItem .= '<tr>' . self::EOL;
            } else {
                $headerItem .= '<tr ' . $this->TableHeaderAttributes . '>' . self::EOL;
            }

            if (!isset($attributes)) {
                foreach ($headers as $key => $value) {
                    $headerContents .= '<th>' . $value . '</th>' . self::EOL;
                }
            } else {
                foreach ($headers as $Hkey => $Hvalue) {
                    foreach ($attributes as $Akey => $Avalue) {
                        $headerContents .= '<th ' . $Akey . '="' . $Avalue . '" >' . $Hvalue . '</th>' . self::EOL;
                    }
                }
            }
            $this->tableBase .= $headerItem . $headerContents . '</tr>' . self::EOL;

            return $this;
        }

        /**
         *	set attributes for table rows.
         *
         *	@param array $attributes class attributes, key as tag and value as data
         *
         *	@return void
         */
        public function RowAttributes($attributes = null)
        {
            if (isset($attributes)) {
                foreach ($attributes as $key => $value) {
                    $this->RowAttributes .= ' ' . $key . '="' . $value . '"';
                }
            }
        }

        /**
         *	Create your special tags if not available by default in Ness Framework.
         *
         *	@param string $tagcode your tag ex: <thead>.... </thead>
         *
         *	@return $this
         */
        public function SpecialTag($tagcode)
        {
            $this->tableBase .= ' ' . $tagcode . ' ' . self::EOL;

            return $this;
        }

        /**
         *	Add row to current table.
         *
         *	@param array $items items as array to add
         *	@param array $attributes attributes, key as tag and value as data for each row
         *
         *	@return $this
         */
        public function AddRow($items = null, $attributes = null)
        {
            $headerItem = '';
            $headerContents = '';
            if (!isset($this->RowAttributes)) {
                $headerItem .= '<tr>' . self::EOL;
            } else {
                $headerItem .= '<tr  ' . $this->RowAttributes . '>' . self::EOL;
            }

            if (!isset($attributes)) {
                foreach ($items as $key => $value) {
                    $headerContents .= '<td id="' . $key . '" >' . $value . '</td>' . self::EOL;
                }
            } else {
                foreach ($items as $Hkey => $Hvalue) {
                    foreach ($attributes as $Akey => $Avalue) {
                        $headerContents .= '<td ' . $Akey . '="' . $Avalue . '" >' . $Hvalue . '</td>' . self::EOL;
                    }
                }
            }
            $this->tableBase .= $headerItem . $headerContents . '</tr>' . self::EOL;

            return $this;
        }

        /**
         *	Returns complete html table to use with view.
         *
         *	@return string
         */
        public function Create()
        {
            $this->tableBase .= '</table>' . self::EOL;

            return $this->tableBase;
        }
    }
}
