<?php
session_start();
include "../config/connect.php";
$folder = "images/profiles/";
if(isset($_POST['edit'])){
    $id = $_POST['id'];
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

    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageSize = $_FILES['image']['size'];

    if(!empty($imageName)){
        if($imageType == "image/jpg" || $imageType == "image/jpeg" || $imageType == "image/png"){
            $image = $folder . basename($imageName);
            if(move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
                $sql = $mysqli->query("UPDATE jtl_profiles SET
                  nick_name ='$nick_name',
                  full_name = '$full_name',
                  address = '$address',
                  phone_number = '$phone_number',
                  image = '$image',
                  facebook_name = '$facebook_name',
                  facebook_url = '$facebook_url',
                  twitter_name = '$twitter_name',
                  twitter_url = '$twitter_url',
                  instagram_name = '$instagram_name',
                  instagram_url = '$instagram_url',
                  youtube_name = '$youtube_name',
                  youtube_url = '$youtube_url' WHERE id='$id'
                  ");

                if($sql){
                    header("Location: profile.php");
                    die();
                }else{
                    echo $mysqli->errno;
                }
            }else{
                echo "gagal upload";
            }
        }else{
            echo "Format gambar salah";
        }
    }elseif(empty($imageName)){
        $sql = $mysqli->query("UPDATE jtl_profiles SET
                  nick_name ='$nick_name',
                  full_name = '$full_name',
                  address = '$address',
                  phone_number = '$phone_number',
                  facebook_name = '$facebook_name',
                  facebook_url = '$facebook_url',
                  twitter_name = '$twitter_name',
                  twitter_url = '$twitter_url',
                  instagram_name = '$instagram_name',
                  instagram_url = '$instagram_url',
                  youtube_name = '$youtube_name',
                  youtube_url = '$youtube_url' WHERE id='$id'
                  ");
        if($sql){
            header("Location: profile.php");
            die();
        }else{
            echo $mysqli->errno;
        }
    }

}