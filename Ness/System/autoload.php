<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

/*
 * PSR-4 Auto-loading.
 * @link <https://www.php-fig.org/psr/psr-4/>.
 */
spl_autoload_register(function ($class) {
    $prefixes = [
        'Ness\\'
    ];
    $baseDir = dirname(__DIR__).DIRECTORY_SEPARATOR;
    $baseDir = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $baseDir);
    foreach ($prefixes as $prefix) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }
        $relativeClass = substr($class, $len);
        $file = $baseDir.str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $relativeClass).'.php';
        if (file_exists($file)) {
            require $file;
        }
    }
    $file = $baseDir.str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $class).'.php';
    if (file_exists($file)) {
        require $file;
    }
});
