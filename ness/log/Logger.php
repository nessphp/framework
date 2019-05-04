<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace ness\log
{
    use ness\io\FileSystem as fs;
    use ness\io\SpecialDirectory as SpecialDirectories;

    /**
     * This class is used to generate logs. You can use the functions of class for creating
     * Error files, warning files or output messages.
     * Created txt files will be located in 'output' folder of your application.
     */
    class Logger
    {
        /**
         *  Create an output log file.
         *
         * @param type $logType    LogProvider log type
         * @param type $logTitle   title for your log
         * @param type $logMessage log message
         */
        public static function CreateLog($logType = 2, $logTitle = 'LOG', $logMessage = 'NULL')
        {
            switch ($logType) {
                case 0:
                    //ERROR
                    fs::Append(SpecialDirectories::OutputFolder().DIRECTORY_SEPARATOR.'Errors.txt', "[{$logTitle}] : {$logMessage}");
                    break;
                case 1:
                    //WARNING
                    fs::Append(SpecialDirectories::OutputFolder().DIRECTORY_SEPARATOR.'Warnings.txt', "[{$logTitle}] : {$logMessage}");
                    break;
                case 2:
                    //OUTPUTMESSAGE
                    fs::Append(SpecialDirectories::OutputFolder().DIRECTORY_SEPARATOR.'Outputs.txt', "[{$logTitle}] : {$logMessage}");
                    break;

                default:
                    //OUTPUTS
                    fs::Append(SpecialDirectories::OutputFolder().DIRECTORY_SEPARATOR.'Outputs.txt', "[{$logTitle}] : {$logMessage}");
                    break;
            }
        }
    }

}
