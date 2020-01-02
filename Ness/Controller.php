<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness;

use Ness\System\Content;
use Ness\System\View;

/**
 * Controller class of Ness framework.
 */
class Controller
{
    private $current_version = '';
    private $controller_author = '';

    /**
     * Initialize.
     *
     * @return void Returns nothing.
     */
    public function __construct()
    {
        $this->View = new View();
        $this->Content = new Content();
    }

    /**
     * Set version for your controller.
     *
     * @param mixed $version
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->current_version = $version;

        return $this;
    }

    /**
     * Set author to the controller.
     *
     * @param string $fullname
     *
     * @return $this
     */
    public function setAuthor($fullname)
    {
        $this->controller_author = $fullname;

        return $this;
    }

    /**
     * Get controller's version number.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->current_version;
    }

    /**
     * Get controller's author.
     *
     * @return string
     **/
    public function getAuthor()
    {
        return $this->controller_author;
    }

    /**
     * This function is used to return an array of defined functions of your controller.
     */
    protected function getFunctions()
    {
        return get_class_methods($this);
    }

    /**
     * This function is used to return an array of defined variables of your controller.
     */
    protected function getVariables()
    {
        return get_defined_vars();
    }
}
