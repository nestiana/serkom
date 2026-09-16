<?php
session_start();

include "../koneksi.php";

/* =========================
   FOLDER FOTO
========================= */
$folderFoto = "../img/eskul/";

if (!is_dir($folderFoto)) {
    mkdir($folderFoto, 0777, true);
}

$pesan = "";
$tipePesan = "";


/* =========================
   TAMBAH DATA
========================= */
if (isset($_POST['tambah'])) {

    $nama_eskul       = mysqli_real_escape_string($conn, $_POST['nama_eskul']);
    $deskripsi        = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $jumlah_anggota   = intval($_POST['jumlah_anggota']);
    $jumlah_kegiatan  = intval($_POST['jumlah_kegiatan']);
    $jumlah_prestasi  = intval($_POST['jumlah_prestasi']);
    $status            = mysqli_real_escape_string($conn, $_POST['status']);

    $namaFoto = "";

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

        $namaAsli = $_FILES['foto']['name'];
        $tmp      = $_FILES['foto']['tmp_name'];

        $ekstensi = strtolower(
            pathinfo($namaAsli, PATHINFO_EXTENSION)
        );

        $ekstensiValid = [
            "jpg",
            "jpeg",
            "png",
            "webp"
        ];

        if (in_array($ekstensi, $ekstensiValid)) {

            $namaFoto = "eskul_" . time() . "." . $ekstensi;

            move_uploaded_file(
                $tmp,
                $folderFoto . $namaFoto
            );
        }
    }

    $sql = "INSERT INTO ekstrakulikuler
            (
                nama_eskul,
                deskripsi,
                jumlah_anggota,
                jumlah_kegiatan,
                jumlah_prestasi,
                foto,
                status
            )
            VALUES
            (
                '$nama_eskul',
                '$deskripsi',
                '$jumlah_anggota',
                '$jumlah_kegiatan',
                '$jumlah_prestasi',
                '$namaFoto',
                '$status'
            )";

    if (mysqli_query($conn, $sql)) {

        $pesan = "Data ekstrakulikuler berhasil ditambahkan.";
        $tipePesan = "success";

    } else {

        $pesan = "Data gagal ditambahkan: " . mysqli_error($conn);
        $tipePesan = "error";
    }
}


/* =========================
   EDIT DATA
========================= */
if (isset($_POST['edit'])) {

    $id = intval($_POST['id_eskul']);

    $nama_eskul       = mysqli_real_escape_string($conn, $_POST['nama_eskul']);
    $deskripsi        = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $jumlah_anggota   = intval($_POST['jumlah_anggota']);
    $jumlah_kegiatan  = intval($_POST['jumlah_kegiatan']);
    $jumlah_prestasi  = intval($_POST['jumlah_prestasi']);
    $status            = mysqli_real_escape_string($conn, $_POST['status']);

    /* Ambil foto lama */

    $queryFoto = mysqli_query(
        $conn,
        "SELECT foto FROM ekstrakulikuler WHERE id_eskul = $id"
    );

    $dataFoto = mysqli_fetch_assoc($queryFoto);

    $fotoLama = $dataFoto['foto'] ?? "";

    $namaFoto = $fotoLama;


    /* Upload foto baru */

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

        $namaAsli = $_FILES['foto']['name'];
        $tmp      = $_FILES['foto']['tmp_name'];

        $ekstensi = strtolower(
            pathinfo($namaAsli, PATHINFO_EXTENSION)
        );

        $ekstensiValid = [
            "jpg",
            "jpeg",
            "png",
            "webp"
        ];

        if (in_array($ekstensi, $ekstensiValid)) {

            $namaFotoBaru =
                "eskul_" . time() . "." . $ekstensi;

            if (move_uploaded_file(
                $tmp,
                $folderFoto . $namaFotoBaru
            )) {

                /* Hapus foto lama */

                if (!empty($fotoLama)) {

                    $fileLama =
                        $folderFoto . $fotoLama;

                    if (file_exists($fileLama)) {
                        unlink($fileLama);
                    }
                }

                $namaFoto = $namaFotoBaru;
            }
        }
    }


    $sql = "UPDATE ekstrakulikuler SET

            nama_eskul = '$nama_eskul',
            deskripsi = '$deskripsi',
            jumlah_anggota = '$jumlah_anggota',
            jumlah_kegiatan = '$jumlah_kegiatan',
            jumlah_prestasi = '$jumlah_prestasi',
            foto = '$namaFoto',
            status = '$status'

            WHERE id_eskul = $id";


    if (mysqli_query($conn, $sql)) {

        $pesan = "Data ekstrakulikuler berhasil diperbarui.";
        $tipePesan = "success";

    } else {

        $pesan = "Data gagal diperbarui: " . mysqli_error($conn);
        $tipePesan = "error";
    }
}


/* =========================
   DATA YANG AKAN DIEDIT
========================= */

$dataEdit = null;

if (isset($_GET['edit'])) {

    $id = intval($_GET['edit']);

    $queryEdit = mysqli_query(
        $conn,
        "SELECT * FROM ekstrakulikuler
         WHERE id_eskul = $id"
    );

    if ($queryEdit && mysqli_num_rows($queryEdit) > 0) {

        $dataEdit = mysqli_fetch_assoc($queryEdit);
    }
}


/* =========================
   HAPUS DATA
========================= */

if (isset($_GET['hapus'])) {

    $id = intval($_GET['hapus']);

    /* Ambil foto */

    $queryFoto = mysqli_query(
        $conn,
        "SELECT foto FROM ekstrakulikuler
         WHERE id_eskul = $id"
    );

    if ($queryFoto && mysqli_num_rows($queryFoto) > 0) {

        $dataFoto = mysqli_fetch_assoc($queryFoto);

        if (!empty($dataFoto['foto'])) {

            $fileFoto =
                $folderFoto . $dataFoto['foto'];

            if (file_exists($fileFoto)) {
                unlink($fileFoto);
            }
        }
    }


    $hapus = mysqli_query(
        $conn,
        "DELETE FROM ekstrakulikuler
         WHERE id_eskul = $id"
    );


    if ($hapus) {

        $pesan = "Data ekstrakulikuler berhasil dihapus.";
        $tipePesan = "success";

    } else {

        $pesan = "Data gagal dihapus.";
        $tipePesan = "error";
    }
}


/* =========================
   AMBIL SEMUA DATA
========================= */

$data = mysqli_query(
    $conn,
    "SELECT * FROM ekstrakurikuler
     ORDER BY id_eskul DESC"
);

?>

<!DOCTYPE html>

<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Ekstrakulikuler | Admin SMK RAINBOW
</title>


<link
href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">


<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


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

    background: #fff;

    border-right: 1px solid #eee5f7;

    z-index: 1000;
}


.logo {

    height: 145px;

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    border-bottom: 1px solid #eee5f7;
}


.logo img {

    width: 55px;
    height: 55px;

    border-radius: 50%;

    object-fit: cover;

    margin-bottom: 7px;
}


.logo h3 {

    font-size: 15px;

    color: #26355d;
}


.logo span {

    font-size: 9px;

    color: #b45bdd;

    font-weight: 600;
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

    background:
    linear-gradient(
        90deg,
        #ed67b0,
        #a956df
    );

    color: white;

    box-shadow:
    0 8px 18px
    rgba(190,85,211,.25);
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

    border-bottom:
    1px solid #eee5f7;

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
   ALERT
========================= */

.alert {

    padding: 13px 17px;

    border-radius: 11px;

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

    box-shadow:
    0 5px 25px
    rgba(70,50,100,.06);
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

    background:
    linear-gradient(
        90deg,
        #ed67b0,
        #a956df
    );

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

    grid-template-columns:
    1fr 1fr;

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
.form-group textarea,
.form-group select {

    width: 100%;

    border:
    1px solid #e5deed;

    border-radius: 9px;

    padding: 11px 13px;

    outline: none;

    font-family: inherit;

    font-size: 11px;

    color: #444;

    background: white;
}


.form-group textarea {

    min-height: 100px;

    resize: vertical;
}


.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {

    border-color: #c05cdd;

    box-shadow:
    0 0 0 3px #f8e7fa;
}


.foto-lama {

    margin-top: 8px;
}


.foto-lama img {

    width: 80px;
    height: 80px;

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

    border-collapse: collapse;
}


thead {

    background: #faf7fc;
}


th {

    text-align: left;

    padding: 13px;

    font-size: 10px;

    color: #777;

    border-bottom:
    1px solid #eee5f7;
}


td {

    padding: 13px;

    font-size: 11px;

    border-bottom:
    1px solid #f1edf5;

    vertical-align: middle;
}


td img {

    width: 55px;
    height: 55px;

    border-radius: 9px;

    object-fit: cover;
}


.badge {

    padding: 5px 9px;

    border-radius: 20px;

    font-size: 9px;

    font-weight: 600;
}


.badge-aktif {

    background: #e5f8ed;

    color: #27a05a;
}


.badge-nonaktif {

    background: #ffe8e8;

    color: #db5b5b;
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


    <div class="logo">

        <img
        src="../img/logo.jpg"
        alt="Logo">

        <h3>SMK RAINBOW</h3>

        <span>ADMIN PANEL</span>

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


</div>



<!-- =========================
     CONTENT
========================= -->

<div class="content">


    <!-- TOPBAR -->

    <div class="topbar">

        <div>

            <h1>Ekstrakulikuler</h1>

            <p>
                Kelola data ekstrakulikuler sekolah
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


        <!-- PESAN -->

        <?php if (!empty($pesan)): ?>

            <div
            class="alert <?= $tipePesan ?>">

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

                        <?= $dataEdit
                        ? "Edit Ekstrakulikuler"
                        : "Tambah Ekstrakulikuler" ?>

                    </h2>

                    <p>

                        Masukkan informasi
                        ekstrakulikuler sekolah

                    </p>

                </div>

            </div>



            <form
            method="POST"
            enctype="multipart/form-data">


                <?php if ($dataEdit): ?>

                    <input
                    type="hidden"
                    name="id_eskul"
                    value="<?= $dataEdit['id_eskul'] ?>">

                <?php endif; ?>


                <div class="form-grid">


                    <!-- NAMA -->

                    <div class="form-group">

                        <label>
                            Nama Ekstrakulikuler
                        </label>

                        <input
                        type="text"
                        name="nama_eskul"
                        placeholder="Contoh: Pramuka"
                        value="<?= $dataEdit
                        ? htmlspecialchars($dataEdit['nama_eskul'])
                        : '' ?>"
                        required>

                    </div>



                    <!-- JUMLAH ANGGOTA -->

                    <div class="form-group">

                        <label>
                            Jumlah Anggota
                        </label>

                        <input
                        type="number"
                        name="jumlah_anggota"
                        min="0"
                        placeholder="Contoh: 30"
                        value="<?= $dataEdit
                        ? $dataEdit['jumlah_anggota']
                        : '' ?>"
                        required>

                    </div>



                    <!-- JUMLAH KEGIATAN -->

                    <div class="form-group">

                        <label>
                            Jumlah Kegiatan
                        </label>

                        <input
                        type="number"
                        name="jumlah_kegiatan"
                        min="0"
                        placeholder="Contoh: 10"
                        value="<?= $dataEdit
                        ? $dataEdit['jumlah_kegiatan']
                        : '' ?>"
                        required>

                    </div>



                    <!-- JUMLAH PRESTASI -->

                    <div class="form-group">

                        <label>
                            Jumlah Prestasi
                        </label>

                        <input
                        type="number"
                        name="jumlah_prestasi"
                        min="0"
                        placeholder="Contoh: 5"
                        value="<?= $dataEdit
                        ? $dataEdit['jumlah_prestasi']
                        : '' ?>"
                        required>

                    </div>



                    <!-- STATUS -->

                    <div class="form-group">

                        <label>
                            Status
                        </label>

                        <select name="status" required>

                            <option value="">
                                -- Pilih Status --
                            </option>

                            <option
                            value="Aktif"
                            <?= ($dataEdit &&
                            $dataEdit['status'] == 'Aktif')
                            ? 'selected'
                            : '' ?>>

                                Aktif

                            </option>

                            <option
                            value="Tidak Aktif"
                            <?= ($dataEdit &&
                            $dataEdit['status'] == 'Tidak Aktif')
                            ? 'selected'
                            : '' ?>>

                                Tidak Aktif

                            </option>

                        </select>

                    </div>



                    <!-- FOTO -->

                    <div class="form-group">

                        <label>
                            Foto
                        </label>

                        <input
                        type="file"
                        name="foto"
                        accept=".jpg,.jpeg,.png,.webp">


                        <?php if (
                            $dataEdit &&
                            !empty($dataEdit['foto'])
                        ): ?>

                            <div class="foto-lama">

                                <small
                                style="color:#999;">

                                    Foto saat ini:

                                </small>

                                <br>

                                <img
                                src="../img/eskul/<?= htmlspecialchars(
                                    $dataEdit['foto']
                                ) ?>">

                            </div>

                        <?php endif; ?>

                    </div>



                    <!-- DESKRIPSI -->

                    <div class="form-group full">

                        <label>
                            Deskripsi
                        </label>

                        <textarea
                        name="deskripsi"
                        placeholder="Tulis deskripsi ekstrakulikuler..."
                        required><?= $dataEdit
                        ? htmlspecialchars($dataEdit['deskripsi'])
                        : '' ?></textarea>

                    </div>


                </div>



                <!-- BUTTON -->

                <div
                style="
                margin-top:20px;
                display:flex;
                gap:10px;
                ">


                    <?php if ($dataEdit): ?>


                        <button
                        type="submit"
                        name="edit"
                        class="btn btn-primary">

                            <i
                            class="fa-solid fa-pen">
                            </i>

                            Simpan Perubahan

                        </button>


                        <a
                        href="ekstrakulikuler.php"
                        class="btn btn-edit">

                            <i
                            class="fa-solid fa-xmark">
                            </i>

                            Batal

                        </a>


                    <?php else: ?>


                        <button
                        type="submit"
                        name="tambah"
                        class="btn btn-primary">

                            <i
                            class="fa-solid fa-plus">
                            </i>

                            Tambah Ekstrakulikuler

                        </button>


                    <?php endif; ?>


                </div>


            </form>

        </div>



        <!-- =========================
             DATA
        ========================= -->

        <div class="card">


            <div class="card-header">

                <div>

                    <h2>
                        Data Ekstrakulikuler
                    </h2>

                    <p>
                        Data ekstrakulikuler yang tersimpan
                    </p>

                </div>

            </div>



            <div class="table-wrapper">

                <table>


                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Foto</th>

                            <th>Nama</th>

                            <th>Anggota</th>

                            <th>Kegiatan</th>

                            <th>Prestasi</th>

                            <th>Status</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>



                    <tbody>


                    <?php

                    $no = 1;

                    if (
                        $data &&
                        mysqli_num_rows($data) > 0
                    ):

                        while (
                            $row =
                            mysqli_fetch_assoc($data)
                        ):

                    ?>


                        <tr>


                            <td>
                                <?= $no++ ?>
                            </td>


                            <!-- FOTO -->

                            <td>

                                <?php if (
                                    !empty($row['foto'])
                                ): ?>

                                    <img
                                    src="../img/eskul/<?= htmlspecialchars(
                                        $row['foto']
                                    ) ?>">

                                <?php else: ?>

                                    <span
                                    style="color:#aaa;">

                                        Tidak ada

                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- NAMA -->

                            <td>

                                <strong>

                                    <?= htmlspecialchars(
                                        $row['nama_eskul']
                                    ) ?>

                                </strong>

                                <br>

                                <small
                                style="color:#999;">

                                    <?= htmlspecialchars(
                                        mb_substr(
                                            $row['deskripsi'],
                                            0,
                                            50
                                        )
                                    ) ?>

                                    <?php
                                    if (
                                        strlen(
                                            $row['deskripsi']
                                        ) > 50
                                    ) echo "...";
                                    ?>

                                </small>

                            </td>


                            <!-- ANGGOTA -->

                            <td>

                                <?= $row['jumlah_anggota'] ?>

                            </td>


                            <!-- KEGIATAN -->

                            <td>

                                <?= $row['jumlah_kegiatan'] ?>

                            </td>


                            <!-- PRESTASI -->

                            <td>

                                <?= $row['jumlah_prestasi'] ?>

                            </td>


                            <!-- STATUS -->

                            <td>

                                <?php if (
                                    strtolower(
                                        $row['status']
                                    ) == 'aktif'
                                ): ?>

                                    <span
                                    class="badge badge-aktif">

                                        Aktif

                                    </span>

                                <?php else: ?>

                                    <span
                                    class="badge badge-nonaktif">

                                        Tidak Aktif

                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- AKSI -->

                            <td>

                                <div class="aksi">


                                    <a
                                    href="ekstrakulikuler.php?edit=<?= $row['id_eskul'] ?>"
                                    class="btn btn-edit">

                                        <i
                                        class="fa-solid fa-pen">
                                        </i>

                                        Edit

                                    </a>


                                    <a
                                    href="ekstrakulikuler.php?hapus=<?= $row['id_eskul'] ?>"
                                    class="btn btn-delete"
                                    onclick="
                                    return confirm(
                                    'Yakin ingin menghapus data ini?'
                                    )
                                    ">

                                        <i
                                        class="fa-solid fa-trash">
                                        </i>

                                        Hapus

                                    </a>


                                </div>

                            </td>


                        </tr>


                    <?php

                        endwhile;

                    else:

                    ?>


                        <tr>

                            <td
                            colspan="8"
                            style="
                            text-align:center;
                            padding:35px;
                            color:#999;
                            ">

                                <i
                                class="fa-solid fa-folder-open"
                                style="
                                font-size:30px;
                                margin-bottom:10px;
                                ">
                                </i>

                                <br>

                                Belum ada data
                                ekstrakurikuler.

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