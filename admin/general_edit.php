<?php
session_start();
include "../config/connect.php";
if(isset($_SESSION['email']) && isset($_SESSION['level'])){
    if($_SESSION['status'] == 1){
        if($_SESSION['level'] == 1){ ?>

            <?php include "include/_inc_header.php"; ?>
<div class="container-fluid">
    <div class="row-fluid">
        <?php include "include/_inc_sidebar.php"; ?>
        <div class="span9" id="content">
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">General Settings</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <?php
                    $data2 = $mysqli->query("SELECT id FROM jtl_profiles WHERE user_id='".$_SESSION['id']."'");
                    $row2 = $data2->fetch_array();
                    ?>
                            
                            <?php
            $data = $mysqli->query("SELECT * FROM jtl_general WHERE id='".$_GET['id']."'");

            if(mysqli_num_rows($data) == 1){
                while($row = $data->fetch_array()) { ?>
                    <!-- Tampil data -->
                     <form class="form-horizontal" method="POST" action="general_edit_process.php">
                         <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                     <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                     <input type="hidden" name="profile_id" value="<?php echo $row2['id']; ?>">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead"><b>Site Title</b> </label>
                            <div class="controls">
                                <input type="text" class="span6" name="site_title" required="required" value="<?php echo $row['site_title']?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead"><b>Site Tagline</b> </label>
                            <div class="controls">
                                <input type="text" class="span6" name="site_tagline" required="required" value="<?php echo $row['site_tagline'] ?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead"><b>Site Url</b> </label>
                            <div class="controls">
                                <input type="text" class="span6" name="site_url" required="required" placeholder="http://www.exlample.com" value="<?php echo $row['site_url'] ?>">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary" name="edit">
                                <i class="icon-plus icon-white"></i>
                                Update</button>
                        </div>
                    </fieldset>
                </form>
                <?php
                }
            }else{ 
                
                echo "ada yang salah !";
            }
                ?>

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
            echo "Maaf anda tidak punya hak";
        }
    }else{
        echo "Maaf anda kami non aktifkan";
    }
}else{
    header("Location: login.php");
}
?>