<?php

require "../config/connect.php";

if(isset($_POST['simpan'])){
    $contacts = $mysqli->real_escape_string($_POST['contacts']);
    $date_created = date('Y-m-d H:i:s');
    $date_updated = date('Y-m-d H:i:s');
    $user_id = $_POST['user_id'];
    $profile_id = $_POST['profile_id'];

    $sql = $mysqli->query("INSERT INTO jtl_contacts (contacts, date_created, date_updated, user_id, profile_id)
           VALUES ('$contacts','$date_created','$date_updated','$user_id','$profile_id')");
    if($sql){
        header('Location: contacts.php');
        die();
    }else{
        $mysqli->errno;
    }
}else{
    echo "gagal simpan";
}