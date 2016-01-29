<?php
session_start();
require "../config/connect.php";


if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $date_updated = date('Y-m-d H:i:s');
    
    if(empty($pass) && empty($pass2)){
        $sql = $mysqli->query("UPDATE jtl_users
             SET email='$email', date_updated='$date_updated' WHERE id='".$_SESSION['id']."' ");
    
        if($sql){
            session_destroy();
            header('Location: index.php');
        }else{
            $mysqli->ernno;
        } 
    }else{
           $sql = $mysqli->query("UPDATE jtl_users
             SET email='$email', pass='".md5($pass)."', pass2='".md5($pass2)."', date_updated='$date_updated' WHERE id='".$_SESSION['id']."' ");
    
        if($sql){
            session_destroy();
            header('Location: index.php');
        }else{
            $mysqli->ernno;
        } 
    }
    
}