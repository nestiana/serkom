<?php
session_start();
include "../koneksi.php";

/* =========================
   FOLDER FOTO BERITA
========================= */
$folderFoto = "../img/berita/";

if (!is_dir($folderFoto)) {
    mkdir($folderFoto, 0777, true);
}

/* =========================
   PESAN
========================= */
$pesan = "";
$tipePesan = "";

/* =========================
   HAPUS BERITA
========================= */
if (isset($_GET['hapus'])) {

    $id = intval($_GET['hapus']);

    $query = $conn->query(
        "SELECT foto FROM berita WHERE id_berita = $id"
    );

    if ($query && $query->num_rows > 0) {

        $row = $query->fetch_assoc();

        if (!empty($row['foto'])) {

            $fileFoto = $folderFoto . $row['foto'];

            if (file_exists($fileFoto)) {
                unlink($fileFoto);
            }
        }
    }

    $hapus = $conn->query(
        "DELETE FROM berita WHERE id_berita = $id"
    );

    if ($hapus) {
        $pesan = "Berita berhasil dihapus.";
        $tipePesan = "success";
    } else {
        $pesan = "Berita gagal dihapus.";
        $tipePesan = "error";
    }
}

/* =========================
   TAMBAH BERITA
========================= */
if (isset($_POST['tambah'])) {

    $judul = $conn->real_escape_string($_POST['judul']);
    $deskripsi = $conn->real_escape_string($_POST['deskripsi']);
    $tanggal = $conn->real_escape_string($_POST['tanggal']);

    $namaFoto = "";

    /* =========================
       UPLOAD FOTO
    ========================= */
    if (
        isset($_FILES['foto']) &&
        $_FILES['foto']['error'] == 0
    ) {

        $namaAsli = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $ekstensi = strtolower(
            pathinfo($namaAsli, PATHINFO_EXTENSION)
        );

        $ekstensiValid = [
            'jpg',
            'jpeg',
            'png',
            'webp'
        ];

        if (in_array($ekstensi, $ekstensiValid)) {

            $namaFoto = "berita_" . time() . "." . $ekstensi;

            move_uploaded_file(
                $tmp,
                $folderFoto . $namaFoto
            );
        }
    }

    /* =========================
       INSERT
    ========================= */
    $sql = "INSERT INTO berita
            (judul, deskripsi, foto, tanggal)
            VALUES
            ('$judul', '$deskripsi', '$namaFoto', '$tanggal')";

    if ($conn->query($sql)) {

        $pesan = "Berita berhasil ditambahkan.";
        $tipePesan = "success";

    } else {

        $pesan = "Berita gagal ditambahkan: " . $conn->error;
        $tipePesan = "error";
    }
}

/* =========================
   UPDATE BERITA
========================= */
if (isset($_POST['edit'])) {

    $id = intval($_POST['id_berita']);

    $judul = $conn->real_escape_string($_POST['judul']);
    $deskripsi = $conn->real_escape_string($_POST['deskripsi']);
    $tanggal = $conn->real_escape_string($_POST['tanggal']);

    /* =========================
       FOTO LAMA
    ========================= */
    $queryFoto = $conn->query(
        "SELECT foto FROM berita WHERE id_berita = $id"
    );

    $fotoLama = "";

    if ($queryFoto && $queryFoto->num_rows > 0) {

        $dataFoto = $queryFoto->fetch_assoc();

        $fotoLama = $dataFoto['foto'];
    }

    $namaFoto = $fotoLama;

    /* =========================
       FOTO BARU
    ========================= */
    if (
        isset($_FILES['foto']) &&
        $_FILES['foto']['error'] == 0
    ) {

        $namaAsli = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $ekstensi = strtolower(
            pathinfo($namaAsli, PATHINFO_EXTENSION)
        );

        $ekstensiValid = [
            'jpg',
            'jpeg',
            'png',
            'webp'
        ];

        if (in_array($ekstensi, $ekstensiValid)) {

            $namaFotoBaru =
                "berita_" . time() . "." . $ekstensi;

            if (
                move_uploaded_file(
                    $tmp,
                    $folderFoto . $namaFotoBaru
                )
            ) {

                /* HAPUS FOTO LAMA */
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

    /* =========================
       UPDATE
    ========================= */
    $sql = "UPDATE berita SET
            judul = '$judul',
            deskripsi = '$deskripsi',
            foto = '$namaFoto',
            tanggal = '$tanggal'
            WHERE id_berita = $id";

    if ($conn->query($sql)) {

        $pesan = "Berita berhasil diperbarui.";
        $tipePesan = "success";

    } else {

        $pesan =
            "Berita gagal diperbarui: " .
            $conn->error;

        $tipePesan = "error";
    }
}

/* =========================
   MODE EDIT
========================= */
$dataEdit = null;

if (isset($_GET['edit'])) {

    $id = intval($_GET['edit']);

    $hasilEdit = $conn->query(
        "SELECT * FROM berita
         WHERE id_berita = $id"
    );

    if (
        $hasilEdit &&
        $hasilEdit->num_rows > 0
    ) {

        $dataEdit = $hasilEdit->fetch_assoc();
    }
}

/* =========================
   AMBIL SEMUA BERITA
========================= */
$data = $conn->query(
    "SELECT * FROM berita
     ORDER BY id_berita DESC"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>
    Kelola Berita | SMK RAINBOW BUBBLEGUM
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
    background: #ffffff;
    border-right: 1px solid #eee5f7;
    z-index: 1000;
}

/* =========================
   LOGO
========================= */

.logo {
    height: 145px;
    display: flex;
    align-items: center;
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
}

.logo-text {
    display: flex;
    flex-direction: column;
}

.logo h3 {
    font-size: 13px;
    font-weight: 700;
    color: #26355d;
}

.logo span {
    font-size: 8px;
    color: #b45bdd;
    font-weight: 600;
    margin-top: 4px;
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
    background: linear-gradient(
        90deg,
        #ed67b0,
        #a956df
    );
    color: white;
    box-shadow:
        0 8px 18px
        rgba(190, 85, 211, .25);
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

/* =========================
   ADMIN
========================= */

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
   CARD
========================= */

.card {
    background: white;
    border-radius: 17px;
    padding: 24px;
    margin-bottom: 25px;
    box-shadow:
        0 5px 25px
        rgba(70, 50, 100, .06);
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
    min-height: 120px;
    resize: vertical;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #c05cdd;
    box-shadow:
        0 0 0 3px #f8e7fa;
}

/* =========================
   FOTO
========================= */

.foto-lama {
    margin-top: 8px;
}

.foto-lama img {
    width: 100px;
    height: 70px;
    object-fit: cover;
    border-radius: 10px;
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
    background: linear-gradient(
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
   TABLE
========================= */

.table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;
    min-width: 900px;
    border-collapse: collapse;
}

th {
    background: #faf7ff;
    color: #4d5270;
    font-size: 11px;
    padding: 12px;
    text-align: left;
}

td {
    padding: 12px;
    border-top: 1px solid #eee5f7;
    font-size: 11px;
    color: #555;
    vertical-align: middle;
}

td img {
    width: 80px;
    height: 55px;
    object-fit: cover;
    border-radius: 9px;
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

        <a href="profil.php">
            <i class="fa-solid fa-user"></i>
            Kelola Sambutan
        </a>

        <a href="berita.php" class="active">
            <i class="fa-solid fa-newspaper"></i>
            Berita
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

    <div class="topbar">

        <div>

            <h1>Berita Sekolah</h1>

            <p>
                Kelola berita SMK RAINBOW BUBBLEGUM
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

            <div class="alert <?= $tipePesan ?>">

                <i class="fa-solid fa-circle-check"></i>

                <?= htmlspecialchars($pesan) ?>

            </div>

        <?php endif; ?>


        <!-- =========================
             FORM BERITA
        ========================= -->

        <div class="card">

            <div class="card-header">

                <div>

                    <h2>
                        <?= $dataEdit
                            ? "Edit Berita"
                            : "Tambah Berita"
                        ?>
                    </h2>

                    <p>
                        Isi informasi berita sekolah
                    </p>

                </div>

            </div>


            <form
                method="POST"
                enctype="multipart/form-data"
            >

                <?php if ($dataEdit): ?>

                    <input
                        type="hidden"
                        name="id_berita"
                        value="<?= $dataEdit['id_berita'] ?>">

                <?php endif; ?>


                <div class="form-grid">


                    <!-- JUDUL -->

                    <div class="form-group full">

                        <label>
                            Judul Berita
                        </label>

                        <input
                            type="text"
                            name="judul"
                            placeholder="Masukkan judul berita..."
                            value="<?= $dataEdit
                                ? htmlspecialchars($dataEdit['judul'])
                                : ''
                            ?>"
                            required>

                    </div>


                    <!-- DESKRIPSI -->

                    <div class="form-group full">

                        <label>
                            Deskripsi Berita
                        </label>

                        <textarea
                            name="deskripsi"
                            placeholder="Tulis isi atau deskripsi berita..."
                            required><?= $dataEdit
                                ? htmlspecialchars($dataEdit['deskripsi'])
                                : ''
                            ?></textarea>

                    </div>


                    <!-- TANGGAL -->

                    <div class="form-group">

                        <label>
                            Tanggal
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            value="<?= $dataEdit
                                ? htmlspecialchars($dataEdit['tanggal'])
                                : date('Y-m-d')
                            ?>"
                            required>

                    </div>


                    <!-- FOTO -->

                    <div class="form-group">

                        <label>
                            Foto Berita
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

                                <p style="
                                    font-size:10px;
                                    color:#999;
                                    margin-bottom:5px;
                                ">
                                    Foto saat ini:
                                </p>

                                <img
                                    src="../img/berita/<?= htmlspecialchars($dataEdit['foto']) ?>"
                                    alt="Foto Berita">

                            </div>

                        <?php endif; ?>

                    </div>


                </div>


                <!-- BUTTON -->

                <div style="
                    margin-top:20px;
                    display:flex;
                    gap:10px;
                ">

                    <?php if ($dataEdit): ?>

                        <button
                            type="submit"
                            name="edit"
                            class="btn btn-primary">

                            <i class="fa-solid fa-pen"></i>

                            Simpan Perubahan

                        </button>

                        <a
                            href="berita.php"
                            class="btn btn-edit">

                            <i class="fa-solid fa-xmark"></i>

                            Batal

                        </a>

                    <?php else: ?>

                        <button
                            type="submit"
                            name="tambah"
                            class="btn btn-primary">

                            <i class="fa-solid fa-plus"></i>

                            Tambah Berita

                        </button>

                    <?php endif; ?>

                </div>

            </form>

        </div>


        <!-- =========================
             DATA BERITA
        ========================= -->

        <div class="card">

            <div class="card-header">

                <div>

                    <h2>
                        Data Berita
                    </h2>

                    <p>
                        Semua berita yang tersimpan di database
                    </p>

                </div>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Foto</th>

                            <th>Judul</th>

                            <th>Deskripsi</th>

                            <th>Tanggal</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php

                    $no = 1;

                    if (
                        $data &&
                        $data->num_rows > 0
                    ):

                        while (
                            $row =
                            $data->fetch_assoc()
                        ):

                    ?>

                        <tr>

                            <td>
                                <?= $no++ ?>
                            </td>


                            <td>

                                <?php if (
                                    !empty($row['foto'])
                                ): ?>

                                    <img
                                        src="../img/berita/<?= htmlspecialchars($row['foto']) ?>"
                                        alt="Foto Berita">

                                <?php else: ?>

                                    <span style="color:#aaa;">
                                        Tidak ada
                                    </span>

                                <?php endif; ?>

                            </td>


                            <td>

                                <strong>
                                    <?= htmlspecialchars(
                                        $row['judul']
                                    ) ?>
                                </strong>

                            </td>


                            <td style="
                                max-width:300px;
                            ">

                                <?= htmlspecialchars(
                                    mb_substr(
                                        $row['deskripsi'],
                                        0,
                                        100
                                    )
                                ) ?>

                                <?php if (
                                    mb_strlen(
                                        $row['deskripsi']
                                    ) > 100
                                ): ?>

                                    ...

                                <?php endif; ?>

                            </td>


                            <td>

                                <?= date(
                                    'd-m-Y',
                                    strtotime(
                                        $row['tanggal']
                                    )
                                ) ?>

                            </td>


                            <td>

                                <div class="aksi">

                                    <a
                                        href="berita.php?edit=<?= $row['id_berita'] ?>"
                                        class="btn btn-edit">

                                        <i class="fa-solid fa-pen"></i>

                                        Edit

                                    </a>


                                    <a
                                        href="berita.php?hapus=<?= $row['id_berita'] ?>"
                                        class="btn btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus berita ini?')">

                                        <i class="fa-solid fa-trash"></i>

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
                                colspan="6"
                                style="
                                    text-align:center;
                                    padding:30px;
                                    color:#999;
                                ">

                                <i
                                    class="fa-solid fa-newspaper"
                                    style="
                                        font-size:30px;
                                        margin-bottom:10px;
                                    ">
                                </i>

                                <br>

                                Belum ada berita.

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