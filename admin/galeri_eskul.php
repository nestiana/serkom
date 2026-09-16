<?php
session_start();

include "../koneksi.php";

/* =====================================================
   FOLDER UPLOAD
   ===================================================== */
$folder_upload = "../img/galeri_eskul/";

if (!is_dir($folder_upload)) {
    mkdir($folder_upload, 0777, true);
}


/* =====================================================
   TAMBAH DATA
   ===================================================== */
if (isset($_POST['tambah'])) {

    $id_eskul = mysqli_real_escape_string($conn, $_POST['id_eskul']);
    $judul    = mysqli_real_escape_string($conn, $_POST['judul']);
    $urutan   = mysqli_real_escape_string($conn, $_POST['urutan']);

    $foto = "";

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

        $nama_file = $_FILES['foto']['name'];
        $tmp_file  = $_FILES['foto']['tmp_name'];

        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ext, $allowed)) {

            $nama_baru = time() . "_" . uniqid() . "." . $ext;

            move_uploaded_file(
                $tmp_file,
                $folder_upload . $nama_baru
            );

            $foto = $nama_baru;
        }
    }

    $query = "INSERT INTO galeri_eskul
              (id_eskul, judul, foto, urutan)
              VALUES
              ('$id_eskul', '$judul', '$foto', '$urutan')";

    mysqli_query($conn, $query);

    header("Location: galeri_eskul.php");
    exit;
}


/* =====================================================
   UPDATE DATA
   ===================================================== */
if (isset($_POST['update'])) {

    $id_galeri = mysqli_real_escape_string($conn, $_POST['id_galeri']);
    $id_eskul  = mysqli_real_escape_string($conn, $_POST['id_eskul']);
    $judul     = mysqli_real_escape_string($conn, $_POST['judul']);
    $urutan    = mysqli_real_escape_string($conn, $_POST['urutan']);

    $foto_lama = $_POST['foto_lama'];
    $foto      = $foto_lama;

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

        $nama_file = $_FILES['foto']['name'];
        $tmp_file  = $_FILES['foto']['tmp_name'];

        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ext, $allowed)) {

            $nama_baru = time() . "_" . uniqid() . "." . $ext;

            move_uploaded_file(
                $tmp_file,
                $folder_upload . $nama_baru
            );

            // Hapus foto lama
            if (!empty($foto_lama) && file_exists($folder_upload . $foto_lama)) {
                unlink($folder_upload . $foto_lama);
            }

            $foto = $nama_baru;
        }
    }

    $query = "UPDATE galeri_eskul SET
              id_eskul = '$id_eskul',
              judul = '$judul',
              foto = '$foto',
              urutan = '$urutan'
              WHERE id_galeri = '$id_galeri'";

    mysqli_query($conn, $query);

    header("Location: galeri_eskul.php");
    exit;
}


/* =====================================================
   HAPUS DATA
   ===================================================== */
if (isset($_GET['hapus'])) {

    $id = mysqli_real_escape_string($conn, $_GET['hapus']);

    // Ambil foto
    $cek = mysqli_query(
        $conn,
        "SELECT foto FROM galeri_eskul WHERE id_galeri='$id'"
    );

    $data_foto = mysqli_fetch_assoc($cek);

    if (!empty($data_foto['foto'])) {

        $file_foto = $folder_upload . $data_foto['foto'];

        if (file_exists($file_foto)) {
            unlink($file_foto);
        }
    }

    mysqli_query(
        $conn,
        "DELETE FROM galeri_eskul WHERE id_galeri='$id'"
    );

    header("Location: galeri_eskul.php");
    exit;
}


/* =====================================================
   DATA EKSTRAKURIKULER
   ===================================================== */
$data_eskul = mysqli_query(
    $conn,
    "SELECT * FROM ekstrakurikuler ORDER BY nama_eskul ASC"
);


/* =====================================================
   DATA GALERI
   ===================================================== */
$data_galeri = mysqli_query(
    $conn,
    "SELECT 
        g.*,
        e.nama_eskul
     FROM galeri_eskul g
     LEFT JOIN ekstrakurikuler e
        ON g.id_eskul = e.id_eskul
     ORDER BY g.id_galeri DESC"
);


/* =====================================================
   MODE EDIT
   ===================================================== */
$edit_data = null;

if (isset($_GET['edit'])) {

    $id_edit = mysqli_real_escape_string(
        $conn,
        $_GET['edit']
    );

    $hasil_edit = mysqli_query(
        $conn,
        "SELECT * FROM galeri_eskul
         WHERE id_galeri='$id_edit'"
    );

    $edit_data = mysqli_fetch_assoc($hasil_edit);
}

?>


<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Galeri Eskul | Admin SMK RAINBOW
    </title>

    <!-- GOOGLE FONT -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


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
    background: linear-gradient(
        135deg,
        #fdf4ff,
        #f5f3ff,
        #eef4ff
    );
    color: #172554;
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

    border-right: 1px solid #eee4f8;

    display: flex;
    flex-direction: column;

    z-index: 100;
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
    width: 65px;
    height: 65px;

    object-fit: cover;

    border-radius: 50%;

    margin-bottom: 8px;
}

.logo-area h3 {
    font-size: 14px;
    color: #18285a;
}

.logo-area span {
    font-size: 8px;
    font-weight: 600;
    color: #b84bd8;
}


/* =====================================================
   MENU
   ===================================================== */

.menu-title {
    font-size: 9px;
    font-weight: 600;

    color: #9b98aa;

    margin: 22px 25px 10px;
}

.menu {
    padding: 0 15px;
}

.menu a {
    display: flex;
    align-items: center;

    gap: 13px;

    height: 43px;

    padding: 0 12px;

    margin-bottom: 3px;

    border-radius: 10px;

    color: #606078;

    text-decoration: none;

    font-size: 11px;

    transition: 0.3s;
}

.menu a i {
    font-size: 14px;
}

.menu a:hover {
    background: #faf0ff;
    color: #a941c9;
}

.menu a.active {
    background: linear-gradient(
        135deg,
        #ef62ae,
        #a94fe0
    );

    color: white;

    box-shadow:
        0 8px 18px rgba(180, 73, 210, 0.25);
}


/* =====================================================
   LOGOUT
   ===================================================== */

.logout {
    margin-top: auto;

    border-top: 1px solid #eee4f8;

    padding: 15px;
}

.logout a {
    text-decoration: none;

    color: #ef6666;

    font-size: 11px;

    display: flex;
    align-items: center;

    gap: 10px;

    padding: 10px;
}


/* =====================================================
   MAIN
   ===================================================== */

.main {
    margin-left: 205px;

    min-height: 100vh;
}


/* =====================================================
   HEADER
   ===================================================== */

.header {
    height: 74px;

    background: white;

    border-bottom: 1px solid #eee4f8;

    display: flex;

    justify-content: space-between;

    align-items: center;

    padding: 0 28px;
}

.header h1 {
    font-size: 22px;

    color: #18285a;

    margin-bottom: 2px;
}

.header p {
    font-size: 10px;

    color: #9a96aa;
}

.admin {
    display: flex;
    align-items: center;

    gap: 10px;
}

.admin-icon {
    width: 38px;
    height: 38px;

    border-radius: 50%;

    background: #f5ddfa;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #a64dd2;
}

.admin strong {
    display: block;

    font-size: 12px;

    color: #18285a;
}

.admin small {
    font-size: 8px;

    color: #9995a6;
}


/* =====================================================
   CONTENT
   ===================================================== */

.content {
    padding: 25px;
}


/* =====================================================
   CARD
   ===================================================== */

.card {
    background: #ffffff;

    border-radius: 15px;

    padding: 22px;

    margin-bottom: 20px;

    box-shadow:
        0 5px 20px rgba(93, 63, 112, 0.05);
}

.card-title {
    font-size: 15px;

    font-weight: 700;

    color: #172554;

    margin-bottom: 3px;
}

.card-subtitle {
    font-size: 9px;

    color: #aaa3b7;

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

.form-group label {
    font-size: 10px;

    font-weight: 600;

    color: #25335d;

    margin-bottom: 7px;
}

.form-control,
.form-group select,
.form-group input,
.form-group textarea {
    width: 100%;

    border: 1px solid #e6dbef;

    border-radius: 7px;

    padding: 10px 12px;

    outline: none;

    font-family: 'Poppins';

    font-size: 10px;

    color: #555;

    background: white;

    transition: 0.2s;
}

.form-group textarea {
    height: 85px;

    resize: vertical;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #b45bd5;

    box-shadow:
        0 0 0 3px rgba(180, 91, 213, 0.08);
}


/* =====================================================
   BUTTON
   ===================================================== */

.btn {
    border: none;

    border-radius: 8px;

    padding: 10px 17px;

    font-family: 'Poppins';

    font-size: 10px;

    font-weight: 600;

    cursor: pointer;

    text-decoration: none;

    display: inline-flex;

    align-items: center;

    gap: 6px;

    transition: 0.3s;
}

.btn-primary {
    color: white;

    background: linear-gradient(
        135deg,
        #ef62ae,
        #a94fe0
    );

    box-shadow:
        0 6px 14px rgba(176, 71, 209, 0.22);
}

.btn-primary:hover {
    transform: translateY(-1px);
}

.btn-edit {
    background: #f1e5ff;

    color: #8c43bb;
}

.btn-delete {
    background: #ffe7e9;

    color: #e0525e;
}


/* =====================================================
   TABLE
   ===================================================== */

.table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;

    border-collapse: collapse;

    min-width: 750px;
}

thead {
    background: #fbf7fd;
}

th {
    text-align: left;

    padding: 12px 10px;

    font-size: 9px;

    color: #756c85;

    font-weight: 600;

    border-bottom: 1px solid #eee5f4;
}

td {
    padding: 12px 10px;

    font-size: 9px;

    color: #5d5a67;

    border-bottom: 1px solid #f2edf5;

    vertical-align: middle;
}

tbody tr:hover {
    background: #fdfaff;
}


/* =====================================================
   FOTO
   ===================================================== */

.foto-preview {
    width: 65px;
    height: 45px;

    object-fit: cover;

    border-radius: 7px;

    border: 1px solid #eee0f5;
}

.no-foto {
    width: 65px;
    height: 45px;

    border-radius: 7px;

    background: #f7f1fa;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #c0a8ca;

    font-size: 18px;
}


/* =====================================================
   EMPTY
   ===================================================== */

.empty {
    text-align: center;

    padding: 50px 20px;

    color: #b0a9b9;
}

.empty i {
    font-size: 38px;

    color: #c9b3d9;

    display: block;

    margin-bottom: 10px;
}

.empty p {
    font-size: 10px;
}


/* =====================================================
   ALERT
   ===================================================== */

.alert {
    background: #fff4fc;

    border-left: 4px solid #bd5ddd;

    padding: 10px 13px;

    border-radius: 7px;

    margin-bottom: 15px;

    font-size: 10px;

    color: #744281;
}


/* =====================================================
   RESPONSIVE
   ===================================================== */

@media(max-width: 800px) {

    .sidebar {
        width: 70px;
    }

    .logo-area h3,
    .logo-area span,
    .menu-title,
    .menu a span,
    .logout a span {
        display: none;
    }

    .menu a {
        justify-content: center;
        padding: 0;
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

        <img src="../img/logo.jpg"
             alt="Logo">

        <h3>SMK RAINBOW</h3>

        <span>ADMIN PANEL</span>

    </div>


    <div class="menu-title">
        MENU UTAMA
    </div>


    <nav class="menu">

        <a href="dashboard.php">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>

        <a href="profil.php">
            <i class="bi bi-person"></i>
            <span>Kelola Profil</span>
        </a>

        <a href="ekstrakurikuler.php">
            <i class="bi bi-people-fill"></i>
            <span>Ekstrakurikuler</span>
        </a>

        <a href="galeri.php">
            <i class="bi bi-images"></i>
            <span>Galeri</span>
        </a>

        <a href="galeri_eskul.php" class="active">
            <i class="bi bi-image"></i>
            <span>Galeri Eskul</span>
        </a>

        <a href="guru.php">
            <i class="bi bi-person-badge"></i>
            <span>Guru</span>
        </a>

        <a href="jurusan.php">
            <i class="bi bi-building"></i>
            <span>Jurusan</span>
        </a>

        <a href="kegiatan_eskul.php">
            <i class="bi bi-calendar-event"></i>
            <span>Kegiatan Eskul</span>
        </a>

        <a href="manfaat_eskul.php">
            <i class="bi bi-star-fill"></i>
            <span>Manfaat Eskul</span>
        </a>

    </nav>


    <div class="logout">

        <a href="logout.php">

            <i class="bi bi-box-arrow-right"></i>

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

            <h1>Galeri Eskul</h1>

            <p>
                Kelola galeri foto kegiatan ekstrakurikuler
            </p>

        </div>


        <div class="admin">

            <div class="admin-icon">

                <i class="bi bi-person-fill"></i>

            </div>

            <div>

                <strong>admin</strong>

                <small>Administrator</small>

            </div>

        </div>

    </header>



    <!-- CONTENT -->

    <section class="content">


        <!-- =================================================
             FORM TAMBAH / EDIT
             ================================================= -->

        <div class="card">

            <h2 class="card-title">

                <?= $edit_data ? 'Edit Galeri Eskul' : 'Tambah Galeri Eskul'; ?>

            </h2>

            <p class="card-subtitle">

                Masukkan informasi galeri ekstrakurikuler sekolah

            </p>


            <form method="POST"
                  enctype="multipart/form-data">


                <?php if ($edit_data): ?>

                    <input type="hidden"
                           name="id_galeri"
                           value="<?= $edit_data['id_galeri']; ?>">

                    <input type="hidden"
                           name="foto_lama"
                           value="<?= htmlspecialchars($edit_data['foto']); ?>">

                <?php endif; ?>


                <div class="form-grid">


                    <!-- JUDUL -->

                    <div class="form-group">

                        <label>
                            Judul Galeri
                        </label>

                        <input type="text"
                               name="judul"
                               placeholder="Contoh: Kegiatan Pramuka"
                               value="<?= $edit_data ? htmlspecialchars($edit_data['judul']) : ''; ?>"
                               required>

                    </div>



                    <!-- EKSKUL -->

                    <div class="form-group">

                        <label>
                            Ekstrakurikuler
                        </label>

                        <select name="id_eskul"
                                required>

                            <option value="">
                                Pilih Ekstrakurikuler
                            </option>

                            <?php

                            mysqli_data_seek($data_eskul, 0);

                            while ($eskul = mysqli_fetch_assoc($data_eskul)):

                            ?>

                                <option
                                    value="<?= $eskul['id_eskul']; ?>"

                                    <?= (
                                        $edit_data &&
                                        $edit_data['id_eskul'] == $eskul['id_eskul']
                                    ) ? 'selected' : ''; ?>
                                >

                                    <?= htmlspecialchars($eskul['nama_eskul']); ?>

                                </option>

                            <?php endwhile; ?>

                        </select>

                    </div>



                    <!-- FOTO -->

                    <div class="form-group">

                        <label>
                            Foto
                        </label>

                        <input type="file"
                               name="foto"
                               accept=".jpg,.jpeg,.png,.webp"

                               <?= !$edit_data ? 'required' : ''; ?>>

                        <?php if ($edit_data && !empty($edit_data['foto'])): ?>

                            <small style="
                                margin-top:7px;
                                color:#999;
                            ">

                                Foto saat ini:
                                <?= htmlspecialchars($edit_data['foto']); ?>

                            </small>

                        <?php endif; ?>

                    </div>



                    <!-- URUTAN -->

                    <div class="form-group">

                        <label>
                            Urutan
                        </label>

                        <input type="number"
                               name="urutan"
                               min="1"
                               placeholder="Contoh: 1"

                               value="<?= $edit_data
                                   ? htmlspecialchars($edit_data['urutan'])
                                   : '1'; ?>">

                    </div>


                </div>


                <!-- BUTTON -->

                <div style="margin-top:20px;">

                    <?php if ($edit_data): ?>

                        <button type="submit"
                                name="update"
                                class="btn btn-primary">

                            <i class="bi bi-save"></i>

                            Simpan Perubahan

                        </button>


                        <a href="galeri_eskul.php"
                           class="btn btn-edit">

                            <i class="bi bi-x-circle"></i>

                            Batal

                        </a>

                    <?php else: ?>

                        <button type="submit"
                                name="tambah"
                                class="btn btn-primary">

                            <i class="bi bi-plus-lg"></i>

                            Tambah Galeri

                        </button>

                    <?php endif; ?>

                </div>


            </form>

        </div>



        <!-- =================================================
             DATA GALERI
             ================================================= -->

        <div class="card">

            <h2 class="card-title">
                Data Galeri Eskul
            </h2>

            <p class="card-subtitle">
                Data galeri ekstrakurikuler yang tersimpan
            </p>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Foto</th>

                            <th>Judul</th>

                            <th>Ekstrakurikuler</th>

                            <th>Urutan</th>

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

                            <!-- NO -->

                            <td>
                                <?= $no++; ?>
                            </td>


                            <!-- FOTO -->

                            <td>

                                <?php if (!empty($row['foto'])): ?>

                                    <img
                                        src="../img/galeri_eskul/<?= htmlspecialchars($row['foto']); ?>"
                                        class="foto-preview"
                                        alt="Foto">

                                <?php else: ?>

                                    <div class="no-foto">

                                        <i class="bi bi-image"></i>

                                    </div>

                                <?php endif; ?>

                            </td>


                            <!-- JUDUL -->

                            <td>

                                <strong style="color:#26345d;">
                                    <?= htmlspecialchars($row['judul']); ?>
                                </strong>

                            </td>


                            <!-- ESKUL -->

                            <td>

                                <?= htmlspecialchars(
                                    $row['nama_eskul'] ?? '-'
                                ); ?>

                            </td>


                            <!-- URUTAN -->

                            <td>

                                <?= htmlspecialchars(
                                    $row['urutan']
                                ); ?>

                            </td>


                            <!-- AKSI -->

                            <td>

                                <div style="
                                    display:flex;
                                    gap:6px;
                                ">

                                    <a
                                        href="galeri_eskul.php?edit=<?= $row['id_galeri']; ?>"
                                        class="btn btn-edit"
                                    >

                                        <i class="bi bi-pencil"></i>

                                        Edit

                                    </a>


                                    <a
                                        href="galeri_eskul.php?hapus=<?= $row['id_galeri']; ?>"
                                        class="btn btn-delete"

                                        onclick="return confirm(
                                            'Yakin ingin menghapus galeri ini?'
                                        );"
                                    >

                                        <i class="bi bi-trash"></i>

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

                            <td colspan="6">

                                <div class="empty">

                                    <i class="bi bi-images"></i>

                                    <p>
                                        Belum ada data galeri eskul.
                                    </p>

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