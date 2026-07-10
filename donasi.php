<?php
session_start();
include "../config/koneksi.php";
include "../config/helpers.php";

if(!isset($_SESSION['role']) || $_SESSION['role']!="admin"){
    header("Location:../login.php");
    exit;
}

$data=mysqli_query($conn,"SELECT
donasi.*,
users.nama,
campaign.judul,
pembayaran.metode,
pembayaran.status status_pembayaran,
pembayaran.bukti_transfer
FROM donasi
JOIN users ON donasi.id_user=users.id
JOIN campaign ON donasi.id_campaign=campaign.id_campaign
LEFT JOIN pembayaran ON pembayaran.id_donasi=donasi.id_donasi
ORDER BY donasi.id_donasi DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Donasi</title>
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
            <a href="user.php"><span class="nav-icon">03</span> User</a>
            <a class="active" href="donasi.php"><span class="nav-icon">04</span> Donasi</a>
            <a href="../proses/logout.php"><span class="nav-icon">--</span> Logout</a>
        </nav>
    </aside>

    <main class="main">
        <section class="topbar">
            <div>
                <p class="eyebrow">Transaksi</p>
                <h2>Data Donasi</h2>
                <p>Pantau donasi terbaru, donatur, nominal, dan pesan dukungan.</p>
            </div>

            <div class="header-actions">
                <button type="button" class="theme-toggle" data-theme-toggle>Tema Gelap</button>
            </div>
        </section>

        <section class="content-panel">
            <div class="panel-header">
                <h4>Riwayat Donasi</h4>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Donatur</th>
                                <th>Campaign</th>
                                <th>Nominal</th>
                                <th>Pembayaran</th>
                                <th>Bukti</th>
                                <th>Pesan</th>
                                <th>Tanggal</th>
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
                                <td>
<?php
if($d['anonim'] == "Ya"){
    echo "Anonim";
}else{
    echo htmlspecialchars($d['nama']);
}
?>
</td>
                                <td><?= htmlspecialchars($d['judul']) ?></td>
                                <td><strong>Rp <?= number_format($d['nominal']) ?></strong></td>
                                <td>
                                    <strong><?= htmlspecialchars($d['metode'] ?? '-') ?></strong><br>
                                    <?php
$status = trim($d['status_pembayaran'] ?? 'Pending');

if($status=="Pending"){

    echo '<span class="badge bg-warning text-dark">Pending</span>';

}elseif($status=="Berhasil"){

    echo '<span class="badge bg-success">✔ Disetujui</span>';

}elseif($status=="Gagal"){

    echo '<span class="badge bg-danger">✖ Ditolak</span>';

}else{

    echo '<span class="badge bg-secondary">'.$status.'</span>';

}
?>
                                </td>
                                <td>
                                    <?php
                                    $proof = payment_proof_image($d['bukti_transfer'] ?? "");
                                    if($proof!=""){
                                    ?>
                                        <a class="proof-link" href="<?= htmlspecialchars($proof); ?>" target="_blank">
                                            <img class="proof-thumb" src="<?= htmlspecialchars($proof); ?>" alt="Bukti pembayaran">
                                            Lihat
                                        </a>
                                    <?php } else { ?>
                                        <span class="text-muted">Belum ada</span>
                                    <?php } ?>
                                </td>
                                <td><?= htmlspecialchars($d['pesan']) ?></td>
                                <td><?= htmlspecialchars($d['tanggal']) ?></td>

                                <td class="text-center">

<?php
$status = trim($d['status_pembayaran'] ?? 'Pending');

if($status == "Pending"){
?>

<div class="d-grid gap-2">

<a href="../proses/update_status.php?id=<?= $d['id_donasi'] ?>&status=Accepted"
class="btn btn-success btn-sm rounded-pill"
onclick="return konfirmasiSetuju(this.href)">
✔ Setujui
</a>

<a href="../proses/update_status.php?id=<?= $d['id_donasi'] ?>&status=Denied"
class="btn btn-danger btn-sm rounded-pill"
onclick="return konfirmasiTolak(this.href)">
✖ Tolak
</a>

</div>

<?php
}elseif($status == "Berhasil"){
?>

<span class="badge bg-success rounded-pill px-3 py-2">
✔ Disetujui
</span>

<?php
}elseif($status == "Gagal"){
?>

<span class="badge bg-danger rounded-pill px-3 py-2">
✖ Ditolak
</span>

<?php
}else{
?>

<span class="badge bg-secondary rounded-pill px-3 py-2">
<?= htmlspecialchars($status) ?>
</span>

<?php } ?>

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
function konfirmasiSetuju(url){

    Swal.fire({
        title: 'Setujui Donasi?',
        text: 'Apakah Anda yakin ingin menyetujui donasi ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Setujui',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#198754',
        cancelButtonColor: '#dc3545'
    }).then((result)=>{

        if(result.isConfirmed){
            window.location.href = url;
        }

    });

    return false;
}

function konfirmasiTolak(url){

    Swal.fire({
        title: 'Tolak Donasi?',
        text: 'Apakah Anda yakin ingin menolak donasi ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Tolak',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d'
    }).then((result)=>{

        if(result.isConfirmed){
            window.location.href = url;
        }

    });

    return false;
}
</script>

<?php if(isset($_GET['notif']) && $_GET['notif']=="accepted"){ ?>
<script>
Swal.fire({
    icon:'success',
    title:'Berhasil!',
    text:'Donasi berhasil disetujui.',
    confirmButtonColor:'#198754'
});
</script>
<?php } ?>

<?php if(isset($_GET['notif']) && $_GET['notif']=="denied"){ ?>
<script>
Swal.fire({
    icon:'error',
    title:'Donasi Ditolak',
    text:'Donasi berhasil ditolak.',
    confirmButtonColor:'#dc3545'
});
</script>
<?php } ?>
</body>
</html>
