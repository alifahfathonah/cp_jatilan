<?php
session_start();
require "../config/connect.php";

$folder = "images/gallery/";
if(isset($_POST['edit'])){

    $descriptions = $_POST['descriptions'];
    $date_updated = date('Y-m-d H:i:s');
    $category_gallery = $_POST['category_gallery'];

    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageSize = $_FILES['image']['size'];

    if(empty($imageName)){
        $sql = $mysqli->query("UPDATE jtl_gallery
              SET descriptions='$descriptions', date_updated='$date_updated', category_gallery='$category_gallery' WHERE id='".$_POST['id']."'");
        if($sql){
            header("Location: gallery_list.php");
        }else{
            echo $mysqli->errno;
        }

    }elseif(!empty($imageName)){
        if($imageType == "image/jpg" || $imageType == "image/png" || $imageType == "image/jpeg"){
            $image = $folder . basename($imageName);
            if(move_uploaded_file($_FILES['image']['tmp_name'], $image)){
                $sql = $mysqli->query("UPDATE jtl_gallery
              SET descriptions='$descriptions', image='$image', date_updated='$date_updated', category_gallery='$category_gallery' WHERE id='".$_POST['id']."'");
                if($sql){
                    header("Location: gallery_list.php");
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