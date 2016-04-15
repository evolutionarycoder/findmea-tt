<?php
    use Backend\Authorization\Auth;
    use Backend\Database\Tables\Locations;

    require $_SERVER['DOCUMENT_ROOT'] . '/Backend/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/Backend/session.php';
    if (!Auth::isLoggedIn()) {
        header('Location: ' . '/');
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Find Me A... V 1.0.0</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">


        <link rel="stylesheet" href="../assets/js/button/ladda/ladda.min.css">


        <!--Button Styles-->
        <link rel="stylesheet" href="../assets/js/button/ladda/ladda.min.css">
        <!-- Extra Pages -->
        <link rel="stylesheet" href="../assets/css/extra-pages.css">

        <!-- PNotify -->
        <link rel="stylesheet" href="../assets/css/pnotify.custom.min.css">

        <!-- Form -->
        <link href="../assets/js/iCheck/flat/all.css" rel="stylesheet">
        <link href="../assets/js/iCheck/line/all.css" rel="stylesheet">
        <link href="../assets/js/colorPicker/bootstrap-colorpicker.css" rel="stylesheet">
        <link href="../assets/js/switch/bootstrap-switch.css" rel="stylesheet">
        <link href="../assets/js/validate/validate.css" rel="stylesheet">
        <link href="../assets/js/idealform/css/jquery.idealforms.css" rel="stylesheet">

        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/loader-style.css">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">

        <link rel="stylesheet" href="../css/animate.min.css">
        <link rel="stylesheet" href="../css/utility.css">


        <link href="../assets/js/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css">
        <link href="../assets/js/footable/css/footable.standalone.css" rel="stylesheet" type="text/css">
        <link href="../assets/js/footable/css/footable-demos.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="../assets/js/dataTable/lib/jquery.dataTables/css/DT_bootstrap.css">
        <link rel="stylesheet" href="../assets/js/dataTable/css/datatables.responsive.css">

        <style>
            #footable-res2 tr {
                cursor : pointer;
            }
        </style>


        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="../assets/ico/minus.png">
    </head>

    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- TOP NAVBAR -->
        <nav role="navigation" class="navbar navbar-static-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle"
                            type="button">
                        <span class="entypo-menu"></span>
                    </button>
                    <button class="navbar-toggle toggle-menu-mobile toggle-left" type="button">
                        <span class="entypo-list-add"></span>
                    </button>


                    <div id="logo-mobile" class="visible-xs">
                        <h1>Apricot
                            <span>v1.2</span>
                        </h1>
                    </div>

                </div>


                <!-- Collect the nav links, forms, and other content for toggling -->
                <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">

                        <li class="dropdown">

                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i style="font-size:20px;"
                                                                                          class="icon-conversation"></i>
                                <div class="noft-red">23</div>
                            </a>


                            <ul style="margin: 11px 0 0 9px;" role="menu" class="dropdown-menu dropdown-wrap">
                                <li>
                                    <a href="#">
                                        <img alt="" class="img-msg img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/men/1.jpg">Jhon Doe <b>Just
                                            Now</b>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <img alt="" class="img-msg img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/women/1.jpg">Jeniffer <b>3
                                            Min Ago</b>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <img alt="" class="img-msg img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/men/2.jpg">Dave <b>2 Hours
                                            Ago</b>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <img alt="" class="img-msg img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/men/3.jpg"><i>Keanu</i> <b>1
                                            Day Ago</b>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <img alt="" class="img-msg img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/men/4.jpg"><i>Masashi</i> <b>2
                                            Mounth Ago</b>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div>See All Messege</div>
                                </li>
                            </ul>
                        </li>
                        <li>

                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i style="font-size:19px;"
                                                                                          class="icon-warning tooltitle"></i>
                                <div class="noft-green">5</div>
                            </a>
                            <ul style="margin: 12px 0 0 0;" role="menu" class="dropdown-menu dropdown-wrap">
                                <li>
                                    <a href="#">
                                        <span style="background:#DF2135" class="noft-icon maki-bus"></span><i>From
                                            Station</i> <b>01B</b>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <span style="background:#AB6DB0" class="noft-icon maki-ferry"></span><i>Departing
                                            at</i> <b>9:00 AM</b>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <span style="background:#FFA200" class="noft-icon maki-aboveground-rail"></span><i>Delay
                                            for</i> <b>09 Min</b>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <span style="background:#86C440" class="noft-icon maki-airport"></span><i>Take
                                            of</i> <b>08:30 AM</b>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <span style="background:#0DB8DF" class="noft-icon maki-bicycle"></span><i>Take
                                            of</i> <b>08:30 AM</b>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div>See All Notification</div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i data-toggle="tooltip" data-placement="bottom" title="Help"
                                           style="font-size:20px;" class="icon-help tooltitle"></i></a>
                        </li>

                    </ul>
                    <div id="nt-title-container" class="navbar-left running-text visible-lg">
                        <ul class="date-top">
                            <li class="entypo-calendar" style="margin-right:5px"></li>
                            <li id="Date"></li>


                        </ul>

                        <ul id="digital-clock" class="digital">
                            <li class="entypo-clock" style="margin-right:5px"></li>
                            <li class="hour"></li>
                            <li>:</li>
                            <li class="min"></li>
                            <li>:</li>
                            <li class="sec"></li>
                            <li class="meridiem"></li>
                        </ul>
                        <ul id="nt-title">
                            <li>
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span class="country">N/A</span>&#160;&#160;
                                <span class="city">Loading...</span>&#160;
                            </li>
                            <li>
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span class="country">N/A</span>&#160;&#160;
                                <span class="region">Loading...</span>&#160;
                            </li>
                        </ul>
                    </div>

                    <ul style="margin-right:0;" class="nav navbar-nav navbar-right">
                        <li>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" class="admin-pic img-circle"
                                     src="<?php echo Auth::PHOTO(); ?>">
                                Hi, <?php echo Auth::FNAME() . ' ' . Auth::LNAME(); ?> <b class="caret"></b>
                            </a>
                            <ul style="margin-top:14px;" role="menu" class="dropdown-setting dropdown-menu">
                                <li>
                                    <a href="#">
                                        <span class="entypo-user"></span>&#160;&#160;My Profile</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="entypo-vcard"></span>&#160;&#160;Account Setting</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="entypo-lifebuoy"></span>&#160;&#160;Help</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <span class="entypo-logout"></span>&#160;&#160;Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="icon-gear"></span>&#160;&#160;Setting</a>
                            <ul role="menu" class="dropdown-setting dropdown-menu">

                                <li class="theme-bg">
                                    <div id="button-bg"></div>
                                    <div id="button-bg2"></div>
                                    <div id="button-bg3"></div>
                                    <div id="button-bg5"></div>
                                    <div id="button-bg6"></div>
                                    <div id="button-bg7"></div>
                                    <div id="button-bg8"></div>
                                    <div id="button-bg9"></div>
                                    <div id="button-bg10"></div>
                                    <div id="button-bg11"></div>
                                    <div id="button-bg12"></div>
                                    <div id="button-bg13"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-xs">
                            <a class="toggle-left" href="#">
                                <span style="font-size:20px;" class="entypo-list-add"></span>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- /END OF TOP NAVBAR -->

        <!-- SIDE MENU -->
        <div id="skin-select">
            <div id="logo">
                <h1>Find Me A...
                    <span>beta</span>
                </h1>
            </div>

            <a id="toggle">
                <span class="entypo-menu"></span>
            </a>
            <div class="dark">
                <form action="#">
                <span>
                    <input type="text" name="search" value="" class="search rounded id_search"
                           placeholder="Search Menu..." autofocus/>
                </span>
                </form>
            </div>

            <div class="search-hover">
                <form id="demo-2">
                    <input type="search" placeholder="Search Menu..." class="id_search">
                </form>
            </div>


            <div class="skin-part">
                <div id="tree-wrap">
                    <div class="side-bar">
                        <ul class="topnav menu-left-nest">
                            <li>
                                <a href="#" style="border-left:0px solid!important;" class="title-menu-left">

                                    <span class="widget-menu"></span>
                                    <i data-toggle="tooltip" class="entypo-cog pull-right config-wrap"></i>

                                </a>
                            </li>

                            <li>
                                <a class="tooltip-tip ajax-load" href="#" title="Blog about places your visit">
                                    <i class="icon-document-edit"></i>
                                    <span>Blog</span>
                                </a>
                                <ul>
                                    <li>
                                        <a class="tooltip-tip2 ajax-load" href="blog/" title="Blog List">
                                            <i class="entypo-doc-text"></i><span>Create</span></a>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip2 ajax-load" href="#" title="Blog List">
                                            <i class="fa fa-rss" aria-hidden="true"></i><span>Feed</span></a>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip2 ajax-load" href="#" title="Blog Detail">
                                            <i class="entypo-newspaper"></i><span>My Posts</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="tooltip-tip ajax-load" href="#" title="Social">
                                    <i class="icon-feed"></i>
                                    <span>Social</span>

                                </a>
                            </li>
                            <li>
                                <a class="tooltip-tip ajax-load" href="#" title="Blog about places your visit">
                                    <i class="icon-document-edit"></i>
                                    <span>Friends</span>
                                </a>
                                <ul>
                                    <li>
                                        <a class="tooltip-tip2 ajax-load" href="friends.php" title="Blog List">
                                            <i class="fa fa-search" aria-hidden="true"></i><span>Find Friends</span></a>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip2 ajax-load" href="#" title="Blog Detail">
                                            <i class="fa fa-list" aria-hidden="true"></i><span>Manage Friends</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="tooltip-tip ajax-load" href="media.php" title="Social">
                                    <i class="icon-feed"></i>
                                    <span>Media</span>
                                </a>
                            </li>
                        </ul>

                        <ul class="topnav menu-left-nest">
                            <li>
                                <a href="#" style="border-left:0px solid!important;" class="title-menu-left">

                                    <span class="design-kit"></span>
                                    <i data-toggle="tooltip" class="entypo-cog pull-right config-wrap"></i>

                                </a>
                            </li>

                            <li>
                                <a class="tooltip-tip ajax-load" href="index.php" title="Dashboard">
                                    <i class="icon-window"></i>
                                    <span>Dashboard</span>

                                </a>
                            </li>
                            <li>
                                <a class="tooltip-tip ajax-load" href="index.html" title="Notify">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                    <span>Notify Me If...</span>
                                </a>
                            </li>
                            <li>
                                <a class="tooltip-tip ajax-load" href="index.html" title="Favourites">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <span>Favourites</span>
                                </a>
                            </li>
                            <li>
                                <a class="tooltip-tip" href="#" title="Business">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    <span>Business</span>
                                </a>
                                <ul>
                                    <li>
                                        <a class="tooltip-tip2" href="#" title="Add Business">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            <span>Add Business</span></a>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip2" href="#" title="Manage Businesses">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                            <span>Manage Businesses</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <ul id="menu-showhide" class="topnav menu-left-nest">
                            <li>
                                <a href="#" style="border-left:0px solid!important;" class="title-menu-left">

                                    <span class="component"></span>
                                    <i data-toggle="tooltip" class="entypo-cog pull-right config-wrap"></i>

                                </a>
                            </li>
                            <li>
                                <a class="tooltip-tip ajax-load" href="#" title="Mail a Business">
                                    <i class="icon-mail"></i>
                                    <span>Mail</span>
                                </a>
                                <ul>
                                    <li>
                                        <a class="tooltip-tip2" href="#" title="Mail Inbox">
                                            <i class="fa fa-inbox" aria-hidden="true"></i>
                                            <span>Inbox</span>
                                            <div class="noft-blue">289</div>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="tooltip-tip2" href="#" title="Outbox">
                                            <i class="fa fa-share-square" aria-hidden="true"></i>
                                            <span>Outbox</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>


                        <div class="side-dash">
                            <h3>
                                <span>Stats</span>
                            </h3>
                            <ul class="side-dashh-list">
                                <li>Business Reviews
                                    <span>25k<i style="color:#44BBC1;" class="fa fa-arrow-circle-up"></i></span>
                                </li>
                                <li>Registered Businesses
                                    <span>13m<i style="color:#19A1F9;" class="fa fa-arrow-circle-up"></i></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF SIDE MENU -->


        <!--  PAPER WRAP -->
        <div class="wrap-fluid">
            <div class="container-fluid paper-wrap bevel tlbr">
                <!-- CONTENT -->
                <!--TITLE -->
                <div class="row">
                    <div id="paper-top">
                        <div class="col-sm-3">

                            <h2 class="tittle-content-header">
                                

                                
                                <span>
                                    

                                    
                                </span>
                            </h2>

                        </div>

                        <div class="col-sm-7">
                            <div class="devider-vertical visible-lg"></div>
                            <div class="tittle-middle-header">
                                <div class="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <span class="tittle-alert entypo-info-circled"></span>
                                    Welcome back,&nbsp;
                                    <strong>Dave mattew!</strong>&nbsp;&nbsp;Your last sig in at Yesterday, 16:54 PM
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-2">


                        </div>
                    </div>
                </div>
                <!--/ TITLE -->

                <!-- BREADCRUMB -->
                <ul id="breadcrumb">
                    <li>
                        <span class="entypo-home"></span>
                    </li>
                    <li><i class="fa fa-lg fa-angle-right"></i>
                    </li>
                    <li><a href="#" title="Sample page 1">Extra Pages</a>
                    </li>
                    <li><i class="fa fa-lg fa-angle-right"></i>
                    </li>
                    <li><a href="#" title="Sample page 1">Blank Page</a>
                    </li>
                    <li class="pull-right">
                        <div class="input-group input-widget">

                            <input style="border-radius:15px" type="text" id="search-map" placeholder="Search..."
                                   class="form-control">
                        </div>
                    </li>
                </ul>

                <!-- END OF BREADCRUMB -->

                <!-- BLANK PAGE-->


                <div class="content-wrap">
                    <div class="row" style="background: #FFF">
                        <div class="col-lg-8">
                            <div class="nest" id="FilteringClose">
                                <div class="title-alt">
                                    <h6>Business Manager</h6>
                                </div>

                                <div class="body-nest" id="Filtering">

                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-sm-4">
                                            <input class="form-control" id="filter" placeholder="Search..."
                                                   type="text"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="filter-status form-control">
                                                <option value="active">Active</option>
                                                <option value="disabled">Disabled</option>
                                                <option value="suspended">Suspended</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <a id='delete' href="#" style="margin-left:10px;"
                                               data-style="zoom-in"
                                               class="pull-right btn btn-info ladda-button normal">Delete</a>
                                            <a href="#" style="margin-left:10px;"
                                               class="pull-right btn btn-info">Edit</a>
                                        </div>
                                    </div>

                                    <table id="footable-res2" class="demo" data-filter="#filter"
                                           data-filter-text-only="true">
                                        <thead>
                                            <tr>
                                                <th data-toggle="true">
                                                    Area
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Description
                                                </th>
                                                <th>
                                                    Phone
                                                </th>
                                                <th>
                                                    Website
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                /**
                                                 * Created by PhpStorm.
                                                 * User: prince
                                                 * Date: 4/14/16
                                                 * Time: 7:57 PM
                                                 */


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
                                        </tbody>
                                    </table>

                                </div>

                            </div>


                        </div>

                        <div class="col-lg-4 m-t-30">
                            <form class="well form-horizontal" action=" " method="post" id="contact_form">
                                <fieldset>
                                    <!-- Text input-->

                                    <div class="form-group">
                                        <label class="col-md-12 ">Area</label>
                                        <div class="col-md-12 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                                <input name="area" placeholder="Area your business is located"
                                                       class="form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-12 ">Name</label>
                                        <div class="col-md-12 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-envelope"></i></span>
                                                <input name="name" placeholder="Name of your business"
                                                       class="form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Text input-->

                                    <div class="form-group">
                                        <label class="col-md-12 ">Phone #</label>
                                        <div class="col-md-12 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-earphone"></i></span>
                                                <input name="phone" placeholder="(868)555-1212" class="form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-12 ">Website or domain name</label>
                                        <div class="col-md-12 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-globe"></i></span>
                                                <input name="website" placeholder="Website or domain name"
                                                       class="form-control"
                                                       type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 ">Business Description</label>
                                        <div class="col-md-12 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-pencil"></i></span>
                                <textarea class="form-control" name="desc"
                                          placeholder="Business Description"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <div class="col-md-12">
                                            <p>
                                                Your current location will be used to register this business. If this is
                                                not your
                                                place
                                                of business do not submit it.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <div class="col-md-12">
                                            <a href="#" id='save' class="btn btn-success ladda-button normal"
                                               data-style="zoom-in">
                                                Save
                                            </a>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="footer-space"></div>
                <div id="footer">
                    <div class="devider-footer-left"></div>
                    <div class="time">
                        <p id="spanDate"></p>
                        <p id="clock"></p>
                    </div>
                    <div class="copyright">Make with Love
                        <span class="entypo-heart"></span>2014 <a href="http://gamatechno.com">Thesmile</a> All Rights
                        Reserved
                    </div>
                    <div class="devider-footer"></div>

                </div>


            </div>
            <!-- /END OF CONTENT -->


            <!-- FOOTER -->

            <!-- / END OF FOOTER -->
        </div>
        <!--  END OF PAPER WRAP -->

        <!-- RIGHT SLIDER CONTENT -->
        <div class="sb-slidebar sb-right">
            <div style="margin-top:0;" class="right-wrapper">
                <div class="row">
                    <h3>
                        <span><i class="entypo-chat"></i>&nbsp;&nbsp;CHAT</span>
                    </h3>
                    <div class="col-sm-12">
                        <span class="label label-warning label-chat">Online</span>
                        <ul class="chat">
                            <li>
                                <a href="#">
                                    <span>
                                        <img alt="" class="img-chat img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/men/20.jpg">
                                    </span><b>Dave Junior</b>
                                    <br><i>Last seen : 08:00 PM</i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>
                                        <img alt="" class="img-chat img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/men/21.jpg">
                                    </span><b>Kenneth Lucas</b>
                                    <br><i>Last seen : 07:21 PM</i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>
                                        <img alt="" class="img-chat img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/men/22.jpg">
                                    </span><b>Heidi Perez</b>
                                    <br><i>Last seen : 05:43 PM</i>
                                </a>
                            </li>


                        </ul>

                        <span class="label label-chat">Offline</span>
                        <ul class="chat">
                            <li>
                                <a href="#">
                                    <span>
                                        <img alt="" class="img-chat img-offline img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/men/23.jpg">
                                    </span><b>Dave Junior</b>
                                    <br><i>Last seen : 08:00 PM</i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>
                                        <img alt="" class="img-chat img-offline img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/women/24.jpg">
                                    </span><b>Kenneth Lucas</b>
                                    <br><i>Last seen : 07:21 PM</i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>
                                        <img alt="" class="img-chat img-offline img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/men/25.jpg">
                                    </span><b>Heidi Perez</b>
                                    <br><i>Last seen : 05:43 PM</i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>
                                        <img alt="" class="img-chat img-offline img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/women/25.jpg">
                                    </span><b>Kenneth Lucas</b>
                                    <br><i>Last seen : 07:21 PM</i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>
                                        <img alt="" class="img-chat img-offline img-circle"
                                             src="http://api.randomuser.me/portraits/thumb/men/26.jpg">
                                    </span><b>Heidi Perez</b>
                                    <br><i>Last seen : 05:43 PM</i>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- END OF RIGHT SLIDER CONTENT-->


        <!-- MAIN EFFECT -->
        <script type="text/javascript" src="../assets/js/preloader.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="../assets/js/app.js"></script>
        <script type="text/javascript" src="../assets/js/load.js"></script>
        <script>
            var prefix;
        </script>

        <script>
            prefix = window.location.origin + '/auth/';
        </script>

        <script type="text/javascript" src="../assets/js/main.js"></script>

        <!-- Button Styles -->
        <script src="../assets/js/button/ladda/spin.min.js"></script>
        <script src="../assets/js/button/ladda/ladda.min.js"></script>

        <!-- DomManipulation -->
        <script type="text/javascript" src="../js/ui/DomManipulation.js"></script>

        <!-- httpmanager -->
        <script type="text/javascript" src="../js/http/Response.js"></script>
        <script type="text/javascript" src="../js/http/Manager.js"></script>


        <!--Notifications PLUG IN-->
        <script type="text/javascript" src="../assets/js/pnotify/pnotify.custom.min.js"></script>
        <script type="text/javascript" src="../js/ui/Notify.js"></script>
        <script>
            // enable tooltips
            $('.tooltip-me').tooltip();

            // get users location
            // get location
            $.getJSON('http://ipinfo.io', function (data) {
                $('.country').text(data['country']);
                $('.city').text(data['city']);
                $('.region').text(data['region']);
            });
        </script>

        <!-- Form Styles -->
        <!-- /MAIN EFFECT -->
        <script type="text/javascript" src="../assets/js/iCheck/jquery.icheck.js"></script>
        <script type="text/javascript" src="../assets/js/switch/bootstrap-switch.js"></script>
        <script>
            $(document).ready(function () {
                //CHECKBOX PRETTYFY
                $('.skin-flat input').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass   : 'iradio_flat-red'
                });
                $('.skin-line input').each(function () {
                    var self       = $(this),
                        label      = self.next(),
                        label_text = label.text();

                    label.remove();
                    self.iCheck({
                        checkboxClass: 'icheckbox_line-blue',
                        radioClass   : 'iradio_line-blue',
                        insert       : '<div class="icheck_line-icon"></div>' + label_text
                    });
                });
                //Switch Button

                $('.make-switch').bootstrapSwitch('setSizeClass', 'switch-small');
            });
        </script>


        <script type="text/javascript" src="../assets/js/toggle_close.js"></script>
        <script src="../assets/js/footable/js/footable.js?v=2-0-1" type="text/javascript"></script>
        <script src="../assets/js/footable/js/footable.sort.js?v=2-0-1" type="text/javascript"></script>
        <script src="../assets/js/footable/js/footable.filter.js?v=2-0-1" type="text/javascript"></script>

        <script type="text/javascript">
            $(function () {
                $('#footable-res2').footable().bind('footable_filtering', function (e) {
                    var selected = $('.filter-status').find(':selected').text();
                    if (selected && selected.length > 0) {
                        e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                        e.clear = !e.filter;
                    }
                });

                $('.filter-status').change(function (e) {
                    e.preventDefault();
                    $('table.demo').trigger('footable_filter', {
                        filter: $('#filter').val()
                    });
                });
            });


            var tableRows = $('#footable-res2 tr'),
                id = 0;
            tableRows.click(function (e) {
                e.preventDefault();
                tableRows.each(function (index, elem) {
                    elem.style.backgroundColor = '#ffffff';
                });
                var element = $(this);
                element.css('background-color', '#E1F8FA');

                id = element.attr('data-id');


                $('input[name="area"]').val(element.attr('data-area'));
                $('input[name="name"]').val(element.attr('data-name'));
                $('input[name="phone"]').val(element.attr('data-phone'));
                $('input[name="website"]').val(element.attr('data-website'));
                $('textarea[name="desc"]').val(element.attr('data-desc'));
            });


            $('#delete').click(function (e) {
                e.preventDefault();
                var ladda = Ladda.create(document.querySelector('#delete'));
                ladda.start();
                if ($.isNumeric(id)) {
                    var data   = {
                            id: id
                        },
                        manage = HttpManager('locations/index.php');

                    manage.delete(data, function (serverResponse) {
                        var r = Response(serverResponse);
                        if (r.statusOk()) {
                            Notify('Deleted', 'Delete Successful').success();
                            $('tr[data-id=' + id + ']').remove();
                        } else {
                            Notify('Error', 'An error occurred').success();
                        }
                        ladda.stop();
                        ladda.remove();
                    });
                } else {
                    Notify('That\'s A NO NO!', 'Why did you do that?').error();
                    Dom.delay(5000, function () {
                        window.location.reload();
                    });
                }
            });


            var save = $('#save');
            save.click(function (e) {
                e.preventDefault();
                var ladda = Ladda.create(save.get(0));
                ladda.start();

                var data   = {
                        id     : id,
                        area   : $('input[name="area"]').val(),
                        name   : $('input[name="name"]').val(),
                        phone  : $('input[name="phone"]').val(),
                        website: $('input[name="website"]').val(),
                        desc   : $('textarea[name="desc"]').val()
                    },
                    manage = HttpManager('locations/index.php');

                manage.update(data, function (serverResponse) {
                    var response = Response(serverResponse);
                    if (response.statusOk()) {
                        Notify('Updated', 'Location has been updated').success();

                    } else {
                        Notify('Error', 'Something Happened! Try again later or contact support').error();
                    }
                    ladda.stop();
                    ladda.remove();
                });


            });
        </script>


    </body>

</html>
