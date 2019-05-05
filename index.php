<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */



 
 /**
  * Required for Composer to load libraries.
  */
$path = __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
if (file_exists($path)) {
    require $path;
} else {
    require __DIR__.DIRECTORY_SEPARATOR.'Ness'.DIRECTORY_SEPARATOR.'System'.DIRECTORY_SEPARATOR.'autoload.php';
}

/**
 * Start the framework.
 */
require __DIR__.DIRECTORY_SEPARATOR.'Ness'.DIRECTORY_SEPARATOR.'System'.DIRECTORY_SEPARATOR.'boot.php';
