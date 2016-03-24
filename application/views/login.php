<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Taruna Bhakti | Login</title>
    <link href="<?php echo base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">TB</h1>
            </div>
            <?php if (isset($message)): ?>
                <div class="alert alert-danger">
                    <p><?php echo $message ?></p>
                </div>
            <?php endif ?>
            <h3>Welcome to SMK Taruna Bhakti Admin Panel</h3>
            <form class="m-t" role="form" action="<?php echo base_url('login/auth') ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            <p class="m-t"> <small>SMK Taruna Bhakti &copy; <?php echo date('Y') ?> </small> </p>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2016 07:19:24 GMT -->
</html>
