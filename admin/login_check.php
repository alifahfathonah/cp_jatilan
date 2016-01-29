<?php
session_start();
require "../config/connect.php";

if(isset($_POST['login_check'])){
    $email = $_POST['email'];
    $password = md5($_POST['pass']);

    $sql = $mysqli->query("SELECT * FROM jtl_users WHERE email='$email'");
    $row = $sql->fetch_array();

    if($email == $row['email'] && $password == $row['pass']){
        header('Location: index.php');
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['pass'] = $row['pass'];
        $_SESSION['pass2'] = $row['pass2'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['status'] = $row['status'];
    }else{
        echo 'Login Failed Bro !';
    }

}