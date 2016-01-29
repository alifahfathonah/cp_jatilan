<?php
session_start();
include "../config/connect.php";
if(isset($_SESSION['email']) && isset($_SESSION['level'])){
    if($_SESSION['status'] == 1){ ?>
        <?php include "include/_inc_header.php"; ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include "include/_inc_sidebar.php"; ?>
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <?php
                        //$sql = $mysqli->query("SELECT * FROM tbl_profile JOIN tbl_user WHERE id_user=".$_SESSION['id']);
                       // $row = $sql->fetch_array();
                        ?>
                        <!-- block -->
                        <div class="block span8">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Your Profiles</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form method="post" action="profile_add_process.php" enctype="multipart/form-data">
                                        <fieldset>
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                                            <dl class="dl-horizontal">
                                                <dt>Nick Name </dt>
                                                <dd>
                                                    <input type="text" name="nick_name">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Full Name </dt>
                                                <dd>
                                                    <input type="text" name="full_name">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Address </dt>
                                                <dd>
                                                    <textarea name="address" style="height: 90px"></textarea>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Phone numbers </dt>
                                                <dd>
                                                    <input type="text" name="phone_number">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Facebooks </dt>
                                                <dd>
                                                    <input type="text" name="facebook_name" placeholder="name">
                                                    <input type="text" name="facebook_url" placeholder="facebook url">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Twitters </dt>
                                                <dd>
                                                    <input type="text" name="twitter_name" placeholder="name">
                                                    <input type="text" name="twitter_url" placeholder="twitter url">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Instagram </dt>
                                                <dd>
                                                    <input type="text" name="instagram_name" placeholder="name">
                                                    <input type="text" name="instagram_url" placeholder="instagram_url">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Youtube </dt>
                                                <dd>
                                                    <input type="text" name="youtube_name" placeholder="name">
                                                    <input type="text" name="youtube_url" placeholder="youtube url">
                                                </dd>
                                            </dl>

                                            <dl class="dl-horizontal">
                                                <dt>Images </dt>
                                                <dd>
                                                    <input type="file" name="images">
                                                </dd>
                                            </dl>

                                            <div class="form-actions" style="padding-left: 180px">
                                                <button type="submit" name="simpan" class="btn btn-info">
                                                    <i class="icon-pencil icon-white"></i>
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
                </div>
            </div>
            <?php include "include/_inc_footer.php"; ?>
        </div>

    <?php
    }else {
        echo "Maaf anda kami non aktfikan";
    }
}else{
    header("Location: login.php");
}
?>