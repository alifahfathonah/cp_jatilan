<?php
session_start();
require "../config/connect.php";

$folder = "images/members/";
if(isset($_POST['simpan'])){

    $profile_id = $_POST['profile_id'];
    $user_id = $_POST['user_id'];

    $name = $_POST['member_name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $motto = $_POST['motto'];
    $self_status = $_POST['self_status'];
    $facebook_url = $_POST['facebook_url'];
    $twitter_url = $_POST['twitter_url'];
    $instagram_url = $_POST['instagram_url'];
    $category_member = $_POST['category_member'];
    $status = $_POST['active_status'];

    $date_created = date('Y-m-d H:i:s');
    $date_updated = date('Y-m-d H:i:s');

    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageSize = $_FILES['image']['size'];

    if($imageType == "image/jpg" || $imageType == "image/png" || $imageType == "image/jpeg"){
        $image = $folder . basename($imageName);
        if(move_uploaded_file($_FILES['image']['tmp_name'], $image)){
            $sql = $mysqli->query("INSERT INTO jtl_members (member_name, gender, address, image, self_status, motto, facebook_url, twitter_url, instagram_url, active_status, date_created, date_updated, category_member, user_id, profile_id) VALUES
                ('$name','$gender','$address','$image','$self_status','$motto','$facebook_url','$twitter_url','$instagram_url','$status','$date_created','$date_updated','$category_member','$user_id','$profile_id')");
            if($sql){
                header("Location: members.php");
            }else{
                echo $mysqli->errno;
            }
        }else{
            echo "gagal upload";
        }
    }else{
        echo "type image salah";
    }
}