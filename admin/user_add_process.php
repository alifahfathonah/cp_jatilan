<?php

require "../config/connect.php";

if(isset($_POST['simpan'])){
    $email = $mysqli->real_escape_string($_POST['email']);
    $pass = md5($mysqli->real_escape_string($_POST['pass']));
    $pass2 = md5($mysqli->real_escape_string($_POST['pass2']));
    $date_created = date('Y-m-d H:i:s');
    $date_updated = date('Y-m-d H:i:s');
    $level = $_POST['level'];
    $status = $_POST['status'];

    if($pass == $pass2){
        $sql = $mysqli->query("INSERT INTO jtl_users (id, email, pass, pass2, level, status, date_created, date_updated) VALUES ('','$email','$pass','$pass2','$level','$status','$date_created','$date_updated')");
        if($sql){
            header('Location: user.php');
            die();
        }else{
            echo $mysqli->errno;
        }
    }else{
        echo "<script language='javascript'>
                alert('Periksa kembali form isian anda. Kemungkinan password anda tidak sama. Ingat ! minimal panjang karakter password 5 karater');
                window.location.href='user.php';
            </script>";

    }

}else{
    echo 'gagal simpan';
}
