<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness\System;

use Exception;

/**
 * Exception Handler class for Ness PHP.
 * This class is used to generate custom error
 * messages for Ness PHP Exception classes.
 */
class ExceptionHandler extends Exception
{

    /**
     * This function is used to return generated error message.
     * @return String Error Message
     */
    public function getErrorMessage()
    {
        return 'Error occurred on line <b>' . $this->getLine() . '</b> in <b>' . $this->getFile() . '</b> <br>Message: ' . $this->getMessage();
    }
}
