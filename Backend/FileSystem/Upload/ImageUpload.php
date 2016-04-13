<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 12/3/15
     * Time: 2:49 PM
     */

    namespace Backend\Helpers\Upload;


    use Backend\FileSystem\FileSystem;

    class ImageUpload {
        private $directory;
        private $prefix;

        private $fileName;
        private $size;
        private $type;
        private $rand;
        private $tmpName;
        private $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

        /**
         * ImageUpload constructor.
         *
         * @param object|string $file Pass the file uploaded
         * @param string   $prefix
         */
        public function __construct($file = null, $prefix) {
            if (!is_null($file)) {
                $this->fileName = preg_replace("/ /", "", $file['name']);
                $this->size     = $file['size'];
                $this->type     = $file['type'];
                $this->tmpName  = $file['tmp_name'];
            }
            $this->prefix    = $prefix;
            $this->directory = new FileSystem();
            $this->rand      = (rand(0, 9999999) * rand(0, 10) - rand(0, 10));
        }

        /**
         * Checks to see if it's a supported file type
         * @return bool
         */
        private function validExtension() {
            $extension = strtolower(substr($this->getFileName(), strpos($this->getFileName(), '.') + 1));
            for ($i = 0; $i < count($this->allowedExt); $i++) {
                if (!in_array($extension, $this->allowedExt)) {
                    return false;
                }
            }

            return true;
        }

        /**
         * Saves the uploaded file
         *
         * @param string $location The location of the root of the directory
         *
         * @return bool
         */
        public function save($location = "") {
            if ($this->validExtension()) {
                return $this->directory->touch($this->tmpName, $location);
            }

            return false;
        }

        public function getLocation() {
            return "/system/users/{$this->prefix}/" . $this->rand . $this->getFileName();
        }

        /**
         * Deletes a file off the server
         *
         * @param string $location location of the file
         *
         * @return bool True on success, false otherwise
         */
        public function delete($location) {
            return $this->directory->rm($location);
        }

        /**
         * @return mixed
         */
        public function getFileName() {
            return $this->fileName;
        }

        /**
         * @return mixed
         */
        public function getSize() {
            return $this->size;
        }

        /**
         * @return mixed
         */
        public function getType() {
            return $this->type;
        }

        /**
         * @return mixed
         */
        public function getTmpName() {
            return $this->tmpName;
        }


    }