<?php
// Halaman Gallery SMK RAINBOW BUBBLEGUM
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Gallery | SMK RAINBOW BUBBLEGUM</title>

    <meta
        content="width=device-width, initial-scale=1.0"
        name="viewport"
    >

    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
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

    <!-- Flaticon -->
    <link
        href="lib/flaticon/font/flaticon.css"
        rel="stylesheet"
    >

    <!-- Owl Carousel -->
    <link
        href="lib/owlcarousel/assets/owl.carousel.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap -->
    <link
        href="css/style.css"
        rel="stylesheet"
    >

    <style>

        /* =====================================================
           BACKGROUND HALAMAN
        ===================================================== */

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            background-image: url('titik.jpg');
            background-size: cover;
            background-position: center top;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar-area {
            background: rgba(255, 255, 255, 0.25) !important;
            box-shadow: none !important;
        }

        .navbar-area .navbar {
            background: transparent !important;
        }

        .navbar-area .navbar-brand span {
            color: #111 !important;
        }

        .navbar-area .nav-link {
            color: #111 !important;
            font-weight: bold;
        }

        .navbar-area .nav-link:hover,
        .navbar-area .nav-link.active {
            color: #17a2b8 !important;
        }


        /* =====================================================
           GALLERY SECTION
        ===================================================== */

        .gallery-section {
            padding-top: 300px !important;
            padding-bottom: 60px;
            min-height: 100vh;
            background: transparent !important;
        }


        /* =====================================================
           JUDUL
        ===================================================== */

        .gallery-title {
            margin-bottom: 35px;
        }

        .gallery-title h1 {
            color: #00394f !important;
            font-family: 'Handlee', cursive;
            font-weight: bold;
        }

        .gallery-title p.description {
            color: #555 !important;
            font-size: 16px;
        }


        /* =====================================================
           CARD GALLERY - MODEL BERITA
        ===================================================== */

        .gallery-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.18);
            height: 100%;
            transition: 0.3s;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.22);
        }


        /* =====================================================
           FOTO
        ===================================================== */

        .gallery-image {
            padding: 15px;
            padding-bottom: 0;
        }

        .gallery-image img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;

            border-radius: 12px;
        }


        /* =====================================================
           ISI CARD
        ===================================================== */

        .gallery-info {
            padding: 18px 20px 22px;
        }

        .gallery-info .gallery-date {
            color: #8b4de8;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .gallery-info .gallery-date i {
            margin-right: 5px;
        }

        .gallery-info h4 {
            color: #00394f !important;
            font-family: 'Handlee', cursive;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .gallery-info p {
            color: #666 !important;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 0;
        }


        /* =====================================================
           KATEGORI
        ===================================================== */

        .gallery-category {
            display: inline-block;
            background: #17a2b8;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 991px) {

            .gallery-section {
                padding-top: 180px !important;
            }

            .gallery-title h1 {
                font-size: 32px;
            }

        }

        @media (max-width: 576px) {

            .gallery-section {
                padding-top: 130px !important;
            }

            .gallery-title h1 {
                font-size: 27px;
            }

            .gallery-image img {
                height: 200px;
            }

        }

    </style>

</head>

<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<div class="container-fluid position-relative navbar-area">

    <nav
        class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 px-0 px-lg-5"
    >

        <!-- LOGO SEKOLAH -->

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
                class="font-weight-bold"
                style="font-size:32px;"
            >
                SMK RAINBOW BUBBLEGUM
            </span>

        </a>


        <!-- MENU -->

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
                class="nav-item nav-link"
            >
                PROFIL
            </a>

            <a
                href="gallery.php"
                class="nav-item nav-link active"
            >
                GALLERY
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

                    <a href="boga.php" class="dropdown-item">
                        TATA BOGA
                    </a>

                    <a href="trk.php" class="dropdown-item">
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
     GALLERY
===================================================== -->

<div class="container-fluid gallery-section">

    <div class="container">


        <!-- =================================================
             JUDUL
        ================================================== -->

        <div class="text-center gallery-title">

            <p class="section-title px-5">

                <span class="px-2">
                    GALERI SEKOLAH
                </span>

            </p>

            <h1 class="mb-3">
                Dokumentasi SMK RAINBOW BUBBLEGUM
            </h1>
        </div>


        <!-- =================================================
             CARD GALLERY
        ================================================== -->

        <div class="row">


            <!-- =================================================
                 CARD 1
            ================================================== -->

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="gallery-card">

                    <div class="gallery-image">

                        <img
                            src="img/kegiatan.jpeg"
                            alt="Kegiatan Sekolah"
                        >

                    </div>

                    <div class="gallery-info">

                        <span class="gallery-category">
                            Kegiatan Positif
                        </span>

                        <h4>
                            Kegiatan Sekolah
                        </h4>

                        <p>
                            Melalui kegiatan tersebut, siswa diajarkan untuk memiliki
                             rasa tanggung jawab dan kepedulian terhadap kebersihan lingkungan. 
                             Selain itu, kegiatan bersih-bersih juga dapat menumbuhkan
                              sikap gotong royong dan kerja sama antarsiswa.
                        </p>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 CARD 2
            ================================================== -->

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="gallery-card">

                    <div class="gallery-image">

                        <img
                            src="img/pks2.jpeg"
                            alt="Ekstrakurikuler"
                        >

                    </div>

                    <div class="gallery-info">

                        <span class="gallery-category">
                            Ekstrakurikuler
                        </span>

                        <h4>
                            Kegiatan Ekstrakurikuler
                        </h4>

                        <p>
                          Keikutsertaan siswa dalam berbagai lomba menjadi bagian dari kegiatan 
                          positif di lingkungan sekolah. Dengan adanya pengalaman tersebut, 
                          siswa diharapkan mampu mengembangkan potensi diri
                           dan membawa nama baik SMK RAINBOW BUBBLEGUM.
                        </p>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 CARD 3
            ================================================== -->

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="gallery-card">

                    <div class="gallery-image">

                        <img
                            src="img/belajar.png"
                            alt="Pembelajaran"
                        >

                    </div>

                    <div class="gallery-info">

                        <span class="gallery-category">
                            Pembelajaran
                        </span>

                        <h4>
                            Kegiatan Pembelajaran
                        </h4>

                        <p>
                            Kegiatan pembelajaran merupakan aktivitas utama siswa  
                            dalam mengikuti proses belajar mengajar di SMK RAINBOW BUBBLEGUM.
                             Kegiatan ini dilaksanakan untuk menambah pengetahuan, keterampilan,
                              dan pemahaman siswa sesuai dengan materi yang dipelajari.
                        </p>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 CARD 4
            ================================================== -->

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="gallery-card">

                    <div class="gallery-image">

                        <img
                            src="img/aktivitas.png"
                            alt="Aktivitas Siswa"
                        >

                    </div>

                    <div class="gallery-info">

                        <span class="gallery-category">
                            Kegiatan Sekolah
                        </span>

                        <h4>
                            Aktivitas Siswa
                        </h4>

                        <p>
                           Aktivitas siswa di kantin menciptakan momen
                            kebersamaan yang menyenangkan di lingkungan sekolah. 
                            Melalui kegiatan sederhana ini, siswa dapat membangun hubungan 
                            pertemanan serta menikmati waktu istirahat sebelum kembali mengikuti pembelajaran.
                        </p>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 CARD 5
            ================================================== -->

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="gallery-card">

                    <div class="gallery-image">

                        <img
                            src="img/bakat.png"
                            alt="Minat dan Bakat"
                        >

                    </div>

                    <div class="gallery-info">

                        <span class="gallery-category">
                            Bakat Siswa
                        </span>

                        <h4>
                            Bakat Siswa
                        </h4>

                        <p>
                            egiatan pengembangan bakat siswa dilaksanakan 
                            sebagai wadah untuk menyalurkan minat, kreativitas,
                             dan potensi yang dimiliki oleh setiap siswa SMK RAINBOW BUBBLEGUM.
                        </p>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 CARD 6
            ================================================== -->

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="gallery-card">

                    <div class="gallery-image">

                        <img
                            src="img/upacara.png"
                            alt="Pembelajaran Kreatif"
                        >

                    </div>

                    <div class="gallery-info">

                        <span class="gallery-category">
                         Kegiatan  Apel
                        </span>

                        <h4>
                            Upacara Bendera
                        </h4>

                        <p>
                            Kegiatan upacara bendera dilaksanakan sebagai bentuk 
                            penghormatan terhadap simbol negara serta menumbuhkan sikap disiplin, 
                            tanggung jawab, dan rasa cinta tanah air bagi
                             seluruh siswa SMK RAINBOW BUBBLEGUM.
                        </p>

                    </div>

                </div>

            </div>


        </div>

    </div>

</div>


<!-- =====================================================
     BACK TO TOP
===================================================== -->

<a
    href="#"
    class="btn btn-primary p-3 back-to-top"
>
    <i class="fa fa-angle-double-up"></i>
</a>


<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<script src="lib/easing/easing.min.js"></script>

<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<script src="js/main.js"></script>

</body>

</html>