<?php
/*
 * Masalah : - jika gambar di update, gambar pada folder 'image' projek belum bisa ke update.
 *           - jika mengupdate gambar dengan nama yang sama, gambar yang lama akan di replace.
 */
session_start();
require "../config/connect.php";
$folder = "images/";
$fileImage = "images./".$_POST['image'];
$id = $_POST['id'];
if(isset($_POST['update'])){

    $typeImage = $_FILES['image']['type'];
    $nameImage = $_FILES['image']['name'];
    $sizeImage = $_FILES['image']['size'];
    

    if(!empty($nameImage)){
        if($typeImage == "image/jpeg" || $typeImage == "image/png" || $typeImage == "image/jpg" || $typeImage == "image/gif"){
            $image = $folder . basename($nameImage);
            if(move_uploaded_file($_FILES['image']['tmp_name'], $image)){
                $sql = $mysqli->query("UPDATE jtl_about SET
                title='".$_POST['title']."',
                content='".$_POST['content']."',
                date_updated='".date('Y-m-d H:i:s')."',
                image='$image',
                user_id='".$_POST['user_id']."', profile_id='".$_POST['profile_id']."' WHERE id='$id'
                ");
                if($sql){
                    header("Location: about.php");
                    die();
                }else{
                    echo $mysqli->errno;
                }
            }else{
                echo "Gagal upload gambar";
            }
        }else{
            echo "Jenis gambar yang diupload salah.";
        }
    }elseif(empty($nameImage)){
        $sql = $mysqli->query("UPDATE jtl_about SET
                title='".$_POST['title']."',
                content='".$_POST['content']."',
                date_updated='".date('Y-m-d H:i:s')."',
                user_id='".$_POST['user_id']."', profile_id='".$_POST['profile_id']."' WHERE id='$id'
                ");
        if($sql){
            header("Location: about.php");
            die();
        }else{
            echo $mysqli->errno;
        }

    }


}