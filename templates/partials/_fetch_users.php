<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/14/16
     * Time: 10:08 PM
     */

    use Backend\Database\Tables\Users;

    $connection = false;
    if (isset($table)) {
        $connection = $table->getConnection();
    }
    $table = new Users($connection);
    $data  = $table->readByLimitDesc(null, null);
    for ($i = 0; $i < count($data); $i++) {
        $c = $data[$i];
        echo "
            <div class=\"col-md-4\">
                <div class=\"well\">
                    <div class=\"col-md-12\">
                        <div class=\"col-md-12 text-center\">

                            <ul class=\"list-group\" style=\"background: #fff\">
                                <li class=\"list-group-item text-left\">
                                    <span class=\"entypo-user\"></span>&nbsp;&nbsp;{$c->getFullName()}
                                </li>
                                <li class=\"list-group-item text-center\">
                                    <img src=\"{$c->getPhoto()}\" alt=\"\"
                                         class=\"img-circle img-responsive img-profile\">

                                </li>
                                <li class=\"list-group-item text-center\">
                                            <span class=\"pull-left\">
                                                <strong>Ratings</strong>
                                            </span>


                                    <div class=\"ratings\">

                                        <a href=\"#\">
                                            <span class=\"fa fa-star\"></span>
                                        </a>
                                        <a href=\"#\">
                                            <span class=\"fa fa-star\"></span>
                                        </a>
                                        <a href=\"#\">
                                            <span class=\"fa fa-star\"></span>
                                        </a>
                                        <a href=\"#\">
                                            <span class=\"fa fa-star\"></span>
                                        </a>
                                        <a href=\"#\">
                                            <span class=\"fa fa-star-o\"></span>
                                        </a>

                                    </div>


                                </li>

                                <li class=\"list-group-item text-right\">
                                            <span class=\"pull-left\">
                                                <strong>Name</strong>
                                            </span>{$c->getFullName()}
                                </li>
                                <li class=\"list-group-item text-right\">
                                            <span class=\"pull-left\">
                                                <strong>Joined</strong>
                                            </span>2.13.2014
                                </li>
                                <li class=\"list-group-item text-right\">
                                            <span class=\"pull-left\">
                                                <strong>Blog Posts</strong>
                                            </span>15
                                </li>
                                <li class=\"list-group-item text-right\">
                                            <span class=\"pull-left\">
                                                <strong>Followers</strong>
                                            </span>15
                                </li>
                                <li class=\"list-group-item text-center\">
                                    <button class=\"btn btn-success ladda-button\">
                                        FOLLOW
                                    </button>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>";
    }
?>