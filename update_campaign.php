<?php
include "../config/koneksi.php";
include "../config/helpers.php";

$id=$_POST['id'];
$kategori=$_POST['kategori'];
$judul=$_POST['judul'];
$deskripsi=$_POST['deskripsi'];
$target=$_POST['target'];
$mulai=$_POST['mulai'];
$selesai=$_POST['selesai'];

$gambar=$_FILES['gambar']['name'];
$tmp=$_FILES['gambar']['tmp_name'];
$uploadDir=ensure_campaign_image_dir();

if($gambar!=""){

    move_uploaded_file($tmp,$uploadDir."/".$gambar);

}else{

    $gambar=$_POST['gambar_lama'];

}

mysqli_query($conn,"UPDATE campaign SET

id_kategori='$kategori',
judul='$judul',
deskripsi='$deskripsi',
target_dana='$target',
tanggal_mulai='$mulai',
tanggal_selesai='$selesai',
gambar='$gambar'

WHERE id_campaign='$id'");

header("Location:campaign.php");
?>
