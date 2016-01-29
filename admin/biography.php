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
                        $sql = $mysqli->query("SELECT * FROM tbl_profile WHERE id_profile='".$_GET['id']."' ");
                        $row = $sql->fetch_array();
                        ?>
                        <!-- block -->
                        <div class="block span8">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Your Profiles</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <fieldset>
                                        <dl class="dl-horizontal">
                                            <dt>Nick Name </dt>
                                            <dd><p class="help-block"><?php echo $row['nama_panggilan'] ?></p></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Complate Name </dt>
                                            <dd><p class="help-block"><?php echo $row['nama_lengkap']?></p></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Address </dt>
                                            <dd><p class="help-block"><?php echo $row['alamat']?></p></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Phone numbers </dt>
                                            <dd><p class="help-block"><?php echo $row['no_hp']?></p></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Facebooks </dt>
                                            <dd>
                                                <p class="help-block">
                                                    <a href="<?php echo $row['facebook_url'] ?>" target="_blank"><?php echo $row['facebook_name']?></a>
                                                </p>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Twitters </dt>
                                            <dd>
                                                <p class="help-block">
                                                    <a href="<?php echo $row['twitter_url']?>" target="_blank"><?php echo $row['twitter_name']?></a>
                                                </p>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Instagram </dt>
                                            <dd>
                                                <p class="help-block">
                                                    <a href="<?php echo $row['instagram_url']?>" target="_blank"><?php echo $row['instagram_name']?></a>
                                                </p>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Youtube </dt>
                                            <dd>
                                                <p class="help-block">
                                                    <a href="<?php echo $row['youtube_url']?>" target="_blank"><?php echo $row['youtube_name']?></a>
                                                </p>
                                            </dd>
                                        </dl>
                                        <div class="form-actions" style="padding-left: 180px">
                                            <?php
                                            if(empty($row['id_user'])){ ?>
                                                <a href="profile_add.php" class="btn btn-primary">
                                                    <i class="icon-pencil icon-white"></i>
                                                    Edit tambah
                                                </a>
                                            <?php }else{ ?>
                                                <a href="profile_edit.php?id=<?php echo $row['id_profile']; ?>" class="btn btn-primary">
                                                    <i class="icon-pencil icon-white"></i>
                                                    Edit edit
                                                </a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                        <!-- block -->
                        <div class="block span3">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Your Pictures</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <img src="<?php echo $row['gambar']; ?>" style="height: 200px; width: 100%" class="">
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