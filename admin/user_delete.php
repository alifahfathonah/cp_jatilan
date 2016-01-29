<?php

require "../config/connect.php";

if(isset($_GET['id'])){
    $sql = $mysqli->query("DELETE FROM jtl_users WHERE id=".$_GET['id']);
    if($sql){
        header("Location: user.php");
    }else{
        echo "Data gagal dihapus, Karena user tersebut masih berkontribusi pada sistem ini. <a href='user.php'>Back</a>";
    }
}