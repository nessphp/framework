<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness\Forms {

    use Ness\Model;

    /**
     * Ness PHP Form Class
     * This class is used to help the developer while creating forms
     * and sending data to models.
     */
    class Form
    {
        /** @ignore */
        const EOL = "\n";

        /** @ignore */
        protected $baseForm;

        /** @ignore */
        protected $formElements;

        /** @ignore */
        protected $modelInstance;

        /** @ignore */
        protected $formName;

        /** @ignore */
        protected $isFormProtected;

        /**
         * Initialize a form class.
         *
         * @param type $formName A form name to provide security while Seding form.
         */
        public function __construct($formName = 'defaultForm')
        {
            $this->baseForm = '';
            $this->formElements = '';
            $this->modelInstance = '';
            $this->formName = $formName;
            $this->isFormProtected = false;
        }

        /**
         * This function creates a form.
         *
         * @param type $attr Array of html attributes of form
         *
         * @return string
         */
        public function DefineForm($attr = null)
        {
            $creator = '';
            $formName = $this->formName;
            if (is_null($attr)) {
                $creator .= '<form name="' . $formName . '" action="' . \Ness\Url::getUrl() . '" >' . self::EOL;
            } else {
                $creator = '<form name="' . $formName . '" action="' . \Ness\Url::getUrl() . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>' . self::EOL;
            }

            return $creator;
        }

        /**
         * This function is used to set model files for forms when sendng data.
         *
         * @param type $modelClass Model class name to use with form
         */
        public function setModel($modelClass)
        {
            if (!is_null($modelClass)) {
                $this->modelInstance = $modelClass;
            }
        }

        /**
         * Enable or Disable XSS filter.
         *
         * @param type $isSecured
         */
        public function setProtected($isSecured = true)
        {
            $this->isFormProtected = $isSecured;
        }

        /**
         * This function is used to created form elements.
         *
         * @param type $element FormElements class methods
         *
         * @return string
         */
        public function setElement($element)
        {
            $creator = '';
            $creator .= $element . self::EOL;

            return $creator;
        }

        /**
         * Close form tags.
         *
         * @return string
         */
        public function FinishForm()
        {
            $creator = '</form>' . self::EOL;

            return $creator;
        }

        /**
         * This function is used to run a function/action model file after
         * POSTing the form.
         *
         * @param type $actionName Action in model file to run
         */
        public function Call($actionName)
        {
            if ($this->__desidePostedForm($this->formName)) {
                Model::Load($this->modelInstance);
                $modelClass = new $this->modelInstance();
                if (method_exists($modelClass, $actionName)) {
                    $paramsPosted = $_POST;
                    foreach ($paramsPosted as $key => $value) {
                        if (property_exists($this->modelInstance, $key)) {
                            $modelClass->$key = $this->_xssPrevent($_POST[$key]);
                        }
                    }

                    //check if csrf_field instialized and if its matchs
                    if (isset($_POST['csrf_field'])) {
                        if ($_POST['csrf_field'] == sha1(\Ness\Url::getUrl())) {
                            //CSRF USED VALUE MATCHED
                            $modelClass->{$actionName}();
                        } else {
                            //CSRD USED VALUE NOT MATCHED
                        }
                    } else {
                        //CSRF protection not enabled
                        $modelClass->{$actionName}();
                    }
                }
            }
        }

        /* *
         * @ignore
         */
        private function _xssPrevent($data)
        {
            if ($this->isFormProtected) {
                return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
            } else {
                return $data;
            }
        }

        /**
         * @ignore
         */
        private function __desidePostedForm($frmName = '')
        {
            if (isset($_POST[$frmName])) {
                return true;
            }
        }
    }
}
