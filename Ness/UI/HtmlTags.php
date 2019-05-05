<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace Ness\UI
{

    /**
     * A special class for creating html tags.
     */
    class HtmlTags
    {
        /**
         * Create a custom html tag.
         * You can use this function if you have defined a special 
         * tag in css file of the template. For example;
         * if you have a title{color:red;} in your css file, this function
         * can be used as HtmlTags::customTag('title', 'Hello World');
         */
        public static function customTag($tag = 'title', $content = 'Hello World')
        {
            return "<{$tag}>{$content}</{$tag}>";

        }

        /**
         *	@param string  Text
         *	@param string Url
         *	@param array attributes
         *
         *	@return string
         */
        public static function a($text = null, $url = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<a href="'.$url.'">'.$text.'</a>';
            } else {
                $base = '<a href="'.$url.'"';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</a>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param string Title
         *	@param array attributes
         *
         *	@return string
         */
        public static function abbr($text = null, $title = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<abbr title="'.$title.'">'.$text.'</abbr>';
            } else {
                $base = '<abbr title="'.$title.'"';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</abbr>';

                return $base;
            }
        }

        /**
         *	@param string  Source
         *	@param string Type
         *
         *	@return string
         */
        public static function audio($source = null, $type = null)
        {
            $base = '<audio controls>';
            $base .= '<source src="'.$source.'" type="'.$type.'" >';
            $base .= '</audio>';

            return $base;
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function b($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<b>'.$text.'</b>';
            } else {
                $base = '<b  ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</b>';

                return $base;
            }
        }

        /**
         *	@return string
         */
        public static function br()
        {
            return '<br>';
        }

        /**
         *	@param string  Text
         *	@param string On click javascript action
         *	@param array attributes
         *
         *	@return string
         */
        public static function button($name = null, $clik = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<button type="button" onclick="'.$clik.'">'.$name.'</button>';
            } else {
                $base = '<button type="button"  onclick="'.$clik.'"';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$name.'</button>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function code($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<code>'.$text.'</code>';
            } else {
                $base = '<code ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</code>';

                return $base;
            }
        }

        /**
         *	@param array attributes
         *
         *	@return class
         */
        public static function dl($attrb = null)
        {
            //$item = new dl($attrb);
            return  new dl_helper($attrb);
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function em($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<em>'.$text.'</em>';
            } else {
                $base = '<em ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</em>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function strong($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<strong>'.$text.'</strong>';
            } else {
                $base = '<strong ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</strong>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function samp($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<samp>'.$text.'</samp>';
            } else {
                $base = '<samp ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</samp>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function span($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<span>'.$text.'</span>';
            } else {
                $base = '<span ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</span>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function kbd($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<kbd>'.$text.'</kbd>';
            } else {
                $base = '<kbd ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</kbd>';

                return $base;
            }
        }

        /**
         *	@param string  source
         *	@param array attributes
         *
         *	@return string
         */
        public static function embed($src = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<embed src="'.$src.'">';
            } else {
                $base = '<embed src="'.$src.'" ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function h1($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<h1>'.$text.'</h1>';
            } else {
                $base = '<h1 ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</h1>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function h2($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<h2>'.$text.'</h2>';
            } else {
                $base = '<h2 ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</h2>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function h3($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<h3>'.$text.'</h3>';
            } else {
                $base = '<h3 ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</h3>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function h4($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<h4>'.$text.'</h4>';
            } else {
                $base = '<h4 ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</h4>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function h5($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<h5>'.$text.'</h5>';
            } else {
                $base = '<h5 ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</h5>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function h6($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<h6>'.$text.'</h6>';
            } else {
                $base = '<h6 ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</h6>';

                return $base;
            }
        }

        /**
         *	@return string
         */
        public static function hr()
        {
            return '<hr>';
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function i($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<i>'.$text.'</i>';
            } else {
                $base = '<i ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</i>';

                return $base;
            }
        }

        /**
         *	@param string  Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function u($text = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<u>'.$text.'</u>';
            } else {
                $base = '<u ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</u>';

                return $base;
            }
        }

        /**
         *	@param string  source
         *	@param array attributes
         *
         *	@return string
         */
        public static function img($src = null, $attrb = null)
        {
            if ($attrb == null) {
                return '<img src="'.$src.'">';
            } else {
                $base = '<img src="'.$src.'" ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >';

                return $base;
            }
        }

        /**
         *	@param array attributes
         *
         *	@return class
         */
        public static function ul($attrb = null)
        {
            //$item = new cls($attrb);
            return  new ul_ol_helper('ul', $attrb);
        }

        /**
         *	@param array attributes
         *
         *	@return class
         */
        public static function ol($attrb = null)
        {
            //$item = new cls($attrb);
            return  new ul_ol_helper('ol', $attrb);
        }

        /**
         *	@param int  Value
         *	@param string Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function meter($value = 0, $text = 'display text', $attrb = null)
        {
            if ($attrb == null) {
                return '<meter value="'.$value.'" >'.$text.'</meter>';
            } else {
                $base = '<meter value="'.$value.'" ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</meter>';

                return $base;
            }
        }

        /**
         *	@param array attributes
         *
         *	@return string
         */
        public static function select($attrb = null)
        {
            //$item = new cls($attrb);
            return  new select_helper($attrb);
        }

        /**
         *	@param int  value
         *	@param int Max value
         *  @param string Display Text
         *	@param array attributes
         *
         *	@return string
         */
        public static function progress($value = 0, $max = '100', $text= 'Progress Bar',$attrb = null)
        {
            if ($attrb == null) {
                return '<Progress value="'.$value.'"  max="'.$max.'">'.$text.'</Progress>';
            } else {
                $base = '<Progress value="'.$value.'"  max="'.$max.'" ';
                foreach ($attrb as $key => $value) {
                    $base .= ' '.$key.'="'.$value.'"';
                }
                $base .= ' >'.$text.'</Progress>';

                return $base;
            }
        }

    }

    /*****************************************************************
     *                      Helper Classes
     *                            for
     *                  Ness PHP Framework HTML Tags
     *****************************************************************/


    /*
     * Helper for dl list
     */
    class dl_helper
    {
        private $base = '';
        private $contents = '';

        public function __construct($attrb = null)
        {
            if (!isset($attrb)) {
                $this->base .= '<dl> ';
            } else {
                $item1 = '<dl ';
                foreach ($attrb as $key => $value) {
                    $item1 .= ' '.$key.'="'.$value.'"';
                }
                $item1 .= '>';
                $this->base .= $item1;
            }

            return $this;
        }


        public function dt($text, $attrb = null)
        {
            if ($attrb == null) {
                $this->contents .= '<dt>'.$text.'</dt>';
            } else {
                $item1 = '<dt ';

                foreach ($attrb as $key => $value) {
                    $item1 .= ' '.$key.'="'.$value.'"';
                }
                $item1 .= ' >'.$text.'</dt>';
                $this->contents .= $item1;
            }

            return $this;
        }

        public function dd($text = null, $attrb = null)
        {
            if ($attrb == null) {
                $this->contents .= '<dd>'.$text.'</dd>';
            } else {
                $item1 = '<dd ';
                foreach ($attrb as $key => $value) {
                    $item1 .= ' '.$key.'="'.$value.'"';
                }
                $item1 .= ' >'.$text.'</dd>';
                $this->contents .= $item1;
            }

            return $this;
        }

        public function Create()
        {
            $total_list = $this->base;
            $total_list .= $this->contents;
            $total_list .= '</dl>';

            return $total_list;
        }
    }

    /**
     * Helper class for lists 'ul' & 'ol'
     */
    class ul_ol_helper
    {
        private $base = '';
        private $contents = '';
        private $type_gl = 'ul';

        public function __construct($type = null, $attrb = null)
        {
            $this->type_gl = $type;
            if (!isset($attrb)) {
                $this->base .= '<'.$type.'> ';
            } else {
                $item1 = '<'.$type.' ';
                foreach ($attrb as $key => $value) {
                    $item1 .= ' '.$key.'="'.$value.'"';
                }
                $item1 .= '>';
                $this->base .= $item1;
            }

            return $this;
        }

        public function li($text, $attrb = null)
        {
            if ($attrb == null) {
                $this->contents .= '<li>'.$text.'</li>';
            } else {
                $item1 = '<li ';

                foreach ($attrb as $key => $value) {
                    $item1 .= ' '.$key.'="'.$value.'"';
                }
                $item1 .= ' >'.$text.'</li>';
                $this->contents .= $item1;
            }

            return $this;
        }

        public function Create()
        {
            $total_list = $this->base;
            $total_list .= $this->contents;
            $total_list .= '</'.$this->type_gl.'>';

            return $total_list;
        }
    }

    /**
     * Helper class for 'select' tag
     */
    class select_helper
    {
        private $base = '';
        private $contents = '';

        public function __construct($attrb = null)
        {
            if (!isset($attrb)) {
                $this->base .= '<select> ';
            } else {
                $item1 = '<select ';
                foreach ($attrb as $key => $value) {
                    $item1 .= ' '.$key.'="'.$value.'"';
                }
                $item1 .= '>';
                $this->base .= $item1;
            }

            return $this;
        }

        public function option($text = null, $value = null, $attrb = null)
        {
            if ($attrb == null) {
                $this->contents .= '<option value="'.$value.'">'.$text.'</option>';
            } else {
                $item1 = '<option value="'.$value.'" ';

                foreach ($attrb as $key => $value) {
                    $item1 .= ' '.$key.'="'.$value.'"';
                }
                $item1 .= ' >'.$text.'</option>';
                $this->contents .= $item1;
            }

            return $this;
        }

        public function optgroup($text = null, $attrb = null)
        {
            if ($attrb == null) {
                $this->contents .= '<optgroup label="'.$text.'" >';
            } else {
                $item1 = '<optgroup label="'.$text.'" ';
                foreach ($attrb as $key => $value) {
                    $item1 .= ' '.$key.'="'.$value.'"';
                }
                $item1 .= ' >';
                $this->contents .= $item1;
            }

            return $this;
        }

        public function Create()
        {
            $total_list = $this->base;
            $total_list .= $this->contents;
            $total_list .= '</select>';

            return $total_list;
        }
    }
}
