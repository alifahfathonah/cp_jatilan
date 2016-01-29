<?php
session_start();
require "../config/connect.php";

$folder = "images/members/";
if(isset($_POST['edit'])){
    $id = $_POST['id'];
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

    $date_updated = date('Y-m-d H:i:s');

    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageSize = $_FILES['image']['size'];


    if(empty($imageName)){
        $sql = $mysqli->query("UPDATE jtl_members
              SET member_name='$name', gender='$gender', address='$address', motto='$motto', self_status='$self_status', facebook_url='$facebook_url', twitter_url='$twitter_url', instagram_url='$instagram_url', active_status='$self_status', date_updated='$date_updated', category_member='$category_member', user_id='$user_id', profile_id='$profile_id' WHERE id='".$_POST['id']."'");
        if($sql){
            header("Location: members.php");
        }else{
            echo $mysqli->errno;
        }

    }elseif(!empty($imageName)){
        if($imageType == "image/jpg" || $imageType == "image/png" || $imageType == "image/jpeg"){
            $image = $folder . basename($imageName);
            if(move_uploaded_file($_FILES['image']['tmp_name'], $image)){
                 $sql = $mysqli->query("UPDATE jtl_members
              SET member_name='$name', gender='$gender', image='$image', address='$address', motto='$motto', self_status='$self_status', facebook_url='$facebook_url', twitter_url='$twitter_url', instagram_url='$instagram_url', active_status='$self_status', date_updated='$date_updated', category_member='$category_member', user_id='$user_id', profile_id='$profile_id' WHERE id='".$_POST['id']."'");
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
}