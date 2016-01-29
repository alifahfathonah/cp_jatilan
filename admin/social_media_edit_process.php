<?php

require "../config/connect.php";

$folder = "images/social_media/";
if(isset($_POST['edit'])){
    $typeIcon = $_FILES['icon']['type'];
    $nameIcon = $_FILES['icon']['name'];
    $sizeIcon = $_FILES['icon']['size'];

    $name = $mysqli->real_escape_string($_POST['name']);
    $link = $mysqli->real_escape_string($_POST['link']);
    $status = $_POST['status'];
    $date_updated = date('Y-m-d H:i:s');
    $user_id = $_POST['user_id'];
    $profile_id = $_POST['profile_id'];

    
    if(!empty($nameIcon)){
        if($typeIcon == "image/jpg" || $typeIcon == "image/jpeg" || $typeIcon == "image/png"){
        $icon = $folder . basename($nameIcon);
        if(move_uploaded_file($_FILES['icon']['tmp_name'], $icon)){
            $sql = $mysqli->query("UPDATE jtl_social_media SET name='$name', link='$link', icon='$icon', status='$status', date_updated='$date_updated', user_id='$user_id', profile_id='$profile_id' WHERE id='".$_POST['id']."'");
            if($sql){
                header("Location: social_media.php");
                die();
            }else{
                echo $mysqli->errno;
            }
        }else{
            echo "Gagal Upload, ora genah !";
        }
    }else{
        echo "Maaf format icon salah ! golek liyane.";
    }
    }else{
         $sql = $mysqli->query("UPDATE jtl_social_media SET name='$name', link='$link', status='$status', date_updated='$date_updated', user_id='$user_id', profile_id='$profile_id' WHERE id='".$_POST['id']."'");
            if($sql){
                header("Location: social_media.php");
                die();
            }else{
                echo $mysqli->errno;
            }
    }
}