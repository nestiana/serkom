<?php
session_start();
include '../koneksi.php';

/* =========================
   TAMBAH KEGIATAN ESKUL
========================= */
if (isset($_POST['tambah'])) {

    $id_eskul      = mysqli_real_escape_string($koneksi, $_POST['id_eskul']);
    $nama_kegiatan = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
    $deskripsi     = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    $foto = "";

    // Upload foto
    if (!empty($_FILES['foto']['name'])) {

        $nama_file = $_FILES['foto']['name'];
        $tmp_file  = $_FILES['foto']['tmp_name'];

        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        $format = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ext, $format)) {

            $foto = time() . '_' . rand(100,999) . '.' . $ext;

            // folder upload
            if (!is_dir('../uploads/kegiatan_eskul')) {
                mkdir('../uploads/kegiatan_eskul', 0777, true);
            }

            move_uploaded_file(
                $tmp_file,
                '../uploads/kegiatan_eskul/' . $foto
            );
        }
    }

    mysqli_query($koneksi, "
        INSERT INTO kegiatan_eskul
        (id_eskul, nama_kegiatan, deskripsi, foto)
        VALUES
        ('$id_eskul', '$nama_kegiatan', '$deskripsi', '$foto')
    ");

    header("Location: kegiatan_eskul.php");
    exit;
}


/* =========================
   HAPUS DATA
========================= */
if (isset($_GET['hapus'])) {

    $id = intval($_GET['hapus']);

    // ambil foto
    $data = mysqli_query(
        $koneksi,
        "SELECT foto FROM kegiatan_eskul WHERE id_kegiatan='$id'"
    );

    $d = mysqli_fetch_assoc($data);

    if ($d && !empty($d['foto'])) {

        $file = '../uploads/kegiatan_eskul/' . $d['foto'];

        if (file_exists($file)) {
            unlink($file);
        }
    }

    mysqli_query(
        $koneksi,
        "DELETE FROM kegiatan_eskul WHERE id_kegiatan='$id'"
    );

    header("Location: kegiatan_eskul.php");
    exit;
}


/* =========================
   DATA ESKUL
========================= */

$data_eskul = mysqli_query(
    $conn,
    "SELECT * FROM ekstrakurikuler ORDER BY id_eskul DESC"
);


/* =========================
   DATA KEGIATAN
========================= */

$data_kegiatan = mysqli_query($conn, "
    SELECT kegiatan_eskul.*, ekstrakurikuler.nama_eskul
    FROM kegiatan_eskul
    LEFT JOIN ekstrakurikuler
    ON kegiatan_eskul.id_eskul = ekstrakurikuler.id_eskul
    ORDER BY kegiatan_eskul.id_kegiatan DESC
");

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kegiatan Eskul | Admin SMK RAINBOW</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f8f3ff;
            color: #25234a;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 205px;
            height: 100vh;
            background: #fff;
            border-right: 1px solid #eee0f7;
            z-index: 100;
            overflow-y: auto;
        }

        .logo {
            height: 193px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-bottom: 1px solid #eee0f7;
            padding: 15px;
        }

        /* =========================
           PERBAIKAN LOGO
           Supaya tidak membesar
           seperti pada screenshot
        ========================= */

        .logo img {
            width: 80px;
            height: 80px;
            max-width: 80px;
            max-height: 80px;
            object-fit: contain;
            display: block;
            margin-bottom: 10px;
        }

        .logo h2 {
            font-size: 14px;
            color: #17234e;
            text-align: center;
        }

        .logo span {
            font-size: 8px;
            color: #b34bd1;
            margin-top: 4px;
            font-weight: bold;
        }

        .menu-title {
            font-size: 8px;
            color: #999;
            padding: 20px 25px 10px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .menu {
            padding: 0 15px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 13px;
            margin-bottom: 4px;
            color: #55577c;
            text-decoration: none;
            border-radius: 10px;
            font-size: 12px;
            transition: .2s;
        }

        .menu a i {
            width: 16px;
            text-align: center;
            flex-shrink: 0;
        }

        .menu a:hover {
            background: #f6e9ff;
            color: #a83bd0;
        }

        .menu a.active {
            background: linear-gradient(
                135deg,
                #d64fda,
                #a64ccf
            );
            color: white;
            box-shadow: 0 8px 20px rgba(184, 66, 211, .25);
        }

        .logout {
            position: absolute;
            bottom: 20px;
            left: 15px;
            right: 15px;
        }

        .logout a {
            color: #ed6a76 !important;
        }


        /* ================= CONTENT ================= */

        .content {
            margin-left: 205px;
            min-height: 100vh;
            width: calc(100% - 205px);
        }

        .topbar {
            height: 75px;
            background: #fff;
            border-bottom: 1px solid #eee0f7;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
        }

        .topbar h1 {
            font-size: 20px;
            color: #192452;
        }

        .topbar p {
            font-size: 10px;
            color: #999;
            margin-top: 6px;
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-icon {
            width: 35px;
            height: 35px;
            background: #f4d9fb;
            color: #ae42cc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin strong {
            display: block;
            font-size: 11px;
            color: #18234d;
        }

        .admin small {
            font-size: 8px;
            color: #aaa;
        }


        /* ================= MAIN ================= */

        .main {
            padding: 24px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 3px 20px rgba(93, 46, 125, .04);
        }

        .card-title {
            margin-bottom: 20px;
        }

        .card-title h2 {
            font-size: 16px;
            color: #192451;
        }

        .card-title p {
            font-size: 10px;
            color: #999;
            margin-top: 5px;
        }


        /* ================= FORM ================= */

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 10px;
            font-weight: bold;
            color: #35355d;
            margin-bottom: 7px;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #e5d9ee;
            border-radius: 7px;
            padding: 11px;
            outline: none;
            color: #555;
            font-size: 11px;
            background: white;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #c14bd5;
            box-shadow: 0 0 0 3px rgba(193,75,213,.08);
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        input[type="file"] {
            padding: 9px;
        }

        .btn {
            border: 0;
            background: linear-gradient(
                135deg,
                #d750d9,
                #a849cf
            );
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 5px 12px rgba(177, 63, 204, .18);
        }

        .btn:hover {
            opacity: .9;
        }


        /* ================= TABLE ================= */

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #fbf5ff;
            color: #6d6784;
            text-align: left;
            padding: 13px 10px;
            font-size: 9px;
        }

        td {
            border-bottom: 1px solid #f1eaf5;
            padding: 12px 10px;
            font-size: 10px;
            color: #555;
            vertical-align: middle;
        }

        tr:hover td {
            background: #fdfaff;
        }

        .foto {
            width: 70px;
            height: 50px;
            border-radius: 7px;
            object-fit: cover;
            background: #f5eafb;
            display: block;
        }

        .no-foto {
            width: 70px;
            height: 50px;
            border-radius: 7px;
            background: #f8effc;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #c28ad0;
            font-size: 18px;
        }

        .badge {
            background: #f5ddfb;
            color: #a73fc2;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 8px;
            font-weight: bold;
        }

        .aksi {
            display: flex;
            gap: 6px;
        }

        .btn-edit,
        .btn-delete {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 10px;
        }

        .btn-edit {
            background: #e9f2ff;
            color: #4b8bd8;
        }

        .btn-delete {
            background: #ffe9ec;
            color: #e85b6b;
        }

        .empty {
            text-align: center;
            padding: 45px !important;
            color: #aaa;
        }

        .empty i {
            font-size: 35px;
            color: #d5b8de;
            display: block;
            margin-bottom: 12px;
        }


        /* ================= RESPONSIVE ================= */

        @media(max-width: 800px) {

            .sidebar {
                width: 70px;
            }

            .logo {
                height: 120px;
                padding: 10px;
            }

            .logo img {
                width: 45px;
                height: 45px;
                max-width: 45px;
                max-height: 45px;
                margin-bottom: 5px;
            }

            .logo h2,
            .logo span,
            .menu-title,
            .menu a span {
                display: none;
            }

            .menu a {
                justify-content: center;
            }

            .content {
                margin-left: 70px;
                width: calc(100% - 70px);
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


<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

    <div class="logo">

        <img
            src="../img/logo.jpg"
            alt="Logo SMK"
        >

        <h2>SMK RAINBOW</h2>

        <span>ADMIN PANEL</span>

    </div>


    <div class="menu-title">
        Menu Utama
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


        <!-- MENU AKTIF -->

        <a
            href="kegiatan_eskul.php"
            class="active"
        >

            <i class="fa-regular fa-calendar"></i>

            <span>Kegiatan Eskul</span>

        </a>


        <a href="manfaat_eskul.php">

            <i class="fa-solid fa-star"></i>

            <span>Manfaat Eskul</span>

        </a>

    </div>


    <div class="logout">

        <div class="menu">

            <a href="logout.php">

                <i class="fa-solid fa-right-from-bracket"></i>

                <span>Logout</span>

            </a>

        </div>

    </div>

</div>



<!-- ================= CONTENT ================= -->

<div class="content">


    <!-- TOPBAR -->

    <div class="topbar">

        <div>

            <h1>Kegiatan Eskul</h1>

            <p>
                Kelola kegiatan ekstrakurikuler sekolah
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


        <!-- ================= TAMBAH ================= -->

        <div class="card">

            <div class="card-title">

                <h2>
                    Tambah Kegiatan Eskul
                </h2>

                <p>
                    Masukkan informasi kegiatan ekstrakurikuler
                </p>

            </div>


            <form
                method="POST"
                enctype="multipart/form-data"
            >

                <div class="form-grid">


                    <div class="form-group">

                        <label>
                            Ekstrakurikuler
                        </label>


                        <select
                            name="id_eskul"
                            required
                        >

                            <option value="">
                                -- Pilih Ekstrakurikuler --
                            </option>


                            <?php while ($eskul = mysqli_fetch_assoc($data_eskul)) : ?>

                                <option
                                    value="<?= htmlspecialchars($eskul['id_eskul']); ?>"
                                >

                                    <?= htmlspecialchars($eskul['nama_eskul']); ?>

                                </option>

                            <?php endwhile; ?>

                        </select>

                    </div>


                    <div class="form-group">

                        <label>
                            Nama Kegiatan
                        </label>


                        <input
                            type="text"
                            name="nama_kegiatan"
                            placeholder="Contoh: Latihan Rutin"
                            required
                        >

                    </div>


                    <div class="form-group full">

                        <label>
                            Foto Kegiatan
                        </label>


                        <input
                            type="file"
                            name="foto"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                    </div>


                    <div class="form-group full">

                        <label>
                            Deskripsi
                        </label>


                        <textarea
                            name="deskripsi"
                            placeholder="Tuliskan deskripsi kegiatan..."
                        ></textarea>

                    </div>

                </div>


                <button
                    type="submit"
                    name="tambah"
                    class="btn"
                >

                    <i class="fa-solid fa-plus"></i>

                    &nbsp; Tambah Kegiatan

                </button>

            </form>

        </div>



        <!-- ================= DATA ================= -->

        <div class="card">

            <div class="card-title">

                <h2>
                    Data Kegiatan Eskul
                </h2>

                <p>
                    Daftar kegiatan ekstrakurikuler yang tersimpan
                </p>

            </div>


            <div class="table-container">

                <table>

                    <thead>

                        <tr>

                            <th width="40">
                                No
                            </th>

                            <th>
                                Foto
                            </th>

                            <th>
                                Ekstrakurikuler
                            </th>

                            <th>
                                Nama Kegiatan
                            </th>

                            <th>
                                Deskripsi
                            </th>

                            <th width="100">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php

                    $no = 1;

                    if (
                        $data_kegiatan &&
                        mysqli_num_rows($data_kegiatan) > 0
                    ):

                        while ($row = mysqli_fetch_assoc($data_kegiatan)):

                    ?>

                        <tr>

                            <td>
                                <?= $no++; ?>
                            </td>


                            <td>

                                <?php if (!empty($row['foto'])) : ?>

                                    <img
                                        src="../uploads/kegiatan_eskul/<?= htmlspecialchars($row['foto']); ?>"
                                        alt="Foto Kegiatan"
                                        class="foto"
                                    >

                                <?php else : ?>

                                    <div class="no-foto">

                                        <i class="fa-regular fa-image"></i>

                                    </div>

                                <?php endif; ?>

                            </td>


                            <td>

                                <span class="badge">

                                    <?= htmlspecialchars(
                                        $row['nama_eskul'] ?? 'Tidak ada'
                                    ); ?>

                                </span>

                            </td>


                            <td>

                                <strong>

                                    <?= htmlspecialchars(
                                        $row['nama_kegiatan']
                                    ); ?>

                                </strong>

                            </td>


                            <td>

                                <?= nl2br(
                                    htmlspecialchars(
                                        $row['deskripsi'] ?? ''
                                    )
                                ); ?>

                            </td>


                            <td>

                                <div class="aksi">

                                    <a
                                        href="edit_kegiatan_eskul.php?id=<?= intval($row['id_kegiatan']); ?>"
                                        class="btn-edit"
                                        title="Edit"
                                    >

                                        <i class="fa-solid fa-pen"></i>

                                    </a>


                                    <a
                                        href="kegiatan_eskul.php?hapus=<?= intval($row['id_kegiatan']); ?>"
                                        class="btn-delete"
                                        title="Hapus"
                                        onclick="return confirm('Yakin ingin menghapus kegiatan ini?')"
                                    >

                                        <i class="fa-solid fa-trash"></i>

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
                                class="empty"
                            >

                                <i class="fa-regular fa-calendar-xmark"></i>

                                Belum ada data kegiatan eskul.

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
