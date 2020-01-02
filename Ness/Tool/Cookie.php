<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */


namespace Ness\Tool {

    use Ness\Configuration as Conf;
    use FFI\Exception;

    /**
     * Ness PHP Cookie Class
     * A simple cookie management class for Ness PHP Framework with cookie encryption.
     */
    class Cookie
    {
        /** @ignore */
        private $cookie_name;

        /** @ignore */
        private $cookie_value;

        /** @ignore */
        private $cookie_time;

        /** @ignore */
        private $cookie_is_encrypted;

        /** @ignore */
        private $cookie_encryption_key;

        /** @ignore */
        private $cookie_domain;

        /** @ignore */
        private $cookie_httpOnly;

        /** @ignore */
        private $cookie_secure;

        /** @ignore */
        private $cookie_path;

        /**
         * Initialize cookie class.
         *
         * @param string $name     Cookie name
         * @param string $value    Cookie value
         * @param int    $expire   Cookie expire seconds
         * @param string $path     Set active path for cookie
         * @param string $domain   Set active domain for path
         * @param bool   $secure   True for Allow Only HTTPS
         * @param bool   $httpOnly When TRUE the cookie will be made accessible only through the HTTP protocol. This means that the cookie won't be accessible by scripting languages, such as JavaScript
         */
        public function __construct($name = 'test_cookie', $value = 'test cookie value', $expire = 3600, $path = '', $domain = '', $secure = false, $httpOnly = false)
        {
            $this->cookie_name = $name;
            $this->cookie_value = $value;
            $this->cookie_time = $expire;
            $this->cookie_secure = $secure;
            $this->cookie_path = $path;
            $this->cookie_domain = $domain;
            $this->cookie_httpOnly = $httpOnly;
            $this->cookie_is_encrypted = false;
        }

        /**
         * Get's the cookie value. Returns false if cookie is not available.
         *
         * @return mixed Cookie Value
         */
        public function __toString()
        {
            if (isset($_COOKIE[$this->cookie_name])) {
                if ($this->cookie_is_encrypted) {
                    return $this->CookieCryption('d', $_COOKIE[$this->cookie_name]);
                } else {
                    return $_COOKIE[$this->cookie_name];
                }
            } else {
                return false;
            }
        }

        /**
         * If cookie is set removes it.
         */
        public function Destroy()
        {
            if (isset($_COOKIE[$this->cookie_name]) && !empty($_COOKIE[$this->cookie_name])) {
                setcookie($this->cookie_name, null);
                unset($_COOKIE[$this->cookie_name]);

                return true;
            } else {
                return false;
            }
        }

        /**
         * Get's the cookie value. Returns false if cookie is not available.
         *
         * @return mixed Cookie Value
         */
        public function Revert()
        {
            if (isset($_COOKIE[$this->cookie_name])) {
                if ($this->cookie_is_encrypted) {
                    return $this->CookieCryption('d', $_COOKIE[$this->cookie_name]);
                } else {
                    return $_COOKIE[$this->cookie_name];
                }
            } else {
                return false;
            }
        }

        /**
         * This function is used to store set cookie.
         */
        public function Store()
        {
            setcookie($this->_getName(), $this->_getValue(), $this->_getExpire(), $this->_getPath(), $this->_getDomain(), $this->_getSecure(), $this->_getHttponly());
        }

        /**
         * Cookie name.
         *
         * @param string $name
         */
        public function setName($name)
        {
            $this->cookie_name = $name;

            return $this;
        }

        /**
         * Cookie data to be stored.
         *
         * @param string $value
         */
        public function setValue($value)
        {
            $this->cookie_value = $value;

            return $this;
        }

        /**
         * @param int $time
         */
        public function setExpire($time)
        {
            $this->cookie_time = $time;

            return $this;
        }

        /**
         * Set active path for cookie.
         *
         * @param string $path
         */
        public function setPath($path)
        {
            $this->cookie_path = $path;

            return $this;
        }

        /**
         * Set active domain for path.
         *
         * @param string $domain
         */
        public function setDomain($domain)
        {
            $this->cookie_domain = $domain;

            return $this;
        }

        /**
         * True for Allow Only HTTPS.
         *
         * @param bool $secure
         */
        public function setHttpsOnly($secure)
        {
            $this->cookie_secure = $secure;

            return $this;
        }

        /**
         * When TRUE the cookie will be made accessible only through the HTTP protocol. This means that the cookie won't be accessible by scripting languages, such as JavaScript.
         *
         * @param bool $httpOnly
         */
        public function setHttpOnly($httpOnly)
        {
            $this->cookie_httpOnly = $httpOnly;

            return $this;
        }

        /**
         * @param bool   $isSet True for enabling encryption
         * @param string $key   A secret encryption key if first parameter is set to true.
         *
         * @return $this
         */
        public function setEncryption($isSet, $key)
        {
            $this->cookie_is_encrypted = $isSet;
            $this->cookie_encryption_key = $key;

            return $this;
        }

        /**
         * This function is used to determine if cookies are enabled or disabled.
         * Returns TRUE if cookies are enabled, false for disabled.
         */
        public static function isEnabled()
        {
            if (count($_COOKIE) > 0) {
                //Cookies are enabled.
                return true;
            } else {
                //Cookies are disabled
                return false;
            }
        }

        /**
         * This function tries to removes all available cookies.
         *
         * @return bool
         */
        public static function DestroyAll()
        {
            try {
                foreach ($_COOKIE as $key => $data) {
                    setcookie($key, null);
                    unset($_COOKIE[$key]);
                }

                return true;
            } catch (Exception $ex) {
                return false;
            }
        }

        /**************************************************************
         *                  Helper Functions
         *                        of
         *                 Ness PHP Framework
         *                    Cookie Class
         **************************************************************/

        /**
         * @ignore
         */
        private function _getName()
        {
            if (preg_match("/[=,; \t\r\n\013\014]/", $this->cookie_name)) {
                printf('The name %s provided for your cookie is invalid. Please try a new new', $this->cookie_name);

                return 'cookie_with_invalid_name';
            } else {
                return $this->cookie_name;
            }
        }

        /**
         * @ignore
         */
        private function _getValue()
        {
            if ($this->cookie_is_encrypted) {
                return $this->CookieCryption('e', $this->cookie_value);
            } else {
                return $this->cookie_value;
            }
        }

        /**
         * @ignore
         */
        private function _getExpire()
        {
            return time() + $this->cookie_time;
        }

        /**
         * @ignore
         */
        private function _getPath()
        {
            return $this->cookie_path;
        }

        /**
         * @ignore
         */
        private function _getDomain()
        {
            if (empty($this->cookie_domain) || !is_string($this->cookie_domain)) {
                $domain = parse_url(Conf::getApplicationUrl());

                return $domain['host'];
            } else {
                return $this->cookie_domain;
            }
        }

        /**
         * @ignore
         */
        private function _getSecure()
        {
            return $this->cookie_secure;
        }

        /**
         * @ignore
         */
        private function _getHttponly()
        {
            return $this->cookie_httpOnly;
        }

        /**
         * @ignore
         */
        private function CookieCryption($action, $string)
        {
            $password = substr(hash('sha256', $this->cookie_encryption_key, true), 0, 32);
            if ($action == 'e') {
                return  base64_encode(openssl_encrypt($string, 'aes-256-cbc', $password, OPENSSL_RAW_DATA, substr(hash('sha256', Conf::getApplicationUrl(), true), 0, 16)));
            }
            if ($action == 'd') {
                return openssl_decrypt(base64_decode($string), 'aes-256-cbc', $password, OPENSSL_RAW_DATA, substr(hash('sha256', Conf::getApplicationUrl(), true), 0, 16));
            }
        }
    }
}
