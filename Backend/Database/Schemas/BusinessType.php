<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/13/16
     * Time: 4:39 PM
     */

    namespace Backend\Database\Schemas;


    class BusinessType {
        public $id, $name, $icon;

        /**
         * BusinessType constructor.
         *
         * @param $id
         * @param $name
         * @param $icon
         */
        public function __construct($id = null, $name = null, $icon = null) {
            $this->id   = $id;
            $this->name = $name;
            $this->icon = $icon;
        }

        /**
         * @return mixed
         */
        public function getId() {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id) {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getName() {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name) {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getIcon() {
            return $this->icon;
        }

        /**
         * @param mixed $icon
         */
        public function setIcon($icon) {
            $this->icon = $icon;
        }


    }