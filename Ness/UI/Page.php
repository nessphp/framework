<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

 namespace Ness\UI;

 use Ness\Configuration as conf;
 use Ness\IO\SpecialDirectory;
 use const E_USER_ERROR;
 use const ENT_QUOTES;
 use function file_exists;
 use function htmlspecialchars;
 use function ob_get_clean;
 use function ob_start;
 use function str_replace;
 use function trigger_error;


 /*
  * @ignore
  */
 define('rPath', conf::getApplicationUrl().'/'.conf::getApplicationFolder().'/'.'Template'.'/');

 /**
  * Ness PHP UI libraries
  * This class is used to speed up your ui design process with view inheritance.
  */
 class Page
 {
    /** @ignore */
    private $title;

    /** @ignore */
    private $contents;

    /** @ignore */
    private $layoutPath;

    /** @ignore */
    private $output;

    /** @ignore */
    protected $values = [];

    /** @ignore */
    private $MASTER;

    /**
     * Initialize Page class.
     * @return void
     */
    public function __construct()
    {
        $this->MASTER = dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.conf::getApplicationFolder().DIRECTORY_SEPARATOR.'Template'.DIRECTORY_SEPARATOR;
    }


    /**
     * Set the layout.
     *
     * @param string $layoutPathParam Name of your template file [example: setLayout("mytemplate.phtml"); ].
     *
     * @return void Returns nothing.
     */
    public function setLayout($layoutPathParam = 'master.php')
    {
        if (file_exists($this->MASTER.$this->layoutPath.$layoutPathParam)) {
            $this->layoutPath = $this->MASTER.$this->layoutPath.$layoutPathParam;
        } else {
            // Prevent XSS Attacks.
            $output = $this->MASTER.$this->layoutPath.$layoutPathParam;
            $output = htmlspecialchars($output, ENT_QUOTES, 'UTF-8');
            trigger_error('Error loading template file ('.$output.'). Please check template folder.', E_USER_ERROR);
        }
    }


    /**
     * Set content for parameter defined in template page.
     *
     * @param string $paramName Name of your parameter in template ex: {@Title};
     * @param string $paramName Content for your parameter.
     *
     * @return void Returns nothing.
     */
    public function setParameter($paramName, $paramValue)
    {
        $this->values[$paramName] = $paramValue;
    }


    /**
     * Set null value to unused parameter in template files.
     *
     * @param string $paramName The param name.
     *
     * @return void Returns nothing.
     */
    public function setParameterNull($paramName)
    {
        $this->values[$paramName] = '';
    }


    /**
     * @ignore
     */
    private function __applyParameters()
    {
        foreach ($this->values as $key => $value) {
            $tagToReplace = "{@$key}";
            $this->output = str_replace($tagToReplace, $value, $this->output);
        }
    }

    /**
     * if you do not use parameters for setting title you can use this function.
     */
    public function setTitle($paramTitle = '')
    {
        $this->title = $paramTitle;
    }

    /**
     * Include a css or js file in your template file. This function returns a relative
     * path for template folder.
     *
     * @param string $fileName File name; ex: css/application.css
     *
     * @return file path.
     */
    public static function includeFile($fileName = '')
    {
        return rPath.$fileName;
    }

    /**
     * Include a widget from Application/Content/widget path
     *
     * @param string $fileName File name; ex: widget.html
     */
    public static function insertWidget($filename){
        $wfile = SpecialDirectory::ContentFolder().DIRECTORY_SEPARATOR.'widget'.DIRECTORY_SEPARATOR.$filename;
        if(file_exists($wfile))
        {
            include_once $wfile;
        }
    }

    /**
     * Start content definition in your view files when using templates.
     *
     * @return void Returns nothing.
     */
    public function BeginContent()
    {
        ob_start();
    }

    /**
     * Finish content definition in your view files when using templates.
     *
     * @return void Returns nothing.
     */
    public function EndContent()
    {
        $this->contents = ob_get_clean();
        $this->CreateView();
    }

    /*
     * Returns the page to screen.
     */
    private function CreateView()
    {
        ob_start();
        include_once $this->layoutPath;
        $this->output = ob_get_clean();
        $this->__applyParameters();
        echo $this->output;
    }
 }