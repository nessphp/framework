<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

use Ness\Configuration;

/*
 * === [Environment Configuration ] ===
 * This configuration is used to set the
 * development environment for your project.
 * You can set 2 types of environments;
 * "development" OR "publish"
 */
Configuration::setEnvironment('development');

/*
 * === [Application Folder ] ===
 * This configuration is generally for security.
 * If you need to change the folder name of your
 * application you must set it here.
 */
Configuration::setApplicationFolder('Application');

/*
 * === [Application Resource Files ] ===
 * This function is used to set the
 * path of the resource.xml file which is used
 * to store static values for your projects(ex; strings, image paths etc)
 * Note; the core app location ('Application' by default) is excluded from the value.
 */
Configuration::setResourceFile('Resources.xml');

/*
 * === [Application URL ] ===
 * This configuration is used to set your
 * web sites url. For example if you create a
 * application that will be run in root set url to: "http://www.examplesite.com/"
 * If your application will be a sub module/application of other application set it like:
 * "http://www.examplesite.com/my_module".
 */
Configuration::setApplicationUrl('http://localhost/nessphp');

/*
 * === [Is Application Root ] ===
 * If your application's url is not accessable by "www.siteexample.com"
 * set this false.
 */
Configuration::setRoot(false);

/*
 * === [ Application Name ] ===
 * This configuration is used to set name of your application.
 */
Configuration::setTitle('Hello World');

/*
 * === [ Application Version ] ===
 * This configuration is used to set version number of your application.
 */
Configuration::setVersion('1.0.0');

/*
 * === [ Application Description ] ===
 * This configuration is used to set description of your application.
 */
Configuration::setDescription('Ness PHP is a solid web framework for fast and secure web applications.');

/*
 * === [ Application Maintenance Mode ] ===
 * This configuration is used to set maintenance mode of your application.
 * if Maintenance Mode is enabled user will see a message on screen like 
 * 'Under Maintenance'
 */
Configuration::enableMaintenance(false);

/**
 *  === [ Application Url Protection ] ===
 * Protect your website from unwanted parameters, You can enable 
 * this feature for preventing visit with unwanted parameters 
 * supplied in array below.
 */
Configuration::setUrlProtected(false);
Configuration::UnwantedParameters(array("'"));


/**---------------------------------------------------------*/
/**                  Application Class                      */
/**---------------------------------------------------------*/
class Application
{
    /**
     * This method is called when your application is loaded. You can register
     * your object mappers or do other configurations.
     */
    public function Register()
    {

    }
}
