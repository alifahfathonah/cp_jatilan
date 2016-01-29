<?php
session_start();
require "../config/connect.php";

if (isset($_SESSION['email']) && isset($_SESSION['level'])) {
    if ($_SESSION['status'] == 1) {
        ?>

        <?php include "include/_inc_header.php"; ?>
        <div class="container-fluid">
            <div class="row-fluid">
        <?php include "include/_inc_sidebar.php" ?>
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <!-- block -->
                        <?php
                        $sql = $mysqli->query("SELECT b.id, b.title, b.content, b.image, b.date_created, b.profile_id, p.nick_name, u.email  FROM jtl_blogs b JOIN jtl_category_blog c ON b.category_blog = c.id JOIN jtl_users u ON b.user_id = u.id JOIN jtl_profiles p ON b.profile_id = p.id WHERE b.id='" . $_GET['id'] . "' ");
                        $row = $sql->fetch_array();
                        ?>
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-book"></i> Blogs Post by <?php echo $row['email']; ?></div>
                                <div class="pull-right">
                                    <a href="blogs_list.php">
                                        <span class="badge badge-inverse"  style="padding: 5px">List Blogs</span>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div class="span2">

                                    </div>
                                    <div class="span8">
                                        <h1 class="text-center"><?php echo $row['title']; ?></h1>
                                        <div>
                                            <p>
                                                <img src="<?php echo $row['image'] ?>" style="width: 100%; height: 200px">
        <?php echo $row['content'] ?>
                                            </p>
                                        </div>
                                        <div>
                                            <p>Author by : <a href="biography.php?id=<?php echo $row['profile_id']; ?>"><?php echo $row['nick_name']; ?></a></p>
                                            <p>Date Post : <?php echo $row['date_created'] ?></p>
                                        </div>
                                    </div>
                                    <div class="span2">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                    <br>

                </div>
            </div>
        <?php include "include/_inc_footer.php"; ?>
        </div>
        <!--/.fluid-container-->
        <link href="_template/vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="_template/vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="_template/vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="_template/vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="_template/vendors/jquery.uniform.min.js"></script>
        <script src="_template/vendors/chosen.jquery.min.js"></script>
        <script src="_template/vendors/bootstrap-datepicker.js"></script>

        <script src="_template/vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="_template/vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="_template/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

        <script type="text/javascript" src="_template/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="_template/assets/form-validation.js"></script>

        <script src="_template/assets/scripts.js"></script>
        <script>

            jQuery(document).ready(function () {
                FormValidation.init();
            });


            $(function () {
                $(".datepicker").datepicker();
                $(".uniform_on").uniform();
                $(".chzn-select").chosen();
                $('.textarea').wysihtml5();

                $('#rootwizard').bootstrapWizard({onTabShow: function (tab, navigation, index) {
                        var $total = navigation.find('li').length;
                        var $current = index + 1;
                        var $percent = ($current / $total) * 100;
                        $('#rootwizard').find('.bar').css({width: $percent + '%'});
                        // If it's the last tab then hide the last button and show the finish instead
                        if ($current >= $total) {
                            $('#rootwizard').find('.pager .next').hide();
                            $('#rootwizard').find('.pager .finish').show();
                            $('#rootwizard').find('.pager .finish').removeClass('disabled');
                        } else {
                            $('#rootwizard').find('.pager .next').show();
                            $('#rootwizard').find('.pager .finish').hide();
                        }
                    }});
                $('#rootwizard .finish').click(function () {
                    alert('Finished!, Starting over!');
                    $('#rootwizard').find("a[href*='tab1']").trigger('click');
                });
            });
        </script>
        </body>

        </html>

        <?php
    } else {
        echo "Maaf, untuk sementara anda kami non aktifkan.";
    }
} else {
    header("Location: login.php");
    die();
}
?>