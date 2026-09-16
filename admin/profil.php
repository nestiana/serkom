<?php
session_start();
include "../koneksi.php";

/* =========================
   FOLDER FOTO
========================= */
$folderFoto = "../img/profil/";

if (!is_dir($folderFoto)) {
    mkdir($folderFoto, 0777, true);
}

/* =========================
   PESAN
========================= */
$pesan = "";
$tipePesan = "";

/* =========================
   HAPUS DATA
========================= */
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $queryFoto = $conn->query("SELECT foto_kepala, foto_wakil FROM profil WHERE id_profil = $id");

    if ($queryFoto && $queryFoto->num_rows > 0) {
        $dataFoto = $queryFoto->fetch_assoc();

        /* HAPUS FOTO KEPALA */
        if (!empty($dataFoto['foto_kepala'])) {
            $fileKepala = $folderFoto . $dataFoto['foto_kepala'];

            if (file_exists($fileKepala)) {
                unlink($fileKepala);
            }
        }

        /* HAPUS FOTO WAKIL */
        if (!empty($dataFoto['foto_wakil'])) {
            $fileWakil = $folderFoto . $dataFoto['foto_wakil'];

            if (file_exists($fileWakil)) {
                unlink($fileWakil);
            }
        }
    }

    $hapus = $conn->query("DELETE FROM profil WHERE id_profil = $id");

    if ($hapus) {
        $pesan = "Data profil berhasil dihapus.";
        $tipePesan = "success";
    } else {
        $pesan = "Data profil gagal dihapus.";
        $tipePesan = "error";
    }
}

/* =========================
   TAMBAH DATA
========================= */
if (isset($_POST['tambah'])) {
    $nama_kepala = $conn->real_escape_string($_POST['nama_kepala']);
    $nama_wakil = $conn->real_escape_string($_POST['nama_wakil']);
    $sambutan_kepala = $conn->real_escape_string($_POST['sambutan_kepala']);
    $sambutan_wakil = $conn->real_escape_string($_POST['sambutan_wakil']);
    $visi = $conn->real_escape_string($_POST['visi']);
    $misi = $conn->real_escape_string($_POST['misi']);
    $tujuan = $conn->real_escape_string($_POST['tujuan']);

    /* NAMA FOTO */
    $namaFotoKepala = "";
    $namaFotoWakil = "";

    /* =========================
       UPLOAD FOTO KEPALA
    ========================= */
    if (isset($_FILES['foto_kepala']) && $_FILES['foto_kepala']['error'] == 0) {
        $namaAsli = $_FILES['foto_kepala']['name'];
        $tmp = $_FILES['foto_kepala']['tmp_name'];
        $ekstensi = strtolower(pathinfo($namaAsli, PATHINFO_EXTENSION));
        $ekstensiValid = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ekstensi, $ekstensiValid)) {
            $namaFotoKepala = "kepala_" . time() . "." . $ekstensi;
            move_uploaded_file($tmp, $folderFoto . $namaFotoKepala);
        }
    }

    /* =========================
       UPLOAD FOTO WAKIL
    ========================= */
    if (isset($_FILES['foto_wakil']) && $_FILES['foto_wakil']['error'] == 0) {
        $namaAsli = $_FILES['foto_wakil']['name'];
        $tmp = $_FILES['foto_wakil']['tmp_name'];
        $ekstensi = strtolower(pathinfo($namaAsli, PATHINFO_EXTENSION));
        $ekstensiValid = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ekstensi, $ekstensiValid)) {
            $namaFotoWakil = "wakil_" . time() . "." . $ekstensi;
            move_uploaded_file($tmp, $folderFoto . $namaFotoWakil);
        }
    }

    /* =========================
       INSERT DATABASE
    ========================= */
    $sql = "INSERT INTO profil(nama_kepala, nama_wakil, sambutan_kepala, sambutan_wakil, visi, misi, foto_kepala, foto_wakil, tujuan)
            VALUES('$nama_kepala', '$nama_wakil', '$sambutan_kepala', '$sambutan_wakil', '$visi', '$misi', '$namaFotoKepala', '$namaFotoWakil', '$tujuan')";

    if ($conn->query($sql)) {
        $pesan = "Data profil berhasil ditambahkan.";
        $tipePesan = "success";
    } else {
        $pesan = "Data profil gagal ditambahkan: " . $conn->error;
        $tipePesan = "error";
    }
}

/* =========================
   UPDATE DATA
========================= */
if (isset($_POST['edit'])) {
    $id = intval($_POST['id_profil']);
    $nama_kepala = $conn->real_escape_string($_POST['nama_kepala']);
    $nama_wakil = $conn->real_escape_string($_POST['nama_wakil']);
    $sambutan_kepala = $conn->real_escape_string($_POST['sambutan_kepala']);
    $sambutan_wakil = $conn->real_escape_string($_POST['sambutan_wakil']);
    $visi = $conn->real_escape_string($_POST['visi']);
    $misi = $conn->real_escape_string($_POST['misi']);
    $tujuan = $conn->real_escape_string($_POST['tujuan']);

    /* AMBIL FOTO LAMA */
    $queryFoto = $conn->query("SELECT foto_kepala, foto_wakil FROM profil WHERE id_profil = $id");
    $fotoKepalaLama = "";
    $fotoWakilLama = "";

    if ($queryFoto && $queryFoto->num_rows > 0) {
        $dataFoto = $queryFoto->fetch_assoc();
        $fotoKepalaLama = $dataFoto['foto_kepala'];
        $fotoWakilLama = $dataFoto['foto_wakil'];
    }

    $namaFotoKepala = $fotoKepalaLama;
    $namaFotoWakil = $fotoWakilLama;

    /* =========================
       FOTO KEPALA BARU
    ========================= */
    if (isset($_FILES['foto_kepala']) && $_FILES['foto_kepala']['error'] == 0) {
        $namaAsli = $_FILES['foto_kepala']['name'];
        $tmp = $_FILES['foto_kepala']['tmp_name'];
        $ekstensi = strtolower(pathinfo($namaAsli, PATHINFO_EXTENSION));
        $ekstensiValid = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ekstensi, $ekstensiValid)) {
            $namaFotoBaru = "kepala_" . time() . "." . $ekstensi;

            if (move_uploaded_file($tmp, $folderFoto . $namaFotoBaru)) {
                /* HAPUS FOTO LAMA */
                if (!empty($fotoKepalaLama)) {
                    $fileLama = $folderFoto . $fotoKepalaLama;

                    if (file_exists($fileLama)) {
                        unlink($fileLama);
                    }
                }

                $namaFotoKepala = $namaFotoBaru;
            }
        }
    }

    /* =========================
       FOTO WAKIL BARU
    ========================= */
    if (isset($_FILES['foto_wakil']) && $_FILES['foto_wakil']['error'] == 0) {
        $namaAsli = $_FILES['foto_wakil']['name'];
        $tmp = $_FILES['foto_wakil']['tmp_name'];
        $ekstensi = strtolower(pathinfo($namaAsli, PATHINFO_EXTENSION));
        $ekstensiValid = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ekstensi, $ekstensiValid)) {
            $namaFotoBaru = "wakil_" . time() . "." . $ekstensi;

            if (move_uploaded_file($tmp, $folderFoto . $namaFotoBaru)) {
                /* HAPUS FOTO LAMA */
                if (!empty($fotoWakilLama)) {
                    $fileLama = $folderFoto . $fotoWakilLama;

                    if (file_exists($fileLama)) {
                        unlink($fileLama);
                    }
                }

                $namaFotoWakil = $namaFotoBaru;
            }
        }
    }

    /* =========================
       UPDATE DATABASE
    ========================= */
    $sql = "UPDATE profil SET
            nama_kepala = '$nama_kepala',
            nama_wakil = '$nama_wakil',
            sambutan_kepala = '$sambutan_kepala',
            sambutan_wakil = '$sambutan_wakil',
            visi = '$visi',
            misi = '$misi',
            foto_kepala = '$namaFotoKepala',
            foto_wakil = '$namaFotoWakil',
            tujuan = '$tujuan'
        WHERE id_profil = $id";

    if ($conn->query($sql)) {
        $pesan = "Data profil berhasil diperbarui.";
        $tipePesan = "success";
    } else {
        $pesan = "Data profil gagal diperbarui: " . $conn->error;
        $tipePesan = "error";
    }
}

/* =========================
   MODE EDIT
========================= */
$dataEdit = null;

if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $hasilEdit = $conn->query("SELECT * FROM profil WHERE id_profil = $id");

    if ($hasilEdit && $hasilEdit->num_rows > 0) {
        $dataEdit = $hasilEdit->fetch_assoc();
    }
}

/* =========================
   AMBIL DATA
========================= */
$data = $conn->query("SELECT * FROM profil ORDER BY id_profil DESC");

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Profil | SMK RAINBOW BUBBLEGUM</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* =========================
           RESET
        ========================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f4ff;
            color: #26355d;
        }

        /* =========================
           SIDEBAR
        ========================= */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 235px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #eee5f7;
            z-index: 1000;
        }

        /* =========================
           LOGO SIDEBAR
        ========================= */
        .logo {
            height: 145px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 0 18px;
            gap: 10px;
            background: #ffffff;
            border-bottom: 1px solid #eee5f7;
        }

        .logo img {
            width: 50px;
            height: 50px;
            min-width: 50px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            line-height: 1.2;
        }

        .logo h3 {
            font-size: 13px;
            font-weight: 700;
            color: #26355d;
            white-space: nowrap;
            margin: 0;
        }

        .logo span {
            font-size: 8px;
            color: #b45bdd;
            font-weight: 600;
            margin-top: 4px;
            white-space: nowrap;
        }

        /* =========================
           MENU
        ========================= */
        .menu-title {
            font-size: 10px;
            color: #999;
            font-weight: 600;
            padding: 22px 25px 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            text-decoration: none;
            color: #66677b;
            padding: 11px 25px;
            margin: 3px 14px;
            border-radius: 11px;
            font-size: 12px;
            transition: .3s;
        }

        .menu a i {
            width: 18px;
            text-align: center;
        }

        .menu a:hover {
            background: #f8e7fa;
            color: #b34fd0;
        }

        .menu a.active {
            background: linear-gradient(90deg, #ed67b0, #a956df);
            color: white;
            box-shadow: 0 8px 18px rgba(190, 85, 211, .25);
        }

        /* =========================
           LOGOUT
        ========================= */
        .logout {
            position: absolute;
            bottom: 18px;
            width: 100%;
        }

        .logout a {
            color: #ef6262 !important;
        }

        /* =========================
           CONTENT
        ========================= */
        .content {
            margin-left: 235px;
            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================= */
        .topbar {
            height: 82px;
            background: white;
            border-bottom: 1px solid #eee5f7;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .topbar h1 {
            font-size: 25px;
            color: #26355d;
        }

        .topbar p {
            color: #999;
            font-size: 11px;
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f5dff9;
            color: #a956df;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin strong {
            display: block;
            font-size: 13px;
        }

        .admin small {
            color: #999;
            font-size: 9px;
        }

        /* =========================
           MAIN
        ========================= */
        .main {
            padding: 30px;
        }

        /* =========================
           CARD GURU & STAF
        ========================= */
        .guru-card {
            background: white;
            border-radius: 17px;
            padding: 20px 24px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 18px;
            text-decoration: none;
            color: inherit;
            box-shadow: 0 5px 25px rgba(70, 50, 100, .06);
            border-left: 5px solid #e85bad;
            transition: .3s;
            cursor: pointer;
        }

        .guru-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(190, 85, 211, .15);
            border-left-color: #a956df;
        }

        .guru-icon {
            width: 55px;
            height: 55px;
            min-width: 55px;
            border-radius: 15px;
            background: linear-gradient(135deg, #ed67b0, #a956df);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .guru-info {
            flex: 1;
        }

        .guru-info h3 {
            font-size: 15px;
            color: #26355d;
            margin-bottom: 4px;
        }

        .guru-info p {
            font-size: 10px;
            color: #999;
        }

        .guru-arrow {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #f8e7fa;
            color: #a956df;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .3s;
        }

        .guru-card:hover .guru-arrow {
            background: #a956df;
            color: white;
        }

        /* =========================
           ALERT
        ========================= */
        .alert {
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 12px;
        }

        .alert.success {
            background: #e8f8ee;
            color: #269653;
        }

        .alert.error {
            background: #ffe8e8;
            color: #dc4e4e;
        }

        /* =========================
           CARD
        ========================= */
        .card {
            background: white;
            border-radius: 17px;
            padding: 24px;
            margin-bottom: 25px;
            box-shadow: 0 5px 25px rgba(70, 50, 100, .06);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-header h2 {
            font-size: 17px;
            color: #26355d;
        }

        .card-header p {
            font-size: 10px;
            color: #999;
            margin-top: 3px;
        }

        /* =========================
           BUTTON
        ========================= */
        .btn {
            border: none;
            padding: 9px 15px;
            border-radius: 9px;
            cursor: pointer;
            font-family: inherit;
            font-size: 11px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .btn-primary {
            background: linear-gradient(90deg, #ed67b0, #a956df);
            color: white;
        }

        .btn-edit {
            background: #eee3ff;
            color: #9252c7;
        }

        .btn-delete {
            background: #ffe5e5;
            color: #df5555;
        }

        /* =========================
           FORM
        ========================= */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 17px;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            color: #4d5270;
            margin-bottom: 7px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            border: 1px solid #e5deed;
            border-radius: 9px;
            padding: 11px 13px;
            outline: none;
            font-family: inherit;
            font-size: 11px;
            color: #444;
            background: #fff;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #c05cdd;
            box-shadow: 0 0 0 3px #f8e7fa;
        }

        /* =========================
           FOTO
        ========================= */
        .foto-lama {
            margin-top: 8px;
        }

        .foto-lama img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* =========================
           TABLE
        ========================= */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 1500px;
            border-collapse: collapse;
        }

        th,
        td {
            white-space: normal;
        }

        td {
            max-width: 250px;
        }

        td img {
            width: 55px;
            height: 55px;
            border-radius: 9px;
            object-fit: cover;
        }

        .aksi {
            display: flex;
            gap: 7px;
        }

        /* =========================
           RESPONSIVE
        ========================= */
        @media(max-width: 850px) {
            .sidebar {
                width: 190px;
            }

            .content {
                margin-left: 190px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

        }

        @media(max-width: 650px) {
            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
            }

            .main {
                padding: 15px;
            }

            .topbar {
                padding: 0 15px;
            }
        }
    </style>
</head>
<body>
    <!-- =========================
         SIDEBAR
    ========================= -->
    <div class="sidebar">
        <!-- LOGO -->
        <div class="logo">
            <img src="../img/logo.jpg" alt="Logo">
            <div class="logo-text">
                <h3>SMK RAINBOW</h3>
                <span>ADMIN PANEL</span>
            </div>
        </div>

        <div class="menu-title">
            MENU UTAMA
        </div>
        <div class="menu">
            <a href="dashboard.php">
                <i class="fa-solid fa-gauge"></i>
                Dashboard
            </a>

            <a href="profil.php" class="active">
                <i class="fa-solid fa-user"></i>
                Kelola Sambutan
            </a>

            <a href="ekstrakurikuler.php">
                <i class="fa-solid fa-people-group"></i>
                Ekstrakurikuler
            </a>

            <a href="galeri.php">
                <i class="fa-solid fa-images"></i>
                Galeri
            </a>

            <a href="galeri_eskul.php">
                <i class="fa-solid fa-photo-film"></i>
                Galeri Eskul
            </a>

            <a href="tentang-sekolah.php">
                <i class="fa-solid fa-chalkboard-user"></i>
                Tentang Sekolah
            </a>

            <a href="jurusan.php">
                <i class="fa-solid fa-school"></i>
                Jurusan
            </a>

            <a href="kegiatan_eskul.php">
                <i class="fa-solid fa-calendar-days"></i>
                Kegiatan Eskul
            </a>

            <a href="manfaat_eskul.php">
                <i class="fa-solid fa-star"></i>
                Manfaat Eskul
            </a>
        </div>

        <!-- LOGOUT -->
        <div class="logout">
            <div class="menu">
                <a href="logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </a>
            </div>
        </div>

    </div>

    <!-- =========================
         CONTENT
    ========================= -->
    <div class="content">
        <!-- TOPBAR -->
        <div class="topbar">
            <div>
                <h1>Profil Sekolah</h1>
                <p>
                    Kelola informasi profil SMK RAINBOW BUBBLEGUM
                </p>
            </div>

            <div class="admin">
                <div class="admin-icon">
                    <i class="fa-solid fa-user"></i>
                </div>

                <div>
                    <strong>admin</strong>
                    <small>Administrator</small>
                </div>
            </div>

        </div>

        <div class="main">
            <!-- =========================
                 PESAN
            ========================= -->
            <?php if (!empty($pesan)): ?>
                <div class="alert <?= $tipePesan ?>">
                    <i class="fa-solid fa-circle-check"></i>
                    <?= htmlspecialchars($pesan) ?>
                </div>
            <?php endif; ?>

            <!-- =========================
                 FORM
            ========================= -->
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2>
                            <?= $dataEdit ? "Edit Profil Sekolah" : "Tambah Profil Sekolah" ?>
                        </h2>
                        <p>
                            Isi data sesuai informasi sekolah
                        </p>
                    </div>
                </div>

                <form method="POST" enctype="multipart/form-data">
                    <?php if ($dataEdit): ?>
                        <input type="hidden" name="id_profil" value="<?= $dataEdit['id_profil'] ?>">
                    <?php endif; ?>

                    <div class="form-grid">
                        <!-- KEPALA -->
                        <div class="form-group">
                            <label>
                                Nama Kepala Sekolah
                            </label>
                            <input type="text" name="nama_kepala" placeholder="Contoh: Nesti S.Pd., M.Pd." value="<?= $dataEdit ? htmlspecialchars($dataEdit['nama_kepala']) : ''?>" required>
                        </div>

                        <!-- WAKIL -->
                        <div class="form-group">
                            <label>
                                Nama Wakil Kepala Sekolah
                            </label>
                            <input type="text" name="nama_wakil" placeholder="Nama Wakil Kepala Sekolah" value="<?= $dataEdit ? htmlspecialchars($dataEdit['nama_wakil']) : '' ?>" required>
                        </div>

                        <!-- SAMBUTAN -->
                        <div class="form-group">
                            <label>Sambutan Kepala Sekolah</label>
                            <textarea name="sambutan_kepala" placeholder="Tulis sambutan kepala sekolah..."><?= $dataEdit ? htmlspecialchars($dataEdit['sambutan_kepala']) : '' ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Sambutan Wakil Kepala Sekolah</label>
                            <textarea name="sambutan_wakil" placeholder="Tulis sambutan wakil kepala sekolah..."><?= $dataEdit ? htmlspecialchars($dataEdit['sambutan_wakil']) : '' ?></textarea>
                        </div>

                        <!-- VISI -->
                        <div class="form-group">
                            <label>
                                Visi
                            </label>
                            <textarea name="visi" placeholder="Masukkan visi sekolah..." required>
                                <?= $dataEdit ? htmlspecialchars($dataEdit['visi']) : '' ?>
                            </textarea>
                        </div>

                        <!-- MISI -->
                        <div class="form-group">
                            <label>
                                Misi
                            </label>
                            <textarea name="misi" placeholder="Masukkan misi sekolah..." required>
                                <?= $dataEdit ? htmlspecialchars($dataEdit['misi']) : '' ?>
                            </textarea>
                        </div>

                        <!-- TUJUAN -->
                        <div class="form-group full">
                            <label>
                                Tujuan
                            </label>
                            <textarea name="tujuan" placeholder="Masukkan tujuan sekolah..." required>
                                <?= $dataEdit ? htmlspecialchars($dataEdit['tujuan']) : ''?>
                            </textarea>
                        </div>

                        <!-- =========================
                             FOTO KEPALA SEKOLAH
                        ========================= -->

                        <div class="form-group">
                            <label>
                                Foto Kepala Sekolah
                            </label>
                            <input type="file" name="foto_kepala" accept=".jpg,.jpeg,.png,.webp">

                            <?php if ($dataEdit && !empty($dataEdit['foto_kepala'])): ?>
                                <div class="foto-lama">
                                    <p style="font-size:10px; color:#999; margin-bottom:5px;">
                                        Foto Kepala saat ini:
                                    </p>

                                    <img src="../img/profil/<?= htmlspecialchars($dataEdit['foto_kepala']) ?>" alt="Foto Kepala Sekolah">
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- =========================
                             FOTO WAKIL KEPALA
                        ========================= -->
                        <div class="form-group">
                            <label>
                                Foto Wakil Kepala Sekolah
                            </label>
                            <input type="file" name="foto_wakil" accept=".jpg,.jpeg,.png,.webp">

                            <?php if ($dataEdit && !empty($dataEdit['foto_wakil'])): ?>
                                <div class="foto-lama">
                                    <p style="font-size:10px; color:#999; margin-bottom:5px;">
                                        Foto Wakil saat ini:
                                    </p>
                                    <img src="../img/profil/<?= htmlspecialchars($dataEdit['foto_wakil']) ?>" alt="Foto Wakil Kepala Sekolah">
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- BUTTON -->
                        <div style="margin-top:20px; display:flex; gap:10px;">
                            <?php if ($dataEdit): ?>
                                <button type="submit" name="edit" class="btn btn-primary">
                                    <i class="fa-solid fa-pen"></i>
                                    Simpan Perubahan
                                </button>
                                <a href="profil.php" class="btn btn-edit">
                                    <i class="fa-solid fa-xmark"></i>
                                    Batal
                                </a>
                            <?php else: ?>
                                <button type="submit" name="tambah" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                    Tambah Profil
                                </button>
                            <?php endif; ?>
                        </div>

                </form>
            </div>

            <!-- =========================
                 DATA PROFIL
            ========================= -->
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2>
                            Data Profil Sekolah
                        </h2>
                        <p>
                            Data yang tersimpan di database
                        </p>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Kepala</th>
                                <th>Foto Wakil</th>
                                <th>Kepala Sekolah</th>
                                <th>Wakil Kepala</th>
                                <th>Sambutan Kepala</th>
                                <th>Sambutan Wakil</th>
                                <th>Visi</th>
                                <th>Misi</th>
                                <th>Tujuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $no = 1;

                        if ($data && $data->num_rows > 0): while ($row = $data->fetch_assoc()):
                        ?>

                        <tr>
                            <!-- NO -->
                            <td>
                                <?= $no++ ?>
                            </td>

                            <!-- FOTO KEPALA -->
                            <td>
                                <?php if (!empty($row['foto_kepala'])): ?>
                                    <img src="../img/profil/<?= htmlspecialchars($row['foto_kepala']) ?>" alt="Foto Kepala">
                                <?php else: ?>
                                    <span style="color:#aaa;">Tidak ada</span>
                                <?php endif; ?>
                            </td>

                            <!-- FOTO WAKIL -->
                            <td>
                                <?php if (!empty($row['foto_wakil'])): ?>
                                    <img src="../img/profil/<?= htmlspecialchars($row['foto_wakil']) ?>" alt="Foto Wakil">
                                <?php else: ?>
                                    <span style="color:#aaa;">Tidak ada</span>
                                <?php endif; ?>
                            </td>

                            <!-- NAMA KEPALA -->
                            <td>
                                <?= htmlspecialchars($row['nama_kepala']) ?>
                            </td>

                            <!-- NAMA WAKIL -->
                            <td>
                                <?= htmlspecialchars($row['nama_wakil']) ?>
                            </td>

                            <!-- SAMBUTAN KEPALA -->
                            <td style="max-width:250px;">
                                <?= htmlspecialchars(mb_substr($row['sambutan_kepala'], 0, 80)) ?>
                                <?php if (strlen($row['sambutan_kepala']) > 80): ?>
                                    ...
                                <?php endif; ?>
                            </td>

                            <!-- SAMBUTAN WAKIL -->
                            <td style="max-width:250px;">
                                <?= htmlspecialchars(mb_substr($row['sambutan_wakil'], 0, 80)) ?>
                                <?php if (strlen($row['sambutan_wakil']) > 80): ?>
                                    ...
                                <?php endif; ?>
                            </td>

                            <!-- VISI -->
                            <td style="max-width:250px;">
                                <?= htmlspecialchars(mb_substr($row['visi'], 0, 80)) ?>
                                <?php if (strlen($row['visi']) > 80): ?>
                                    ...
                                <?php endif; ?>
                            </td>

                            <!-- MISI -->
                            <td style="max-width:250px;">
                                <?= htmlspecialchars(mb_substr($row['misi'], 0, 80)) ?>
                                <?php if (strlen($row['misi']) > 80): ?>
                                    ...
                                <?php endif; ?>
                            </td>

                            <!-- TUJUAN -->
                            <td style="max-width:250px;">
                                <?= htmlspecialchars(mb_substr($row['tujuan'], 0, 80)) ?>
                                <?php if (strlen($row['tujuan']) > 80): ?>
                                    ...
                                <?php endif; ?>
                            </td>

                            <!-- AKSI -->
                            <td>
                                <div class="aksi">
                                    <a href="profil.php?edit=<?= $row['id_profil'] ?>" class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i>
                                        Edit
                                    </a>

                                    <a href="profil.php?hapus=<?= $row['id_profil'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data profil ini?')">
                                        <i class="fa-solid fa-trash"></i>
                                        Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <?php endwhile;
                        else:
                        ?>

                        <tr>
                            <td colspan="11" style="text-align:center; padding:30px; color:#999;">
                                <i class="fa-solid fa-folder-open" style="font-size:30px; margin-bottom:10px;"></i>
                                <br>
                                Belum ada data profil.
                            </td>
                        </tr>
                        <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>