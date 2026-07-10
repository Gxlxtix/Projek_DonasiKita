<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['role']) || $_SESSION['role']!="admin"){
    header("Location:../login.php");
    exit;
}

$user=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM users WHERE role='user'"));
$campaign=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM campaign"));
$donasi=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM donasi"));
$dana = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT SUM(dana_terkumpul) AS total
FROM campaign
"));

$totalDana = $dana['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/style.css">
</head>

<body>
<div class="admin-shell">
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-mark">D</div>
            <div>
                <h3 class="brand-title">DonasiKita</h3>
                <p class="brand-subtitle">Admin Panel</p>
            </div>
        </div>

        <nav class="sidebar-nav">
            <a class="active" href="dashboard.php"><span class="nav-icon">01</span> Dashboard</a>
            <a href="campaign.php"><span class="nav-icon">02</span> Campaign</a>
            <a href="user.php"><span class="nav-icon">03</span> User</a>
            <a href="donasi.php"><span class="nav-icon">04</span> Donasi</a>
            <a href="../proses/logout.php"><span class="nav-icon">--</span> Logout</a>
        </nav>
    </aside>

    <main class="main">
        <section class="dashboard-header">
            <div>
                <p class="eyebrow">Ringkasan hari ini</p>
                <h2>Dashboard Admin</h2>
                <p>Selamat datang, <span><?= htmlspecialchars($_SESSION['nama']); ?></span>. Kelola campaign dan pantau donasi dari satu tempat.</p>
            </div>

            <div class="header-actions">
                <button type="button" class="theme-toggle" data-theme-toggle>Tema Gelap</button>
                <a href="campaign.php" class="btn-campaign">Kelola Campaign</a>
            </div>
        </section>

        <section class="stat-grid">
            <div class="stat-card">
                <p class="stat-label">Total User</p>
                <h3 class="stat-value"><?= number_format($user['total']); ?></h3>
                <p class="stat-note">Donatur terdaftar</p>
            </div>

            <div class="stat-card">
                <p class="stat-label">Campaign</p>
                <h3 class="stat-value"><?= number_format($campaign['total']); ?></h3>
                <p class="stat-note">Program aktif dan arsip</p>
            </div>

            <div class="stat-card">
                <p class="stat-label">Donasi</p>
                <h3 class="stat-value"><?= number_format($donasi['total']); ?></h3>
                <p class="stat-note">Transaksi tercatat</p>
            </div>

            <div class="stat-card">
                <p class="stat-label">Total Dana</p>
                <h3 class="stat-value">Rp <?= number_format($totalDana); ?></h3>
                <p class="stat-note">Dana terkumpul</p>
            </div>
        </section>

        <section class="content-panel">
            <div class="panel-header">
                <div>
                    <p class="eyebrow">Monitoring</p>
                    <h4>Campaign Terbaru</h4>
                </div>
                <a href="tambah_campaign.php" class="btn btn-success">Tambah Campaign</a>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Target</th>
                                <th>Terkumpul</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        $data=mysqli_query($conn,"SELECT * FROM campaign ORDER BY id_campaign DESC LIMIT 5");
                        while($d=mysqli_fetch_array($data)){
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($d['judul']) ?></td>
                                <td>Rp <?= number_format($d['target_dana']) ?></td>
                                <td>Rp <?= number_format($d['dana_terkumpul']) ?></td>
                                <td><span class="badge-status"><?= htmlspecialchars($d['status']) ?></span></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>

<script src="../assets/admin.js"></script>
</body>
</html>
