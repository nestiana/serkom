<?php
include "koneksi.php";

/* =====================================================
   AMBIL DATA PROFIL DARI DATABASE
===================================================== */
$queryProfil = mysqli_query($conn, "SELECT * FROM profil ORDER BY id_profil DESC LIMIT 1");
$profil = mysqli_fetch_assoc($queryProfil);

/* =====================================================
   AMBIL 6 BERITA TERBARU
===================================================== */
$queryBerita = mysqli_query(
    $conn,
    "SELECT * FROM berita ORDER BY id_berita DESC LIMIT 6"
);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>SMK RAINBOW BUBBLEGUM</title>

    <meta
        content="width=device-width, initial-scale=1.0"
        name="viewport"
    >

    <meta
        content="Free HTML Templates"
        name="keywords"
    >

    <meta
        content="Free HTML Templates"
        name="description"
    >

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link
        href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
        rel="stylesheet"
    >

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet"
    >

    <!-- Flaticon Font -->
    <link
        href="lib/flaticon/font/flaticon.css"
        rel="stylesheet"
    >

    <!-- Libraries Stylesheet -->
    <link
        href="lib/owlcarousel/assets/owl.carousel.min.css"
        rel="stylesheet"
    >

    <link
        href="lib/lightbox/css/lightbox.min.css"
        rel="stylesheet"
    >

    <!-- Customized Bootstrap Stylesheet -->
    <link
        href="css/style.css"
        rel="stylesheet"
    >


<style>

/* =====================================================
   SAMBUTAN KEPALA & WAKIL SEKOLAH
===================================================== */

.sambutan-section {
    padding: 60px 0 80px;
}

.sambutan-title {
    text-align: center;
    margin-bottom: 40px;
}

.sambutan-title span {
    background: #ffffff;
    color: #18a8e8;
    padding: 8px 20px;
    border-radius: 5px;
    font-size: 15px;
    font-weight: bold;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.sambutan-title h2 {
    font-family: 'Handlee', cursive;
    color: #173f5f;
    font-size: 40px;
    margin-top: 15px;
}


/* =====================================================
   CARD SAMBUTAN
===================================================== */

.sambutan-card {
    background: #ffffff;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    height: 100%;
    transition: all 0.3s ease;
    border-bottom: 6px solid #18a8e8;
}

.sambutan-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.20);
}


/* FOTO */

.sambutan-photo {
    width: 100%;
    padding: 25px 25px 10px;
    text-align: center;
}

.sambutan-photo img {
    width: 230px !important;
    height: 270px !important;
    object-fit: cover;
    border-radius: 20px;
    border: 6px solid #ffffff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.18);
    display: block;
    margin: 0 auto;
}


/* ISI CARD */

.sambutan-content {
    padding: 20px 30px 30px;
    text-align: center;
}

.sambutan-card h3 {
    font-family: 'Handlee', cursive;
    color: #173f5f;
    font-size: 27px;
    margin-bottom: 5px;
}

.sambutan-jabatan {
    color: #18a8e8;
    font-weight: bold;
    margin-bottom: 20px;
}

.sambutan-card p {
    color: #555;
    line-height: 1.8;
    font-size: 16px;
    text-align: left;
}


/* =====================================================
   PROFIL SEKOLAH
===================================================== */

.profil-section {
    padding: 80px 0 60px;
    position: relative;
    overflow: hidden;
}

.profil-label {
    display: inline-block;
    background: #ffffff;
    color: #18aee8;
    padding: 8px 20px;
    border-radius: 5px;
    font-size: 15px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.profil-title {
    font-family: 'Handlee', cursive;
    color: #173f5f;
    font-size: 42px;
    font-weight: bold;
    margin-top: 10px;
}

.profil-box {
    background: rgba(255,255,255,0.96);
    border-radius: 25px;
    padding: 25px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.20);
    border: 4px solid rgba(255,255,255,0.8);
}


/* FOTO SEKOLAH */

.profil-image {
    width: 100%;
    height: 350px;
    object-fit: cover;
    border-radius: 20px;
    border: 8px solid white;
    box-shadow: 0 10px 25px rgba(0,0,0,0.20);
}


/* INFORMASI */

.profil-content {
    padding: 15px 20px;
}

.profil-content h2 {
    display: inline-block;
    background: linear-gradient(90deg, #f72585, #ff4fa3);
    color: white;
    padding: 12px 30px;
    border-radius: 30px;
    font-family: 'Handlee', cursive;
    font-size: 32px;
    font-weight: bold;
    box-shadow: 0 7px 18px rgba(247,37,133,0.3);
    margin-bottom: 25px;
}

.profil-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
}

.profil-icon {
    min-width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    margin-right: 15px;
    box-shadow: 0 5px 12px rgba(0,0,0,0.15);
}

.icon-pink {
    background: #f72585;
}

.icon-blue {
    background: #2196f3;
}

.icon-purple {
    background: #8e44ad;
}

.icon-orange {
    background: #ffae00;
}

.profil-item h5 {
    margin: 0 0 5px;
    color: #173f5f;
    font-weight: bold;
}

.profil-item p {
    margin: 0;
    color: #555;
    line-height: 1.7;
}


/* GARIS WARNA */

.profil-line {
    height: 5px;
    width: 100%;
    margin: 35px 0;

    background: linear-gradient(
        90deg,
        #f72585,
        #2196f3,
        #8e44ad,
        #ffae00
    );

    border-radius: 10px;
}


/* =====================================================
   VISI MISI
===================================================== */

.visi-misi-title {
    display: inline-block;
    background: linear-gradient(90deg, #f72585, #d946ef);
    color: white;
    padding: 12px 30px;
    border-radius: 30px;
    font-family: 'Handlee', cursive;
    font-size: 30px;
    font-weight: bold;
    box-shadow: 0 7px 18px rgba(247,37,133,0.3);
}

.visi-box,
.misi-box {
    background: white;
    border-radius: 25px;
    padding: 35px;
    height: 100%;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    border-top: 7px solid;
}

.visi-box {
    border-color: #2196f3;
}

.misi-box {
    border-color: #f72585;
}

.visi-box h3,
.misi-box h3 {
    font-family: 'Handlee', cursive;
    font-size: 30px;
    margin-bottom: 20px;
    font-weight: bold;
}

.visi-box h3 {
    color: #2196f3;
}

.misi-box h3 {
    color: #f72585;
}

.visi-box p,
.misi-box p {
    color: #555;
    line-height: 1.8;
}


/* =====================================================
   TUJUAN SEKOLAH
===================================================== */

.tujuan-box {
    background: rgba(255,255,255,0.96);
    border-radius: 25px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    border-left: 8px solid #f72585;
}

.tujuan-box h3 {
    font-family: 'Handlee', cursive;
    color: #173f5f;
    font-size: 30px;
    font-weight: bold;
}

.tujuan-box p,
.tujuan-box li {
    color: #555;
    line-height: 1.7;
}

.tujuan-box li {
    margin-bottom: 15px;
}


/* =====================================================
   DATA STATISTIK
===================================================== */

.statistik-title {
    display: inline-block;
    background: linear-gradient(90deg, #ffae00, #ff8800);
    color: white;
    padding: 12px 30px;
    border-radius: 30px;
    font-family: 'Handlee', cursive;
    font-size: 28px;
    font-weight: bold;
    box-shadow: 0 7px 18px rgba(255,174,0,0.3);
}

.stats-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border-bottom: 6px solid;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.stats-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.card-siswa {
    border-color: #2196f3;
}

.card-guru {
    border-color: #f72585;
}

.stats-icon {
    font-size: 50px;
    margin-bottom: 20px;
}

.icon-siswa {
    color: #2196f3;
}

.icon-guru {
    color: #f72585;
}

.stats-info h4 {
    font-size: 20px;
    color: #173f5f;
    font-weight: bold;
    margin-bottom: 10px;
}

.stats-info h1 {
    font-size: 56px;
    font-weight: bold;
    margin: 0;

    background: linear-gradient(
        45deg,
        #173f5f,
        #18a8e8
    );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}


```css
/* =====================================================
   BERITA TERBARU
===================================================== */

.berita-section {
    padding: 70px 0;
    background: #ffffff;
    margin-top: 50px;
}

.berita-section .section-title {
    text-align: center;
    margin-bottom: 45px;

    /* HILANGKAN GARIS / BORDER DARI STYLE.CSS */
    border: none !important;
    box-shadow: none !important;
}

.berita-section .section-title h2 {
    font-family: 'Handlee', cursive;
    font-size: 38px;
    font-weight: bold;
    color: #26355d;
    margin-bottom: 10px;

    /* HILANGKAN GARIS */
    border: none !important;
    text-decoration: none !important;
    box-shadow: none !important;
}

/* HILANGKAN GARIS KIRI DAN KANAN JUDUL */
.berita-section .section-title h2::before,
.berita-section .section-title h2::after {
    display: none !important;
    content: none !important;
}

.berita-section .section-title p {
    color: #888;
    font-size: 15px;
}


/* =====================================================
   CARD BERITA
===================================================== */

.berita-card {
    background: #ffffff;
    border-radius: 25px;
    overflow: hidden;
    height: 100%;

    box-shadow:
        0 10px 30px rgba(0,0,0,0.12);

    transition: all 0.3s ease;

    /* GARIS BAWAH CARD DIHILANGKAN */
    border: none !important;
}

.berita-card:hover {
    transform: translateY(-8px);

    box-shadow:
        0 18px 40px rgba(0,0,0,0.18);
}


/* =====================================================
   FOTO BERITA
===================================================== */

/* AREA PUTIH DI BELAKANG FOTO DIHILANGKAN */
.berita-image {
    width: 100%;
    padding: 0;
    margin: 0;
    text-align: center;
    background: transparent;
}

/* BINGKAI FOTO TETAP ADA */
.berita-image img {
    width: 100%;
    height: 230px;

    object-fit: cover;

    display: block;

    border-radius: 20px;

    /* BINGKAI PUTIH TETAP */
    border: 5px solid #ffffff;

    /* BAYANGAN FOTO TETAP */
    box-shadow:
        0 8px 20px rgba(0,0,0,0.15);
}


/* =====================================================
   ISI BERITA
===================================================== */

.berita-content {
    padding: 25px;
}

.berita-tanggal {
    color: #a956df;
    font-size: 13px;
    font-weight: bold;
    margin-bottom: 10px;
}

.berita-tanggal i {
    margin-right: 6px;
}

.berita-content h3 {
    font-family: 'Handlee', cursive;
    font-size: 24px;
    font-weight: bold;
    color: #26355d;
    margin-bottom: 12px;
}

.berita-content p {
    color: #777;
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 0;
}


/* =====================================================
   BELUM ADA BERITA
===================================================== */

.berita-kosong {
    background: #ffffff;
    border-radius: 25px;
    padding: 50px;
    text-align: center;

    box-shadow:
        0 8px 25px rgba(0,0,0,0.08);
}

.berita-kosong i {
    font-size: 50px;
    color: #a956df;
    margin-bottom: 20px;
}

.berita-kosong h3 {
    font-family: 'Handlee', cursive;
    color: #26355d;
}

.berita-kosong p {
    color: #999;
}


/* =====================================================
   RESPONSIVE BERITA
===================================================== */

@media (max-width: 576px) {

    .berita-image {
        /* TIDAK ADA PADDING PUTIH DI LUAR FOTO */
        padding: 0;
    }

    .berita-image img {
        height: 210px;

        /* BINGKAI TETAP ADA */
        border: 5px solid #ffffff;
    }

    .berita-content {
        padding: 20px;
    }

    .berita-content h3 {
        font-size: 22px;
    }

}
```

/* =====================================================
   BERITA TERBARU
===================================================== */

.berita-section {
    padding: 70px 0;
    background: #ffffff;
    margin-top: 50px;
}

.berita-section .section-title {
    text-align: center;
    margin-bottom: 45px;

    /* HILANGKAN GARIS / BORDER DARI STYLE.CSS */
    border: none !important;
    box-shadow: none !important;
}

.berita-section .section-title h2 {
    font-family: 'Handlee', cursive;
    font-size: 38px;
    font-weight: bold;
    color: #26355d;
    margin-bottom: 10px;

    /* HILANGKAN GARIS */
    border: none !important;
    text-decoration: none !important;
    box-shadow: none !important;
}

/* HILANGKAN GARIS KIRI DAN KANAN JUDUL */
.berita-section .section-title h2::before,
.berita-section .section-title h2::after {
    display: none !important;
    content: none !important;
}

.berita-section .section-title p {
    color: #888;
    font-size: 15px;
}


/* =====================================================
   CARD BERITA
===================================================== */

.berita-card {
    background: #ffffff;
    border-radius: 25px;
    overflow: hidden;
    height: 100%;

    box-shadow:
        0 10px 30px rgba(0,0,0,0.12);

    transition: all 0.3s ease;

    /* GARIS BAWAH CARD DIHILANGKAN */
    border: none !important;
}

.berita-card:hover {
    transform: translateY(-8px);

    box-shadow:
        0 18px 40px rgba(0,0,0,0.18);
}


/* =====================================================
   FOTO BERITA
===================================================== */

/* AREA PUTIH DI BELAKANG FOTO DIHILANGKAN */
.berita-image {
    width: 100%;
    padding: 0;
    margin: 0;
    text-align: center;
    background: transparent;
}

/* BINGKAI FOTO TETAP ADA */
.berita-image img {
    width: 100%;
    height: 230px;

    object-fit: cover;

    display: block;

    border-radius: 20px;

    /* BINGKAI PUTIH TETAP */
    border: 5px solid #ffffff;

    /* BAYANGAN FOTO TETAP */
    box-shadow:
        0 8px 20px rgba(0,0,0,0.15);
}


/* =====================================================
   ISI BERITA
===================================================== */

.berita-content {
    padding: 25px;
}

.berita-tanggal {
    color: #a956df;
    font-size: 13px;
    font-weight: bold;
    margin-bottom: 10px;
}

.berita-tanggal i {
    margin-right: 6px;
}

.berita-content h3 {
    font-family: 'Handlee', cursive;
    font-size: 24px;
    font-weight: bold;
    color: #26355d;
    margin-bottom: 12px;
}

.berita-content p {
    color: #777;
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 0;
}


/* =====================================================
   BELUM ADA BERITA
===================================================== */

.berita-kosong {
    background: #ffffff;
    border-radius: 25px;
    padding: 50px;
    text-align: center;

    box-shadow:
        0 8px 25px rgba(0,0,0,0.08);
}

.berita-kosong i {
    font-size: 50px;
    color: #a956df;
    margin-bottom: 20px;
}

.berita-kosong h3 {
    font-family: 'Handlee', cursive;
    color: #26355d;
}

.berita-kosong p {
    color: #999;
}


/* =====================================================
   RESPONSIVE BERITA
===================================================== */

@media (max-width: 576px) {

    .berita-image {
        /* TIDAK ADA PADDING PUTIH DI LUAR FOTO */
        padding: 0;
    }

    .berita-image img {
        height: 210px;

        /* BINGKAI TETAP ADA */
        border: 5px solid #ffffff;
    }

    .berita-content {
        padding: 20px;
    }

    .berita-content h3 {
        font-size: 22px;
    }

}

/* =====================================================
   CARD BERITA
===================================================== */

.berita-card {
    background: #ffffff;
    border-radius: 25px;
    overflow: hidden;
    height: 100%;

    box-shadow:
        0 10px 30px rgba(0,0,0,0.12);

    transition: all 0.3s ease;

    border-bottom: 6px solid #a956df;
}

.berita-card:hover {
    transform: translateY(-8px);

    box-shadow:
        0 18px 40px rgba(0,0,0,0.18);
}


/* =====================================================
   FOTO BERITA
===================================================== */

.berita-image {
    width: 100%;
    padding: 20px 20px 0;
    text-align: center;
}

.berita-image img {
    width: 100%;
    height: 230px;

    object-fit: cover;

    display: block;

    border-radius: 20px;

    border: 5px solid #ffffff;

    box-shadow:
        0 8px 20px rgba(0,0,0,0.15);
}


/* =====================================================
   ISI BERITA
===================================================== */

.berita-content {
    padding: 25px;
}

.berita-tanggal {
    color: #a956df;
    font-size: 13px;
    font-weight: bold;
    margin-bottom: 10px;
}

.berita-tanggal i {
    margin-right: 6px;
}

.berita-content h3 {
    font-family: 'Handlee', cursive;
    font-size: 24px;
    font-weight: bold;
    color: #26355d;
    margin-bottom: 12px;
}

.berita-content p {
    color: #777;
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 20px;
}


/* =====================================================
   TOMBOL BACA
===================================================== */

.btn-baca-berita {
    display: inline-block;

    background: linear-gradient(
        90deg,
        #ed67b0,
        #a956df
    );

    color: #ffffff !important;

    padding: 10px 18px;

    border-radius: 25px;

    font-size: 13px;

    font-weight: bold;

    text-decoration: none;

    transition: all 0.3s ease;
}

.btn-baca-berita:hover {
    transform: translateX(5px);

    box-shadow:
        0 7px 18px rgba(169,86,223,0.35);
}

.btn-baca-berita i {
    margin-left: 7px;
}


/* =====================================================
   BELUM ADA BERITA
===================================================== */

.berita-kosong {
    background: #ffffff;
    border-radius: 25px;
    padding: 50px;
    text-align: center;

    box-shadow:
        0 8px 25px rgba(0,0,0,0.08);
}

.berita-kosong i {
    font-size: 50px;
    color: #a956df;
    margin-bottom: 20px;
}

.berita-kosong h3 {
    font-family: 'Handlee', cursive;
    color: #26355d;
}

.berita-kosong p {
    color: #999;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 991px) {

    .profil-title {
        font-size: 34px;
    }

    .profil-image {
        height: 300px;
        margin-bottom: 25px;
    }

    .profil-content {
        padding: 10px;
    }

}


@media (max-width: 576px) {

    .profil-section {
        padding-top: 50px;
    }

    .profil-title {
        font-size: 30px;
    }

    .profil-box {
        padding: 15px;
    }

    .profil-content h2 {
        font-size: 26px;
    }

    .stats-info h1 {
        font-size: 48px;
    }

    .berita-image {
        padding: 15px 15px 0;
    }

    .berita-image img {
        height: 210px;
    }

    .berita-content {
        padding: 20px;
    }

    .berita-content h3 {
        font-size: 22px;
    }

}
.berita-title ul,
.berita-title ol {
    list-style: none !important;
    padding-left: 0 !important;
    margin-left: 0 !important;
}

.berita-title li {
    list-style: none !important;
}

.berita-title li::before,
.berita-title li::after {
    display: none !important;
    content: none !important;
}
.berita-title h2::before,
.berita-title h2::after,
.berita-title p::before,
.berita-title p::after {
    content: none !important;
    display: none !important;
}


/* =====================================================
   JUDUL BERITA TERBARU
===================================================== */

.berita-title {
    text-align: center;
    margin-bottom: 45px;
    border: none !important;
    box-shadow: none !important;
}

/* Judul berbentuk pill seperti DATA STATISTIK */
.berita-label {
    display: inline-block;
    background: linear-gradient(90deg, #ffae00, #ff8800);
    color: white;
    padding: 12px 30px;
    border-radius: 30px;
    font-family: 'Handlee', cursive;
    font-size: 28px;
    font-weight: bold;
    box-shadow: 0 7px 18px rgba(255,174,0,0.3);
}

.berita-label i {
    margin-right: 8px;
}

.berita-title p {
    color: #888;
    font-size: 15px;
    margin-top: 12px;
    margin-bottom: 0;
}

</style>

</head>

<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<div class="container-fluid bg-light position-relative shadow">

    <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
    >

        <a
            href="index.php"
            class="navbar-brand d-flex align-items-center px-3"
        >

            <img
                src="img/logo.jpg"
                alt="Logo SMK RAINBOW BUBBLEGUM"

                style="
                    width:60px;
                    height:60px;
                    object-fit:cover;
                    border-radius:50%;
                    margin-right:15px;
                "
            >

            <span
                class="text-black font-weight-bold"
                style="font-size:32px;"
            >
                SMK RAINBOW BUBBLEGUM
            </span>

        </a>


        <div class="navbar-nav font-weight-bold mx-auto py-0">

            <a
                href="index.php"
                class="nav-item nav-link"
            >
                HOME
            </a>


            <a
                href="eskul.php"
                class="nav-item nav-link"
            >
                ESTRAKULIKULER
            </a>


            <a
                href="profil.php"
                class="nav-item nav-link active"
            >
                PROFIL
            </a>
            <a 
            href="gallery.php"
            class="nav-item nav-link">GALLERY
         </a>

            <a
                href="admin/login.php/"
                class="nav-item nav-link"
            >
                LOGIN
            </a>


            <!-- JURUSAN -->

            <div class="nav-item dropdown">

                <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                >
                    JURUSAN
                </a>


                <div class="dropdown-menu rounded-0 m-0">

                    <a href="rpl.php" class="dropdown-item">
                        RPL
                    </a>

                    <a href="tkj.php" class="dropdown-item">
                        TKJT
                    </a>

                    <a href="tbsm.php" class="dropdown-item">
                        TBSM
                    </a>

                    <a href="hotel.php" class="dropdown-item">
                        HOTEL
                    </a>

                    <a href="tataboga.php" class="dropdown-item">
                        TATA BOGA
                    </a>

                    <a href="busana.php" class="dropdown-item">
                        TRK
                    </a>

                    <a href="akl.php" class="dropdown-item">
                        AKL
                    </a>

                    <a href="dkv.php" class="dropdown-item">
                        DKV
                    </a>

                    <a href="busana.php" class="dropdown-item">
                        TATA BUSANA
                    </a>

                </div>

            </div>

        </div>

    </nav>

</div>


<!-- =====================================================
     SAMBUTAN KEPALA & WAKIL SEKOLAH
===================================================== -->

<section
    class="sambutan-section"
    style="margin-top: 200px;"
>

    <div class="container">

        <div class="text-center mb-5">

            <p class="section-title px-5">

                <span class="px-2">
                    SAMBUTAN KEPALA & WAKIL SEKOLAH
                </span>

            </p>

            <h1 class="sambutan-heading">
                Sambutan Pimpinan Sekolah
            </h1>

        </div>


        <div class="row">


            <!-- KEPALA SEKOLAH -->

            <div class="col-lg-6 mb-4">

                <div class="sambutan-card">

                    <div class="sambutan-photo">

                        <?php if (!empty($profil['foto_kepala'])): ?>

                            <img
                                src="img/profil/<?= htmlspecialchars($profil['foto_kepala']) ?>"
                                alt="Kepala Sekolah"
                            >

                        <?php else: ?>

                            <img
                                src="img/logo.jpg"
                                alt="Kepala Sekolah"
                            >

                        <?php endif; ?>

                    </div>


                    <div class="sambutan-content">

                        <h3>
                            <?= htmlspecialchars($profil['nama_kepala']) ?>
                        </h3>

                        <h5 class="sambutan-jabatan">
                            Kepala Sekolah
                        </h5>

                        <p>
                            <?= nl2br(
                                htmlspecialchars(
                                    $profil['sambutan_kepala']
                                )
                            ) ?>
                        </p>

                    </div>

                </div>

            </div>


            <!-- WAKIL KEPALA SEKOLAH -->

            <div class="col-lg-6 mb-4">

                <div class="sambutan-card">

                    <div class="sambutan-photo">

                        <?php if (!empty($profil['foto_wakil'])): ?>

                            <img
                                src="img/profil/<?= htmlspecialchars($profil['foto_wakil']) ?>"
                                alt="Wakil Kepala Sekolah"
                            >

                        <?php else: ?>

                            <img
                                src="img/logo.jpg"
                                alt="Wakil Kepala Sekolah"
                            >

                        <?php endif; ?>

                    </div>


                    <div class="sambutan-content">

                        <h3>
                            <?= htmlspecialchars($profil['nama_wakil']) ?>
                        </h3>

                        <h5 class="sambutan-jabatan">
                            Wakil Kepala Sekolah
                        </h5>

                        <p>
                            <?= nl2br(
                                htmlspecialchars(
                                    $profil['sambutan_wakil']
                                )
                            ) ?>
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     PROFIL SEKOLAH
===================================================== -->

<div class="container-fluid pt-5">

    <div class="container">


        <!-- TENTANG SEKOLAH -->

        <div
            class="text-center pb-2"
            style="
                padding-top: 20px !important;
                margin-top: 10px;
            "
        >

            <p class="section-title px-5">

                <span class="px-2">
                    TENTANG SEKOLAH
                </span>

            </p>

        </div>


        <!-- PROFIL -->

        <div class="profil-box">

            <div class="row align-items-center">


                <!-- FOTO -->

                <div class="col-lg-6">

                    <?php if (!empty($profil['foto_sekolah'])): ?>

                        <img
                            class="profil-image"
                            src="img/profil/<?= htmlspecialchars($profil['foto_sekolah']) ?>"
                            alt="<?= htmlspecialchars($profil['nama_sekolah']) ?>"
                        >

                    <?php else: ?>

                        <img
                            class="profil-image"
                            src="img/titik.png"
                            alt="<?= htmlspecialchars($profil['nama_sekolah']) ?>"
                        >

                    <?php endif; ?>

                </div>


                <!-- INFORMASI -->

                <div class="col-lg-6">

                    <div class="profil-content">

                        <h2>

                            <i class="fas fa-school"></i>

                            Profil Sekolah

                        </h2>


                        <!-- NAMA -->

                        <div class="profil-item">

                            <div class="profil-icon icon-pink">

                                <i class="fas fa-school"></i>

                            </div>


                            <div>

                                <h5>
                                    Nama Sekolah
                                </h5>

                                <p>
                                    <?= htmlspecialchars(
                                        $profil['nama_sekolah']
                                    ) ?>
                                </p>

                            </div>

                        </div>


                        <!-- JENJANG -->

                        <div class="profil-item">

                            <div class="profil-icon icon-blue">

                                <i class="fas fa-graduation-cap"></i>

                            </div>


                            <div>

                                <h5>
                                    Jenjang Sekolah
                                </h5>

                                <p>
                                    <?= htmlspecialchars(
                                        $profil['jenjang']
                                    ) ?>
                                </p>

                            </div>

                        </div>


                        <!-- GAMBARAN SINGKAT -->

                        <div class="profil-item">

                            <div class="profil-icon icon-orange">

                                <i class="fas fa-file-alt"></i>

                            </div>


                            <div>

                                <h5>
                                    Gambaran Singkat
                                </h5>

                                <p>
                                    <?= nl2br(
                                        htmlspecialchars(
                                            $profil['gambaran_singkat']
                                        )
                                    ) ?>
                                </p>

                            </div>

                        </div>


                        <!-- TAHUN BERDIRI -->

                        <div class="profil-item">

                            <div class="profil-icon icon-purple">

                                <i class="fas fa-calendar-alt"></i>

                            </div>


                            <div>

                                <h5>
                                    Tahun Berdiri
                                </h5>

                                <p>
                                    <?= htmlspecialchars(
                                        $profil['tahun_berdiri']
                                    ) ?>
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- GARIS WARNA -->

        <div class="profil-line"></div>


        <!-- =====================================================
             VISI DAN MISI
        ===================================================== -->

        <div class="text-center pb-2 pt-5">

            <span class="visi-misi-title">

                <i class="fas fa-bullseye"></i>

                VISI DAN MISI

            </span>

        </div>


        <div class="row mb-5">


            <!-- VISI -->

            <div class="col-lg-6 mb-4">

                <div class="visi-box">

                    <h3>

                        <i class="fas fa-eye"></i>

                        VISI

                    </h3>

                    <p>
                        <?= nl2br(
                            htmlspecialchars(
                                $profil['visi']
                            )
                        ) ?>
                    </p>

                </div>

            </div>


            <!-- MISI -->

            <div class="col-lg-6 mb-4">

                <div class="misi-box">

                    <h3>

                        <i class="fas fa-bullseye"></i>

                        MISI

                    </h3>

                    <p>
                        <?= nl2br(
                            htmlspecialchars(
                                $profil['misi']
                            )
                        ) ?>
                    </p>

                </div>

            </div>

        </div>


        <!-- =====================================================
             TUJUAN SEKOLAH
        ===================================================== -->

        <div class="text-center pb-2 pt-5">

            <p>

                <span class="profil-label">

                    TUJUAN SEKOLAH

                </span>

            </p>

        </div>


        <div class="tujuan-box mb-5">

            <h3 class="text-center mb-4">

                Tujuan Pendidikan

                <?= htmlspecialchars(
                    $profil['nama_sekolah']
                ) ?>

            </h3>


            <p>
                <?= nl2br(
                    htmlspecialchars(
                        $profil['tujuan']
                    )
                ) ?>
            </p>

        </div>


        <!-- =====================================================
             DATA STATISTIK
        ===================================================== -->

        <div class="text-center pb-2 pt-5">

            <span class="statistik-title">

                <i class="fas fa-chart-bar"></i>

                DATA STATISTIK SEKOLAH

            </span>

        </div>


        <div class="row mb-5 pt-4">


            <!-- JUMLAH SISWA -->

            <div class="col-md-6 mb-4">

                <div class="stats-card card-siswa">

                    <div class="stats-icon icon-siswa">

                        <i class="fas fa-user-graduate"></i>

                    </div>


                    <div class="stats-info">

                        <h4>
                            Jumlah Siswa Aktif
                        </h4>

                        <h1>
                            <?= number_format(
                                (int)$profil['jumlah_siswa'],
                                0,
                                ',',
                                '.'
                            ) ?>
                        </h1>

                        <p>
                            Siswa
                        </p>

                    </div>

                </div>

            </div>


            <!-- JUMLAH GURU -->

            <div class="col-md-6 mb-4">

                <div class="stats-card card-guru">

                    <div class="stats-icon icon-guru">

                        <i class="fas fa-chalkboard-teacher"></i>

                    </div>


                    <div class="stats-info">

                        <h4>
                            Jumlah Guru & Staf
                        </h4>

                        <h1>
                            <?= number_format(
                                (int)$profil['jumlah_guru_staf'],
                                0,
                                ',',
                                '.'
                            ) ?>
                        </h1>

                        <p>
                            Tenaga Pendidik
                        </p>

                    </div>

                </div>

            </div>

        </div>


    </div>

</div>


<!-- =====================================================
     BERITA TERBARU
===================================================== -->

<section class="berita-section">

    <div class="container">

        <div class="berita-title">

    <span class="berita-label">
        <i class="fas fa-newspaper"></i>
        BERITA TERBARU
    </span>
</div>


        <div class="row">


            <?php if (
                $queryBerita &&
                mysqli_num_rows($queryBerita) > 0
            ): ?>


                <?php while (
                    $berita = mysqli_fetch_assoc($queryBerita)
                ): ?>


                    <!-- =================================================
                         1 BERITA = 1 CARD
                    ================================================== -->

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="berita-card">


                            <!-- FOTO BERITA -->

                            <div class="berita-image">

                                <?php if (
 !empty($berita['foto'])
                                ): ?>

                                    <img
                                        src="img/berita/<?= htmlspecialchars($berita['foto']) ?>"
                                        alt="<?= htmlspecialchars($berita['judul']) ?>"
                                        onerror="this.src='img/titik.png';"
                                    >

                                <?php else: ?>

                                    <img
                                        src="img/titik.png"
                                        alt="Foto Berita"
                                    >

                                <?php endif; ?>

                            </div>


                            <!-- ISI BERITA -->

                            <div class="berita-content">


                                <!-- TANGGAL -->

                                <div class="berita-tanggal">

                                    <i class="fas fa-calendar-alt"></i>

                                    <?php if (
                                        !empty($berita['tanggal'])
                                    ): ?>

                                        <?= date(
                                            'd M Y',
                                            strtotime(
                                                $berita['tanggal']
                                            )
                                        ) ?>

                                    <?php else: ?>

                                        -

                                    <?php endif; ?>

                                </div>


                                <!-- JUDUL -->

                                <h3>

                                    <?= htmlspecialchars(
                                        $berita['judul']
                                    ) ?>

                                </h3>


                                <!-- DESKRIPSI -->

                                <p>

                                    <?php

                                    $deskripsi = strip_tags(
                                        $berita['deskripsi'] ?? ''
                                    );

                                    if (
                                        mb_strlen(
                                            $deskripsi
                                        ) > 150
                                    ) {

                                        echo htmlspecialchars(
                                            mb_substr(
                                                $deskripsi,
                                                0,
                                                150
                                            )
                                        ) . '...';

                                    } else {

                                        echo htmlspecialchars(
                                            $deskripsi
                                        );

                                    }

                                    ?>

                                </p>
                            </div>

                        </div>

                    </div>


                <?php endwhile; ?>


            <?php else: ?>


                <!-- =================================================
                     BELUM ADA BERITA
                ================================================== -->

                <div class="col-12">

                    <div class="berita-kosong">

                        <i class="fas fa-newspaper"></i>

                        <h3>
                            Belum Ada Berita
                        </h3>

                        <p>
                            Berita sekolah belum tersedia.
                        </p>

                    </div>

                </div>


            <?php endif; ?>


        </div>

    </div>

</section>


<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>
<script src="js/main.js"></script>
</body>

</html>