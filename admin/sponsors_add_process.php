<?php

require "../config/connect.php";

$folder = "images/sponsors/";
if(isset($_POST['simpan'])){
    $typeIcon = $_FILES['icon']['type'];
    $nameIcon = $_FILES['icon']['name'];
    $sizeIcon = $_FILES['icon']['size'];

    $name = $mysqli->real_escape_string($_POST['name']);
    $link = $mysqli->real_escape_string($_POST['link']);
    $status = $_POST['status'];
    $date_created = date('Y-m-d H:i:s');
    $date_updated = date('Y-m-d H:i:s');
    $user_id = $_POST['user_id'];
    $profile_id = $_POST['profile_id'];

    if($typeIcon == "image/jpg" || $typeIcon == "image/jpeg" || $typeIcon == "image/png"){
        $icon = $folder . basename($nameIcon);
        if(move_uploaded_file($_FILES['icon']['tmp_name'], $icon)){
            $sql = $mysqli->query("INSERT INTO jtl_sponsors (name, link, icon, status, date_created, date_updated, user_id, profile_id)
            VALUES('$name','$link','$icon','$status','$date_created','$date_updated', '$user_id', '$profile_id')");
            if($sql){
                header("Location: sponsors.php");
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
}