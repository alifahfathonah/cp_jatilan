<?php
/*
 * Filename     : about
 * Description  : -
 * Quotes       : lihatlah code dari bagian terkecil. JANGAN secara keseluruhan. Jika anda tidak
 *                ingin bingung. enjoy coding :)
 * Note         : - perlu adanya cek input atau validasi menggunakan php. sejauh ini masih
 *                menggunakan HTML5.
 */
session_start();
require "../config/connect.php";

/* tambah data */
$folder = "images/";
if (isset($_POST['simpan'])) {
    $title = $mysqli->real_escape_string($_POST['title']);
    $content = $mysqli->real_escape_string($_POST['content']);
    $date_created = date("Y-m-d H-i-s");
    $date_updated = date("Y-m-d H-i-s");
    $user_id = $_POST['user_id'];
    $profile_id = $_POST['profile_id'];

    $tipeImage = $_FILES['image']['type'];
    $nameImage = $_FILES['image']['name'];
    $sizeImage = $_FILES['image']['size'];

    if ($tipeImage == "image/jpeg" || $tipeImage == "image/jpg" || $tipeImage == "image/png" || $tipeImage == "image/gif") {
        $image = $folder . basename($nameImage);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
            $sql = $mysqli->query("INSERT INTO jtl_about (id, title, content, image, date_created, date_updated, user_id, profile_id) VALUES ('', '$title','$content','$image','$date_created','$date_updated','$user_id','$profile_id') ");
            if ($sql) {
                header("Location: about.php");
                die();
            } else{
                echo $mysqli->errno;
            }
        } else {
            echo "gagal";
        }
    } else {
        echo "jenis gambar salah";
    }
}