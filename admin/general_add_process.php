<?php

require "../config/connect.php";

if(isset($_POST['simpan'])){

    $site_title = $mysqli->real_escape_string($_POST['site_title']);
    $site_tagline = $mysqli->real_escape_string($_POST['site_tagline']);
    $site_url = $mysqli->real_escape_string($_POST['site_url']);
    $date_created = date('Y-m-d H:i:s');
    $date_updated = date('Y-m-d H:i:s');
    $user_id = $_POST['user_id'];
    $profile_id = $_POST['profile_id'];

    $sql = $mysqli->query("INSERT INTO jtl_general (id, site_title, site_tagline, site_url, date_created, date_updated, user_id, profile_id)
           VALUES ('', '$site_title', '$site_tagline', '$site_url', '$date_created', '$date_updated', '$user_id', '$profile_id')");

    if($sql){
        header("Location: general_settings.php");
        die();
    }else{
        $mysqli->errno;
    }
}