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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">


        <link rel="stylesheet" href="assets/js/button/ladda/ladda.min.css">


        <!--Button Styles-->
        <link rel="stylesheet" href="assets/js/button/ladda/ladda.min.css">
        <!-- Extra Pages -->
        <link rel="stylesheet" href="assets/css/extra-pages.css">

        <!-- PNotify -->
        <link rel="stylesheet" href="assets/css/pnotify.custom.min.css">

        <!-- Form -->
        <link href="assets/js/iCheck/flat/all.css" rel="stylesheet">
        <link href="assets/js/iCheck/line/all.css" rel="stylesheet">
        <link href="assets/js/colorPicker/bootstrap-colorpicker.css" rel="stylesheet">
        <link href="assets/js/switch/bootstrap-switch.css" rel="stylesheet">
        <link href="assets/js/validate/validate.css" rel="stylesheet">
        <link href="assets/js/idealform/css/jquery.idealforms.css" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/loader-style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">


        
    <style type="text/css">
        canvas#canvas4 {
            position : relative;
            top      : 20px;
        }

        /* Business Card */
        #business-card {
            position      : absolute;
            top           : 175px;
            right         : 0;
            padding-right : 0;
        }

        #business-card .body-nest {
            background-color : #2A4968;
        }

        #business-card #business-card-info {
            color : #FFF;
        }

        @media screen and (min-width : 1650px) {
            .business-info-inline {
                display : none;
            }

            #business-table {
                width : 100%;
            }

        }

        @media screen and (max-width : 1659px) {
            /* Business Card */
            #business-card .col-sm-3 {
                width : 100%;
            }

            #business-table {
                width : 100%;
            }

            #business-card .col-sm-8 {
                width       : 100%;
                margin-left : 0;
                left        : 0;
                margin-top  : 10px
            }

            .business-info-inline {
                display : none;
            }

        }

        @media screen and (max-width : 1125px) {
            /* Business Card */
            #business-card {
                display : none;
            }

            .business-info-inline {
                display : block;
                width: 100%;
                margin-top: 10px;
            }

            .business-info-inline .title-alt {
                margin-top : 0;
            }

            /* Business Card */
            .business-info-inline .col-sm-3 {
                width : 100%;
            }

            .business-info-inline .col-sm-8 {
                width       : 100%;
                margin-left : 0;
                left        : 0;
                margin-top  : 10px
            }

        }
    </style>



        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="assets/ico/minus.png">
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
                                     src="http://api.randomuser.me/portraits/thumb/men/10.jpg">Hi, Dave Mattew <b
                                        class="caret"></b>
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
                                        <a class="tooltip-tip2" href="#" title="Remove Business">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                            <span>Remove Business</span></a>
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
                                
    <i class="icon-window"></i>

                                <span>
                                    
    DASHBOARD

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
                            <div class="devider-vertical visible-lg"></div>
                            <div class="btn-group btn-wigdet pull-right visible-lg">
                                <div class="btn">
                                    
    Filter

                                </div>
                                <button data-toggle="dropdown" class="btn dropdown-toggle" type="button">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                    
<li>
    <a href="#">
        <span class="entypo-plus-circled margin-iconic"></span>All
    </a>
</li>
<li>
    <a href="#">
        <span class="entypo-heart margin-iconic"></span>Resturants</a>
</li>
<li>
    <a href="#">
        <span class="entypo-cog margin-iconic"></span>Small Shops
    </a>
</li>
<li>
    <a href="#">
        <span class="entypo-cog margin-iconic"></span>Groceries
    </a>
</li>
<li>
    <a href="#">
        <span class="entypo-cog margin-iconic"></span>Doubles Vendor
    </a>
</li>
<li>
    <a href="#">
        <span class="entypo-cog margin-iconic"></span>Market
    </a>
</li>
<li>
    <a href="#">
        <span class="entypo-cog margin-iconic"></span>Law / Layer
    </a>
</li>
<li>
    <a href="#">
        <span class="entypo-cog margin-iconic"></span>Animal
    </a>
</li>
<li>
    <a href="#">
        <span class="entypo-cog margin-iconic"></span>Car Dealers
    </a>
</li>
<li>
    <a href="#">
        <span class="entypo-cog margin-iconic"></span>Auto Repairs
    </a>
</li>

                                </ul>
                            </div>


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

                            <input style="border-radius:15px" type="text" placeholder="Search..." class="form-control">
                        </div>
                    </li>
                </ul>

                <!-- END OF BREADCRUMB -->

                <!-- BLANK PAGE-->

                
    <div id="paper-middle">
        <div id="mapContainer"></div>
    </div>
    <div class="content-wrap">
        <div class="row">
            <div class="col-sm-8" id="business-table">
                <div id="siteClose" class="nest">
                    <div class="title-alt" style="margin-top: 0;">
                        <h6>
                            <span class="fa fa-building"></span>
                            &nbsp; Top Rated Businesses
                        </h6>

                        <div class="titleToggle">
                            <a class="nav-toggle-alt" href="#site">
                                <span class="entypo-up-open"></span>
                            </a>
                        </div>
                    </div>
                    <div id="site" class="body-nest" style="min-height:296px;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="#" class="tooltip-me" data-toggle="tooltip"
                                               data-placement="right"
                                               title="Types of business are dependent on your favourites. You can click load more, to load more types of businesses">
                                                Type
                                            </a>
                                        </th>
                                        <th>

                                            <a href="#" class="tooltip-me" data-toggle="tooltip"
                                               data-placement="right"
                                               title="Most Popular Business in this category">
                                                Popular
                                            </a>
                                        </th>
                                        <th>

                                            <a href="#" class="tooltip-me" data-toggle="tooltip"
                                               data-placement="right"
                                               title="Total Amount of this type of business within Trinidad">
                                                Businesses
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="armada-devider">
                                            <div class="armada">
                                                        <span style="background:#65C3DF">

                                                                <span class="">
                                                                    <i class="fa fa-cutlery"
                                                                       aria-hidden="true"></i>
                                                                </span>
                                                                &nbsp;&nbsp;Restaurants
                                                        </span>
                                                <p>
                                                    <span class="fa fa-thumbs-up"></span>
                                                    &nbsp;600 <i>Likes</i>
                                                </p>
                                            </div>
                                        </td>
                                        <td class="driver-devider">
                                            <img class="armada-pic img-circle" alt=""
                                                 src="http://api.randomuser.me/portraits/thumb/men/14.jpg">
                                            <h3>Seafood Cusinee</h3>
                                            <br>
                                            <p>Arouca</p>
                                        </td>
                                        <td class="progress-devider">
                                            <section id="basic">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success"
                                                         role="progressbar" aria-valuenow="40"
                                                         aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 40%">
                                                        <span class="pull-right">40%</span>
                                                    </div>
                                                </div>
                                            </section>
                                            <span class="label pull-left">Total Restaurants</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="armada-devider">
                                            <div class="armada">
                                                        <span style="background:#45B6B0">
                                                            <span class=""><i class="fa fa-paw" aria-hidden="true"></i></span>&nbsp;&nbsp; Pet Stores</span>
                                                <p>
                                                    <span class="fa fa-thumbs-up"></span>
                                                    &nbsp;500 <i>Likes</i>
                                                </p>
                                            </div>
                                        </td>
                                        <td class="driver-devider">
                                            <img class="armada-pic img-circle" alt=""
                                                 src="http://api.randomuser.me/portraits/thumb/men/38.jpg">
                                            <h3>D&S Pets </h3>
                                            <br>
                                            <p>San Fernando</p>
                                        </td>
                                        <td class="progress-devider">

                                            <section id="percentage">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success"
                                                         role="progressbar" aria-valuenow="60"
                                                         aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 60%">
                                                        <span class="pull-right">60%</span>
                                                    </div>
                                                </div>
                                            </section>
                                            <span class="label pull-left">Total Pet Shops</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="armada-devider">
                                            <div class="armada">
                                                        <span style="background:#FF6B6B">
                                                            <span class="">
                                                                <i class="fa fa-credit-card-alt" aria-hidden="true"></i></span>
                                                            &nbsp;&nbsp;Atm</span>
                                                <p>
                                                    <span class="fa fa-thumbs-up"></span>
                                                    &nbsp;500 <i>Likes</i>
                                                </p>
                                            </div>
                                        </td>
                                        <td class="driver-devider">
                                            <img class="armada-pic img-circle" alt=""
                                                 src="http://api.randomuser.me/portraits/thumb/men/39.jpg">
                                            <h3>ATM</h3>
                                            <br>
                                            <p>Freeport</p>
                                        </td>
                                        <td class="progress-devider">

                                            <section id="step">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success"
                                                         role="progressbar" aria-valuenow="60"
                                                         aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 30%">
                                                        <span class="pull-right">30%</span>
                                                    </div>
                                                </div>
                                            </section>

                                            <span class="label pull-left">Total ATM'S</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row text-center">
                            <button data-style="zoom-in" class="btn btn btn-primary ladda-button"
                                    type="submit">
                                Load More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 business-info-inline">
                <div id="RealTimeClose" class="nest">
                    <div class="title-alt">

                        <h6>
                            <span class=""><i class="fa fa-info" aria-hidden="true"></i></span>&nbsp;Business
                            Information</h6>
                        <div class="titleToggle">
                            <a class="nav-toggle-alt" href="#RealTime">
                                <span class="entypo-up-open"></span>
                            </a>
                        </div>
                    </div>
                    <div id="RealTime" style="min-height:296px;padding-top:20px;" class="body-nest">
                        <div class="row" style="margin-top: 5px">
                            <div class="btn-group" style="width: 100%; margin-left: 10px">
                                <div>
                                    <a href="#" class="tooltip-me text-white btn btn-default"
                                       data-toggle="tooltip"
                                       data-placement="top" title="Visit TimeLine">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="tooltip-me text-white btn btn-warning"
                                       data-toggle="tooltip"
                                       data-placement="top" title="Report as Spam">
                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="tooltip-me text-white btn btn-success"
                                       data-toggle="tooltip"
                                       data-placement="top" title="Favourite this place">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </a>

                                    <a style="margin-right: 20px" href="#"
                                       class="tooltip-me text-white btn btn-danger pull-right"
                                       data-toggle="tooltip"
                                       data-placement="top" title="Connect with Business">
                                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row" style="padding: 10px; color: #5BC0DE">
                            <div class="col-sm-3"
                                 style="">
                                <h4 style="margin-bottom: 5px; font-weight: bold;">Area</h4>
                                <p style="color: #5BC0DE; padding: 0">
                                    Arouca
                                </p>
                                <h4 style="margin-bottom: 5px; font-weight: bold;">Phone</h4>
                                <p style="color: #5BC0DE; padding: 0">
                                    123-4567
                                </p>
                                <h4 style="margin-bottom: 5px; font-weight: bold;">Website</h4>
                                <p style="color: #5BC0DE; padding: 0">
                                    http://example.com
                                </p>
                            </div>
                            <div class="col-sm-8 col-sm-push-1"
                                 style="background: #F0F0F0; color: #5BC0DE; padding: 5px; border-radius: 5px">
                                <h4 style="margin-bottom: 5px;  font-weight: bold;">Description</h4>
                                <p style="color: #5BC0DE; padding: 0">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta
                                    explicabo nihil
                                    obcaecati odio perferendis sit. Aut iusto laudantium molestiae molestias
                                    nisi similique.
                                    Dolorum illo molestiae nihil non suscipit voluptate!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrap">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
        </div>
        <!-- /END OF CONTENT -->


        <!-- FOOTER -->
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

        <!-- / END OF FOOTER -->


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

        
    <!-- Business Information Card-->
    <div id="business-card" class="col-sm-4">
        <div id="business-card-container" class="nest">
            <div class="title-alt" style="margin-top: 0;">
                <h6>
                    <span class=""><i class="fa fa-info" aria-hidden="true"></i></span>&nbsp;Business
                    Information</h6>
                <div class="titleToggle">
                    <a class="nav-toggle-alt" href="#business-card-info">
                        <span class="entypo-up-open"></span>
                    </a>
                </div>
            </div>
            <div id="business-card-info" style="min-height:296px;padding-top:0;display: none" class="body-nest">
                <div class="row text-center bg-info" style="color: #FFF">
                    <h4>Seafood Cusine</h4>
                </div>
                <div class="row" style="margin-top: 5px">
                    <div class="btn-group" style="width: 100%; margin-left: 10px">
                        <div>
                            <a href="#" class="tooltip-me text-white btn btn-default"
                               data-toggle="tooltip"
                               data-placement="top" title="More Info">
                                <i class="fa fa-info" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="tooltip-me text-white btn btn-warning"
                               data-toggle="tooltip"
                               data-placement="top" title="Report as Spam">
                                <i class="fa fa-ban" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="tooltip-me text-white btn btn-success"
                               data-toggle="tooltip"
                               data-placement="top" title="Favourite this place">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </a>

                            <a style="margin-right: 20px" href="#"
                               class="tooltip-me text-white btn btn-danger pull-right"
                               data-toggle="tooltip"
                               data-placement="top" title="Connect with Business">
                                <i class="fa fa-comments-o" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="business-info row" style="padding: 10px; color: #5BC0DE">
                    <div class="col-sm-3"
                         style="background: #F0F0F0; color: #5BC0DE; padding: 5px; border-radius: 5px">
                        <h4 style="margin-bottom: 5px; font-weight: bold;">Area</h4>
                        <p style="color: #5BC0DE; padding: 0">
                            Arouca
                        </p>
                        <h4 style="margin-bottom: 5px; font-weight: bold;">Phone</h4>
                        <p style="color: #5BC0DE; padding: 0">
                            123-4567
                        </p>
                        <h4 style="margin-bottom: 5px; font-weight: bold;">Website</h4>
                        <p style="color: #5BC0DE; padding: 0">
                            http://example.com
                        </p>
                    </div>
                    <div class="col-sm-8 col-sm-push-1"
                         style="background: #F0F0F0; color: #5BC0DE; padding: 5px; border-radius: 5px">
                        <h4 style="margin-bottom: 5px;  font-weight: bold;">Description</h4>
                        <p style="color: #5BC0DE; padding: 0">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta explicabo nihil
                            obcaecati odio perferendis sit. Aut iusto laudantium molestiae molestias nisi similique.
                            Dolorum illo molestiae nihil non suscipit voluptate!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



        <!-- MAIN EFFECT -->
        <script type="text/javascript" src="assets/js/preloader.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/load.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>

        <!-- Button Styles -->
        <script src="assets/js/button/ladda/spin.min.js"></script>
        <script src="assets/js/button/ladda/ladda.min.js"></script>

        <!--Notifications PLUG IN-->
        <script type="text/javascript" src="assets/js/pnotify/pnotify.custom.min.js"></script>
        <script type="text/javascript" src="js/classes/Notify.js"></script>
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
        <script type="text/javascript" src="assets/js/iCheck/jquery.icheck.js"></script>
        <script type="text/javascript" src="assets/js/switch/bootstrap-switch.js"></script>
        <script>
            $(document).ready(function() {
                //CHECKBOX PRETTYFY
                $('.skin-flat input').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });
                $('.skin-line input').each(function() {
                    var self = $(this),
                        label = self.next(),
                        label_text = label.text();

                    label.remove();
                    self.iCheck({
                        checkboxClass: 'icheckbox_line-blue',
                        radioClass: 'iradio_line-blue',
                        insert: '<div class="icheck_line-icon"></div>' + label_text
                    });
                });
                //Switch Button

                $('.make-switch').bootstrapSwitch('setSizeClass', 'switch-small');
            });
        </script>

        
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBu8QNl3aC1KLq9J_KnNHauIZvfRsQTSlg"
        type="text/javascript">
</script>
<script src="js/components/GoogleMaps.js"></script>
<script src="js/components/Location.js"></script>

    <script src="js/dashboard.js"></script>


    </body>

</html>
