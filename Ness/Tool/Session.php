<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace Ness\Tool
{
    /**
     *	Ness PHP helper class for session management.
     **/
    class Session
    {
        /** @ignore */
        private $ssName;

        /**
         *	Initialize session class.
         *
         *	@param string $getName Optional name for session class
         *
         *	@return void
         */
        public function __construct($getName = null)
        {
            if (isset($getName)) {
                $this->ssName = $getName;
            }

            /*
             * If sessions is not started try to start.
             */
            if (!isset($_SESSION)) {
                session_start();
            }
        }

        /**
         *	Creates new session data.
         *
         *	@param string $id id for session
         *	@param string $value value for session
         *
         *	@return void
         */
        public function Create($id, $value)
        {
            $_SESSION[$id] = $value;
        }

        /**
         *	Deletes a session if available.
         *
         *	@param string $id Session id
         *
         *	@return bool
         */
        public function Delete($id = null)
        {
            if (isset($_SESSION[$id])) {
                session_unset($_SESSION[$id]);

                return true;
            } else {
                return false;
            }
        }

        /**
         *	Clear all session data.
         *
         *	@return void
         */
        public function Clear()
        {
            session_unset();
        }

        /**
         *	Checks if session is available.
         *
         *	@param string $id session id
         *
         *	@return bool
         */
        public function isAvailable($id = null)
        {
            if (isset($_SESSION[$id])) {
                return true;
            } else {
                return false;
            }
        }

        /**
         *	Checks if session is available and return value if available.
         *
         *	@param string $id session id
         *
         *	@return bool
         */
        public static function getSession($id = null)
        {
            if (isset($_SESSION[$id])) {
                return $_SESSION[$id];
            }
        }

        /**
         *	Get the name of current session class.
         *
         *	@return string
         */
        public function getName()
        {
            if (!(empty($this->ssName))) {
                return $this->ssName;
            } else {
                return false;
            }
        }

        /**
         *	Change name of current session class.
         *
         *	@param string $newName session class name
         *
         *	@return void
         */
        public function setName($newName = null)
        {
            $this->ssName = $newName;
        }

        /**
         *	Create sessions with multiple values.
         *
         *	@param array $arrayKeys keys for session id and value for session data
         *
         *	@return void
         */
        public function CreateMultiple(array $arrayKeys = null)
        {
            foreach ($arrayKeys as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }

        /**
         *	Delete multiple sessions.
         *
         *	@param array $arrayKeys Session id's as array
         *
         *	@return bool
         */
        public function DeleteMultiple(array $arrayKeys = null)
        {
            $toClear = array_fill_keys($arrayKeys, '');
            foreach ($toClear as $key=> $value) {
                if (isset($_SESSION[$key])) {
                    unset($_SESSION[$key]);
                } else {
                    return false;
                }
            }
        }

        /**
         *	Generate new id for current session class.
         *
         *	@param bool $destroyOld true if old session data will be stored
         *
         *	@return void
         */
        public function Regenerate($destroyOld = false)
        {
            session_regenerate_id(false);
            if ($destroyOld) {
                $s_id = session_id();
                session_write_close();
                session_id($s_id);
                session_start();
            }
        }

        /**
         *	Destroy all session data.
         *
         *	@return void
         */
        public function Destroy()
        {
            session_destroy();
        }
    }

}
