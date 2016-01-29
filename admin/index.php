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
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Statistik</div>
                                <div class="pull-right"></span>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
        <?php $sql = $mysqli->query("SELECT * FROM jtl_blogs"); ?>
                                    <div class="chart easyPieChart" data-percent="73" style="width: 110px; height: 110px; line-height: 110px;">
                                        <p><?php echo $sql->num_rows; ?> Posting<canvas width="110" height="110"></canvas></p>
                                    </div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Blogs</span>

                                    </div>
                                </div>
                                <div class="span3">
        <?php $sql2 = $mysqli->query("SELECT * FROM jtl_gallery"); ?>
                                    <div class="chart easyPieChart" data-percent="53" style="width: 110px; height: 110px; line-height: 110px;"><?php echo $sql2->num_rows; ?> Images<canvas width="110" height="110"></canvas></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Gallery</span>

                                    </div>
                                </div>
                                <div class="span3">
        <?php $sql3 = $mysqli->query("SELECT * FROM jtl_members"); ?>
                                    <div class="chart easyPieChart" data-percent="83" style="width: 110px; height: 110px; line-height: 110px;"><?php echo $sql3->num_rows; ?> People<canvas width="110" height="110"></canvas></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Anggota</span>

                                    </div>
                                </div>
                                <div class="span3">
        <?php $sql4 = $mysqli->query("SELECT * FROM jtl_accessories"); ?>
                                    <div class="chart easyPieChart" data-percent="13" style="width: 110px; height: 110px; line-height: 110px;"><?php echo $sql4->num_rows; ?> Accessories Jatilan<canvas width="110" height="110"></canvas></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Aksesoris Jatilan</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include "include/_inc_footer.php"; ?>
        </div>
        <?php
    } else {
        echo "maaf status anda tidak aktif. untuk sementara ini anda tidak bisa login.";
    }
} else {
    header("Location: login.php");
}
?>
</body>
</html>