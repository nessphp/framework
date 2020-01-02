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

use Ness\Configuration;

/**
 * This class is used load contents to your html pages.
 * ContentManager class has access to Application/Content path
 * to load image/css/javascript or any other content to your page.
 */
class ContentManager
{
    /**
     * This function returns the filename from the path 
     * {Application}\Content\img\{$filename}
     * 
     * @param $filename string
     * @return string
     */
    public static function getImage($filename = 'img.png')
    {
        return Configuration::getApplicationUrl() . '/' . Configuration::getApplicationFolder() . '/' . 'Content' . '/' . 'img' . '/' . $filename;
    }

    /**
     * This function returns the filename from the path 
     * {Application}\Content\css\{$filename}
     * 
     * @param $filename string
     * @return string
     */
    public static function getStyleSheet($filename = 'style.css')
    {
        return Configuration::getApplicationUrl() . '/' . Configuration::getApplicationFolder() . '/' . 'Content' . '/' . 'css' . '/' . $filename;
    }

    /**
     * This function returns the filename from the path 
     * {Application}\Content\js\{$filename}
     * 
     * @param $filename string
     * @return string
     */
    public static function getJavaScript($filename = 'loader.js')
    {
        return Configuration::getApplicationUrl() . '/' . Configuration::getApplicationFolder() . '/' . 'Content' . '/' . 'js' . '/' . $filename;
    }

    /**
     * This function returns the filename from the path 
     * {Application}\Content\widget\{$filename}
     * 
     * @param $filename string
     * @return string
     */
    public static function getWidget($filename = 'widget.html')
    {
        return Configuration::getApplicationUrl() . '/' . Configuration::getApplicationFolder() . '/' . 'Content' . '/' . 'widget' . '/' . $filename;
    }

    /**
     * This function returns the filename from the path 
     * {Application}\Content\{$filename}
     * 
     * @param $filename string
     * @return string
     */
    public static function getFilePath($filename = 'file.txt')
    {
        return Configuration::getApplicationUrl() . '/' . Configuration::getApplicationFolder() . '/' . 'Content' . '/' . $filename;
    }

    /**
     * This function returns the path for uploads
     * {Application}\Content\{uploads}
     * 
     * @param $upload_dir string
     * @return string
     */
    public static function getUploadPath($upload_dir = 'uploads')
    {
        return Configuration::getApplicationUrl() . '/' . Configuration::getApplicationFolder() . '/' . 'Content' . '/' . $upload_dir;
    }
}
