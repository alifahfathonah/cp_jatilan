<?php

require "../config/connect.php";

if(isset($_POST['edit'])){
    
    $title = $mysqli->real_escape_string($_POST['site_title']);
    $site_tagline = $mysqli->real_escape_string($_POST['site_tagline']);
    $site_url = $mysqli->real_escape_string($_POST['site_url']);
    $date_updated = date('Y-m-d H:i:s');
    $user_id = $_POST['user_id'];
    $profile_id = $_POST['profile_id'];
    
    $sql = $mysqli->query("UPDATE jtl_general SET site_title='$title', site_tagline='$site_tagline', site_url='$site_url', date_updated='$date_updated', user_id='$user_id', profile_id='$profile_id' WHERE id='".$_POST['id']."'");
            if($sql){
                header("Location: general_settings.php");
                die();
            }else{
                echo $mysqli->errno;
            }

}