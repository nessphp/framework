<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace Ness\System;


use Ness\Configuration as conf;
use const true;
use function file_exists;

/**
 * This class is used to create an instance of view files.
 */
class View
{
    /**
     * Return a view to user.
     *
     * @param string $viewScript View file path and file name ex: Index\Index.phtml
     * @param bool   $isUsual    If your file not in view folder.
     *
     * @return void Returns nothing.
     */
    public function Render($viewScript, $isUsual = true)
    {
        if ($isUsual) {
            require dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.conf::getApplicationFolder().DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.$viewScript;

            
        } else {
            require dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.conf::getApplicationFolder().DIRECTORY_SEPARATOR.$viewScript;
        }
    }

    /**
     * Return true if view file available.
     *
     * @param string $viewScript View file path and file name ex: Index\Index.phtml
     * @param bool   $isUsual    If your file not in view folder.
     *
     * @return bool Returns true if the file exists and false if not.
     */
    public function isAvailable($viewScript, $isUsual = true)
    {
        if ($isUsual) {
            return file_exists(dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.conf::getApplicationFolder().DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.$viewScript);
        } else {
            return file_exists(dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.conf::getApplicationFolder().DIRECTORY_SEPARATOR.$viewScript);
        }
    }
}
