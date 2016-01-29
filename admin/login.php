<html>
    <head>
        <title>Admin Login</title>
        <link href="_template/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="_template/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="_template/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="_template/assets/styles.css" rel="stylesheet" media="screen">
    </head>
    <body id="login">
        <div class="container">
            <form class="form-signin" action="login_check.php" method="post">
                <h2 class="form-signin-heading">Sign in</h2>
                <input type="email" class="input-block-level" placeholder="Email address" name="email">
                <input type="password" class="input-block-level" placeholder="Password" name="pass">
                <button class="btn btn-large btn-primary" type="submit" name="login_check">
                    Masuk
                </button>
            </form>
        </div> <!-- /container -->
        <hr>
        <footer class="text-center">
            <p>&copy; Listiyan Amikom Jogja <?php echo date('Y'); ?></p>
        </footer>

        <!--/.fluid-container-->
        <script src="_template/vendors/jquery-1.9.1.min.js"></script>
        <script src="_template/bootstrap/js/bootstrap.min.js"></script>
