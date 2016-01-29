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
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">List Gallery</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Images</th>
                                                <th>Descriptions</th>
                                                <th>Categories</th>
                                                <th>User</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($_SESSION['level'] == 1) { ?>

                                                <?php
                                                $no = 1;
                                                $sql = $mysqli->query("SELECT g.id, g.profile_id, g.image, g.date_created, g.descriptions, c.name, p.nick_name FROM jtl_gallery g JOIN jtl_category_gallery c ON g.category_gallery = c.id JOIN jtl_users u ON g.user_id = u.id JOIN jtl_profiles p ON g.profile_id = p.id");
                                                while ($row = $sql->fetch_array()) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td>
                                                            <img src="<?php echo $row['image']; ?>" class="thumbnail" style="width: 200px; height: 100px">
                                                            <p style="font-size: 11px; color: #c09853"><i><?php echo $row['date_created']; ?></i></p>
                                                        </td>
                                                        <td><?php echo $row['descriptions']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><a href="biography.php?id=<?php echo $row['profile_id'] ?>"><?php echo $row['nick_name']; ?></a> </td>
                                                        <td>
                                                            <a href="gallery_detail.php?id=<?php echo $row['id'] ?>" class="btn btn-mini" title="Details">
                                                                <i class="icon-eye-open"></i>
                                                            </a>
                                                            <a href="gallery_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-warning" title="Edit">
                                                                <i class="icon-pencil icon-white"></i>
                                                            </a>
                                                            <a href="gallery_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin hapus data tersebut ?')">
                                                                <i class="icon-remove icon-white"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                }
                                                ?>

                                            <?php } elseif ($_SESSION['level'] == 2) { ?>

                                                <?php
                                                $no = 1;
                                                $sql = $mysqli->query("SELECT g.id, g.image, g.date_created, g.descriptions, c.name, p.nick_name FROM jtl_gallery g JOIN jtl_category_gallery c ON g.category_gallery = c.id JOIN jtl_users u ON g.user_id = u.id JOIN jtl_profiles p ON g.profile_id = p.id user_id='" . $_SESSION['id'] . "'");
                                                while ($row = $sql->fetch_array()) {
                                                    ?>
                                                    <tr>

                                                        <td><?php echo $no; ?></td>
                                                        <td>
                                                            <img src="<?php echo $row['image']; ?>" class="thumbnail" style="width: 200px; height: 100px">
                                                            <p style="font-size: 11px; color: #c09853"><i><?php echo $row['date_created']; ?></i></p>
                                                        </td>
                                                        <td><?php echo $row['descriptions']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><a href="profile.php?id=<?php echo $row['profile_id']; ?>"><?php echo $row['nick_name']; ?></a> </td>
                                                        <td>
                                                            <a href="gallery_detail.php?id=<?php echo $row['id'] ?>" class="btn btn-mini" title="Details">
                                                                <i class="icon-eye-open"></i>
                                                            </a>
                                                            <a href="gallery_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-warning" title="Edit">
                                                                <i class="icon-pencil icon-white"></i>
                                                            </a>
                                                            <a href="gallery_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin hapus data tersebut ?')">
                                                                <i class="icon-remove icon-white"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                }
                                                ?>


                                            <?php }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
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

        <script src="_template/vendors/datatables/js/jquery.dataTables.min.js"></script>

        <script src="_template/assets/scripts.js"></script>
        <script src="_template/assets/DT_bootstrap.js"></script>
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