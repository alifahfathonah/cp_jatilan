<?php
session_start();
require "../config/connect.php";

$folder = "images/alat/";
if(isset($_POST['edit'])){

    $user_id = $_POST['user_id'];
    $profile_id = $_POST['profile_id'];
    $name = $_POST['name'];
    $descriptions = $_POST['descriptions'];
    $date_created = date('Y-m-d H:i:s');
    $date_updated = date('Y-m-d H:i:s');

    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageSize = $_FILES['image']['size'];


    if(empty($imageName)){
        $sql = $mysqli->query("UPDATE jtl_accessories
              SET name='$name', descriptions='$descriptions', date_updated='$date_updated' WHERE id='".$_POST['id']."'");
        if($sql){
            header("Location: acc_jatilan_list.php");
        }else{
            echo $mysqli->errno;
        }

    }elseif(!empty($imageName)){
        if($imageType == "image/jpg" || $imageType == "image/png" || $imageType == "image/jpeg"){
            $image = $folder . basename($imageName);
            if(move_uploaded_file($_FILES['image']['tmp_name'], $image)){
                $sql = $mysqli->query("UPDATE jtl_accessories
              SET name='$name', descriptions='$descriptions', image='$image', date_updated='$date_updated' WHERE id='".$_POST['id']."'");
                if($sql){
                    header("Location: acc_jatilan_list.php");
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