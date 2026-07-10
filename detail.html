<?php
session_start();
include "../config/koneksi.php";
include "../config/helpers.php";

if(!isset($_SESSION['role']) || $_SESSION['role']!="user"){
    header("Location:../login.php");
    exit;
}

$id=$_GET['id'];
$data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM campaign WHERE id_campaign='$id'"));
$target = max((int)$data['target_dana'],1);
$progress = min(100,($data['dana_terkumpul']/$target)*100);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Campaign</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/style.css">
</head>

<body class="user-page">
<nav class="user-nav">
    <div class="container user-nav-inner">
        <a class="user-brand" href="dashboard.php">
            <span class="brand-mark">D</span>
            DonasiKita
        </a>

        <div class="user-actions">
            <button type="button" class="theme-toggle" data-theme-toggle>Tema Gelap</button>
            <a href="dashboard.php" class="btn btn-secondary btn-sm">Kembali</a>
            <a href="riwayat.php" class="btn btn-warning btn-sm">Riwayat</a>
        </div>
    </div>
</nav>

<main class="container">
    <section class="detail-hero">
        <img class="detail-image" src="<?= htmlspecialchars(campaign_image($data['gambar'])); ?>" alt="<?= htmlspecialchars($data['judul']); ?>">

        <div class="detail-panel">
            <p class="eyebrow">Detail campaign</p>
            <h1><?= htmlspecialchars($data['judul']); ?></h1>
            <p><?= nl2br(htmlspecialchars($data['deskripsi'])); ?></p>

            <div class="fund-box">
                <h4>Progres Donasi</h4>
                <div class="progress mb-3">
                    <div class="progress-bar" style="width:<?= $progress ?>%"></div>
                </div>
                <div class="campaign-meta">
                    <span>
                        Terkumpul
                        <strong>Rp <?= number_format($data['dana_terkumpul']); ?></strong>
                    </span>
                    <span>
                        Target
                        <strong>Rp <?= number_format($data['target_dana']); ?></strong>
                    </span>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <a href="donasi.php?id=<?= $data['id_campaign']; ?>" class="btn btn-success">Donasi Sekarang</a>
                <a href="dashboard.php" class="btn btn-secondary">Lihat Campaign Lain</a>
            </div>
        </div>
    </section>
</main>

<script src="../assets/admin.js"></script>
</body>
</html>
