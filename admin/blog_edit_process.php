<?php
session_start();
require "../config/connect.php";

$folder = "images/blogs/";
if(isset($_POST['edit'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $date_updated = date('Y-m-d H:i:s');
    $category_blog = $_POST['category_blog'];

    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageSize = $_FILES['image']['size'];

    if(empty($imageName)){
        $sql = $mysqli->query("UPDATE jtl_blogs
              SET title='$title', content='$content', date_updated='$date_updated', category_blog='$category_blog' WHERE id='".$_POST['id']."'");
        if($sql){
            header("Location: blogs_list.php");
        }else{
            echo $mysqli->errno;
        }

    }elseif(!empty($imageName)){
        if($imageType == "image/jpg" || $imageType == "image/png" || $imageType == "image/jpeg"){
            $image = $folder . basename($imageName);
            if(move_uploaded_file($_FILES['image']['tmp_name'], $image)){
                $sql = $mysqli->query("UPDATE jtl_blogs
              SET title='$title', content='$content', image='$image', date_updated='$date_updated', category_blog='$category_blog' WHERE id='".$_POST['id']."'");
                if($sql){
                    header("Location: blogs_list.php");
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