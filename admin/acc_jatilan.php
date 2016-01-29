<?php
session_start();
require "../config/connect.php";

$sql = $mysqli->query("SELECT user_id FROM jtl_profiles WHERE user_id='".$_SESSION['id']."'");
$row = $sql->fetch_array();


if(isset($_SESSION['email']) && isset($_SESSION['level'])){
    if($_SESSION['status'] == 1) {
        if($_SESSION['id'] == $row['user_id']){ ?>

            <?php include "include/_inc_header.php"; ?>
<div class="container-fluid">
                <div class="row-fluid">
                    <?php include "include/_inc_sidebar.php" ?>
                    <div class="span9" id="content">
                        <div class="row-fluid">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left"><i class="icon-book"></i> Acc Jatilan</div>
                                    <div class="pull-right">
                                    <a href="acc_jatilan_list.php">
                                    <span class="badge badge-inverse"  style="padding: 5px">List Tools</span>
                                    </a>
                                    </div>
                                </div>
                                <?php
                    $data2 = $mysqli->query("SELECT id FROM jtl_profiles WHERE user_id='".$_SESSION['id']."'");
                    $row2 = $data2->fetch_array();
                    ?>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <form class="form-horizontal" action="acc_jatilan_add_process.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                                            <input type="hidden" name="profile_id" value="<?php echo $row2['id']; ?>">
                                            <fieldset>

                                            <div class="control-group">
                                                <label class="control-label"><b>Name Accessories</b></label>
                                                <div class="controls">
                                                <input type="text" name="name">
</div>
</div>

                                               <div class="control-group">
                        <label class="control-label" for="textarea2"><b>Descriptions</b> </label>
                        <div class="controls">
                            <textarea class="input-xlarge textarea" placeholder="" style="width: 680px; height: 200px" name="descriptions" required="required"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                                                <label class="control-label"><b>Image</b></label>
                                                <div class="controls">
                                                <input type="file" name="image" required="required">
</div>
</div>

                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary" name="simpan">
                                                        <i class="icon-plus icon-white"></i>
                                                        Save
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

    jQuery(document).ready(function() {
        FormValidation.init();
    });


    $(function() {
        $(".datepicker").datepicker();
        $(".uniform_on").uniform();
        $(".chzn-select").chosen();
        $('.textarea').wysihtml5();

        $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard').find('.bar').css({width:$percent+'%'});
            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('#rootwizard').find('.pager .next').hide();
                $('#rootwizard').find('.pager .finish').show();
                $('#rootwizard').find('.pager .finish').removeClass('disabled');
            } else {
                $('#rootwizard').find('.pager .next').show();
                $('#rootwizard').find('.pager .finish').hide();
            }
        }});
        $('#rootwizard .finish').click(function() {
            alert('Finished!, Starting over!');
            $('#rootwizard').find("a[href*='tab1']").trigger('click');
        });
    });
</script>
</body>

</html>

            <?php
        }else{
            echo "profil disi dulu, baru boleh posting.";
        }
    }else{
        echo "Maaf, untuk sementara anda kami non aktifkan.";
    }
}else{
    header("Location: login.php");
    die();
}
?>