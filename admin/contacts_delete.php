<?php
/*
 * Masalah : jika gambar di hapus, gambar yang ada pada folder 'image' belum kehapus.
 */
require "../config/connect.php";

if(isset($_GET['id'])){
    $sql = $mysqli->query("DELETE FROM jtl_contacts WHERE id=".$_GET['id']);
    header("Location: contacts.php");
}