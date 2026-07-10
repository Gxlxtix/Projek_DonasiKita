<?php
session_start();
include "../config/koneksi.php";
include "../config/helpers.php";

if(!isset($_SESSION['role']) || $_SESSION['role']!="admin"){
    header("Location:../login.php");
    exit;
}

$keyword = isset($_GET['cari']) ? mysqli_real_escape_string($conn,$_GET['cari']) : '';
$where = $keyword ? "WHERE campaign.judul LIKE '%$keyword%' OR kategori.nama_kategori LIKE '%$keyword%'" : "";

$data=mysqli_query($conn,"SELECT campaign.*,kategori.nama_kategori
FROM campaign
JOIN kategori ON campaign.id_kategori=kategori.id_kategori
$where
ORDER BY campaign.id_campaign DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Campaign</title>
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
                <p class="eyebrow">Manajemen</p>
                <h2>Data Campaign</h2>
                <p>Atur daftar campaign, kategori, target dana, dan status program.</p>
            </div>

            <div class="header-actions">
                <button type="button" class="theme-toggle" data-theme-toggle>Tema Gelap</button>
                <a href="tambah_campaign.php" class="btn btn-success">Tambah Campaign</a>
            </div>
        </section>

        <section class="content-panel">
            <div class="panel-header">
                <h4>Daftar Campaign</h4>
                <form method="GET" class="d-flex gap-2">
                    <input type="text" name="cari" class="form-control" placeholder="Cari campaign" value="<?= htmlspecialchars($keyword); ?>">
                    <button class="btn btn-success">Cari</button>
                </form>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Target</th>
                                <th>Terkumpul</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        while($d=mysqli_fetch_array($data)){
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img class="campaign-thumb" src="<?= htmlspecialchars(campaign_image($d['gambar'])); ?>" alt="<?= htmlspecialchars($d['judul']); ?>"></td>
                                <td><?= htmlspecialchars($d['judul']); ?></td>
                                <td><?= htmlspecialchars($d['nama_kategori']); ?></td>
                                <td>Rp <?= number_format($d['target_dana']); ?></td>
                                <td>Rp <?= number_format($d['dana_terkumpul']); ?></td>
                                <td><span class="badge-status"><?= htmlspecialchars($d['status']); ?></span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="edit_campaign.php?id=<?= $d['id_campaign']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#"
onclick="hapusCampaign(<?= $d['id_campaign']; ?>)"
class="btn btn-danger btn-sm">
    Hapus
</a>
                                    </div>
                                </td>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function hapusCampaign(id){

    Swal.fire({
        title: 'Hapus Campaign?',
        text: 'Data campaign yang dihapus tidak dapat dikembalikan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result)=>{

        if(result.isConfirmed){

            window.location =
            'hapus_campaign.php?id='+id;

        }

    });

}
</script>

<?php if(isset($_GET['hapus'])){ ?>

<script>
Swal.fire({
    icon:'success',
    title:'Berhasil',
    text:'Campaign berhasil dihapus.',
    confirmButtonColor:'#198754'
});
</script>

<?php } ?>
</body>
</html>
