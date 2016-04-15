<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/14/16
     * Time: 7:57 PM
     */


    use Backend\Database\Tables\Locations;

    $connection = false;
    if (isset($table)) {
        $connection = $table->getConnection();
    }
    $table  = new Locations($connection);
    $userId = Auth::USER_ID();// already there
    $data   = $table->readByLimitDesc(null, "users_id = {$userId}");

    for ($i = 0; $i < count($data); $i++) {
        $c      = $data[$i];
        $encode = clone $c;
        $table->encode($encode);
        
        $area    = $c->getArea();
        $name    = $c->getName();
        $desc    = substr($c->getDesc(), 0, 38);
        $phone   = $c->getPhone();
        $website = $c->getWebsite();
        echo "<tr data-toggle='true' data-id='{$c->getId()}' 
                  data-area='{$encode->getArea()}'
                  data-name='{$encode->getName()}'
                  data-desc='{$encode->getDesc()}'
                  data-phone='{$encode->getPhone()}'
                  data-website='{$encode->getWebsite()}'>
                    <td>{$area}</td>
                    <td>{$name}</td>
                    <td>
                        {$desc}
                    </td>
                    <td>{$phone}</td>
                    <td>{$website}</td>
                    <td>
                        <span class=\"status-metro status-active\" title=\"Active\">Active</span>
                    </td>
                </tr>";
    }
?>