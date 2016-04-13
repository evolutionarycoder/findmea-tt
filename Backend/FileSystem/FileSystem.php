<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/13/16
     * Time: 11:58 AM
     */

    namespace Backend\FileSystem;


    class FileSystem {

        private $root_dir;

        /**
         * Directories constructor.
         */
        public function __construct() {
            $this->root_dir = $_SERVER['DOCUMENT_ROOT'] . '/';
        }


        /**
         * Makes A Directory on file system
         *
         * @param string $location Location to make directory
         *
         * @return bool True on Success false on failure
         */
        public function mkdir($location) {
            if (mkdir($this->root_dir . $location)) {
                return true;
            }

            return false;
        }

        /**
         * Removes a folder on file system
         *
         * @param string $folderLocation Folder to remove
         *
         * @return bool True on success false on failure
         */
        public function rmdir($folderLocation) {
            $dir   = $this->root_dir . $folderLocation;
            $files = array_diff(scandir($dir), ['.', '..']);
            foreach ($files as $file) {
                unlink("$dir/$file");
            }

            return rmdir($dir);
        }

        /**
         * Remove a File
         *
         * @param string $fileLocation
         */
        public function rm($fileLocation) {
            return unlink($this->root_dir . $fileLocation);
        }

        /**
         * Create a new file on the file system
         *
         * @param $tmp
         * @param $loc
         *
         * @return bool True on success, false on failure
         */
        public function touch($tmp, $loc) {
            return move_uploaded_file($tmp, $this->root_dir . $loc);
        }
    }