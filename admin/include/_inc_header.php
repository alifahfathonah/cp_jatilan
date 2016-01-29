<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="_template/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="_template/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="_template/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="_template/assets/styles.css" rel="stylesheet" media="screen">
        <link href="_template/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    </head>
    <body class="wysihtml5-supported">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <?php
                    $sqlProfile = $mysqli->query("SELECT * FROM jtl_profiles WHERE user_id='$_SESSION[id]' ");
                    $rowProfile = $sqlProfile->fetch_array();

                    $sql2 = $mysqli->query("SELECT id FROM jtl_users WHERE id='$_SESSION[id]'");
                    $row2 = $sql2->fetch_array();
                    ?>
                    <a class="brand" href="index.php">Jatilan Indonesia</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php if ($_SESSION['id'] == $rowProfile['user_id']) { ?>

                                        <?php echo $rowProfile['nick_name'] ?> <img src="<?php echo $rowProfile['image']; ?>" style="width: 20px; height: 20px">  <i class="caret"></i>

                                    <?php } else { ?>
                                        <i class="icon-user"></i>  <i class="caret"></i>
                                    <?php } ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="profile.php">Profile</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="accounts.php?id=<?php echo $row2['id'] ?>">Accounts</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="helps.php">Helps</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <?php if ($_SESSION['level'] == 1) { ?>
                            <ul class="nav">
                                <li>
                                    <a tabindex="-1" href="../" target="_blank">Visit Site</a>
                                </li>
                                <li>
                                    <a href="about.php"> About</a>
                                </li>
                                <li>
                                    <a href="user.php">Users</a>
                                </li>
                                <li>
                                    <a href="social_media.php">Social Media</a>
                                </li>
                                <li>
                                    <a href="sponsors.php">Sponsors</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b>

                                    </a>
                                    <ul class="dropdown-menu" id="menu1">
                                        <li>
                                            <a href="category_blog.php">Blogs Settings</a>
                                        </li>
                                        <li>
                                            <a href="category_gallery.php">Gallery Settings</a>
                                        </li>
                                        <li>
                                            <a href="category_members.php">Members Settings</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="general_settings.php">General Settings</a>
                                        </li>
                                        <li>
                                            <a href="contacts.php">Contact Settings</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        <?php } else { ?>
                            <ul class="nav">
                                <li>
                                    <a tabindex="-1" href="../" target="_blank">Visit Site</a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>

