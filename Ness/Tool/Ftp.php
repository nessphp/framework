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
     *   Ness PHP ftp library.
     **/
    class Ftp
    {
        /** @ignore */
        private $ftpHost;

        /** @ignore */
        private $ftpPort;

        /** @ignore */
        private $ftpPass;

        /** @ignore */
        private $ftpUser;

        /** @ignore */
        private $ftpErrorLog;

        /** @ignore */
        private $ftpTimeOut;

        /** @ignore */
        private $ftpConnection;

        /**
         *	Initialize ftp class.
         *
         *	@param string $paramHost Ftp Host
         *	@param string $paramUser Ftp account user
         *	@param string $paramPassword Ftp account password
         *	@param int $paramPort Ftp port, default 21
         *	@param int $paramTimeout Ftp connection time out, default 100
         */
        public function __construct($paramHost = null, $paramUser = null, $paramPassword = null, $paramPort = 21, $paramTimeout = 100)
        {
            $this->ftpHost = $paramHost;
            $this->ftpPort = (int) $paramPort;
            $this->ftpPass = $paramPassword;
            $this->ftpUser = $paramUser;
            $this->ftpTimeOut = (int) $paramTimeout;
        }

        /**
         *	Connect to ftp.
         *
         *	@return bool
         */
        public function Connect()
        {
            if (isset($this->ftpHost, $this->ftpUser, $this->ftpPass, $this->ftpPort)) {
                $this->ftpConnection = ftp_connect($this->ftpHost, $this->ftpPort);
                if (!$this->ftpConnection) {
                    return false;
                }
                if (!ftp_login($this->ftpConnection, $this->ftpUser, $this->ftpPass)) {
                    return false;
                }
                ftp_pasv($this->ftpConnection, true);

                return true;
            }
        }

        /**
         *	Close ftp connection.
         *
         *	@return void
         */
        protected function Close()
        {
            if (isset($this->ftpConnection)) {
                ftp_close($this->ftpConnection);
            }
        }

        /**
         *	Returns last error of ftp action.
         *
         *	@return string
         */
        public function Error()
        {
            return $this->ftpErrorLog;
        }

        /**
         *	Download a file from ftp server.
         *
         *	@param string $localFileName Local file path for download
         *	@param string $ServerFileName Remote path and file
         *
         *	@return bool
         */
        public function Download($localFileName = null, $ServerFileName = null)
        {
            if (isset($localFileName, $ServerFileName)) {
                if (ftp_get($this->ftpConnection, $localFileName, $ServerFileName, FTP_BINARY)) {
                    return true;
                }
            }

            return false;
        }

        /**
         *	Upload a file to ftp server.
         *
         *	@param string $filePath Remote file path for upload
         *	@param string $fileName Local file path
         *
         *	@return bool
         */
        public function Upload($filePath = null, $fileName = null, $ftpMode = FTP_ASCII)
        {
            if (isset($fileName, $filePath)) {
                if (file_exists($fileName)) {
                    $uploaded = ftp_put($this->ftpConnection, $filePath, $fileName, $ftpMode);

                    return $uploaded;
                }
            }

            return false;
        }

        /**
         *	Rename a file.
         *
         *	@param string $oldName Old name of file
         *	@param string $newName New name for file
         *
         *	@return bool
         */
        public function Rename($oldName = null, $newName = null)
        {
            if (isset($oldName, $newName)) {
                if (ftp_rename($this->ftpConnection, $oldName, $newName)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $this->ftpErrorLog = 'Could not change name for file or directory '.$oldName;
            }
        }

        /**
         *	Create a new directory on ftp server.
         *
         *	@param string $dirName Directory name
         *
         *	@return bool
         */
        public function CreateDirectory($dirName = null)
        {
            if (isset($dirName)) {
                if (ftp_mkdir($this->ftpConnection, $dirName)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $this->ftpErrorLog = 'Please set a directory for this action';
            }
        }

        /**
         *	Delete a file.
         *
         *	@param string $fileName File name
         *
         *	@return bool
         */
        public function DeleteFile($fileName = null)
        {
            if (isset($fileName)) {
                if (ftp_delete($this->ftpConnection, $fileName)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $this->ftpErrorLog = 'Please set a filename for this action';
            }
        }

        /**
         *	Size of file.
         *
         *	@param string $fileName file name
         *
         *	@return float
         */
        public function FileSize($fileName = null)
        {
            if (isset($fileName)) {
                $res = ftp_size($this->ftpConnection, $fileName);

                return $res;
            } else {
                $this->ftpErrorLog = 'Unknown file name or file size';
            }
        }

        /**
         *	Delete a directory.
         *
         *	@param string $dirName Directory path and name
         *
         *	@return bool
         */
        public function DeleteDirectory($dirName = null)
        {
            if (isset($dirName)) {
                if (ftp_rmdir($this->ftpConnection, $dirName)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $this->ftpErrorLog = 'Please set a directory for this action';
            }
        }

        /**
         *	Change permission for file.
         *
         *	@param string $ftpFile  Destination file path and file name
         *	@param int $Filepermission permissions
         *
         *	@return bool
         */
        public function SetPermission($ftpFile = null, $Filepermission = null)
        {
            if (isset($this->ftpConnection,$ftpFile)) {
                if (ftp_chmod($this->ftpConnection, $Filepermission, $ftpFile) !== false) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        /**
         *	Directory listing.
         *
         *	@param string $dir Destination directory path
         *
         *	@return array
         */
        public function DirectoryList($dir = null)
        {
            if (isset($this->ftpConnection, $dir)) {
                return ftp_nlist($this->ftpConnection, $dir);
            } else {
                $this->ftpErrorLog = 'Please use an active connection or set directory for listing';
            }
        }

        public function __destruct()
        {
            $this->Close();
        }
    }
}
