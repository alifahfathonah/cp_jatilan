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
                        $sql = $mysqli->query("SELECT * FROM jtl_profiles WHERE user_id='".$_SESSION['id']."'");
                        $row = $sql->fetch_array();
                        ?>
                        <!-- block -->
                        <div class="block span8">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Profile</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form method="post" action="profile_edit_process.php" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <fieldset>
                                            <dl class="dl-horizontal">
                                                <dt>Nick Name </dt>
                                                <dd>
                                                    <input type="text" name="nick_name" value="<?php echo $row['nick_name']; ?>">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Full Name </dt>
                                                <dd>
                                                    <input type="text" name="full_name" value="<?php echo $row['full_name']; ?>">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Address </dt>
                                                <dd>
                                                    <textarea name="address" style="height: 90px"><?php echo $row['address']; ?></textarea>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Phone numbers </dt>
                                                <dd>
                                                    <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Facebooks </dt>
                                                <dd>
                                                    <input type="text" name="facebook_name" value="<?php echo $row['facebook_name']; ?>" placeholder="name">
                                                    <input type="text" name="facebook_url" value="<?php echo $row['facebook_url'] ?>" placeholder="facebook url">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Twitters </dt>
                                                <dd>
                                                    <input type="text" name="twitter_name" value="<?php echo $row['twitter_name']; ?>" placeholder="name">
                                                    <input type="text" name="twitter_url" value="<?php echo $row['twitter_url'] ?>" placeholder="twitter url">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Instagram </dt>
                                                <dd>
                                                    <input type="text" name="instagram_name" value="<?php echo $row['instagram_name']; ?>" placeholder="name">
                                                    <input type="text" name="instagram_url" value="<?php echo $row['instagram_url'] ?>" placeholder="instagram_url">
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Youtube </dt>
                                                <dd>
                                                    <input type="text" name="youtube_name" value="<?php echo $row['youtube_name']; ?>" placeholder="name">
                                                    <input type="text" name="youtube_url" value="<?php echo $row['youtube_url'] ?>" placeholder="youtube url">
                                                </dd>
                                            </dl>

                                            <dl class="dl-horizontal">
                                                <dt>Image </dt>
                                                <dd>
                                                    <input type="file" name="image">
                                                    <p>Kosongkan Image, jika tidak ingin diganti.</p>
                                                </dd>
                                            </dl>

                                            <div class="form-actions" style="padding-left: 180px">
                                                <button type="submit" name="edit" class="btn btn-primary">
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