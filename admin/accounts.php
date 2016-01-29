<?php
session_start();
include "../config/connect.php";
if(isset($_SESSION['email']) && isset($_SESSION['level'])){
    if($_SESSION['status'] == 1){ ?>

        <?php include "include/_inc_header.php" ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include "include/_inc_sidebar.php" ?>
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Form Users</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <?php
                                    $sql = $mysqli->query("SELECT * FROM jtl_users WHERE id=".$_SESSION['id']);
                                    $row = $sql->fetch_array();
                                    ?>
                                    <form class="form-horizontal" action="accounts_edit_process.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                        <fieldset>
                                            <div class="control-group">
                                                <label class="control-label"><b>Email</b> </label>
                                                <div class="controls">
                                                    <input type="email" class="span6" name="email" required="required" value="<?php echo $row['email'] ?>">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Password</b> </label>
                                                <div class="controls">
                                                    <input type="password" class="span6" name="pass" pattern=".{5,}"  oninvalid="setCustomValidity('Password Minimal 5 Karakter')">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label"><b>Repeat Password</b> </label>
                                                <div class="controls">
                                                    <input type="password" class="span6" name="pass2" pattern=".{5,}" oninvalid="setCustomValidity('Password Minimal 5 Karakter')">
                                                </div>
                                            </div>
                                            
                                             <div class="control-group">
                                                <label class="control-label"></label>
                                                <div class="controls">
                                                    <span>Kosongkan Password, Jika anda hanya ingin memperbarui emailnya saja.</span>
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
                </div>
            </div>


            <?php include "include/_inc_footer.php" ?>
        </div>

    <?php }else{
        echo "Maaf status anda kami non aktifkan.";
    }
}else{
    header("Location: login.php");
}
?>