<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA | Empty Page</title>
    <link href="<?php echo base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/plugins/switchery/switchery.css" rel="stylesheet">
	<link href="<?php echo base_url('assets') ?>/css/plugins/iCheck/custom.css" rel="stylesheet"></link>
    <script src="<?php echo base_url('assets') ?>/js/jquery-2.1.1.js"></script>
	<script src="<?php echo base_url('assets') ?>/js/plugins/switchery/switchery.js"></script>
	<script src="<?php echo base_url('assets') ?>/js/plugins/iCheck/icheck.min.js"></script>
</head>
<body class="">
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url('assets') ?>/img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                	<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Main</span> <span class="fa arrow"></span></a>
                	<ul class="nav nav-second-level collapse">
                		<li>
                			<a href="<?php echo site_url('ctb/box1') ?>">Box 1</a>
                			<a href="#">Box 2</a>
                			<a href="#">Box 3</a>
                			<a href="#">Box 4</a>
                		</li>
                	</ul>
                </li>
                <li>
                    <a href="css_animation.html"><i class="fa fa-newspaper-o"></i> <span class="nav-label">News Text </span></a>
                </li>
            </ul>
        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.4/search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>
        </nav>
        </div>
        <?php
        $url2 = $this->uri->segment(2); 
        if ($this->uri->segment(2) == $url2 && $url2) {
        	$this->load->view($url2);
        }
        else{ $this->load->view('dashboard');?>
			<!-- <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>This is main title</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">This is</a>
                        </li>
                        <li class="active">
                            <strong>Breadcrumb</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="#" class="btn btn-primary">This is action area</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content">
                <div class="middle-box text-center animated fadeInRightBig">
                    <h3 class="font-bold">This is page content</h3>
                    <div class="error-desc">
                        You can create here any grid layout you want. And any variation layout you imagine:) Check out
                        main dashboard and other site. It use many different layout.
                        <br/><a href="index-2.html" class="btn btn-primary m-t">Dashboard</a>
                    </div>
                </div>
            </div>         -->	
        <?php } ?>
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2015
                </div>
            </div>
        </div>
        </div>
    <script src="<?php echo base_url('assets') ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/inspinia.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/plugins/pace/pace.min.js"></script>
</body>
</html>
=======
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?> | SMK Taruna Bhakti</title>
    <link href="<?php echo base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/plugins/switchery/switchery.css" rel="stylesheet">
	<link href="<?php echo base_url('assets') ?>/css/plugins/iCheck/custom.css" rel="stylesheet"></link>
    <link href="<?php echo base_url('assets') ?>/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <script src="<?php echo base_url('assets') ?>/js/jquery-2.1.1.js"></script>
	<script src="<?php echo base_url('assets') ?>/js/plugins/switchery/switchery.js"></script>
	<script src="<?php echo base_url('assets') ?>/js/plugins/iCheck/icheck.min.js"></script>
</head>
<body class="">
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url('assets') ?>/img/profile_small.jpg" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs"><strong class="font-bold">SMK Taruna Bhakti</strong></span> 
                                <span class="text-muted text-xs block">Admin <b class="caret"></b></span> 
                            </span> 
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="login.html"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        TB
                    </div>
                </li>
                <li>
                	<a href="<?php echo base_url() ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Main</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url('Ctb/news') ?>"><i class="fa fa-newspaper-o"></i> <span class="nav-label">News Text </span></a>
                </li>
            </ul>
        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to SMK Taruna Bhakti Admin Page.</span>
                </li>
                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>
        </nav>
        </div>
        <?php
            $url3 = (!$this->uri->segment(3) && $this->uri->segment(2) == 'box') ? '1' : $this->uri->segment(3);
            $url = $this->uri->segment(2); 
            if ($url) {
            	$this->load->view($url);
            }else {
                $this->load->view('dashboard'); 
            }
        ?>
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> SMK Taruna Bhakti &copy; <?php echo date('Y') ?>
                </div>
            </div>
        </div>
        </div>
    <script src="<?php echo base_url('assets') ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/inspinia.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/plugins/summernote/summernote.min.js"></script>

</body>
</html>
>>>>>>> 47af5b36865a8a3dfc002297deed29634525670f
