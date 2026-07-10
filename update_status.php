<?php
include "../config/koneksi.php";

$id = intval($_GET['id']);
$status = $_GET['status'];

// Ambil data donasi beserta status lama
$q = mysqli_query($conn,"
SELECT d.id_campaign,
       d.nominal,
       p.status
FROM donasi d
JOIN pembayaran p ON d.id_donasi = p.id_donasi
WHERE d.id_donasi = '$id'
");

$data = mysqli_fetch_assoc($q);

if(!$data){
    die("Data donasi tidak ditemukan");
}

$id_campaign = $data['id_campaign'];
$nominal     = $data['nominal'];
$statusLama  = $data['status'];

if($status=="Accepted"){

    // Tambah dana hanya jika sebelumnya belum Berhasil
    if($statusLama != "Berhasil"){

        mysqli_query($conn,"
        UPDATE campaign
        SET dana_terkumpul = dana_terkumpul + $nominal
        WHERE id_campaign = '$id_campaign'
        ");

    }

    mysqli_query($conn,"
    UPDATE pembayaran
    SET status='Berhasil'
    WHERE id_donasi='$id'
    ");

    header("Location: ../admin/donasi.php?notif=accepted");
    exit;
}

if($status=="Denied"){

    // Kurangi dana jika sebelumnya sudah Berhasil
    if($statusLama == "Berhasil"){

        mysqli_query($conn,"
        UPDATE campaign
        SET dana_terkumpul = dana_terkumpul - $nominal
        WHERE id_campaign = '$id_campaign'
        ");

    }

    mysqli_query($conn,"
    UPDATE pembayaran
    SET status='Gagal'
    WHERE id_donasi='$id'
    ");

    header("Location: ../admin/donasi.php?notif=denied");
    exit;
}