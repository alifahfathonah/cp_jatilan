<?php include "config/connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $sql = $mysqli->query('SELECT * FROM jtl_general');
    $rowG = $sql->fetch_array();
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $rowG['site_title'] ?></title>

    <!-- core CSS -->
    <link href="_template/css/bootstrap.min.css" rel="stylesheet">
    <link href="_template/css/font-awesome.min.css" rel="stylesheet">
    <link href="_template/css/animate.min.css" rel="stylesheet">
    <link href="_template/css/prettyPhoto.css" rel="stylesheet">
    <link href="_template/css/main.css" rel="stylesheet">
    <link href="_template/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="_template/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="_template/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="_template/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="_template/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">

<header id="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-4">
                </div>
                <div class="col-sm-6 col-xs-8">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--/.container-->
    </div><!--/.top-bar-->

    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                $sql= $mysqli->query("SELECT * FROM jtl_general");
                if(mysqli_num_rows($sql) == null){ ?>
                     <a class="navbar-brand" href="index.php"><img src="_template/images/logo.png" alt="logo"></a>
                <?php }else{
                    while($row=$sql->fetch_array()){ ?>
                     <h3 style="color: #ffffff"><a href="index.php" style="color: #ffffff; font-size: 50px"><b><?php echo $row['site_title']; ?></b></a></h3>
                    <?php }
                    }
                ?>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="acc_jatilan.php">Accessories Jatilan</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->