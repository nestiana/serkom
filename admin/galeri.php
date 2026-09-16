<?php
session_start();

include "../koneksi.php";

$folder_upload = "../uploads/galeri/";

if (!is_dir($folder_upload)) {
    mkdir($folder_upload, 0777, true);
}

/* =========================================================
   TAMBAH DATA GALERI
========================================================= */
if (isset($_POST['tambah'])) {

    $judul      = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi  = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $tanggal    = $_POST['tanggal'];

    $foto = "";

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

        $nama_file = $_FILES['foto']['name'];
        $tmp_file  = $_FILES['foto']['tmp_name'];

        $ekstensi = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

        $ekstensi_valid = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ekstensi, $ekstensi_valid)) {

            $foto = time() . "_" . preg_replace(
                "/[^a-zA-Z0-9._-]/",
                "_",
                $nama_file
            );

            move_uploaded_file(
                $tmp_file,
                $folder_upload . $foto
            );
        }
    }

    $query = "INSERT INTO galeri
              (judul, deskripsi, tanggal, foto)
              VALUES
              ('$judul', '$deskripsi', '$tanggal', '$foto')";

    mysqli_query($koneksi, $query);

    header("Location: galeri.php");
    exit;
}


/* =========================================================
   UPDATE DATA GALERI
========================================================= */
if (isset($_POST['update'])) {

    $id         = (int)$_POST['id_galeri'];
    $judul      = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi  = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $tanggal    = $_POST['tanggal'];

    $foto_baru = "";

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

        $nama_file = $_FILES['foto']['name'];
        $tmp_file  = $_FILES['foto']['tmp_name'];

        $ekstensi = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

        $ekstensi_valid = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ekstensi, $ekstensi_valid)) {

            $foto_baru = time() . "_" . preg_replace(
                "/[^a-zA-Z0-9._-]/",
                "_",
                $nama_file
            );

            move_uploaded_file(
                $tmp_file,
                $folder_upload . $foto_baru
            );

            /* Ambil foto lama */
            $cek = mysqli_query(
                $koneksi,
                "SELECT foto FROM galeri WHERE id_galeri = $id"
            );

            $data_lama = mysqli_fetch_assoc($cek);

            if (!empty($data_lama['foto'])) {
                $file_lama = $folder_upload . $data_lama['foto'];

                if (file_exists($file_lama)) {
                    unlink($file_lama);
                }
            }

            $query = "UPDATE galeri SET
                        judul = '$judul',
                        deskripsi = '$deskripsi',
                        tanggal = '$tanggal',
                        foto = '$foto_baru'
                      WHERE id_galeri = $id";

        } else {

            $query = "UPDATE galeri SET
                        judul = '$judul',
                        deskripsi = '$deskripsi',
                        tanggal = '$tanggal'
                      WHERE id_galeri = $id";
        }

    } else {

        $query = "UPDATE galeri SET
                    judul = '$judul',
                    deskripsi = '$deskripsi',
                    tanggal = '$tanggal'
                  WHERE id_galeri = $id";
    }

    mysqli_query($koneksi, $query);

    header("Location: galeri.php");
    exit;
}


/* =========================================================
   HAPUS DATA GALERI
========================================================= */
if (isset($_GET['hapus'])) {

    $id = (int)$_GET['hapus'];

    /* Ambil nama foto */
    $cek = mysqli_query(
        $koneksi,
        "SELECT foto FROM galeri WHERE id_galeri = $id"
    );

    $data = mysqli_fetch_assoc($cek);

    if ($data && !empty($data['foto'])) {

        $file = $folder_upload . $data['foto'];

        if (file_exists($file)) {
            unlink($file);
        }
    }

    mysqli_query(
        $koneksi,
        "DELETE FROM galeri WHERE id_galeri = $id"
    );

    header("Location: galeri.php");
    exit;
}


/* =========================================================
   DATA YANG AKAN DIEDIT
========================================================= */
$data_edit = null;

if (isset($_GET['edit'])) {

    $id = (int)$_GET['edit'];

    $hasil_edit = mysqli_query(
        $conn,
        "SELECT * FROM galeri WHERE id_galeri = $id"
    );

    $data_edit = mysqli_fetch_assoc($hasil_edit);
}


/* =========================================================
   AMBIL SEMUA DATA
========================================================= */
$data_galeri = mysqli_query(
    $conn,
    "SELECT * FROM galeri ORDER BY id_galeri DESC"
);
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Galeri | Admin SMK RAINBOW BUBBLEGUM</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(
                135deg,
                #fdf5ff,
                #f5f2ff,
                #eef5ff
            );
            color: #172554;
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
            border-right: 1px solid #eee3f5;
            z-index: 1000;
        }

        .logo-area {
            height: 145px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #eee3f5;
        }

        .logo-area img {
            width: 62px;
            height: 62px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 8px;
        }

        .logo-area h3 {
            font-size: 14px;
            font-weight: 700;
            color: #172554;
        }

        .logo-area span {
            font-size: 9px;
            color: #a855d8;
            font-weight: 600;
        }

        .menu-title {
            font-size: 9px;
            color: #999;
            font-weight: 600;
            margin: 22px 25px 10px;
        }

        .menu {
            padding: 0 14px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 11px 14px;
            margin-bottom: 4px;
            text-decoration: none;
            color: #62627a;
            font-size: 12px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .menu a i {
            font-size: 16px;
        }

        .menu a:hover {
            background: #faf0ff;
            color: #a855d8;
        }

        .menu a.active {
            background: linear-gradient(
                135deg,
                #ee63b6,
                #a855d8
            );
            color: white;
            box-shadow: 0 8px 18px rgba(168, 85, 216, .25);
        }

        .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
            padding: 0 25px;
        }

        .logout a {
            color: #ef6262;
            text-decoration: none;
            font-size: 12px;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 235px;
            min-height: 100vh;
        }

        .topbar {
            height: 85px;
            background: #fff;
            border-bottom: 1px solid #eee3f5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
        }

        .topbar h1 {
            font-size: 22px;
            color: #172554;
            font-weight: 700;
        }

        .topbar p {
            font-size: 11px;
            color: #999;
            margin-top: 2px;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #f5ddfa;
            color: #a855d8;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-info strong {
            font-size: 12px;
            display: block;
        }

        .admin-info span {
            font-size: 9px;
            color: #999;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 26px 30px 50px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 22px;
            margin-bottom: 22px;
            box-shadow: 0 5px 20px rgba(100, 70, 130, .06);
        }

        .card h2 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .card .subtitle {
            color: #999;
            font-size: 10px;
            margin-bottom: 20px;
        }

        /* =========================
           FORM
        ========================= */

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
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 7px;
            color: #3d4160;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e6dff0;
            border-radius: 8px;
            outline: none;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            color: #333;
        }

        input:focus,
        textarea:focus {
            border-color: #c05add;
            box-shadow: 0 0 0 3px rgba(192, 90, 221, .08);
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        input[type="file"] {
            padding: 8px;
            background: white;
        }

        .foto-lama {
            margin-top: 8px;
            width: 90px;
            height: 65px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        .btn {
            border: none;
            padding: 10px 16px;
            border-radius: 9px;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 16px;
            background: linear-gradient(
                135deg,
                #ee63b6,
                #a855d8
            );
            box-shadow: 0 7px 15px rgba(168, 85, 216, .2);
        }

        .btn:hover {
            opacity: .9;
        }

        .btn-cancel {
            background: #eee;
            color: #666;
            margin-left: 6px;
            box-shadow: none;
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
            font-size: 10px;
        }

        thead {
            background: #fbf7fd;
        }

        th {
            padding: 12px 10px;
            text-align: left;
            color: #68647a;
            font-size: 9px;
            font-weight: 600;
            border-bottom: 1px solid #eadff0;
        }

        td {
            padding: 12px 10px;
            border-bottom: 1px solid #f1edf4;
            vertical-align: middle;
        }

        .foto-table {
            width: 75px;
            height: 55px;
            object-fit: cover;
            border-radius: 8px;
            background: #f7f2fa;
        }

        .no-foto {
            width: 75px;
            height: 55px;
            border-radius: 8px;
            background: #f5eff8;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            font-size: 9px;
        }

        .aksi {
            display: flex;
            gap: 6px;
        }

        .btn-edit,
        .btn-hapus {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 30px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-edit {
            background: #f0e1ff;
            color: #9a4dcc;
        }

        .btn-hapus {
            background: #ffe3e5;
            color: #e05260;
        }

        .btn-edit:hover,
        .btn-hapus:hover {
            transform: translateY(-1px);
        }

        .empty {
            text-align: center;
            padding: 45px 10px;
            color: #999;
        }

        .empty i {
            font-size: 38px;
            color: #c7b8ce;
            display: block;
            margin-bottom: 10px;
        }

        .empty p {
            font-size: 10px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 850px) {

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

        @media (max-width: 650px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .logout {
                position: static;
                padding: 15px 25px;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }
        }

    </style>

</head>

<body>

<!-- =====================================================
     SIDEBAR
===================================================== -->

<div class="sidebar">

    <div class="logo-area">

        <img src="../img/logo.jpg" alt="Logo">

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


<!-- =====================================================
     MAIN
===================================================== -->

<div class="main">

    <!-- TOPBAR -->

    <div class="topbar">

        <div>

            <h1>Galeri</h1>

            <p>Kelola galeri foto sekolah</p>

        </div>

        <div class="admin-info">

            <div class="admin-icon">
                <i class="bi bi-person-fill"></i>
            </div>

            <div>
                <strong>admin</strong>
                <span>Administrator</span>
            </div>

        </div>

    </div>


    <!-- CONTENT -->

    <div class="content">


        <!-- =================================================
             FORM TAMBAH / EDIT
        ================================================== -->

        <div class="card">

            <?php if ($data_edit): ?>

                <h2>Edit Galeri</h2>

                <p class="subtitle">
                    Ubah informasi galeri sekolah
                </p>

                <form method="POST"
                      enctype="multipart/form-data">

                    <input type="hidden"
                           name="id_galeri"
                           value="<?= $data_edit['id_galeri']; ?>">

                    <div class="form-grid">

                        <div class="form-group">

                            <label>Judul Galeri</label>

                            <input type="text"
                                   name="judul"
                                   value="<?= htmlspecialchars($data_edit['judul']); ?>"
                                   placeholder="Contoh: Kegiatan Sekolah"
                                   required>

                        </div>


                        <div class="form-group">

                            <label>Tanggal</label>

                            <input type="date"
                                   name="tanggal"
                                   value="<?= $data_edit['tanggal']; ?>"
                                   required>

                        </div>


                        <div class="form-group full">

                            <label>Foto</label>

                            <input type="file"
                                   name="foto"
                                   accept=".jpg,.jpeg,.png,.webp">

                            <?php if (!empty($data_edit['foto'])): ?>

                                <img src="../uploads/galeri/<?= htmlspecialchars($data_edit['foto']); ?>"
                                     class="foto-lama">

                            <?php endif; ?>

                        </div>


                        <div class="form-group full">

                            <label>Deskripsi</label>

                            <textarea name="deskripsi"
                                      placeholder="Tulis deskripsi galeri..."><?= htmlspecialchars($data_edit['deskripsi']); ?></textarea>

                        </div>

                    </div>

                    <button type="submit"
                            name="update"
                            class="btn">

                        <i class="bi bi-save"></i>
                        Simpan Perubahan

                    </button>

                    <a href="galeri.php"
                       class="btn btn-cancel">

                        Batal

                    </a>

                </form>

            <?php else: ?>

                <h2>Tambah Galeri</h2>

                <p class="subtitle">
                    Masukkan informasi galeri sekolah
                </p>

                <form method="POST"
                      enctype="multipart/form-data">

                    <div class="form-grid">

                        <div class="form-group">

                            <label>Judul Galeri</label>

                            <input type="text"
                                   name="judul"
                                   placeholder="Contoh: Kegiatan Sekolah"
                                   required>

                        </div>


                        <div class="form-group">

                            <label>Tanggal</label>

                            <input type="date"
                                   name="tanggal"
                                   required>

                        </div>


                        <div class="form-group full">

                            <label>Foto</label>

                            <input type="file"
                                   name="foto"
                                   accept=".jpg,.jpeg,.png,.webp"
                                   required>

                        </div>


                        <div class="form-group full">

                            <label>Deskripsi</label>

                            <textarea name="deskripsi"
                                      placeholder="Tulis deskripsi galeri..."></textarea>

                        </div>

                    </div>

                    <button type="submit"
                            name="tambah"
                            class="btn">

                        <i class="bi bi-plus-lg"></i>
                        Tambah Galeri

                    </button>

                </form>

            <?php endif; ?>

        </div>


        <!-- =================================================
             DATA GALERI
        ================================================== -->

        <div class="card">

            <h2>Data Galeri</h2>

            <p class="subtitle">
                Data galeri yang tersimpan
            </p>

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

                    if (mysqli_num_rows($data_galeri) > 0):

                        while ($row = mysqli_fetch_assoc($data_galeri)):

                    ?>

                        <tr>

                            <td>
                                <?= $no++; ?>
                            </td>


                            <td>

                                <?php if (!empty($row['foto'])): ?>

                                    <img
                                        src="../uploads/galeri/<?= htmlspecialchars($row['foto']); ?>"
                                        class="foto-table"
                                        alt="Foto">

                                <?php else: ?>

                                    <div class="no-foto">
                                        Tidak ada foto
                                    </div>

                                <?php endif; ?>

                            </td>


                            <td>

                                <strong>
                                    <?= htmlspecialchars($row['judul']); ?>
                                </strong>

                            </td>


                            <td>

                                <?= htmlspecialchars(
                                    substr($row['deskripsi'], 0, 60)
                                ); ?>

                                <?php if (strlen($row['deskripsi']) > 60): ?>
                                    ...
                                <?php endif; ?>

                            </td>


                            <td>
                                <?= htmlspecialchars($row['tanggal']); ?>
                            </td>


                            <td>

                                <div class="aksi">

                                    <a href="galeri.php?edit=<?= $row['id_galeri']; ?>"
                                       class="btn-edit"
                                       title="Edit">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    <a href="galeri.php?hapus=<?= $row['id_galeri']; ?>"
                                       class="btn-hapus"
                                       title="Hapus"
                                       onclick="return confirm('Yakin ingin menghapus galeri ini?');">

                                        <i class="bi bi-trash"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php

                        endwhile;

                    else:

                    ?>

                        <tr>

                            <td colspan="6">

                                <div class="empty">

                                    <i class="bi bi-images"></i>

                                    <p>
                                        Belum ada data galeri.
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

</div>

</body>
</html>