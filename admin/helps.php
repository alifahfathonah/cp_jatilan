<?php
session_start();
require "../config/connect.php";

if(isset($_SESSION['email']) && isset($_SESSION['level'])){
    if($_SESSION['status'] == 1) { ?>

        <?php include "include/_inc_header.php"; ?>

        <?php include "include/_inc_sidebar.php"; ?>

<div class="span9 center" id="content">
    <div style="text-align: center">
        <h3>Tugas Akhir By Dwi Listiyan</h3>
        <img src="images/Jannina-W-5.jpg" style="width: 300px; height: 300px">
        <h3>@AMIKOM YOGYAKARTA 2015</h3>
    </div>
    <?php include "include/_inc_footer.php"; ?>
</div>

    <?php
    }else{
        echo "maaf status anda tidak aktif. untuk sementara ini anda tidak bisa login.";
    }
}else{
    header("Location: login.php");
} ?>
</body>
</html>