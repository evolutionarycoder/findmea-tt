<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 9:28 PM
     */

    namespace Backend\Database\Tables;


    use Backend\Database\Database;
    use Backend\Database\Schemas\Location;

    class Locations extends Database {
        const TABLE_NAME = "locations";

        const
            BUSINESS_TYPE = 'business_type',
            LAT = 'lat',
            LNG = 'lng',
            AREA = 'area',
            NAME = 'name',
            PHONE = 'phone',
            WEBSITE = 'website',
            DESC = 'desc';


        // prepared statement variables
        private $userId, $businessType, $lat, $lng, $area, $name, $desc, $phone, $website;


        public function __construct($mysqli = false) {
            parent::__construct($mysqli);
            $table = self::TABLE_NAME;
            $this->createPreparedStatement($table, [
                "users_id",
                'business_types_id',
                "lat",
                "lng",
                "area",
                "name",
                "`desc`",
                "phone",
                "website"
            ]);

            $this->readPreparedStatement($table);
            $this->updatePreparedStatement($table, [
                "lat",
                "lng",
                "area",
                "name",
                "`desc`",
                "phone",
                "website"
            ]);
            $this->deletePreparedStatement($table);

            $this->c->bind_param("iisssssss", $this->userId, $this->businessType, $this->lat, $this->lng, $this->area, $this->name, $this->desc, $this->phone, $this->website);

            $this->r->bind_param("i", $this->id);
            $this->u->bind_param("sssssssi", $this->lat, $this->lng, $this->area, $this->name, $this->desc, $this->phone, $this->website, $this->id);

            $this->d->bind_param("i", $this->id);
        }


        /**
         * @param Location $obj
         *
         * @return bool|int Inserted ID on success false on failure
         */
        public function create($obj) {
            if (is_object($obj) && $obj instanceof Location) {
                $this->clean($obj);
                $this->userId       = $obj->getUserId();
                $this->businessType = $obj->getBusinessType();
                $this->lat          = $obj->getLat();
                $this->lng          = $obj->getLng();
                $this->area         = $obj->getArea();
                $this->name         = $obj->getName();
                $this->desc         = $obj->getDesc();
                $this->phone        = $obj->getPhone();
                $this->website      = $obj->getWebsite();

                if ($this->c->execute()) {
                    return $this->c->insert_id;
                }
            }

            return false;
        }

        public function readAll() {
            return parent::readAllRows(self::TABLE_NAME);
        }

        public function readByLimitAsc($start, $where = "") {
            return parent::readByAmountAsc(self::TABLE_NAME, $start, $where);
        }

        public function readByLimitDesc($last, $where = "") {
            return parent::readByAmountDesc(self::TABLE_NAME, $last, $where);
        }

        /**
         * @param Location $obj
         *
         * @return bool True on Success false on failure
         */
        public function update($obj) {
            if (is_object($obj) && is_numeric($obj->getId())) {
                $this->clean($obj);
                $old = $this->read($obj->getId());
                if (!is_bool($old)) {
                    $this->lat     = $this->isNull($obj->getLat(), $old->getLat());
                    $this->lng     = $this->isNull($obj->getLng(), $old->getLng());
                    $this->area    = $this->isNull($obj->getArea(), $old->getArea());
                    $this->name    = $this->isNull($obj->getName(), $old->getName());
                    $this->desc    = $this->isNull($obj->getDesc(), $old->getDesc());
                    $this->phone   = $this->isNull($obj->getPhone(), $old->getPhone());
                    $this->website = $this->isNull($obj->getWebsite(), $old->getWebsite());

                    if ($this->u->execute()) {
                        return true;
                    }
                }
            }

            return false;
        }

        /**
         * @param $id
         *
         * @return bool|Location
         */
        public function read($id) {
            return parent::read($id);
        }

        public function totalRows($where = "") {
            return parent::totalRowsInTable(self::TABLE_NAME, $where);
        }

        protected function createObjFromRow($row) {
            $location = new Location($row->id, $row->users_id, $row->business_types_id, null, null, $row->lat, $row->lng, $row->area, $row->name, $row->desc, $row->phone, $row->website, [], []);

            $locationId = $location->getId();

            $likesTable   = new Likes($this->getConnection());
            $commentTable = new Comments($this->getConnection());
            $tagsTable    = new Tags($this->getConnection());

            $whereClause   = "locations_id = {$locationId}";
            $totalLikes    = $likesTable->totalRows($whereClause);
            $totalComments = $commentTable->totalRows($whereClause);

            $comments = $commentTable->readByLimitDesc(null, $whereClause);
            $tags     = $tagsTable->readByLimitDesc(null, $whereClause);

            $location->setTotalLikes($totalLikes);
            $location->setTotalComments($totalComments);
            $location->setComments($comments);
            $location->setTags($tags);

            return $location;
        }
    }