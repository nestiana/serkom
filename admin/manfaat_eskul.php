<?php
session_start();

include "../koneksi.php";

/* =====================================================
   TAMBAH DATA MANFAAT ESKUL
===================================================== */
if (isset($_POST['tambah'])) {

    $id_eskul  = mysqli_real_escape_string($koneksi, $_POST['id_eskul']);
    $judul     = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    $foto = "";

    /* Upload foto */
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

        $namaFile = $_FILES['foto']['name'];
        $tmpFile  = $_FILES['foto']['tmp_name'];

        $folder = "../uploads/manfaat_eskul/";

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        $namaBaru = time() . "_" . uniqid() . "." . $ext;

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ext, $allowed)) {

            move_uploaded_file(
                $tmpFile,
                $folder . $namaBaru
            );

            $foto = $namaBaru;
        }
    }

    $query = "INSERT INTO manfaat_eskul
              (id_eskul, judul, deskripsi, foto)
              VALUES
              ('$id_eskul', '$judul', '$deskripsi', '$foto')";

    mysqli_query($koneksi, $query);

    header("Location: manfaat_eskul.php");
    exit;
}


/* =====================================================
   HAPUS DATA
===================================================== */
if (isset($_GET['hapus'])) {

    $id = (int) $_GET['hapus'];

    /* Ambil foto */
    $cek = mysqli_query(
        $koneksi,
        "SELECT foto FROM manfaat_eskul WHERE id_manfaat = $id"
    );

    $dataFoto = mysqli_fetch_assoc($cek);

    if ($dataFoto && !empty($dataFoto['foto'])) {

        $fileFoto = "../uploads/manfaat_eskul/" . $dataFoto['foto'];

        if (file_exists($fileFoto)) {
            unlink($fileFoto);
        }
    }

    mysqli_query(
        $koneksi,
        "DELETE FROM manfaat_eskul WHERE id_manfaat = $id"
    );

    header("Location: manfaat_eskul.php");
    exit;
}


/* =====================================================
   AMBIL DATA
===================================================== */
$data = mysqli_query(
    $conn,
    "SELECT * FROM manfaat_eskul ORDER BY id_manfaat DESC"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Manfaat Eskul | Admin SMK RAINBOW BUBBLEGUM</title>

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

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f7f2ff;
            color: #172554;
        }

        a {
            text-decoration: none;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 205px;
            height: 100vh;

            background: #ffffff;

            border-right: 1px solid #eee5f7;

            z-index: 100;
        }


        /* LOGO */

        .logo-area {
            height: 193px;

            display: flex;
            flex-direction: column;

            align-items: center;
            justify-content: center;

            border-bottom: 1px solid #eee5f7;
        }

        .logo-area img {
            width: 62px;
            height: 62px;

            border-radius: 50%;

            object-fit: cover;

            margin-bottom: 8px;
        }

        .logo-title {
            font-size: 14px;
            font-weight: 700;

            color: #172554;

            text-align: center;
        }

        .logo-subtitle {
            font-size: 8px;

            color: #b44de0;

            font-weight: 600;
        }


        /* MENU */

        .menu-title {
            font-size: 9px;
            color: #999;

            padding: 20px 25px 12px;

            font-weight: 500;
        }

        .menu {
            padding: 0 15px;
        }

        .menu a {
            display: flex;
            align-items: center;

            gap: 13px;

            height: 40px;

            padding: 0 13px;

            margin-bottom: 4px;

            border-radius: 10px;

            color: #65708a;

            font-size: 12px;

            transition: 0.3s;
        }

        .menu a i {
            width: 14px;
            text-align: center;

            font-size: 13px;
        }

        .menu a:hover {
            color: #b348df;
            background: #faf2ff;
        }

        .menu a.active {
            color: #ffffff;

            background: linear-gradient(
                90deg,
                #ed59b1,
                #a94fe0
            );

            box-shadow: 0 8px 18px rgba(177, 73, 220, 0.25);
        }


        /* LOGOUT */

        .logout {
            position: absolute;

            bottom: 18px;
            left: 15px;
            right: 15px;
        }

        .logout a {
            color: #ed6262 !important;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            margin-left: 205px;

            min-height: 100vh;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {
            height: 140px;

            background: #ffffff;

            border-bottom: 1px solid #eee5f7;

            display: flex;

            align-items: center;
            justify-content: space-between;

            padding: 0 28px;
        }

        .page-title h1 {
            font-size: 22px;

            color: #172554;

            font-weight: 700;

            margin-bottom: 3px;
        }

        .page-title p {
            font-size: 10px;

            color: #9b9baf;
        }


        /* ADMIN */

        .admin-profile {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .admin-icon {
            width: 37px;
            height: 37px;

            border-radius: 50%;

            background: #f5dfff;

            display: flex;

            align-items: center;
            justify-content: center;

            color: #ad4bd9;
        }

        .admin-text strong {
            display: block;

            font-size: 12px;

            color: #172554;
        }

        .admin-text span {
            font-size: 9px;

            color: #aaa;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .content {
            padding: 24px;
        }


        /* =====================================================
           CARD
        ===================================================== */

        .card {
            background: #ffffff;

            border-radius: 16px;

            padding: 22px;

            margin-bottom: 20px;

            box-shadow: 0 2px 15px rgba(85, 44, 130, 0.03);
        }

        .card-title {
            font-size: 16px;

            font-weight: 700;

            color: #172554;

            margin-bottom: 3px;
        }

        .card-subtitle {
            font-size: 10px;

            color: #a1a1b1;

            margin-bottom: 20px;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 16px;
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

            color: #26365c;

            margin-bottom: 7px;
        }

        input,
        textarea {
            width: 100%;

            border: 1px solid #e4dced;

            border-radius: 7px;

            padding: 11px;

            font-family: 'Poppins', sans-serif;

            font-size: 11px;

            color: #333;

            outline: none;

            transition: 0.3s;

            background: #ffffff;
        }

        input:focus,
        textarea:focus {
            border-color: #bc56df;

            box-shadow: 0 0 0 3px rgba(188, 86, 223, 0.08);
        }

        textarea {
            min-height: 105px;

            resize: vertical;
        }

        input[type="file"] {
            padding: 8px;
        }


        /* BUTTON */

        .btn {
            border: none;

            background: linear-gradient(
                90deg,
                #ed59b1,
                #a94fe0
            );

            color: #ffffff;

            padding: 10px 16px;

            border-radius: 7px;

            font-family: 'Poppins', sans-serif;

            font-size: 10px;

            font-weight: 600;

            cursor: pointer;

            margin-top: 18px;

            box-shadow: 0 5px 12px rgba(177, 73, 220, 0.18);

            transition: 0.3s;
        }

        .btn:hover {
            transform: translateY(-1px);

            box-shadow: 0 7px 15px rgba(177, 73, 220, 0.28);
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 750px;
        }

        thead {
            background: #faf7fc;
        }

        th {
            text-align: left;

            padding: 12px 10px;

            font-size: 9px;

            font-weight: 600;

            color: #5d6075;

            border-bottom: 1px solid #eee5f7;
        }

        td {
            padding: 12px 10px;

            font-size: 10px;

            color: #65677a;

            border-bottom: 1px solid #f1edf5;

            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fcf9ff;
        }


        /* FOTO */

        .foto {
            width: 52px;
            height: 42px;

            object-fit: cover;

            border-radius: 7px;

            border: 1px solid #eee5f7;
        }

        .no-foto {
            width: 52px;
            height: 42px;

            border-radius: 7px;

            background: #faf7fc;

            display: flex;

            align-items: center;
            justify-content: center;

            color: #c3b4ce;

            font-size: 15px;
        }


        /* DESKRIPSI */

        .deskripsi {
            max-width: 280px;

            line-height: 1.6;
        }


        /* AKSI */

        .btn-hapus {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            width: 30px;
            height: 30px;

            border-radius: 7px;

            background: #fff0f2;

            color: #ed626f;

            font-size: 11px;

            transition: 0.3s;
        }

        .btn-hapus:hover {
            background: #ed626f;

            color: #ffffff;
        }


        /* EMPTY */

        .empty {
            text-align: center;

            padding: 60px 20px;

            color: #aaa;
        }

        .empty i {
            font-size: 34px;

            color: #cbb9d5;

            margin-bottom: 10px;
        }

        .empty p {
            font-size: 10px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .sidebar {
                width: 70px;
            }

            .logo-title,
            .logo-subtitle,
            .menu-title,
            .menu a span {
                display: none;
            }

            .menu a {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
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


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar">

    <div class="logo-area">

        <img src="../img/logo.jpg" alt="Logo">

        <div class="logo-title">
            SMK RAINBOW
        </div>

        <div class="logo-subtitle">
            ADMIN PANEL
        </div>

    </div>


    <div class="menu-title">
        MENU UTAMA
    </div>


    <div class="menu">

        <a href="dashboard.php">
            <i class="fa-solid fa-gauge"></i>
            <span>Dashboard</span>
        </a>

        <a href="profil.php">
            <i class="fa-regular fa-user"></i>
            <span>Kelola Profil</span>
        </a>

        <a href="ekstrakurikuler.php">
            <i class="fa-solid fa-users"></i>
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

        <a href="jurusan.php">
            <i class="fa-solid fa-building"></i>
            <span>Jurusan</span>
        </a>

        <a href="kegiatan_eskul.php">
            <i class="fa-regular fa-calendar"></i>
            <span>Kegiatan Eskul</span>
        </a>

        <a href="manfaat_eskul.php" class="active">
            <i class="fa-solid fa-star"></i>
            <span>Manfaat Eskul</span>
        </a>

    </div>


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


    <!-- TOPBAR -->

    <header class="topbar">

        <div class="page-title">

            <h1>Manfaat Eskul</h1>

            <p>
                Kelola manfaat ekstrakurikuler sekolah
            </p>

        </div>


        <div class="admin-profile">

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

    <div class="content">


        <!-- =================================================
             FORM TAMBAH
        ================================================= -->

        <div class="card">

            <div class="card-title">
                Tambah Manfaat Eskul
            </div>

            <div class="card-subtitle">
                Masukkan informasi manfaat ekstrakurikuler
            </div>


            <form method="POST"
                  enctype="multipart/form-data">

                <div class="form-grid">


                    <!-- ID ESKUL -->

                    <div class="form-group">

                        <label>
                            ID Ekstrakurikuler
                        </label>

                        <input
                            type="number"
                            name="id_eskul"
                            placeholder="Contoh: 1"
                            required
                        >

                    </div>


                    <!-- JUDUL -->

                    <div class="form-group">

                        <label>
                            Judul
                        </label>

                        <input
                            type="text"
                            name="judul"
                            placeholder="Contoh: Meningkatkan Kedisiplinan"
                            required
                        >

                    </div>


                    <!-- FOTO -->

                    <div class="form-group full">

                        <label>
                            Foto
                        </label>

                        <input
                            type="file"
                            name="foto"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                    </div>


                    <!-- DESKRIPSI -->

                    <div class="form-group full">

                        <label>
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            placeholder="Tulis deskripsi manfaat ekstrakurikuler..."
                            required
                        ></textarea>

                    </div>

                </div>


                <button
                    type="submit"
                    name="tambah"
                    class="btn"
                >

                    <i class="fa-solid fa-plus"></i>

                    Tambah Manfaat

                </button>

            </form>

        </div>



        <!-- =================================================
             DATA
        ================================================= -->

        <div class="card">

            <div class="card-title">
                Data Manfaat Eskul
            </div>

            <div class="card-subtitle">
                Data manfaat ekstrakurikuler yang tersimpan
            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Foto</th>

                            <th>ID Eskul</th>

                            <th>Judul</th>

                            <th>Deskripsi</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php

                    $no = 1;

                    if (mysqli_num_rows($data) > 0):

                        while ($row = mysqli_fetch_assoc($data)):

                    ?>

                        <tr>

                            <!-- NO -->

                            <td>
                                <?= $no++; ?>
                            </td>


                            <!-- FOTO -->

                            <td>

                                <?php if (!empty($row['foto'])): ?>

                                    <img
                                        src="../uploads/manfaat_eskul/<?= htmlspecialchars($row['foto']); ?>"
                                        class="foto"
                                        alt="Foto"
                                    >

                                <?php else: ?>

                                    <div class="no-foto">

                                        <i class="fa-regular fa-image"></i>

                                    </div>

                                <?php endif; ?>

                            </td>


                            <!-- ID ESKUL -->

                            <td>
                                <?= htmlspecialchars($row['id_eskul']); ?>
                            </td>


                            <!-- JUDUL -->

                            <td>
                                <?= htmlspecialchars($row['judul']); ?>
                            </td>


                            <!-- DESKRIPSI -->

                            <td class="deskripsi">

                                <?= htmlspecialchars($row['deskripsi']); ?>

                            </td>


                            <!-- AKSI -->

                            <td>

                                <a
                                    href="?hapus=<?= $row['id_manfaat']; ?>"
                                    class="btn-hapus"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    title="Hapus"
                                >

                                    <i class="fa-solid fa-trash"></i>

                                </a>

                            </td>

                        </tr>

                    <?php

                        endwhile;

                    else:

                    ?>

                        <tr>

                            <td colspan="6">

                                <div class="empty">

                                    <i class="fa-regular fa-image"></i>

                                    <p>
                                        Belum ada data manfaat eskul.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</main>


</body>
</html>