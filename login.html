<?php
session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: user/dashboard.php");
    }
}

$error = isset($_GET['error']) ? $_GET['error'] : "";
$success = isset($_GET['success']) ? $_GET['success'] : "";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DonasiKita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body class="auth-page">
<main class="container auth-wrap">
    <section class="auth-intro">
        <div>
            <a class="auth-brand" href="index.php">
                <span class="brand-mark">D</span>
                DonasiKita
            </a>

            <h1>Masuk dan lanjutkan kebaikanmu.</h1>
            <p>Pantau campaign, berdonasi lebih cepat, dan lihat riwayat dukunganmu dalam satu akun.</p>
        </div>

        <div class="auth-highlights">
            <div class="auth-highlight">
                <strong>Aman</strong>
                <span>Akun donatur tersimpan</span>
            </div>
            <div class="auth-highlight">
                <strong>Cepat</strong>
                <span>Donasi dalam beberapa langkah</span>
            </div>
            <div class="auth-highlight">
                <strong>Rapi</strong>
                <span>Riwayat donasi tercatat</span>
            </div>
        </div>
    </section>

    <section class="auth-card">
        <div class="auth-card-header">
            <div>
                <p class="eyebrow">Selamat datang</p>
                <h2>Login</h2>
                <p class="mb-0">Gunakan email dan password akun kamu.</p>
            </div>
            <button type="button" class="theme-toggle" data-theme-toggle>Tema Gelap</button>
        </div>

        <?php if($error === "salah"){ ?>
            <div class="auth-alert error">Email atau password salah. Coba cek kembali ya.</div>
        <?php } ?>

        <?php if($success === "register"){ ?>
            <div class="auth-alert success">Registrasi berhasil. Silakan login dengan akun baru kamu.</div>
        <?php } ?>

        <form action="proses/login.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Login</button>
        </form>

        <hr>

        <p class="mb-0">Belum punya akun? <a href="register.php" class="auth-link">Daftar sekarang</a></p>
    </section>
</main>

<script src="assets/admin.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if($error=="salah"){ ?>

<script>
Swal.fire({
    icon:'error',
    title:'Login Gagal',
    text:'Email atau Password yang Anda masukkan salah.',
    confirmButtonColor:'#dc3545'
});
</script>

<?php } ?>

<?php if($success=="register"){ ?>

<script>
Swal.fire({
    icon:'success',
    title:'Registrasi Berhasil',
    text:'Silakan login menggunakan akun yang baru dibuat.',
    confirmButtonColor:'#198754'
});
</script>

<?php } ?>
</html>
