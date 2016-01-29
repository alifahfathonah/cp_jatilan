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
                                <?php
                                $data2 = $mysqli->query("SELECT id FROM jtl_profiles WHERE user_id='" . $_SESSION['id'] . "'");
                                $row2 = $data2->fetch_array();
                                ?>
                                <div class="span12">
                                    <form class="form-horizontal" action="member_edit_process.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                                        <input type="hidden" name="profile_id" value="<?php echo $row2['id']; ?>">
                                        <fieldset>
                                            <div class="control-group">
                                                <label class="control-label"><b>Name</b> </label>
                                                <div class="controls">
                                                    <input type="text" class="span6" name="member_name" required="required" value="<?php echo $row['member_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label"><b>Gender</b> </label>
                                                <div class="controls">
                                                    <select required="required" name="gender">
        <?php if ($row['gender'] == 1) { ?>
                                                            <option></option>
                                                            <option value="1" selected="selected">Laki-Laki</option>
                                                            <option value="2">Perempuan</option>
        <?php } else { ?>
                                                            <option></option>
                                                            <option value="1">Laki-Laki</option>
                                                            <option value="2" selected="selected">Perempuan</option>
        <?php } ?>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="textarea2"><b>Address</b> </label>
                                                <div class="controls">
                                                    <textarea class="textarea" placeholder="" name="address" required="required" style="height: 100px; width: 340px"><?php echo $row['address'] ?></textarea>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Motto</b> </label>
                                                <div class="controls">
                                                    <input type="text" class="span6" name="motto" required="required" value="<?php echo $row['motto'] ?>">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Status</b> </label>
                                                <div class="controls">
                                                     <select name="self_status">
                                                            <option value="">--</option>
                                                             <?php
                                                    if ($row['self_status'] == 1) { ?>
                                                            <option value="1" selected="">Single</option>
                                                            <option value="2">Menikah</option>
                                                            <option value="3">Duda</option>
                                                            <option value="4">Janda</option>
                                                    <?php } elseif ($row['self_status'] == 2) { ?>
                                                        <option value="1">Single</option>
                                                        <option value="2" selected="">Menikah</option>
                                                            <option value="3">Duda</option>
                                                            <option value="4">Janda</option>
                                                    <?php } elseif ($row['self_status'] == 3) { ?>
                                                        <option value="1">Single</option>
                                                            <option value="2">Menikah</option>
                                                            <option value="3" selected="">Duda</option>
                                                            <option value="4">Janda</option>
                                                    <?php } elseif ($row['self_status'] == 4) { ?>
                                                        <option value="1">Single</option>
                                                            <option value="2">Menikah</option>
                                                            <option value="3">Duda</option>
                                                            <option value="4" selected="">Janda</option>
                                                    <?php }
                                                    ?>
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Facebook Url</b> </label>
                                                <div class="controls">
                                                    <input type="text" class="span6" name="facebook_url" required="required" value="<?php echo $row['facebook_url'] ?>">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Twitter Url</b> </label>
                                                <div class="controls">
                                                    <input type="text" class="span6" name="twitter_url" required="required" value="<?php echo $row['twitter_url'] ?>">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Instagram Url</b> </label>
                                                <div class="controls">
                                                    <input type="text" class="span6" name="instagram_url" required="required" value="<?php echo $row['instagram_url'] ?>">
                                                </div>
                                            </div>
                                            <div class="control-group" style="margin-top: 10px">
                                                <label class="control-label"><b>Image Sebelumnya</b> </label>
                                                <div class="controls">

                                                    <img src="<?php echo $row['image']; ?>" style="width: 100px; height: 100px">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Image</b></label>
                                                <div class="controls">
                                                    <input type="file" name="image">
                                                    <p>* Kosongkan Image, jikan anda tidak ingin menggantinya.</p>
                                                </div>

                                                <div class="control-group" style="margin-top: 10px">
                                                    <label class="control-label"><b>Status</b> </label>
                                                    <div class="controls">
                                                        <?php if ($row['active_status'] == 1) { ?>
                                                            <label><input type="radio" name="active_status" value="1" checked> Active</label>
                                                            <label><input type="radio" name="active_status" value="2"> Non Active</label>
                                                        <?php } else { ?>
                                                            <label><input type="radio" name="active_status" value="1"> Active</label>
                                                            <label><input type="radio" name="active_status" value="2"  checked> Non Active</label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label"><b>Category</b> </label>
                                                    <div class="controls">
                                                        <select name="category_member" required="required">
                                                            <?php
                                                            $sql = $mysqli->query("SELECT * FROM jtl_category_members");
                                                            echo "<option value=''>--</option>";
                                                            while ($row = $sql->fetch_array()) {
                                                                ?>
                                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
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

        <script src="_template/vendors/jquery.uniform.min.js"></script>
        <script src="_template/vendors/chosen.jquery.min.js"></script>
        <script src="_template/vendors/bootstrap-datepicker.js"></script>

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