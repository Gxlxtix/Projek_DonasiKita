<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['role']) || $_SESSION['role']!="user"){
    header("Location:../login.php");
    exit;
}

$id_user=$_SESSION['id'];

$data=mysqli_query($conn,"SELECT d.*,c.judul,p.metode,p.status status_pembayaran
FROM donasi d
JOIN campaign c ON d.id_campaign=c.id_campaign
LEFT JOIN pembayaran p ON p.id_donasi=d.id_donasi
WHERE d.id_user='$id_user'
ORDER BY d.id_donasi DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Riwayat Donasi</title>
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
            <a href="../proses/logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<main class="container history-wrap">
    <section class="content-panel">
        <div class="panel-header">
            <div>
                <p class="eyebrow">Aktivitas kamu</p>
                <h3>Riwayat Donasi</h3>
            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Campaign</th>
                            <th>Nominal</th>
                            <th>Pembayaran</th>
                            <th>Pesan</th>
                            <th>Anonim</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    while($d=mysqli_fetch_array($data)){
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($d['judul']) ?></td>
                            <td><strong>Rp <?= number_format($d['nominal']) ?></strong></td>
                            <td>
                                <?= htmlspecialchars($d['metode'] ?? '-') ?><br>
                                <?php

$status = trim($d['status_pembayaran'] ?? 'Pending');

if($status=="Pending"){

    echo '<span class="badge bg-warning text-dark">Menunggu Konfirmasi</span>';

}elseif($status=="Berhasil"){

    echo '<span class="badge bg-success">Donasi Diterima</span>';

}elseif($status=="Gagal"){

    echo '<span class="badge bg-danger">Donasi Ditolak</span>';

}else{

    echo '<span class="badge bg-secondary">'.$status.'</span>';

}

?>
                            </td>
                            <td><?= htmlspecialchars($d['pesan']) ?></td>
                            <td><span class="badge-status"><?= htmlspecialchars($d['anonim']) ?></span></td>
                            <td><?= htmlspecialchars($d['tanggal']) ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<script src="../assets/admin.js"></script>
</body>
</html>
