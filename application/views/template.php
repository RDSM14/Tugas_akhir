<!-- HEADER ATAS-->
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
    <!--<![endif]-->

    <head>
        <title>SISFO AKADEMIK</title>
        <link rel="shortcut icon" href="favicon.ico" />
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="Responsive Admin Template build with Twitter Bootstrap and jQuery" name="description" />
        <meta content="ClipTheme" name="author" />
        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <link href="<?php echo base_url();?>template/font-awesome/css/css.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url();?>template/font-awesome/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url();?>template/font-awesome/css/font-awesome.min.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url();?>template/font-awesome/css/clip-font.min.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url();?>template/font-awesome/css/all.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url();?>template/font-awesome/css/perfect-scrollbar.min.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url();?>template/font-awesome/css/sweetalert.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url();?>template/font-awesome/css/main.min.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url();?>template/font-awesome/css/main-responsive.min.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url();?>template/font-awesome/css/print.min.css" rel='stylesheet' type='text/css' media="print" />
        <link href="<?php echo base_url();?>template/font-awesome/css/light.min.css" rel='stylesheet' id="skin_color" type='text/css' />
        <script src="<?php echo base_url();?>template/font-awesome/js/jquery.min.js"> </script>
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        
        <link href="<?php echo base_url();?>template/font-awesome/css/fullcalendar.min.css" rel='stylesheet' type='text/css' />
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>

    <body>

        <!-- start: HEADER -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <!-- start: TOP NAVIGATION CONTAINER -->
            <div class="container">
                <div class="navbar-header">
                    <!-- start: RESPONSIVE MENU TOGGLER -->
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="clip-list-2"></span>
                    </button>
                    <!-- end: RESPONSIVE MENU TOGGLER -->
                    <!-- start: LOGO -->
                    <a class="navbar-brand" href="index.html">
                        SISFO AKADEMIK
                    </a>
                    <!-- end: LOGO -->
                </div>
                <div class="navbar-tools">
                    <!-- start: TOP NAVIGATION MENU -->
                    <ul class="nav navbar-right">
                        <!-- start: TO-DO DROPDOWN --><?php /*
                        <li class="dropdown">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <span class="badge"> 12</span>
                            </a>
                            <ul class="dropdown-menu todo">
                                <li>
                                    <span class="dropdown-menu-title"> You have 12 pending tasks</span>
                                </li>
                                <li>
                                    <div class="drop-down-wrapper">
                                        <ul>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="fa fa-square-o"></i>
                                                    <span class="desc" style="opacity: 1; text-decoration: none;">Staff Meeting</span>
                                                    <span class="label label-danger" style="opacity: 1;"> today</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="fa fa-square-o"></i>
                                                    <span class="desc" style="opacity: 1; text-decoration: none;"> New frontend layout</span>
                                                    <span class="label label-danger" style="opacity: 1;"> today</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="fa fa-square-o"></i>
                                                    <span class="desc"> Hire developers</span>
                                                    <span class="label label-warning"> tommorow</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="fa fa-square-o"></i>
                                                    <span class="desc">Staff Meeting</span>
                                                    <span class="label label-warning"> tommorow</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="fa fa-square-o"></i>
                                                    <span class="desc"> New frontend layout</span>
                                                    <span class="label label-success"> this week</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="fa fa-square-o"></i>
                                                    <span class="desc"> Hire developers</span>
                                                    <span class="label label-success"> this week</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="fa fa-square-o"></i>
                                                    <span class="desc"> New frontend layout</span>
                                                    <span class="label label-info"> this month</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="fa fa-square-o"></i>
                                                    <span class="desc"> Hire developers</span>
                                                    <span class="label label-info"> this month</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="fa fa-square-o"></i>
                                                    <span class="desc" style="opacity: 1; text-decoration: none;">Staff Meeting</span>
                                                    <span class="label label-danger" style="opacity: 1;"> today</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="fa fa-square-o"></i>
                                                    <span class="desc" style="opacity: 1; text-decoration: none;"> New frontend layout</span>
                                                    <span class="label label-danger" style="opacity: 1;"> today</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="todo-actions" href="javascript:void(0)">
                                                    <i class="fa fa-square-o"></i>
                                                    <span class="desc"> Hire developers</span>
                                                    <span class="label label-warning"> tommorow</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="view-all">
                                    <a href="javascript:void(0)">
                                        See all tasks <i class="fa fa-arrow-circle-o-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end: TO-DO DROPDOWN-->
                        <!-- start: NOTIFICATION DROPDOWN --><?php /*
                        <li class="dropdown">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                                <i class="fa fa-map-o" aria-hidden="true"></i>
                                <span class="badge"> 11</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li>
                                    <span class="dropdown-menu-title"> You have 11 notifications</span>
                                </li>
                                <li>
                                    <div class="drop-down-wrapper">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-primary"><i class="fa fa-user"></i></span>
                                                    <span class="message"> New user registration</span>
                                                    <span class="time"> 1 min</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> 7 min</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> 8 min</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> 16 min</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-primary"><i class="fa fa-user"></i></span>
                                                    <span class="message"> New user registration</span>
                                                    <span class="time"> 36 min</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-warning"><i class="fa fa-shopping-cart"></i></span>
                                                    <span class="message"> 2 items sold</span>
                                                    <span class="time"> 1 hour</span>
                                                </a>
                                            </li>
                                            <li class="warning">
                                                <a href="javascript:void(0)">
                                                    <span class="label label-danger"><i class="fa fa-user"></i></span>
                                                    <span class="message"> User deleted account</span>
                                                    <span class="time"> 2 hour</span>
                                                </a>
                                            </li>
                                            <li class="warning">
                                                <a href="javascript:void(0)">
                                                    <span class="label label-danger"><i class="fa fa-shopping-cart"></i></span>
                                                    <span class="message"> Transaction was canceled</span>
                                                    <span class="time"> 6 hour</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> yesterday</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-primary"><i class="fa fa-user"></i></span>
                                                    <span class="message"> New user registration</span>
                                                    <span class="time"> yesterday</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-primary"><i class="fa fa-user"></i></span>
                                                    <span class="message"> New user registration</span>
                                                    <span class="time"> yesterday</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> yesterday</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                    <span class="message"> New comment</span>
                                                    <span class="time"> yesterday</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="view-all">
                                    <a href="javascript:void(0)">
                                        See all notifications <i class="fa fa-arrow-circle-o-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end: NOTIFICATION DROPDOWN -->
                        <!-- start: MESSAGE DROPDOWN --><?php /*
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">
                                <i class="fa fa-wifi" aria-hidden="true"></i>
                                <span class="badge"> 9</span>
                            </a>
                            <ul class="dropdown-menu posts">
                                <li>
                                    <span class="dropdown-menu-title"> You have 9 messages</span>
                                </li>
                                <li>
                                    <div class="drop-down-wrapper">
                                        <ul>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="clearfix">
                                                        <div class="thread-image">
                                                            <img alt="" src="http://clipone.nurisakbar.com/assets/images/avatar-2.jpg">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">Nicole Bell</span>
                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                            <span class="time"> Just Now</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="clearfix">
                                                        <div class="thread-image">
                                                            <img alt="" src="http://clipone.nurisakbar.com/assets/images/avatar-1.jpg">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">Peter Clark</span>
                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                            <span class="time">2 mins</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="clearfix">
                                                        <div class="thread-image">
                                                            <img alt="" src="http://clipone.nurisakbar.com/assets/images/avatar-3.jpg">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">Steven Thompson</span>
                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                            <span class="time">8 hrs</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="clearfix">
                                                        <div class="thread-image">
                                                            <img alt="" src="http://clipone.nurisakbar.com/assets/images/avatar-1.jpg">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">Peter Clark</span>
                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                            <span class="time">9 hrs</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="clearfix">
                                                        <div class="thread-image">
                                                            <img alt="" src="http://clipone.nurisakbar.com/assets/images/avatar-5.jpg">
                                                        </div>
                                                        <div class="thread-content">
                                                            <span class="author">Kenneth Ross</span>
                                                            <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</span>
                                                            <span class="time">14 hrs</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="view-all">
                                    <a href="pages_messages.html">
                                        See all messages <i class="fa fa-arrow-circle-o-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>*/ ?>
                        <!-- end: MESSAGE DROPDOWN -->
                        <!-- start: USER DROPDOWN -->
                        <li class="dropdown current-user">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                                <img src="http://clipone.nurisakbar.com/assets/images/avatar-1-small.jpg" class="circle-img" alt="">
                                <span class="username"><?php echo $this->session->userdata('nama_lengkap') ?></span>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <?php
                                    echo anchor('auth/profile/'.$_SESSION['username'].'/'.$_SESSION['id_level_user'], '<i class="fa fa-user" aria-hidden="true"></i> &nbsp;My Profile');
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo anchor('auth/password/'.$_SESSION['username'].'/'.$_SESSION['id_level_user'], '<i class="fa fa-key" aria-hidden="true"></i> &nbsp;Password');
                                    ?>
                                </li>
                                <li>

                                    <?php
                                    echo anchor('auth/logout', '<i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Log Out');
                                    ?>

                                </li>
                            </ul>
                        </li>
                        <!-- end: USER DROPDOWN -->
                        <!-- start: PAGE SIDEBAR TOGGLE 
                        <li>
                            <a class="sb-toggle" href="#"><i class="fa fa-outdent"></i></a>
                        </li>
                        <!-- end: PAGE SIDEBAR TOGGLE -->
                    </ul>
                    <!-- end: TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- end: TOP NAVIGATION CONTAINER -->
        </div>
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="navbar-content">
                <!-- start: SIDEBAR -->
                <div class="main-navigation navbar-collapse collapse">
                    <!-- start: MAIN MENU TOGGLER BUTTON -->
                    <div class="navigation-toggler">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>  
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                    <!-- end: MAIN MENU TOGGLER BUTTON -->
                    <!-- start: MAIN NAVIGATION MENU -->
                    <ul class="main-navigation-menu">
                        <!--header-->
                        <!-- ini area menu dinamis --->

                        <?php
                        $id_level_user = $this->session->userdata('id_level_user');
                        $id_sekolah = $this->session->userdata('id_sekolah');
                        if($id_level_user != '2'){
                            $sql_menu = "SELECT * FROM tabel_menu WHERE id in(select id_menu from tbl_user_rule where id_level_user=$id_level_user AND id_sekolah=$id_sekolah) and is_main_menu=0";
                            $main_menu = $this->db->query($sql_menu)->result();
                            foreach ($main_menu as $main) {
                                // chek apakah ada submenu ?
                                $submenu = $this->db->get_where('tabel_menu', array('is_main_menu' => $main->id));
                                if ($submenu->num_rows() > 0) {
                                    // tampilkan submenu disini
                                    echo "<li>
                                        <a href='javascript:void(0)'>
                                        <i class='" . $main->icon . "'></i>
                                        <span class='title'> " . strtoupper($main->nama_menu) . " </span>
                                        <i class='fa fa-angle-down' aria-hidden='true'></i>
                                        <span class='selected'></span>
                                        </a>
                                        <ul class='sub-menu'>";
                                    foreach ($submenu->result() as $sub) {
                                        echo "<li>" . anchor($sub->link, "<i class='" . $sub->icon . "'></i><span class='title'> " . strtoupper($sub->nama_menu)) . "</span></li>";
                                    }

                                    echo"</ul>
                                        </li>";
                                } else {
                                    // tampilkan main menu
                                    echo "<li>" . anchor($main->link, "<i class='" . $main->icon . "'></i><span class='title'>" . strtoupper($main->nama_menu)) . "</span></li>";
                                }
                            }
                        }
                        else{
                            $sql_menu = "SELECT * FROM tabel_menu WHERE is_main_menu=0";
                            $main_menu = $this->db->query($sql_menu)->result();
                            foreach ($main_menu as $main) {
                                // chek apakah ada submenu ?
                                $submenu = $this->db->get_where('tabel_menu', array('is_main_menu' => $main->id));
                                if ($submenu->num_rows() > 0) {
                                    // tampilkan submenu disini
                                    echo "<li>
                                        <a href='javascript:void(0)'>
                                        <i class='" . $main->icon . "'></i>
                                        <span class='title'> " . strtoupper($main->nama_menu) . " </span>
                                        <i class='fa fa-angle-down' aria-hidden='true'></i>
                                        <span class='selected'></span>
                                        </a>
                                        <ul class='sub-menu'>";
                                    foreach ($submenu->result() as $sub) {
                                        echo "<li>" . anchor($sub->link, "<i class='" . $sub->icon . "'></i><span class='title'> " . strtoupper($sub->nama_menu)) . "</span></li>";
                                    }

                                    echo"</ul>
                                        </li>";
                                } else {
                                    // tampilkan main menu
                                    echo "<li>" . anchor($main->link, "<i class='" . $main->icon . "'></i><span class='title'>" . strtoupper($main->nama_menu)) . "</span></li>";
                                }
                            }
                            
                            
                            
                        }
                        ?>
                        
                        <!--<li class="active_open"><a href="<?php echo base_url() ?>/auth/logout"><i class="fa fa-sign-out"></i><span class="title">LOGOUT</span></a></li>-->

                    </ul>
                    <!-- end: MAIN NAVIGATION MENU -->
                </div>
                <!-- end: SIDEBAR -->
            </div>

            <!-- start: PAGE -->
            <div class="main-content">
                <!-- start: PANEL CONFIGURATION MODAL FORM -->
                <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                                <h4 class="modal-title">Panel Configuration</h4>
                            </div>
                            <div class="modal-body">
                                Here will be a configuration form
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">
                                    Save changes
                                </button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: STYLE SELECTOR BOX -->
                            <div id="style_selector" class="hidden-xs close-style">
                                <div id="style_selector_container" style="display:block">
                                    <div class="style-main-title">
                                        Style Selector
                                    </div>
                                    <div class="box-title">
                                        Choose Your Layout Style
                                    </div>
                                    <div class="input-box">
                                        <div class="input">
                                            <select name="layout">
                                                <option value="default">Wide</option>
                                                <option value="boxed">Boxed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-title">
                                        Choose Your Orientation
                                    </div>
                                    <div class="input-box">
                                        <div class="input">
                                            <select name="orientation">
                                                <option value="default">Default</option>
                                                <option value="rtl">RTL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-title">
                                        Choose Your Header Style
                                    </div>
                                    <div class="input-box">
                                        <div class="input">
                                            <select name="header">
                                                <option value="fixed">Fixed</option>
                                                <option value="default">Default</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-title">
                                        Choose Your Footer Style
                                    </div>
                                    <div class="input-box">
                                        <div class="input">
                                            <select name="footer">
                                                <option value="default">Default</option>
                                                <option value="fixed">Fixed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-title">
                                        Backgrounds for Boxed Version
                                    </div>
                                    <div class="images boxed-patterns">
                                        <a id="bg_style_1" href="#"><img alt="" src="http://clipone.nurisakbar.com/assets/images/bg.png"></a>
                                        <a id="bg_style_2" href="#"><img alt="" src="http://clipone.nurisakbar.com/assets/images/bg_2.png"></a>
                                        <a id="bg_style_3" href="#"><img alt="" src="http://clipone.nurisakbar.com/assets/images/bg_3.png"></a>
                                        <a id="bg_style_4" href="#"><img alt="" src="http://clipone.nurisakbar.com/assets/images/bg_4.png"></a>
                                        <a id="bg_style_5" href="#"><img alt="" src="http://clipone.nurisakbar.com/assets/images/bg_5.png"></a>
                                    </div>
                                    <div class="box-title">
                                        5 Predefined Color Schemes
                                    </div>
                                    <div class="images icons-color">
                                        <a id="light" href="#"><img class="active" alt="" src="http://clipone.nurisakbar.com/assets/images/lightgrey.png"></a>
                                        <a id="dark" href="#"><img alt="" src="http://clipone.nurisakbar.com/assets/images/darkgrey.png"></a>
                                        <a id="black-and-white" href="#"><img alt="" src="http://clipone.nurisakbar.com/assets/images/blackandwhite.png"></a>
                                        <a id="navy" href="#"><img alt="" src="http://clipone.nurisakbar.com/assets/images/navy.png"></a>
                                        <a id="green" href="#"><img alt="" src="http://clipone.nurisakbar.com/assets/images/green.png"></a>
                                    </div>
                                    <div style="height:25px;line-height:25px; text-align: center">
                                        <a class="clear_style" href="#">
                                            Clear Styles
                                        </a>
                                        <a class="save_style" href="#">
                                            Save Styles
                                        </a>
                                    </div>
                                </div>
                                <div class="style-toggle open">
                                    <i class="fa fa-cog fa-spin"></i>
                                </div>
                            </div>
                            <!-- end: STYLE SELECTOR BOX -->
                            <!-- start: PAGE TITLE & BREADCRUMB 
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li class="active">
                                    Dashboard
                                </li>
                                <li class="search-box">
                                    <form class="sidebar-search">
                                        <div class="form-group">
                                            <input type="text" placeholder="Start Searching...">
                                            <button class="submit">
                                                <i class="clip-search-3"></i>
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ol>-->
                            <div class="page-header">
                                <h1>Dashboard <small>overview &amp; stats </small></h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                    </div>
                    <!-- end: PAGE HEADER -->
                    <!-- start: PAGE CONTENT -->
                    <div class="row">



                        <?php echo $contents; ?>

                        <!-- end: PAGE CONTENT-->
                    </div>
                </div>
                <!-- end: PAGE -->
            </div>
            <!-- end: MAIN CONTAINER -->
            <!-- start: FOOTER -->
            <!--<div class="footer clearfix">
                <div class="footer-inner">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> 
                </div>
                <div class="footer-items">
                    <span class="go-top"><i class="clip-chevron-up"></i></span>
                </div>
            </div>
            <!-- end: FOOTER -->
            <!-- start: RIGHT SIDEBAR -->
            <div id="page-sidebar">
                <a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
                <div class="sidebar-wrapper">
                    <ul class="nav nav-tabs nav-justified" id="sidebar-tab">
                        <li class="active">
                            <a href="#users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a>
                        </li>
                        <li>
                            <a href="#favorites" role="tab" data-toggle="tab"><i class="fa fa-heart"></i></a>
                        </li>
                        <li>
                            <a href="#settings" role="tab" data-toggle="tab"><i class="fa fa-gear"></i></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="users">
                            <div class="users-list">
                                <h5 class="sidebar-title">On-line</h5>
                                <ul class="media-list">
                                    <li class="media">
                                        <a href="#">
                                            <i class="fa fa-circle status-online"></i>
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-2.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Nicole Bell</h4>
                                                <span> Content Designer </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <div class="user-label">
                                                <span class="label label-success">3</span>
                                            </div>
                                            <i class="fa fa-circle status-online"></i>
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-3.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Steven Thompson</h4>
                                                <span> Visual Designer </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <i class="fa fa-circle status-online"></i>
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-4.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ella Patterson</h4>
                                                <span> Web Editor </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <i class="fa fa-circle status-online"></i>
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-5.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Kenneth Ross</h4>
                                                <span> Senior Designer </span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <h5 class="sidebar-title">Off-line</h5>
                                <ul class="media-list">
                                    <li class="media">
                                        <a href="#">
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-6.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Nicole Bell</h4>
                                                <span> Content Designer </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <div class="user-label">
                                                <span class="label label-success">3</span>
                                            </div>
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-7.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Steven Thompson</h4>
                                                <span> Visual Designer </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-8.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ella Patterson</h4>
                                                <span> Web Editor </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-9.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Kenneth Ross</h4>
                                                <span> Senior Designer </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-10.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ella Patterson</h4>
                                                <span> Web Editor </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-5.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Kenneth Ross</h4>
                                                <span> Senior Designer </span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="user-chat">
                                <div class="sidebar-content">
                                    <a class="sidebar-back" href="#"><i class="fa fa-chevron-circle-left"></i> Back</a>
                                </div>
                                <div class="user-chat-form sidebar-content">
                                    <div class="input-group">
                                        <input type="text" placeholder="Type a message here..." class="form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ol class="discussion sidebar-content">
                                    <li class="other">
                                        <div class="avatar">
                                            <img src="http://clipone.nurisakbar.com/assets/images/avatar-4.jpg" alt="">
                                        </div>
                                        <div class="messages">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            </p>
                                            <span class="time"> 51 min </span>
                                        </div>
                                    </li>
                                    <li class="self">
                                        <div class="avatar">
                                            <img src="http://clipone.nurisakbar.com/assets/images/avatar-1.jpg" alt="">
                                        </div>
                                        <div class="messages">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            </p>
                                            <span class="time"> 37 mins </span>
                                        </div>
                                    </li>
                                    <li class="other">
                                        <div class="avatar">
                                            <img src="http://clipone.nurisakbar.com/assets/images/avatar-4.jpg" alt="">
                                        </div>
                                        <div class="messages">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            </p>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="tab-pane" id="favorites">
                            <div class="users-list">
                                <h5 class="sidebar-title">Favorites</h5>
                                <ul class="media-list">
                                    <li class="media">
                                        <a href="#">
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-7.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Nicole Bell</h4>
                                                <span> Content Designer </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <div class="user-label">
                                                <span class="label label-success">3</span>
                                            </div>
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-6.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Steven Thompson</h4>
                                                <span> Visual Designer </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-10.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ella Patterson</h4>
                                                <span> Web Editor </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-2.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Kenneth Ross</h4>
                                                <span> Senior Designer </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-4.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Ella Patterson</h4>
                                                <span> Web Editor </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="media">
                                        <a href="#">
                                            <img alt="..." src="http://clipone.nurisakbar.com/assets/images/avatar-5.jpg" class="media-object">
                                            <div class="media-body">
                                                <h4 class="media-heading">Kenneth Ross</h4>
                                                <span> Senior Designer </span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="user-chat">
                                <div class="sidebar-content">
                                    <a class="sidebar-back" href="#"><i class="fa fa-chevron-circle-left"></i> Back</a>
                                </div>
                                <ol class="discussion sidebar-content">
                                    <li class="other">
                                        <div class="avatar">
                                            <img src="http://clipone.nurisakbar.com/assets/images/avatar-4.jpg" alt="">
                                        </div>
                                        <div class="messages">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            </p>
                                            <span class="time"> 51 min </span>
                                        </div>
                                    </li>
                                    <li class="self">
                                        <div class="avatar">
                                            <img src="http://clipone.nurisakbar.com/assets/images/avatar-1.jpg" alt="">
                                        </div>
                                        <div class="messages">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            </p>
                                            <span class="time"> 37 mins </span>
                                        </div>
                                    </li>
                                    <li class="other">
                                        <div class="avatar">
                                            <img src="http://clipone.nurisakbar.com/assets/images/avatar-4.jpg" alt="">
                                        </div>
                                        <div class="messages">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            </p>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            <h5 class="sidebar-title">General Settings</h5>
                            <ul class="media-list">
                                <li class="media">
                                    <div class="checkbox sidebar-content">
                                        <label>
                                            <input type="checkbox" value="" class="green" checked="checked">
                                            Enable Notifications
                                        </label>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="checkbox sidebar-content">
                                        <label>
                                            <input type="checkbox" value="" class="green" checked="checked">
                                            Show your E-mail
                                        </label>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="checkbox sidebar-content">
                                        <label>
                                            <input type="checkbox" value="" class="green">
                                            Show Offline Users
                                        </label>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="checkbox sidebar-content">
                                        <label>
                                            <input type="checkbox" value="" class="green" checked="checked">
                                            E-mail Alerts
                                        </label>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="checkbox sidebar-content">
                                        <label>
                                            <input type="checkbox" value="" class="green">
                                            SMS Alerts
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <div class="sidebar-content">
                                <button class="btn btn-success">
                                    <i class="icon-settings"></i> Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: RIGHT SIDEBAR -->
            <div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title">Event Management</h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                                Close
                            </button>
                            <button type="button" class="btn btn-danger remove-event no-display">
                                <i class='fa fa-trash-o'></i> Delete Event
                            </button>
                            <button type='submit' class='btn btn-success save-event'>
                                <i class='fa fa-check'></i> Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- start: MAIN JAVASCRIPTS -->
            <!--[if lt IE 9]>
                <script src="http://clipone.nurisakbar.com/bower_components/respond/dest/respond.min.js"></script>
                <script src="http://clipone.nurisakbar.com/bower_components/Flot/excanvas.min.js"></script>
                <script src="http://clipone.nurisakbar.com/bower_components/jquery-1.x/dist/jquery.min.js"></script>
                <![endif]-->
            <!--[if gte IE 9]><!-->
            
            <script src="<?php echo base_url();?>template/font-awesome/js/bootstrap.min.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/bootstrap-hover-dropdown.min.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/jquery.blockUI.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/icheck.min.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/perfect-scrollbar.jquery.min.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/jquery.cookie.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/sweetalert.min.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/main.min.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/jquery.flot.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/jquery.flot.pie.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/jquery.flot.resize.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/jquery.sparkline.min.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/jquery.easypiechart.min.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/jquery.ui.touch-punch.min.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/moment.min.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/fullcalendar.min.js"> </script>
            <script src="<?php echo base_url();?>template/font-awesome/js/index.min.js"> </script>
            
            
            
            
            
            
            
            
            
            
            <!--
            <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/bootstrap/dist/js/"></script>
            <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/bootstrap-hover-dropdown/"></script>
            <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/blockUI/"></script>
            <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/iCheck/"></script>
            <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/perfect-scrollbar/js/min/"></script>
            <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/jquery.cookie/"></script>
            <script type="text/javascript" src="http://clipone.nurisakbar.com/bower_components/sweetalert/dist/"></script>
            <script type="text/javascript" src="http://clipone.nurisakbar.com/assets/js/min/"></script>
            <!-- end: MAIN JAVASCRIPTS
            <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY 
            <script src="http://clipone.nurisakbar.com/bower_components/Flot/"></script>
            <script src="http://clipone.nurisakbar.com/bower_components/Flot/"></script>
            <script src="http://clipone.nurisakbar.com/bower_components/Flot/"></script>
            <script src="http://clipone.nurisakbar.com/assets/plugin/"></script>
            <script src="http://clipone.nurisakbar.com/bower_components/jquery.easy-pie-chart/dist/"></script>
            <script src="http://clipone.nurisakbar.com/bower_components/jqueryui-touch-punch/"></script>
            <script src="http://clipone.nurisakbar.com/bower_components/moment/min/"></script>
            <script src="http://clipone.nurisakbar.com/bower_components/fullcalendar/dist/"></script>
            <script src="http://clipone.nurisakbar.com/assets/js/min/"></script>
            <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

            <script>
                jQuery(document).ready(function() {
                    Main.init();
                    Index.init();
                });
            </script>

    </body>

</html>