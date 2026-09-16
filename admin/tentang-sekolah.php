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
   AMBIL DATA PROFIL
========================= */
$query = mysqli_query(
    $conn,
    "SELECT * FROM profil ORDER BY id_profil DESC LIMIT 1"
);

$data = mysqli_fetch_assoc($query);


/* =========================
   SIMPAN DATA
========================= */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama_sekolah = mysqli_real_escape_string(
        $conn,
        $_POST['nama_sekolah'] ?? ''
    );

    $jenjang = mysqli_real_escape_string(
        $conn,
        $_POST['jenjang'] ?? ''
    );

    $gambaran_singkat = mysqli_real_escape_string(
        $conn,
        $_POST['gambaran_singkat'] ?? ''
    );

    $tahun_berdiri = mysqli_real_escape_string(
        $conn,
        $_POST['tahun_berdiri'] ?? ''
    );

    $jumlah_siswa = (int)($_POST['jumlah_siswa'] ?? 0);

    $jumlah_guru_staf = (int)($_POST['jumlah_guru_staf'] ?? 0);


    /* =========================
       FOTO SEKOLAH LAMA
    ========================= */
    $foto_sekolah = $data['foto_sekolah'] ?? '';


    /* =========================
       UPLOAD FOTO SEKOLAH
    ========================= */
    if (
        isset($_FILES['foto_sekolah']) &&
        $_FILES['foto_sekolah']['error'] == 0
    ) {

        $namaFile = $_FILES['foto_sekolah']['name'];
        $tmpFile = $_FILES['foto_sekolah']['tmp_name'];

        $ext = strtolower(
            pathinfo($namaFile, PATHINFO_EXTENSION)
        );

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ext, $allowed)) {

            $namaBaru = "sekolah_" . time() . "." . $ext;

            if (
                move_uploaded_file(
                    $tmpFile,
                    $folderFoto . $namaBaru
                )
            ) {

                /* Hapus foto lama */
                if (!empty($foto_sekolah)) {

                    $fileLama = $folderFoto . $foto_sekolah;

                    if (file_exists($fileLama)) {
                        unlink($fileLama);
                    }
                }

                $foto_sekolah = $namaBaru;
            }
        }
    }


    /* =========================
       JIKA DATA SUDAH ADA
       UPDATE
    ========================= */

    if ($data) {

        $id = (int)$data['id_profil'];

        $sql = "UPDATE profil SET

                    nama_sekolah = '$nama_sekolah',

                    jenjang = '$jenjang',

                    gambaran_singkat = '$gambaran_singkat',

                    tahun_berdiri = '$tahun_berdiri',

                    jumlah_siswa = $jumlah_siswa,

                    jumlah_guru_staf = $jumlah_guru_staf,

                    foto_sekolah = '$foto_sekolah'

                WHERE id_profil = $id";


        if (mysqli_query($conn, $sql)) {

            $pesan = "Data tentang sekolah berhasil diperbarui.";

            $tipePesan = "success";

        } else {

            $pesan = "Gagal memperbarui data: " . mysqli_error($conn);

            $tipePesan = "error";
        }

    } else {

        /* =========================
           JIKA BELUM ADA
           INSERT
        ========================= */

        $sql = "INSERT INTO profil (

                    nama_sekolah,

                    jenjang,

                    gambaran_singkat,

                    tahun_berdiri,

                    jumlah_siswa,

                    jumlah_guru_staf,

                    foto_sekolah

                ) VALUES (

                    '$nama_sekolah',

                    '$jenjang',

                    '$gambaran_singkat',

                    '$tahun_berdiri',

                    $jumlah_siswa,

                    $jumlah_guru_staf,

                    '$foto_sekolah'

                )";


        if (mysqli_query($conn, $sql)) {

            $pesan = "Data tentang sekolah berhasil disimpan.";

            $tipePesan = "success";

        } else {

            $pesan = "Gagal menyimpan data: " . mysqli_error($conn);

            $tipePesan = "error";
        }
    }


    /* =========================
       AMBIL DATA TERBARU
    ========================= */

    $query = mysqli_query(
        $conn,
        "SELECT * FROM profil ORDER BY id_profil DESC LIMIT 1"
    );

    $data = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Tentang Sekolah | SMK RAINBOW BUBBLEGUM
    </title>


    <!-- FONT -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">


    <!-- FONT AWESOME -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family: 'Poppins', sans-serif;

            background: #f8f4ff;

            color: #26345d;

        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {

            width: 205px;

            height: 100vh;

            background: #fff;

            position: fixed;

            left: 0;

            top: 0;

            border-right: 1px solid #eee4f8;

            z-index: 100;

        }


        .logo-area {

            height: 193px;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            border-bottom: 1px solid #eee4f8;

        }


        .logo-area img {

            width: 55px;

            height: 55px;

            border-radius: 50%;

            object-fit: cover;

            margin-bottom: 8px;

        }


        .logo-area h3 {

            font-size: 13px;

            color: #26345d;

        }


        .logo-area span {

            font-size: 7px;

            color: #a956df;

            font-weight: 600;

        }


        /* =========================
           MENU
        ========================= */

        .menu {

            padding: 20px 15px;

        }


        .menu-title {

            font-size: 9px;

            color: #999;

            margin: 0 10px 15px;

            text-transform: uppercase;

        }


        .menu a {

            display: flex;

            align-items: center;

            gap: 13px;

            text-decoration: none;

            color: #6d7190;

            padding: 10px 14px;

            border-radius: 10px;

            margin-bottom: 4px;

            font-size: 11px;

            transition: .2s;

        }


        .menu a i {

            width: 14px;

            text-align: center;

        }


        .menu a:hover,

        .menu a.active {

            background: linear-gradient(
                90deg,
                #ed67b0,
                #a956df
            );

            color: #fff;

            box-shadow:
                0 7px 18px
                rgba(169, 86, 223, .22);

        }


        /* =========================
           LOGOUT
        ========================= */

        .logout {

            position: absolute;

            bottom: 20px;

            left: 15px;

            right: 15px;

        }


        .logout a {

            color: #ef5c61 !important;

        }


        /* =========================
           MAIN
        ========================= */

        .main {

            margin-left: 205px;

            min-height: 100vh;

        }


        /* =========================
           TOPBAR
        ========================= */

        .topbar {

            height: 70px;

            background: #fff;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 25px;

            border-bottom: 1px solid #eee4f8;

        }


        .topbar h1 {

            font-size: 23px;

            margin-bottom: 3px;

        }


        .topbar p {

            font-size: 10px;

            color: #aaa;

        }


        .admin-info {

            display: flex;

            align-items: center;

            gap: 10px;

        }


        .admin-icon {

            width: 35px;

            height: 35px;

            border-radius: 50%;

            background: #f2d8fa;

            color: #a956df;

            display: flex;

            align-items: center;

            justify-content: center;

        }


        .admin-info strong {

            font-size: 12px;

            display: block;

        }


        .admin-info span {

            font-size: 8px;

            color: #aaa;

        }


        /* =========================
           CONTENT
        ========================= */

        .content {

            padding: 25px;

        }


        .card {

            background: #fff;

            border-radius: 15px;

            padding: 22px;

            box-shadow:
                0 5px 25px
                rgba(70, 50, 100, .05);

        }


        .card-title {

            margin-bottom: 22px;

        }


        .card-title h2 {

            font-size: 17px;

        }


        .card-title p {

            font-size: 9px;

            color: #aaa;

            margin-top: 3px;

        }


        /* =========================
           FORM
        ========================= */

        .form-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 18px 15px;

        }


        .form-group {

            display: flex;

            flex-direction: column;

        }


        .form-group.full {

            grid-column: 1 / -1;

        }


        label {

            font-size: 10px;

            font-weight: 600;

            margin-bottom: 7px;

            color: #4c5275;

        }


        input,

        textarea {

            width: 100%;

            border: 1px solid #e5ddef;

            border-radius: 8px;

            padding: 11px;

            font-family: 'Poppins', sans-serif;

            font-size: 10px;

            outline: none;

            color: #555;

            background: #fff;

        }


        input:focus,

        textarea:focus {

            border-color: #b15ce0;

            box-shadow:
                0 0 0 3px
                rgba(177, 92, 224, .08);

        }


        textarea {

            min-height: 150px;

            resize: vertical;

        }


        .file-box {

            border: 1px solid #e5ddef;

            border-radius: 8px;

            padding: 8px;

        }


        .file-box input {

            border: none;

            padding: 3px;

        }


        .preview {

            margin-top: 10px;

        }


        .preview img {

            width: 180px;

            height: 110px;

            object-fit: cover;

            border-radius: 10px;

            border: 2px solid #eee;

        }


        /* =========================
           BUTTON
        ========================= */

        .button-area {

            margin-top: 22px;

            display: flex;

            gap: 10px;

        }


        .btn {

            border: none;

            padding: 10px 18px;

            border-radius: 8px;

            font-family: 'Poppins', sans-serif;

            font-size: 10px;

            cursor: pointer;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            gap: 7px;

        }


        .btn-primary {

            color: #fff;

            background: linear-gradient(
                90deg,
                #ed67b0,
                #a956df
            );

        }


        .btn-secondary {

            background: #eeeaf5;

            color: #666;

        }


        /* =========================
           MESSAGE
        ========================= */

        .message {

            padding: 12px 15px;

            border-radius: 8px;

            margin-bottom: 20px;

            font-size: 10px;

        }


        .message.success {

            background: #eafaf1;

            color: #26945a;

        }


        .message.error {

            background: #fff0f0;

            color: #dc5050;

        }


        /* =========================
           INFO
        ========================= */

        .info-box {

            margin-top: 20px;

            padding: 14px;

            border-radius: 10px;

            background: #faf7ff;

            border: 1px solid #eee4f8;

            font-size: 9px;

            color: #777;

            line-height: 1.7;

        }


        .info-box i {

            color: #a956df;

            margin-right: 5px;

        }


        @media(max-width: 900px) {

            .sidebar {

                width: 170px;

            }

            .main {

                margin-left: 170px;

            }

            .form-grid {

                grid-template-columns: 1fr;

            }

            .form-group.full {

                grid-column: auto;

            }

        }

    </style>

</head>


<body>


<!-- =========================
     SIDEBAR
========================= -->

<div class="sidebar">

    <div class="logo-area">

        <img src="../img/logo.jpg">

        <h3>SMK RAINBOW</h3>

        <span>ADMIN PANEL</span>

    </div>


    <div class="menu">

        <div class="menu-title">
            Menu Utama
        </div>


        <a href="dashboard.php">

            <i class="fas fa-gauge"></i>

            Dashboard

        </a>


        <a href="profil.php">

            <i class="fas fa-user"></i>

            Kelola Profil

        </a>


        <!-- MENU BARU -->

        <a href="tentang_sekolah.php"
           class="active">

            <i class="fas fa-school"></i>

            Tentang Sekolah

        </a>


        <a href="ekstrakurikuler.php">

            <i class="fas fa-people-group"></i>

            Ekstrakurikuler

        </a>


        <a href="galeri.php">

            <i class="fas fa-image"></i>

            Galeri

        </a>


        <a href="galeri_eskul.php">

            <i class="fas fa-images"></i>

            Galeri Eskul

        </a>


        <a href="guru.php">

            <i class="fas fa-chalkboard-user"></i>

            Guru

        </a>


        <a href="jurusan.php">

            <i class="fas fa-school"></i>

            Jurusan

        </a>


        <a href="kegiatan_eskul.php">

            <i class="fas fa-calendar"></i>

            Kegiatan Eskul

        </a>


        <a href="manfaat_eskul.php">

            <i class="fas fa-star"></i>

            Manfaat Eskul

        </a>

    </div>


    <div class="logout">

        <a href="logout.php">

            <i class="fas fa-right-from-bracket"></i>

            Logout

        </a>

    </div>

</div>


<!-- =========================
     MAIN
========================= -->

<div class="main">


    <!-- TOPBAR -->

    <div class="topbar">

        <div>

            <h1>Tentang Sekolah</h1>

            <p>
                Kelola informasi tentang SMK RAINBOW BUBBLEGUM
            </p>

        </div>


        <div class="admin-info">

            <div class="admin-icon">

                <i class="fas fa-user"></i>

            </div>


            <div>

                <strong>admin</strong>

                <span>Administrator</span>

            </div>

        </div>

    </div>


    <!-- CONTENT -->

    <div class="content">


        <?php if (!empty($pesan)): ?>

            <div class="message <?= $tipePesan ?>">

                <?= htmlspecialchars($pesan) ?>

            </div>

        <?php endif; ?>


        <div class="card">


            <div class="card-title">

                <h2>
                    Informasi Tentang Sekolah
                </h2>

                <p>
                    Data ini akan ditampilkan pada halaman profil publik.
                </p>

            </div>


            <form method="POST"
                  enctype="multipart/form-data">


                <div class="form-grid">


                    <!-- NAMA SEKOLAH -->

                    <div class="form-group">

                        <label>
                            Nama Sekolah
                        </label>

                        <input
                            type="text"
                            name="nama_sekolah"
                            placeholder="Contoh: SMK RAINBOW BUBBLEGUM"
                            value="<?= htmlspecialchars($data['nama_sekolah'] ?? '') ?>"
                            required
                        >

                    </div>


                    <!-- JENJANG -->

                    <div class="form-group">

                        <label>
                            Jenjang Sekolah
                        </label>

                        <input
                            type="text"
                            name="jenjang"
                            placeholder="Contoh: Sekolah Menengah Kejuruan (SMK)"
                            value="<?= htmlspecialchars($data['jenjang'] ?? '') ?>"
                            required
                        >

                    </div>


                    <!-- GAMBARAN -->

                    <div class="form-group full">

                        <label>
                            Gambaran Singkat
                        </label>

                        <textarea
                            name="gambaran_singkat"
                            placeholder="Tuliskan gambaran singkat tentang sekolah..."
                            required
                        ><?= htmlspecialchars($data['gambaran_singkat'] ?? '') ?></textarea>

                    </div>


                    <!-- TAHUN -->

                    <div class="form-group">

                        <label>
                            Tahun Berdiri
                        </label>

                        <input
                            type="text"
                            name="tahun_berdiri"
                            placeholder="Contoh: 1956"
                            value="<?= htmlspecialchars($data['tahun_berdiri'] ?? '') ?>"
                            required
                        >

                    </div>


                    <!-- SISWA -->

                    <div class="form-group">

                        <label>
                            Jumlah Siswa
                        </label>

                        <input
                            type="number"
                            name="jumlah_siswa"
                            placeholder="Contoh: 1250"
                            value="<?= htmlspecialchars($data['jumlah_siswa'] ?? '') ?>"
                            min="0"
                            required
                        >

                    </div>


                    <!-- GURU -->

                    <div class="form-group">

                        <label>
                            Jumlah Guru & Staf
                        </label>

                        <input
                            type="number"
                            name="jumlah_guru_staf"
                            placeholder="Contoh: 85"
                            value="<?= htmlspecialchars($data['jumlah_guru_staf'] ?? '') ?>"
                            min="0"
                            required
                        >

                    </div>


                    <!-- FOTO SEKOLAH -->

                    <div class="form-group">

                        <label>
                            Foto Sekolah
                        </label>

                        <div class="file-box">

                            <input
                                type="file"
                                name="foto_sekolah"
                                accept="image/*"
                            >


                            <?php if (!empty($data['foto_sekolah'])): ?>

                                <div class="preview">

                                    <img
                                        src="../img/profil/<?= htmlspecialchars($data['foto_sekolah']) ?>"
                                        alt="Foto Sekolah"
                                    >

                                </div>

                            <?php endif; ?>

                        </div>

                    </div>


                </div>


                <!-- BUTTON -->

                <div class="button-area">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="fas fa-save"></i>

                        Simpan Tentang Sekolah

                    </button>


                    <a
                        href="../profil.php"
                        target="_blank"
                        class="btn btn-secondary"
                    >

                        <i class="fas fa-eye"></i>

                        Lihat Profil Publik

                    </a>

                </div>


            </form>


            <div class="info-box">

                <i class="fas fa-circle-info"></i>

                Data yang kamu isi di halaman ini akan langsung
                disimpan ke tabel <strong>profil</strong> dan dapat
                dipanggil oleh halaman <strong>profil.php</strong> publik.

            </div>


        </div>

    </div>

</div>


</body>

</html>

ga perlu jumlah siswa dan guru