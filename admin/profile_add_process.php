<?php
session_start();
include "../config/connect.php";
$folder = "images/profiles/";
if(isset($_POST['simpan'])){
    $user_id = $_POST['user_id'];
    $nick_name = $_POST['nick_name'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $facebook_name = $_POST['facebook_name'];
    $facebook_url = $_POST['facebook_url'];
    $twitter_name = $_POST['twitter_name'];
    $twitter_url = $_POST['twitter_url'];
    $instagram_name = $_POST['instagram_name'];
    $instagram_url = $_POST['instagram_url'];
    $youtube_name = $_POST['youtube_name'];
    $youtube_url = $_POST['youtube_url'];
    $date_created = date('Y-m-d H-i-s');
    $date_updated = date('Y-m-d H-i-s');
    
    $tipeImages = $_FILES['images']['type'];
    $nameImages = $_FILES['images']['name'];
    $sizeImages = $_FILES['images']['size'];

    if($tipeImages=="image/jpg" || $tipeImages=="image/png" || $tipeImages=="image/jpeg"){
        $image = $folder . basename($nameImages);
        if(move_uploaded_file($_FILES['images']['tmp_name'], $image)){
            $sql = $mysqli->query("INSERT INTO jtl_profiles (id, nick_name, full_name, address, phone_number, image, facebook_name, facebook_url, twitter_name, twitter_url, instagram_name, instagram_url, youtube_name, youtube_url, date_created, date_updated, user_id)
                   VALUES ('','$nick_name','$full_name','$address','$phone_number','$image','$facebook_name','$facebook_url','$twitter_name','$twitter_url','$instagram_name','$instagram_url','$youtube_name','$youtube_url', '$date_created', '$date_updated', '$user_id')");
            if($sql){
                header("Location: profile.php");
            }else{
                echo $mysqli->errno;
            }

        }
    }else{
        echo "Format image salah. (JPG, JPEG, PNG)";
    }
}