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

    use Ness\Url as nessUrl;

    /**
     *   A pagination class for Ness Framework
     **/
    class Pagination
    {
        public $data;
        public $viewNumber = 1;
        public $current_page = 1;
        public $willCreatePage;

        public $controller;
        public $action;
        public $linkStyles = null;

        /**
         *	Set current page number this value gets from controller and will be passed with variables to view.
         *
         *	@param int $currentpage_param variable to navigate pagination
         *
         *	@return void
         */
        public function __construct($currentpage_param = 1)
        {
            $this->viewNumber = $currentpage_param;
            $this->linkStyles = null;
        }

        /**
         *	Data pagination function.
         *
         *	@param array $data Data you want to paginate as array
         *	@param int $resperpage Records per page
         *
         *	@return int
         */
        public function Paginate($data, $resperpage = 10)
        {
            $total_values = count($data);
            $numbers_arr = null;
            if (!isset($this->viewNumber)) {
                $this->viewNumber = 1;
            } else {
                $this->current_page = $this->viewNumber;
            }

            $counts = ceil($total_values / $resperpage);
            $param1 = ($this->current_page - 1) * $resperpage;
            $this->data = array_slice($data, $param1, $resperpage);

            for ($i = 1; $i <= $counts; $i++) {
                $numbers_arr[] = $i;
            }
            $this->willCreatePage = $numbers_arr;

            return $numbers_arr;
        }

        /**
         *	Returns data array with paginated array slices.
         *
         *	@return array
         */
        public function FetchResults()
        {
            $resultvalues = $this->data;

            return $resultvalues;
        }

        /**
         *	Set attributes for links.
         *
         *	@param array  $attrb attributes for link tag, array key as tag and value as set data.
         *
         *	@return void
         */
        public function setLinkStyle($attrb = null)
        {
            $this->linkStyles = ' ';
            foreach ($attrb as $key => $value) {
                $this->linkStyles .= ' ' . $key . '="' . $value . '" ';
            }
        }

        /**
         *	Returns links for paginated data.
         *
         *	@param string $controller Controller name which loads pagination
         *	@param string $action action name in controller which loads pagination
         *
         *	@return string
         */
        public function BuildLinks($controller, $action)
        {
            $linkBuilded = '';
            $this->controller = $controller;
            $this->action = $action;

            if ($this->linkStyles == null) {
                foreach ($this->willCreatePage as $pageNo) {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToAction($controller, $action, $pageNo) . '" >' . $pageNo . '</a>';
                }
            } else {
                foreach ($this->willCreatePage as $pageNo) {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToAction($controller, $action, $pageNo) . '" ' . $this->linkStyles . ' >' . $pageNo . '</a>';
                }
            }

            return $linkBuilded;
        }

        /**
         *	Returns links for paginated data.
         *  @param string $area Area hich controls the redirection
         *	@param string $controller Controller name which loads pagination
         *	@param string $action action name in controller which loads pagination
         *
         *	@return string
         */
        public function BuildLinksArea($area, $controller, $action)
        {
            $linkBuilded = '';
            $this->controller = $controller;
            $this->action = $action;

            if ($this->linkStyles == null) {
                foreach ($this->willCreatePage as $pageNo) {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToArea($area, $controller, $action, $pageNo) . '" >' . $pageNo . '</a>';
                }
            } else {
                foreach ($this->willCreatePage as $pageNo) {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToArea($area, $controller, $action, $pageNo) . '" ' . $this->linkStyles . ' >' . $pageNo . '</a>';
                }
            }

            return $linkBuilded;
        }


        /**
         *	Returns back link if not first page of data data.
         *
         *	@param string $controller Controller name which loads pagination
         *	@param string $action action name  which loads pagination
         *	@param string   $textText to show with link, default: Back
         *
         *	@return string
         */
        public function BackLink($controller, $action, $text = 'Back')
        {
            $linkBuilded = '';
            $goTo = $this->current_page - 1;

            if (!($goTo < 1)) {
                if ($this->linkStyles == null) {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToAction($controller, $action, $goTo) . '" >' . $text . '</a>';
                } else {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToAction($controller, $action, $goTo) . '" ' . $this->linkStyles . ' >' . $text . '</a>';
                }
            }

            return $linkBuilded;
        }

        /**
         *	Returns back link (with area support) if not first page of data data.
         *
         *  @param string Area which controls the redirection
         *	@param string $controller Controller name which loads pagination
         *	@param string $action action name  which loads pagination
         *	@param string   $textText to show with link, default: Back
         *
         *	@return string
         */
        public function BackLinkArea($area, $controller, $action, $text = 'Back')
        {
            $linkBuilded = '';
            $goTo = $this->current_page - 1;

            if (!($goTo < 1)) {
                if ($this->linkStyles == null) {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToArea($area, $controller, $action, $goTo) . '" >' . $text . '</a>';
                } else {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToArea($area, $controller, $action, $goTo) . '" ' . $this->linkStyles . ' >' . $text . '</a>';
                }
            }

            return $linkBuilded;
        }

        /**
         *	Returns next link if not last page of data data.
         *
         *	@param string $controller Controller name which loads pagination
         *	@param string $action action name  which loads pagination
         *	@param string $text Text to show with link, default: Next
         *
         *	@return string
         */
        public function NextLink($controller, $action, $text = 'Next')
        {
            $linkBuilded = '';
            $goTo = $this->current_page + 1;

            if (!($goTo > end($this->willCreatePage))) {
                if ($this->linkStyles == null) {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToAction($controller, $action, $goTo) . '" >' . $text . '</a>';
                } else {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToAction($controller, $action, $goTo) . '" ' . $this->linkStyles . ' >' . $text . '</a>';
                }
            }

            return $linkBuilded;
        }
        /**
         *	Returns next link (with area suppirt) if not last page of data data.
         *  
         *  @param string $area Area which controls the redirections
         *	@param string $controller Controller name which loads pagination
         *	@param string $action action name  which loads pagination
         *	@param string $text Text to show with link, default: Next
         *
         *	@return string
         */
        public function NextLinkArea($area, $controller, $action, $text = 'Next')
        {
            $linkBuilded = '';
            $goTo = $this->current_page + 1;

            if (!($goTo > end($this->willCreatePage))) {
                if ($this->linkStyles == null) {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToArea($area, $controller, $action, $goTo) . '" >' . $text . '</a>';
                } else {
                    $linkBuilded .= '<a href="' . nessUrl::RedirectToArea($area, $controller, $action, $goTo) . '" ' . $this->linkStyles . ' >' . $text . '</a>';
                }
            }

            return $linkBuilded;
        }
    }
}
