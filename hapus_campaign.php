<?php
include "../config/koneksi.php";

$id=$_GET['id'];

$data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT gambar FROM campaign WHERE id_campaign='$id'"));

if(file_exists("../assets/img/".$data['gambar'])){
    unlink("../assets/img/".$data['gambar']);
}

mysqli_query($conn,"DELETE FROM campaign WHERE id_campaign='$id'");

header("Location: campaign.php?hapus=berhasil");
exit;
?>