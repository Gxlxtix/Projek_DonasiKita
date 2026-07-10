<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['role']) || $_SESSION['role']!="admin"){
    header("Location:../login.php");
    exit;
}

$data=mysqli_query($conn,"SELECT * FROM users WHERE role='user'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data User</title>
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
            <a href="dashboard.php"><span class="nav-icon">01</span> Dashboard</a>
            <a href="campaign.php"><span class="nav-icon">02</span> Campaign</a>
            <a class="active" href="user.php"><span class="nav-icon">03</span> User</a>
            <a href="donasi.php"><span class="nav-icon">04</span> Donasi</a>
            <a href="../proses/logout.php"><span class="nav-icon">--</span> Logout</a>
        </nav>
    </aside>

    <main class="main">
        <section class="topbar">
            <div>
                <p class="eyebrow">Donatur</p>
                <h2>Data User</h2>
                <p>Lihat informasi pengguna yang terdaftar sebagai donatur.</p>
            </div>

            <div class="header-actions">
                <button type="button" class="theme-toggle" data-theme-toggle>Tema Gelap</button>
            </div>
        </section>

        <section class="content-panel">
            <div class="panel-header">
                <h4>Daftar User</h4>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        while($u=mysqli_fetch_array($data)){
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($u['nama']) ?></td>
                                <td><?= htmlspecialchars($u['email']) ?></td>
                                <td><?= htmlspecialchars($u['no_hp']) ?></td>
                                <td><?= htmlspecialchars($u['alamat']) ?></td>
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
