<?php
session_start();

include "../koneksi.php";


/* =========================
   FOLDER UPLOAD
========================= */
$folder_upload = "../uploads/jurusan/";

if (!is_dir($folder_upload)) {
    mkdir($folder_upload, 0777, true);
}


/* =========================
   PESAN
========================= */
$pesan = "";
$jenis_pesan = "";


/* =========================================================
   TAMBAH / EDIT DATA
========================================================= */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $aksi = $_POST["aksi"] ?? "";

    /* =========================
       TAMBAH JURUSAN
    ========================= */
    if ($aksi === "tambah") {

        $nama_jurusan = trim($_POST["nama_jurusan"] ?? "");
        $deskripsi    = trim($_POST["deskripsi"] ?? "");

        $foto = "";

        /* Upload foto */
        if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {

            $nama_file = $_FILES["foto"]["name"];
            $tmp_file  = $_FILES["foto"]["tmp_name"];
            $ukuran    = $_FILES["foto"]["size"];

            $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

            $ext_valid = ["jpg", "jpeg", "png", "webp"];

            if (!in_array($ext, $ext_valid)) {
                $pesan = "Format foto harus JPG, JPEG, PNG, atau WEBP.";
                $jenis_pesan = "error";
            } elseif ($ukuran > 5 * 1024 * 1024) {
                $pesan = "Ukuran foto maksimal 5 MB.";
                $jenis_pesan = "error";
            } else {

                $foto = "jurusan_" . time() . "_" . uniqid() . "." . $ext;

                move_uploaded_file(
                    $tmp_file,
                    $folder_upload . $foto
                );
            }
        }

        if ($pesan === "") {

            if ($nama_jurusan === "") {

                $pesan = "Nama jurusan wajib diisi.";
                $jenis_pesan = "error";

            } else {

                $stmt = $koneksi->prepare(
                    "INSERT INTO jurusan (nama_jurusan, deskripsi, foto)
                     VALUES (?, ?, ?)"
                );

                $stmt->bind_param(
                    "sss",
                    $nama_jurusan,
                    $deskripsi,
                    $foto
                );

                if ($stmt->execute()) {
                    $pesan = "Data jurusan berhasil ditambahkan.";
                    $jenis_pesan = "success";
                } else {
                    $pesan = "Data jurusan gagal ditambahkan.";
                    $jenis_pesan = "error";
                }

                $stmt->close();
            }
        }
    }


    /* =========================
       UPDATE JURUSAN
    ========================= */
    if ($aksi === "edit") {

        $id           = intval($_POST["id_jurusan"] ?? 0);
        $nama_jurusan = trim($_POST["nama_jurusan"] ?? "");
        $deskripsi    = trim($_POST["deskripsi"] ?? "");

        if ($id <= 0 || $nama_jurusan === "") {

            $pesan = "Data jurusan tidak lengkap.";
            $jenis_pesan = "error";

        } else {

            /* Ambil foto lama */
            $stmt_lama = $koneksi->prepare(
                "SELECT foto FROM jurusan WHERE id_jurusan = ?"
            );

            $stmt_lama->bind_param("i", $id);
            $stmt_lama->execute();

            $hasil_lama = $stmt_lama->get_result();
            $data_lama = $hasil_lama->fetch_assoc();

            $foto_lama = $data_lama["foto"] ?? "";

            $stmt_lama->close();

            $foto_baru = $foto_lama;


            /* Upload foto baru jika dipilih */
            if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {

                $nama_file = $_FILES["foto"]["name"];
                $tmp_file  = $_FILES["foto"]["tmp_name"];
                $ukuran    = $_FILES["foto"]["size"];

                $ext = strtolower(
                    pathinfo($nama_file, PATHINFO_EXTENSION)
                );

                $ext_valid = ["jpg", "jpeg", "png", "webp"];

                if (!in_array($ext, $ext_valid)) {

                    $pesan = "Format foto harus JPG, JPEG, PNG, atau WEBP.";
                    $jenis_pesan = "error";

                } elseif ($ukuran > 5 * 1024 * 1024) {

                    $pesan = "Ukuran foto maksimal 5 MB.";
                    $jenis_pesan = "error";

                } else {

                    $foto_baru =
                        "jurusan_" . time() . "_" . uniqid() . "." . $ext;

                    move_uploaded_file(
                        $tmp_file,
                        $folder_upload . $foto_baru
                    );

                    /* Hapus foto lama */
                    if (
                        !empty($foto_lama) &&
                        file_exists($folder_upload . $foto_lama)
                    ) {
                        unlink($folder_upload . $foto_lama);
                    }
                }
            }


            if ($pesan === "") {

                $stmt = $koneksi->prepare(
                    "UPDATE jurusan
                     SET nama_jurusan = ?, deskripsi = ?, foto = ?
                     WHERE id_jurusan = ?"
                );

                $stmt->bind_param(
                    "sssi",
                    $nama_jurusan,
                    $deskripsi,
                    $foto_baru,
                    $id
                );

                if ($stmt->execute()) {

                    $pesan = "Data jurusan berhasil diperbarui.";
                    $jenis_pesan = "success";

                } else {

                    $pesan = "Data jurusan gagal diperbarui.";
                    $jenis_pesan = "error";
                }

                $stmt->close();
            }
        }
    }
}


/* =========================================================
   HAPUS DATA
========================================================= */
if (isset($_GET["hapus"])) {

    $id = intval($_GET["hapus"]);

    if ($id > 0) {

        /* Ambil foto */
        $stmt = $koneksi->prepare(
            "SELECT foto FROM jurusan WHERE id_jurusan = ?"
        );

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $hasil = $stmt->get_result();
        $data = $hasil->fetch_assoc();

        $foto = $data["foto"] ?? "";

        $stmt->close();


        /* Hapus database */
        $stmt = $koneksi->prepare(
            "DELETE FROM jurusan WHERE id_jurusan = ?"
        );

        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {

            /* Hapus file foto */
            if (
                !empty($foto) &&
                file_exists($folder_upload . $foto)
            ) {
                unlink($folder_upload . $foto);
            }

            $pesan = "Data jurusan berhasil dihapus.";
            $jenis_pesan = "success";

        } else {

            $pesan = "Data jurusan gagal dihapus.";
            $jenis_pesan = "error";
        }

        $stmt->close();
    }
}


/* =========================================================
   DATA UNTUK EDIT
========================================================= */
$data_edit = null;

if (isset($_GET["edit"])) {

    $id_edit = intval($_GET["edit"]);

    if ($id_edit > 0) {

        $stmt = $koneksi->prepare(
            "SELECT * FROM jurusan WHERE id_jurusan = ?"
        );

        $stmt->bind_param("i", $id_edit);
        $stmt->execute();

        $hasil_edit = $stmt->get_result();
        $data_edit = $hasil_edit->fetch_assoc();

        $stmt->close();
    }
}


/* =========================================================
   AMBIL SEMUA DATA
========================================================= */
$query = "SELECT * FROM jurusan ORDER BY id_jurusan DESC";
$result = $conn
->query($query);

?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Jurusan | Admin SMK RAINBOW</title>

    <!-- Google Font -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Font Awesome -->
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
            background: #f7f3ff;
            color: #182848;
        }

        a {
            text-decoration: none;
        }


        /* ===================================
           SIDEBAR
        =================================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 235px;
            height: 100vh;

            background: #ffffff;

            border-right: 1px solid #eee4f8;

            display: flex;
            flex-direction: column;

            z-index: 1000;
        }


        .logo-area {
            height: 193px;

            display: flex;
            flex-direction: column;

            align-items: center;
            justify-content: center;

            border-bottom: 1px solid #eee4f8;
        }


        .logo-area img {
            width: 75px;
            height: 75px;

            object-fit: cover;

            border-radius: 50%;

            margin-bottom: 8px;
        }


        .logo-area h3 {
            font-size: 14px;
            color: #182848;
            font-weight: 700;
        }


        .logo-area span {
            font-size: 9px;
            color: #b14ddd;
            font-weight: 600;
        }


        /* ===================================
           MENU
        =================================== */

        .menu-title {
            font-size: 9px;

            color: #999;

            padding: 20px 25px 10px;

            text-transform: uppercase;

            font-weight: 600;
        }


        .menu {
            padding: 0 14px;
        }


        .menu a {
            display: flex;

            align-items: center;

            gap: 14px;

            height: 44px;

            padding: 0 14px;

            margin-bottom: 4px;

            border-radius: 10px;

            color: #596078;

            font-size: 12px;

            transition: 0.3s;
        }


        .menu a i {
            width: 18px;
            text-align: center;
            font-size: 14px;
        }


        .menu a:hover {
            background: #f8eaff;
            color: #ad4bd7;
        }


        .menu a.active {
            background: linear-gradient(
                90deg,
                #f064ae,
                #ae51db
            );

            color: white;

            box-shadow: 0 8px 20px rgba(182, 73, 214, 0.25);
        }


        /* ===================================
           LOGOUT
        =================================== */

        .logout {
            margin-top: auto;

            padding: 20px 24px;

            border-top: 1px solid #eee4f8;
        }


        .logout a {
            color: #f15c68;

            font-size: 12px;

            display: flex;

            align-items: center;

            gap: 12px;
        }


        /* ===================================
           MAIN
        =================================== */

        .main {
            margin-left: 235px;

            min-height: 100vh;
        }


        /* ===================================
           HEADER
        =================================== */

        .header {
            height: 142px;

            background: white;

            border-bottom: 1px solid #eee4f8;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;
        }


        .header h1 {
            font-size: 23px;

            color: #182848;

            margin-bottom: 5px;
        }


        .header p {
            font-size: 11px;

            color: #999;
        }


        .admin {
            display: flex;

            align-items: center;

            gap: 12px;
        }


        .admin-icon {
            width: 36px;
            height: 36px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #f4dcfa;

            color: #ae50d5;
        }


        .admin-text strong {
            display: block;

            font-size: 12px;

            color: #182848;
        }


        .admin-text span {
            font-size: 9px;

            color: #999;
        }


        /* ===================================
           CONTENT
        =================================== */

        .content {
            padding: 24px 26px 50px;
        }


        /* ===================================
           CARD
        =================================== */

        .card {
            background: #fff;

            border-radius: 15px;

            padding: 24px;

            margin-bottom: 20px;

            box-shadow: 0 3px 15px rgba(80, 50, 120, 0.04);
        }


        .card-title {
            margin-bottom: 18px;
        }


        .card-title h2 {
            font-size: 16px;

            color: #182848;

            margin-bottom: 3px;
        }


        .card-title p {
            font-size: 10px;

            color: #aaa;
        }


        /* ===================================
           FORM
        =================================== */

        .form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 17px;
        }


        .form-group {
            margin-bottom: 2px;
        }


        .form-group.full {
            grid-column: 1 / -1;
        }


        .form-group label {
            display: block;

            font-size: 10px;

            font-weight: 600;

            color: #34405f;

            margin-bottom: 7px;
        }


        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;

            border: 1px solid #e6dcef;

            border-radius: 7px;

            padding: 11px;

            font-family: 'Poppins', sans-serif;

            font-size: 11px;

            outline: none;

            background: #fff;

            transition: 0.3s;
        }


        input[type="text"]:focus,
        textarea:focus,
        input[type="file"]:focus {
            border-color: #b856d9;

            box-shadow: 0 0 0 3px rgba(184, 86, 217, 0.08);
        }


        textarea {
            height: 105px;

            resize: vertical;
        }


        input[type="file"] {
            padding: 8px;
        }


        /* ===================================
           BUTTON
        =================================== */

        .btn {
            border: none;

            border-radius: 8px;

            padding: 10px 17px;

            font-family: 'Poppins', sans-serif;

            font-size: 10px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.3s;
        }


        .btn-primary {
            color: white;

            background: linear-gradient(
                90deg,
                #f064ae,
                #ae51db
            );

            box-shadow: 0 5px 15px rgba(180, 72, 214, 0.20);
        }


        .btn-primary:hover {
            transform: translateY(-2px);
        }


        .btn-edit {
            background: #eee4ff;

            color: #9950c5;

            padding: 7px 10px;
        }


        .btn-delete {
            background: #ffe6e9;

            color: #e65363;

            padding: 7px 10px;
        }


        .btn-cancel {
            background: #eee;

            color: #666;

            margin-left: 6px;
        }


        /* ===================================
           ALERT
        =================================== */

        .alert {
            padding: 12px 15px;

            border-radius: 8px;

            margin-bottom: 18px;

            font-size: 11px;
        }


        .alert.success {
            background: #e9fff2;

            color: #23834d;

            border: 1px solid #c9f2da;
        }


        .alert.error {
            background: #fff0f1;

            color: #d34552;

            border: 1px solid #ffd1d5;
        }


        /* ===================================
           TABLE
        =================================== */

        .table-wrapper {
            overflow-x: auto;
        }


        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 800px;
        }


        thead {
            background: #fbf7ff;
        }


        th {
            padding: 12px 10px;

            text-align: left;

            font-size: 9px;

            color: #60677e;

            font-weight: 600;

            border-bottom: 1px solid #eee4f8;
        }


        td {
            padding: 13px 10px;

            font-size: 10px;

            color: #5c6379;

            border-bottom: 1px solid #f0ebf5;

            vertical-align: middle;
        }


        tbody tr:hover {
            background: #fcf9ff;
        }


        /* ===================================
           FOTO
        =================================== */

        .foto-jurusan {
            width: 65px;
            height: 50px;

            object-fit: cover;

            border-radius: 7px;

            border: 1px solid #eee4f8;
        }


        .no-photo {
            width: 65px;
            height: 50px;

            border-radius: 7px;

            background: #f7f1fb;

            color: #b989c9;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 17px;
        }


        .nama-jurusan {
            color: #182848;

            font-weight: 600;
        }


        .deskripsi {
            max-width: 350px;

            line-height: 1.6;
        }


        .aksi {
            display: flex;

            gap: 6px;
        }


        /* ===================================
           EDIT INFO
        =================================== */

        .foto-lama {
            margin-top: 8px;

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .foto-lama img {
            width: 70px;
            height: 50px;

            object-fit: cover;

            border-radius: 6px;
        }


        .foto-lama span {
            font-size: 9px;

            color: #999;
        }


        /* ===================================
           RESPONSIVE
        =================================== */

        @media (max-width: 900px) {

            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }
        }


        @media (max-width: 700px) {

            .sidebar {
                position: relative;

                width: 100%;

                height: auto;
            }

            .logo-area {
                height: 130px;
            }

            .main {
                margin-left: 0;
            }

            .header {
                height: auto;

                padding: 20px;

                gap: 20px;
            }

            .content {
                padding: 15px;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar">

    <div class="logo-area">

        <img src="../img/logo.jpg"
             alt="Logo SMK">

        <h3>SMK RAINBOW</h3>

        <span>ADMIN PANEL</span>

    </div>


    <div class="menu-title">
        Menu Utama
    </div>


    <nav class="menu">

        <a href="dashboard.php">
            <i class="fa-solid fa-gauge"></i>
            <span>Dashboard</span>
        </a>


        <a href="profil.php">
            <i class="fa-regular fa-user"></i>
            <span>Kelola Profil</span>
        </a>


        <a href="ekstrakurikuler.php">
            <i class="fa-solid fa-people-group"></i>
            <span>Ekstrakurikuler</span>
        </a>


        <a href="galeri.php">
            <i class="fa-regular fa-images"></i>
            <span>Galeri</span>
        </a>


        <a href="galeri_eskul.php">
            <i class="fa-regular fa-image"></i>
            <span>Galeri Eskul</span>
        </a>


        <a href="guru.php">
            <i class="fa-solid fa-chalkboard-user"></i>
            <span>Guru</span>
        </a>


        <a href="jurusan.php" class="active">
            <i class="fa-solid fa-building"></i>
            <span>Jurusan</span>
        </a>


        <a href="kegiatan_eskul.php">
            <i class="fa-regular fa-calendar"></i>
            <span>Kegiatan Eskul</span>
        </a>


        <a href="manfaat_eskul.php">
            <i class="fa-solid fa-star"></i>
            <span>Manfaat Eskul</span>
        </a>

    </nav>


    <div class="logout">

        <a href="logout.php">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>

    </div>

</aside>



<!-- =====================================================
     MAIN
===================================================== -->

<main class="main">


    <!-- HEADER -->

    <header class="header">

        <div>

            <h1>Jurusan</h1>

            <p>
                Kelola data jurusan sekolah
            </p>

        </div>


        <div class="admin">

            <div class="admin-icon">
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="admin-text">

                <strong>admin</strong>

                <span>Administrator</span>

            </div>

        </div>

    </header>



    <!-- CONTENT -->

    <section class="content">


        <?php if ($pesan !== ""): ?>

            <div class="alert <?= $jenis_pesan ?>">

                <?php if ($jenis_pesan === "success"): ?>

                    <i class="fa-solid fa-circle-check"></i>

                <?php else: ?>

                    <i class="fa-solid fa-circle-exclamation"></i>

                <?php endif; ?>

                <?= htmlspecialchars($pesan) ?>

            </div>

        <?php endif; ?>



        <!-- =================================================
             FORM TAMBAH / EDIT
        ================================================== -->

        <div class="card">

            <div class="card-title">

                <h2>

                    <?php if ($data_edit): ?>

                        Edit Jurusan

                    <?php else: ?>

                        Tambah Jurusan

                    <?php endif; ?>

                </h2>

                <p>
                    Masukkan informasi jurusan sekolah
                </p>

            </div>


            <form
                method="POST"
                enctype="multipart/form-data"
            >

                <?php if ($data_edit): ?>

                    <input
                        type="hidden"
                        name="aksi"
                        value="edit"
                    >

                    <input
                        type="hidden"
                        name="id_jurusan"
                        value="<?= $data_edit["id_jurusan"] ?>"
                    >

                <?php else: ?>

                    <input
                        type="hidden"
                        name="aksi"
                        value="tambah"
                    >

                <?php endif; ?>


                <div class="form-grid">


                    <!-- NAMA JURUSAN -->

                    <div class="form-group">

                        <label>
                            Nama Jurusan
                        </label>

                        <input
                            type="text"
                            name="nama_jurusan"
                            placeholder="Contoh: Rekayasa Perangkat Lunak"
                            value="<?= $data_edit
                                ? htmlspecialchars($data_edit["nama_jurusan"])
                                : "" ?>"
                            required
                        >

                    </div>


                    <!-- FOTO -->

                    <div class="form-group">

                        <label>
                            Foto
                        </label>

                        <input
                            type="file"
                            name="foto"
                            accept=".jpg,.jpeg,.png,.webp"
                        >


                        <?php if ($data_edit && !empty($data_edit["foto"])): ?>

                            <div class="foto-lama">

                                <img
                                    src="../uploads/jurusan/<?= htmlspecialchars($data_edit["foto"]) ?>"
                                    alt="Foto Jurusan"
                                >

                                <span>
                                    Foto saat ini
                                </span>

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
                            placeholder="Tulis deskripsi jurusan..."
                        ><?= $data_edit
                            ? htmlspecialchars($data_edit["deskripsi"])
                            : "" ?></textarea>

                    </div>

                </div>


                <div style="margin-top:18px;">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <?php if ($data_edit): ?>

                            <i class="fa-solid fa-pen"></i>
                            Simpan Perubahan

                        <?php else: ?>

                            <i class="fa-solid fa-plus"></i>
                            Tambah Jurusan

                        <?php endif; ?>

                    </button>


                    <?php if ($data_edit): ?>

                        <a
                            href="jurusan.php"
                            class="btn btn-cancel"
                        >
                            Batal
                        </a>

                    <?php endif; ?>

                </div>

            </form>

        </div>



        <!-- =================================================
             DATA JURUSAN
        ================================================== -->

        <div class="card">

            <div class="card-title">

                <h2>
                    Data Jurusan
                </h2>

                <p>
                    Data jurusan yang tersimpan
                </p>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th width="50">
                                No
                            </th>

                            <th width="100">
                                Foto
                            </th>

                            <th>
                                Nama Jurusan
                            </th>

                            <th>
                                Deskripsi
                            </th>

                            <th width="130">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if ($result && $result->num_rows > 0): ?>

                            <?php
                            $no = 1;
                            ?>

                            <?php while ($row = $result->fetch_assoc()): ?>

                                <tr>


                                    <!-- NO -->

                                    <td>
                                        <?= $no++ ?>
                                    </td>


                                    <!-- FOTO -->

                                    <td>

                                        <?php if (!empty($row["foto"])): ?>

                                            <img
                                                src="../uploads/jurusan/<?= htmlspecialchars($row["foto"]) ?>"
                                                class="foto-jurusan"
                                                alt="Foto Jurusan"
                                            >

                                        <?php else: ?>

                                            <div class="no-photo">
                                                <i class="fa-regular fa-image"></i>
                                            </div>

                                        <?php endif; ?>

                                    </td>


                                    <!-- NAMA -->

                                    <td>

                                        <div class="nama-jurusan">

                                            <?= htmlspecialchars(
                                                $row["nama_jurusan"]
                                            ) ?>

                                        </div>

                                    </td>


                                    <!-- DESKRIPSI -->

                                    <td>

                                        <div class="deskripsi">

                                            <?= htmlspecialchars(
                                                $row["deskripsi"]
                                            ) ?>

                                        </div>

                                    </td>


                                    <!-- AKSI -->

                                    <td>

                                        <div class="aksi">

                                            <a
                                                href="jurusan.php?edit=<?= $row["id_jurusan"] ?>"
                                                class="btn btn-edit"
                                                title="Edit"
                                            >

                                                <i class="fa-solid fa-pen"></i>

                                            </a>


                                            <a
                                                href="jurusan.php?hapus=<?= $row["id_jurusan"] ?>"
                                                class="btn btn-delete"
                                                title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus jurusan ini?')"
                                            >

                                                <i class="fa-solid fa-trash"></i>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            <?php endwhile; ?>

                        <?php else: ?>

                            <tr>

                                <td
                                    colspan="5"
                                    style="text-align:center; padding:55px 10px;"
                                >

                                    <div style="
                                        color:#c4a8ce;
                                        font-size:30px;
                                        margin-bottom:8px;
                                    ">

                                        <i class="fa-regular fa-building"></i>

                                    </div>


                                    <div style="
                                        color:#999;
                                        font-size:10px;
                                    ">

                                        Belum ada data jurusan.

                                    </div>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</main>



</body>
</html>
