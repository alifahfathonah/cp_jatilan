<?php

require "../config/connect.php";

if(isset($_POST['edit'])){
    
    $name = $mysqli->real_escape_string($_POST['name']);
    $descriptions = $mysqli->real_escape_string($_POST['descriptions']);
    $date_updated = date('Y-m-d H:i:s');
    $user_id = $_POST['user_id'];
    $profile_id = $_POST['profile_id'];
    
    $sql = $mysqli->query("UPDATE jtl_category_blog SET name='$name', descriptions='$descriptions', date_updated='$date_updated', user_id='$user_id', profile_id='$profile_id' WHERE id='".$_POST['id']."'");
            if($sql){
                header("Location: category_blog.php");
                die();
            }else{
                echo $mysqli->errno;
            }

}