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
                        $sql = $mysqli->query("SELECT m.id, m.date_created, m.member_name, m.address, m.gender, m.image, m.self_status, m.motto, m.facebook_url, m.twitter_url, m.instagram_url, m.active_status, m.date_created, m.date_updated, c.name, u.email, p.nick_name FROM jtl_members m JOIN jtl_category_members c ON m.category_member = c.id JOIN jtl_users u ON u.id = m.user_id JOIN jtl_profiles p ON p.id = m.profile_id WHERE m.id='" . $_GET['id'] . "' ");
                        $row = $sql->fetch_array();
                        ?>
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-book"></i> Members Post by <?php echo $row['email']; ?></div>
                                <div class="pull-right">
                                    <a href="members.php">
                                        <span class="badge badge-inverse"  style="padding: 5px">List Gallery</span>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <div class="row-fluid">

                                            <div class="span3">
                                                <a href="#" class="thumbnail" title="<?php echo $row['member_name'] ?>">
                                                    <img src="<?php echo $row['image'] ?>" alt="260x180" style="width: 260px; height: 200px;">
                                                </a>
                                            </div>
                                            <div class="span5" style="">
                                                <p><b>Nama :</b> <?php echo $row['member_name'] ?></p>
                                                <p><b>Jenis Kelamin :</b>
                                                    <?php
                                                    if ($row['gender'] == 1) {
                                                        echo "Laki-Laki";
                                                    } elseif ($row['jk'] == 2) {
                                                        echo "Perempuan";
                                                    }
                                                    ?>
                                                </p>
                                                <p><b>Alamat :</b> <?php echo $row['address'] ?></p>
                                                <p><b>Motto :</b> <?php echo $row['motto'] ?></p>
                                                <p><b>Status Kegiatan :</b> <?php
                                                    if ($row['active_status'] == 1) {
                                                        echo "<span class='badge badge-success'>aktif</span>";
                                                    } else {
                                                        echo "<span class='badge badge-error'>Tidak aktif</span>";
                                                    }
                                                    ?></p>
                                                <p><b>Date Post : </b><?php echo $row['date_created'] ?></p>

                                            </div>
                                            <div class="span3">
                                                <p><b>Status :</b>
                                                    <?php
                                                    if ($row['self_status'] == 1) {
                                                        echo "Single";
                                                    } elseif ($row['self_status'] == 2) {
                                                        echo "Menikah";
                                                    } elseif ($row['self_status'] == 3) {
                                                        echo "Duda";
                                                    } elseif ($row['self_status'] == 4) {
                                                        echo "Janda";
                                                    }
                                                    ?>
                                                </p>
                                                <p><b>Sebagai :</b> <?php echo $row['name'] ?></p>
                                                <b>Social Media : </b>
                                                <p><a href="<?php $row['facebook_url']; ?>">Facebook</a> </p>
                                                <p><a href="<?php $row['twitter_url']; ?>">Twitter</a> </p>
                                                <p><a href="<?php $row['instagram_url']; ?>">Instagram</a> </p>
                                                <p>
                                                    <a href="member_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-warning" title="Edit">
                                                        <i class="icon-pencil icon-white"></i>
                                                    </a>
                                                    <a href="member_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-mini btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin hapus data tersebut ?')">
                                                        <i class="icon-remove icon-white"></i>
                                                    </a>    
                                                </p>
                                            </div>
                                        </div>
                                        <br>
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