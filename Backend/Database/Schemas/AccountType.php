<?php
    /**
     * Created by PhpStorm.
     * User: Daniel M. Prince
     * Date: 4/10/16
     * Time: 7:11 PM
     */

    namespace Backend\Database\Schemas;


    class AccountType {
        public $id, $name, $slug;

        /**
         * AccountType constructor.
         *
         * @param int    $id   ID of the Account Type row
         * @param string $name Name of the Account Type
         * @param string $slug Shortened name for the Account Type
         */
        public function __construct($id = null, $name = null, $slug = null) {
            $this->id   = $id;
            $this->name = $name;
            $this->slug = $slug;
        }

        /**
         * @return int
         */
        public function getId() {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId($id) {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getName() {
            return $this->name;
        }

        /**
         * @param string $name
         */
        public function setName($name) {
            $this->name = $name;
        }

        /**
         * @return string
         */
        public function getSlug() {
            return $this->slug;
        }

        /**
         * @param string $slug
         */
        public function setSlug($slug) {
            $this->slug = $slug;
        }

    }