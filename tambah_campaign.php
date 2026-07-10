<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['role']) || $_SESSION['role']!="admin"){
    header("Location:../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Campaign</title>
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
            <a class="active" href="campaign.php"><span class="nav-icon">02</span> Campaign</a>
            <a href="user.php"><span class="nav-icon">03</span> User</a>
            <a href="donasi.php"><span class="nav-icon">04</span> Donasi</a>
            <a href="../proses/logout.php"><span class="nav-icon">--</span> Logout</a>
        </nav>
    </aside>

    <main class="main">
        <section class="topbar">
            <div>
                <p class="eyebrow">Campaign baru</p>
                <h2>Tambah Campaign</h2>
                <p>Buat program donasi baru lengkap dengan target, periode, dan gambar.</p>
            </div>

            <div class="header-actions">
                <button type="button" class="theme-toggle" data-theme-toggle>Tema Gelap</button>
                <a href="campaign.php" class="btn btn-secondary">Kembali</a>
            </div>
        </section>

        <section class="content-panel admin-form">
            <div class="panel-header">
                <h4>Detail Campaign</h4>
            </div>

            <div class="panel-body">
                <form action="simpan_campaign.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                        <?php
                        $kategori=mysqli_query($conn,"SELECT * FROM kategori");
                        while($k=mysqli_fetch_array($kategori)){
                        ?>
                            <option value="<?= $k['id_kategori']; ?>"><?= htmlspecialchars($k['nama_kategori']); ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Campaign</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" rows="5" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Target Dana</label>
                        <input type="number" name="target" class="form-control" required>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" name="mulai" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="date" name="selesai" class="form-control">
                        </div>
                    </div>

                    <div class="my-3">
                        <label class="form-label">Upload Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-success">Simpan</button>
                        <a href="campaign.php" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>

<script src="../assets/admin.js"></script>
</body>
</html>
