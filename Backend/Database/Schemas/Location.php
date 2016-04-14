<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 7:56 PM
     */

    namespace Backend\Database\Schemas;


    class Location {
        /**
         * @var int
         */
        public $id, $userId, $businessType, $totalLikes, $totalComments;

        /**
         * @var string
         */
        public $lat, $lng, $area, $name, $desc, $phone, $website;


        /**
         * @var Comment[]
         */
        public $comments;

        /**
         * @var Tag[]
         */
        public $tags;

        /**
         * Location constructor.
         *
         * @param int       $id            ID of the row in table
         * @param int       $userId        User the location belongs to
         * @param int       $businessId
         * @param int       $totalLikes    Total likes on the location
         * @param int       $totalComments Total comments on the location
         * @param string    $lat           Latitude of the location
         * @param string    $lng           Longitude of the location
         * @param string    $area          Area the location is situated in (Arima, P-o-S, San Fernando)
         * @param string    $name          Name of the location
         * @param string    $desc          Description of the location
         * @param string    $phone         Locations phone number
         * @param string    $website       Locations website
         * @param Comment[] $comments      Comments associated with the location
         * @param Tag[]     $tags          Tags on a location
         */
        public function __construct($id = null, $userId = null, $businessId = null, $totalLikes = null, $totalComments = null, $lat = null, $lng = null, $area = null, $name = null, $desc = null, $phone = null, $website = null, $comments = null, $tags = null) {
            $this->id            = $id;
            $this->userId        = $userId;
            $this->businessType  = $businessId;
            $this->totalLikes    = $totalLikes;
            $this->totalComments = $totalComments;
            $this->lat           = $lat;
            $this->lng           = $lng;
            $this->area          = $area;
            $this->name          = $name;
            $this->desc          = $desc;
            $this->phone         = $phone;
            $this->website       = $website;
            $this->comments      = $comments;
            $this->tags          = $tags;
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
         * @return int
         */
        public function getUserId() {
            return $this->userId;
        }

        /**
         * @param int $userId
         */
        public function setUserId($userId) {
            $this->userId = $userId;
        }

        /**
         * @return int
         */
        public function getBusinessType() {
            return $this->businessType;
        }

        /**
         * @param int $businessType
         */
        public function setBusinessType($businessType) {
            $this->businessType = $businessType;
        }

        

        /**
         * @return int
         */
        public function getTotalLikes() {
            return $this->totalLikes;
        }

        /**
         * @param int $totalLikes
         */
        public function setTotalLikes($totalLikes) {
            $this->totalLikes = $totalLikes;
        }

        /**
         * @return int
         */
        public function getTotalComments() {
            return $this->totalComments;
        }

        /**
         * @param int $totalComments
         */
        public function setTotalComments($totalComments) {
            $this->totalComments = $totalComments;
        }

        /**
         * @return string
         */
        public function getLat() {
            return $this->lat;
        }

        /**
         * @param string $lat
         */
        public function setLat($lat) {
            $this->lat = $lat;
        }

        /**
         * @return string
         */
        public function getLng() {
            return $this->lng;
        }

        /**
         * @param string $lng
         */
        public function setLng($lng) {
            $this->lng = $lng;
        }

        /**
         * @return string
         */
        public function getArea() {
            return $this->area;
        }

        /**
         * @param string $area
         */
        public function setArea($area) {
            $this->area = $area;
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
        public function getDesc() {
            return $this->desc;
        }

        /**
         * @param string $desc
         */
        public function setDesc($desc) {
            $this->desc = $desc;
        }

        /**
         * @return string
         */
        public function getPhone() {
            return $this->phone;
        }

        /**
         * @param string $phone
         */
        public function setPhone($phone) {
            $this->phone = $phone;
        }

        /**
         * @return string
         */
        public function getWebsite() {
            return $this->website;
        }

        /**
         * @param string $website
         */
        public function setWebsite($website) {
            $this->website = $website;
        }

        /**
         * @return Comment[]
         */
        public function getComments() {
            return $this->comments;
        }

        /**
         * @param Comment[] $comments
         */
        public function setComments($comments) {
            $this->comments = $comments;
        }

        /**
         * @return Tag[]
         */
        public function getTags() {
            return $this->tags;
        }

        /**
         * @param Tag[] $tags
         */
        public function setTags($tags) {
            $this->tags = $tags;
        }

    }