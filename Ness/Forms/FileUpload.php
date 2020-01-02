<?php

/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2020 Sinan SALIH
 */

namespace Ness\Forms {

    use Ness\IO\SpecialDirectory as spd;

    /**
     * This class a helper class for Form & FormElements classes and you can use it for your fileuploads.
     */
    class FileUpload
    {
        /** @ignore */
        private $upload_dir;

        /** @ignore */
        private $max_size;

        /** @ignore */
        private $form_name;

        /** @ignore */
        private $allowed_files;

        /** @ignore */
        private $upload_errors;

        /** @ignore */
        private $uploaded_file_name;

        /** @ignore */
        private $is_onlyimages = false;

        /**
         * Initialize FileUpload class.
         *
         * @param type $formName
         *
         * @return $this
         */
        public function __construct($formName = 'Default')
        {
            $this->upload_dir = $this->setDirectory('uploads');
            $this->max_size = 500000;
            $this->form_name = $formName;
            $this->is_onlyimages = false;
            $this->allowed_files = [];

            return $this;
        }

        /**
         * Upload File.
         *
         * @param string $form_element_name Please enter the name of the file which specified in form to catch up.
         *
         * @return bool
         */
        public function UploadFile($form_element_name)
        {
            $target_file = $this->upload_dir . basename($_FILES[$form_element_name]['name']);
            $is_uploaded = true;
            $dat_type = pathinfo($target_file, PATHINFO_EXTENSION);

            //check if valid image file
            if ($this->is_onlyimages) {
                if (isset($_POST[$this->form_name])) {
                    $chk = getimagesize($_FILES[$form_element_name]['tmp_name']);
                    if ($chk !== false) {
                        $is_uploaded = true;
                    } else {
                        $is_uploaded = false;
                        $this->upload_errors[] = 'Selected file is not a valid image file.';
                    }
                }
            }

            //already exist proccess
            if (file_exists($target_file)) {
                //$is_uploaded = FALSE;
                $t = time();
                $append_form = date('Y_m_d', $t) . (string) $t;
                $target_file .= $append_form . '.' . $dat_type;
            }
            $this->uploaded_file_name = $target_file;

            //check file size
            if ($_FILES[$form_element_name]['size'] > $this->max_size) {
                $is_uploaded = false;
                $this->upload_errors[] = 'Selected file is larger than your max upload limit, please upload smaller file or configure upload settings.';
            }

            //allowed file format
            if (in_array($dat_type, $this->allowed_files)) {
                $is_uploaded = false;
                $this->upload_errors[] = 'Selected file is not in allowed type';
            }

            //main upload proccess
            if ($is_uploaded == false) {
                return false;
            } else {
                if (move_uploaded_file($_FILES[$form_element_name]['tmp_name'], $target_file)) {
                    return true;
                } else {
                    $this->upload_errors[] = 'Errors occurred while uploading your file, please try again';
                    return false;
                }
            }
        }

        /**
         * @param bool $is_set set true to allow only image files.
         *
         * @return $this
         */
        public function OnlyImages($is_set = true)
        {
            $this->is_onlyimages = $is_set;
            return $this;
        }

        /**
         * Set Maximum Allowed Upload file size.
         *
         * @param int $max_size_of_image Max upload allowed size in bytes
         *
         * @return $this
         */
        public function MaxFileSize($max_size_of_image = 500000)
        {
            $this->max_size = $max_size_of_image;
            return $this;
        }

        /**
         * Set Allowed file types.
         *
         * @param array $extensions Extensions in an array
         *
         * @return $this
         */
        public function AllowedExtensions($extensions)
        {
            $this->allowed_files[] = $extensions;
            return $this;
        }

        /**
         * Set upload folder for your file, by default: "uploads".
         *
         * @return $this
         */
        public function setDirectory($dir_to_upload = 'uploads')
        {
            $this->upload_dir = spd::ApplicationFolder() . DIRECTORY_SEPARATOR . $dir_to_upload . DIRECTORY_SEPARATOR;
            return $this;
        }

        /**
         * Returns the upload folder path.
         *
         * @return string
         */
        public function getDirectory()
        {
            return $this->upload_dir;
        }

        /**
         * Returns the upload image name.
         *
         * @return string
         */
        public function getName()
        {
            return $this->uploaded_file_name;
        }

        /**
         * Errors occurred while uploading file.
         *
         * @return array
         */
        public function getErrors()
        {
            return $this->upload_errors;
        }
    }
}
