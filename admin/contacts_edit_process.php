<?php

require "../config/connect.php";

if(isset($_POST['edit'])){
    
    $contacts = $mysqli->real_escape_string($_POST['contacts']);
    $date_created = date('Y-m-d H:i:s');
    $date_updated = date('Y-m-d H:i:s');
    $user_id = $_POST['user_id'];
    $profile_id = $_POST['profile_id'];
    
    $sql = $mysqli->query("UPDATE jtl_contacts SET contacts='$contacts', date_updated='$date_updated', user_id='$user_id', profile_id='$profile_id' WHERE id='".$_POST['id']."'");
            if($sql){
                header("Location: contacts.php");
                die();
            }else{
                echo $mysqli->errno;
            }

}