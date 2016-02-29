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
