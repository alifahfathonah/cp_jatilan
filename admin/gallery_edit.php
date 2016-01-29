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
                        $sql = $mysqli->query("SELECT g.id, g.image, g.descriptions, g.date_created, g.profile_id, p.nick_name, u.email  FROM jtl_gallery g JOIN jtl_category_gallery c ON g.category_gallery = c.id JOIN jtl_users u ON g.user_id = u.id JOIN jtl_profiles p ON g.profile_id = p.id WHERE g.id='" . $_GET['id'] . "' ");
                        $row = $sql->fetch_array();
                        ?>
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-book"></i> Gallery Post by <?php echo $row['email']; ?></div>
                                <div class="pull-right">
                                    <a href="gallery_list.php">
                                        <span class="badge badge-inverse"  style="padding: 5px">List Gallery</span>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="gallery_edit_process.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <fieldset>
                                                <div class="control-group">
                                                    <label class="control-label"><b>Image</b> </label>
                                                    <div class="controls">
                                                        <input type="file" name="image">
                                                        <p>* <span>Kosongkan Image, jika anda tidak ingin memperbaruinya.</span></p>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="textarea2"><b>Descriptions</b> </label>
                                                    <div class="controls">
                                                        <textarea class="input-xlarge textarea" placeholder="" style="width: 680px; height: 200px" name="descriptions" required="required"><?php echo $row['descriptions'] ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label"><b>Category</b> </label>
                                                    <div class="controls">
                                                        <select name="category_gallery" required="required">
                                                            <?php
                                                            $sql3 = $mysqli->query("SELECT * FROM jtl_category_gallery");
                                                            while ($row3 = $sql3->fetch_array()) {
                                                                ?>
                                                                <option value="<?php echo $row3['id'] ?>"><?php echo $row3['name']; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label"><b>Image Sebelumnya</b> </label>
                                                    <div class="controls">
                                                        <img src="<?php echo $row['image']; ?>" style="width: 100px; height: 100px">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary" name="edit">
                                                        <i class="icon-pencil icon-white"></i>
                                                        Edit
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
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