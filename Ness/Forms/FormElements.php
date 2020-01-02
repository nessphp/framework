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
    /**
     * This class is used in forms. You can create any type of form element by calling functions of this
     * class.
     */
    class FormElements
    {
        /**
         * Create a input type text element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function TextBox($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="text" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="text" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type password element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function Password($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="password" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="password" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type submit element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function Submit($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="submit" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="submit" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type reset element for your form.
         *
         * @param type $attr other attributes to set with your element
         *
         * @return string
         */
        public static function Reset($attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="reset">';
            } else {
                $creator .= '<input type="reset" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type radio element for your form.
         *
         * @param type $fieldname  name attribute of your element
         * @param type $fieldValue value attribute of your element
         * @param type $attr       other attributes to set with your element
         *
         * @return string
         */
        public static function Radio($fieldname = 'fieldName', $fieldValue = 'Select', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="radio" name="' . $fieldname . '" value="' . $fieldValue . '">';
            } else {
                $creator .= '<input type="radio" name="' . $fieldname . '" value="' . $fieldValue . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type checkbox element for your form.
         *
         * @param type $fieldname  name attribute of your element
         * @param type $fieldValue value attribute of your element
         * @param type $attr       other attributes to set with your element
         *
         * @return string
         */
        public static function Checkbox($fieldname = 'fieldName', $fieldValue = 'Select', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="checkbox" name="' . $fieldname . '" value="' . $fieldValue . '">';
            } else {
                $creator .= '<input type="checkbox" name="' . $fieldname . '" value="' . $fieldValue . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type button element for your form.
         *
         * @param type $fieldname  name attribute of your element
         * @param type $fieldValue value attribute of your element
         * @param type $attr       other attributes to set with your element
         *
         * @return string
         */
        public static function Button($fieldname = 'fieldName', $fieldValue = 'Select', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="button" name="' . $fieldname . '" value="' . $fieldValue . '">';
            } else {
                $creator .= '<input type="button" name="' . $fieldname . '" value="' . $fieldValue . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type color element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function ColorDialog($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="color" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="color" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type date element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function DateSelect($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="date" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="date" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type email element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function Email($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="email" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="email" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type month element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function Month($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="month" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="month" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type number element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function Numeric($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="number" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="number" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type search element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function SearchBox($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="search" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="search" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type search element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function FileUpload($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="file" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="file" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type tel element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function Phone($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="tel" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="tel" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type url element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function Url($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="url" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="url" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create a input type time element for your form.
         *
         * @param type $fieldname name attribute of your element
         * @param type $attr      other attributes to set with your element
         *
         * @return string
         */
        public static function Time($fieldname = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<input type="time" name="' . $fieldname . '">';
            } else {
                $creator .= '<input type="time" name="' . $fieldname . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '>';
            }

            return $creator;
        }

        /**
         * Create label element for your form.
         *
         * @param type $lblText Text for your label
         * @param type $lblFor  set for attribute of label
         * @param type $attr    array attributes
         *
         * @return string
         */
        public static function Label($lblText = '', $lblFor = 'fieldName', $attr = null)
        {
            $creator = '';
            if (is_null($attr)) {
                $creator .= '<label for="' . $lblFor . '">' . $lblText . '</label>';
            } else {
                $creator .= '<label for="' . $lblFor . '" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' ' . $key . '="' . $value . '"';
                }
                $creator .= '> ' . $lblText . '</label>';
            }

            return $creator;
        }

        /**
         * Create a csrf token for the form.
         */
        public static function csrfField()
        {
            return '<input type="hidden" name="csrf_field" value="' . sha1(\Ness\Url::getUrl()) . '" />';
        }
    }
}
