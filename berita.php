<?php
// Halaman Berita SMK RAINBOW BUBBLEGUM
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <title>Berita | SMK RAINBOW BUBBLEGUM</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

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

    <!-- Bootstrap -->
    <link
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


<style>

/* =====================================================
   UMUM
===================================================== */

body {
    font-family: 'Nunito', sans-serif;
    background: #f8fbff;
    color: #555;
}


/* =====================================================
   HEADER BERITA
===================================================== */

.berita-header {
    padding-top: 80px;
    padding-bottom: 60px;
    text-align: center;
}

.berita-label {
    display: inline-block;

    background: #ffffff;

    color: #18a8e8;

    padding: 8px 22px;

    border-radius: 5px;

    font-size: 15px;

    font-weight: bold;

    box-shadow: 0 4px 12px rgba(0,0,0,0.12);
}

.berita-header h1 {

    font-family: 'Handlee', cursive;

    color: #173f5f;

    font-size: 48px;

    font-weight: bold;

    margin-top: 15px;

}

.berita-header p {

    max-width: 700px;

    margin: 15px auto;

    color: #777;

    font-size: 17px;

    line-height: 1.8;

}


/* =====================================================
   GARIS WARNA
===================================================== */

.berita-line {

    width: 120px;

    height: 5px;

    margin: 20px auto 50px;

    border-radius: 10px;

    background: linear-gradient(
        90deg,
        #f72585,
        #2196f3,
        #8e44ad,
        #ffae00
    );

}


/* =====================================================
   CARD BERITA
===================================================== */

.berita-card {

    background: white;

    border-radius: 25px;

    overflow: hidden;

    margin-bottom: 35px;

    box-shadow: 0 10px 30px rgba(0,0,0,0.10);

    transition: all 0.3s ease;

    height: 100%;
}

.berita-card:hover {

    transform: translateY(-8px);

    box-shadow: 0 18px 40px rgba(0,0,0,0.15);

}


/* =====================================================
   FOTO BERITA
===================================================== */

.berita-image {

    width: 100%;

    height: 240px;

    object-fit: cover;

    display: block;

}


/* =====================================================
   ISI BERITA
===================================================== */

.berita-content {

    padding: 25px;
}


/* TANGGAL */

.berita-date {

    display: inline-block;

    background: #ffe4f1;

    color: #f72585;

    padding: 6px 13px;

    border-radius: 20px;

    font-size: 13px;

    font-weight: bold;

    margin-bottom: 15px;
}


/* JUDUL */

.berita-content h3 {

    font-family: 'Handlee', cursive;

    color: #173f5f;

    font-size: 27px;

    font-weight: bold;

    line-height: 1.3;

    margin-bottom: 15px;
}


/* DESKRIPSI */

.berita-content p {

    color: #666;

    line-height: 1.8;

    font-size: 15px;

    margin-bottom: 20px;
}


/* =====================================================
   BUTTON
===================================================== */

.btn-berita {

    display: inline-block;

    background: linear-gradient(
        90deg,
        #f72585,
        #d946ef
    );

    color: white !important;

    padding: 10px 20px;

    border-radius: 25px;

    font-weight: bold;

    font-size: 14px;

    text-decoration: none;

    transition: .3s;
}

.btn-berita:hover {

    background: linear-gradient(
        90deg,
        #d946ef,
        #f72585
    );

    transform: translateY(-2px);

    text-decoration: none;
}


/* =====================================================
   KATEGORI
===================================================== */

.berita-category {

    display: inline-block;

    background: #e5f6ff;

    color: #2196f3;

    padding: 6px 13px;

    border-radius: 20px;

    font-size: 12px;

    font-weight: bold;

    margin-left: 5px;
}


/* =====================================================
   BERITA UNGGULAN
===================================================== */

.berita-utama {

    background: white;

    border-radius: 25px;

    overflow: hidden;

    box-shadow: 0 12px 35px rgba(0,0,0,0.12);

    margin-bottom: 55px;
}

.berita-utama img {

    width: 100%;

    height: 400px;

    object-fit: cover;
}

.berita-utama-content {

    padding: 35px;
}

.berita-utama-content h2 {

    font-family: 'Handlee', cursive;

    color: #173f5f;

    font-size: 35px;

    font-weight: bold;

    margin: 15px 0;
}

.berita-utama-content p {

    color: #666;

    line-height: 1.9;

    font-size: 16px;
}


/* =====================================================
   JUDUL BERITA TERBARU
===================================================== */

.judul-terbaru {

    text-align: center;

    margin-bottom: 35px;
}

.judul-terbaru span {

    display: inline-block;

    background: linear-gradient(
        90deg,
        #2196f3,
        #18a8e8
    );

    color: white;

    padding: 11px 28px;

    border-radius: 30px;

    font-family: 'Handlee', cursive;

    font-size: 28px;

    font-weight: bold;

    box-shadow: 0 7px 18px rgba(33,150,243,0.25);
}


/* =====================================================
   FOOTER
===================================================== */

.footer {

    margin-top: 70px;

    padding: 35px 0;

    background: #173f5f;

    color: white;

    text-align: center;
}

.footer h4 {

    font-family: 'Handlee', cursive;

    font-size: 25px;

    margin-bottom: 10px;
}

.footer p {

    margin: 0;

    color: #dbeeff;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media(max-width: 991px) {

    .berita-header {

        padding-top: 80px;

    }

    .berita-header h1 {

        font-size: 40px;

    }

    .berita-utama img {

        height: 300px;

    }

}


@media(max-width: 576px) {

    .berita-header {

        padding-top: 60px;

        padding-left: 15px;

        padding-right: 15px;

    }

    .berita-header h1 {

        font-size: 34px;

    }

    .berita-header p {

        font-size: 15px;

    }

    .berita-image {

        height: 200px;

    }

    .berita-content h3 {

        font-size: 24px;

    }

    .berita-utama img {

        height: 230px;

    }

    .berita-utama-content {

        padding: 25px;

    }

    .berita-utama-content h2 {

        font-size: 29px;

    }

}

/* BUTTON KEMBALI KE PROFIL */

.btn-kembali-profil {
    display: inline-block;
    background: linear-gradient(90deg, #2196f3, #18a8e8);
    color: white !important;
    padding: 12px 28px;
    border-radius: 30px;
    font-weight: bold;
    font-size: 15px;
    text-decoration: none;
    box-shadow: 0 6px 18px rgba(33, 150, 243, 0.25);
    transition: all 0.3s ease;
}

.btn-kembali-profil:hover {
    background: linear-gradient(90deg, #18a8e8, #2196f3);
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(33, 150, 243, 0.35);
    text-decoration: none;
}


</style>

</head>


<body>


<!-- =====================================================
     HEADER BERITA
===================================================== -->

<section class="berita-header">

    <div class="container">

        <span class="berita-label">

            <i class="fas fa-newspaper"></i>

            BERITA SEKOLAH

        </span>


        <h1>

            Berita SMK RAINBOW BUBBLEGUM

        </h1>


        <p>

            Temukan informasi terbaru mengenai kegiatan,
            prestasi, program, dan berbagai aktivitas
            SMK RAINBOW BUBBLEGUM.

        </p>


        <div class="berita-line"></div>

    </div>

</section>


<!-- =====================================================
     BERITA
===================================================== -->

<div class="container pb-5">


    <!-- ================================
         BERITA UTAMA
    ================================= -->

    <div class="berita-utama">

        <div class="row align-items-center">


            <!-- FOTO -->

            <div class="col-lg-6">

                <img
                    src="img/berita1.jpg"
                    alt="Kegiatan SMK RAINBOW BUBBLEGUM"
                >

            </div>


            <!-- ISI -->

            <div class="col-lg-6">

                <div class="berita-utama-content">

                    <span class="berita-date">

                        <i class="far fa-calendar-alt"></i>

                        12 September 2026

                    </span>


                    <span class="berita-category">

                        Berita Utama

                    </span>


                    <h2>

                        SMK RAINBOW BUBBLEGUM Terus Mengembangkan Potensi Siswa

                    </h2>


                    <p>

                        SMK RAINBOW BUBBLEGUM terus berkomitmen
                        dalam meningkatkan kualitas pendidikan dan
                        mengembangkan potensi peserta didik melalui
                        berbagai kegiatan pembelajaran, organisasi,
                        ekstrakurikuler, serta kegiatan sekolah.

                    </p>


                    <a
                        href="#"
                        class="btn-berita"
                    >

                        Baca Selengkapnya

                        <i class="fas fa-arrow-right ml-2"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>


    <!-- ================================
         BERITA TERBARU
    ================================= -->

    <div class="judul-terbaru">

        <span>

            <i class="fas fa-bullhorn"></i>

            Berita Terbaru

        </span>

    </div>


    <div class="row">


        <!-- BERITA 1 -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="berita-card">

                <img
                    src="img/berita2.jpg"
                    class="berita-image"
                    alt="Kegiatan Sekolah"
                >

                <div class="berita-content">

                    <span class="berita-date">

                        <i class="far fa-calendar-alt"></i>

                        10 September 2026

                    </span>


                    <h3>

                        Kegiatan Pembelajaran Siswa

                    </h3>


                    <p>

                        Kegiatan pembelajaran siswa berlangsung
                        dengan aktif dan menyenangkan. Siswa
                        mengikuti kegiatan dengan penuh semangat.

                    </p>


                    <a
                        href="#"
                        class="btn-berita"
                    >

                        Baca Selengkapnya

                        <i class="fas fa-arrow-right ml-2"></i>

                    </a>

                </div>

            </div>

        </div>


        <!-- BERITA 2 -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="berita-card">

                <img
                    src="img/berita3.jpg"
                    class="berita-image"
                    alt="Prestasi Siswa"
                >

                <div class="berita-content">

                    <span class="berita-date">

                        <i class="far fa-calendar-alt"></i>

                        8 September 2026

                    </span>


                    <h3>

                        Prestasi Siswa SMK RAINBOW BUBBLEGUM

                    </h3>


                    <p>

                        Siswa SMK RAINBOW BUBBLEGUM berhasil
                        menunjukkan kemampuan dan prestasi melalui
                        berbagai kegiatan dan kompetisi.

                    </p>


                    <a
                        href="#"
                        class="btn-berita"
                    >

                        Baca Selengkapnya

                        <i class="fas fa-arrow-right ml-2"></i>

                    </a>

                </div>

            </div>

        </div>


        <!-- BERITA 3 -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="berita-card">

                <img
                    src="img/berita4.jpg"
                    class="berita-image"
                    alt="Ekstrakurikuler"
                >

                <div class="berita-content">

                    <span class="berita-date">

                        <i class="far fa-calendar-alt"></i>

                        5 September 2026

                    </span>


                    <h3>

                        Kegiatan Ekstrakurikuler

                    </h3>


                    <p>

                        Berbagai kegiatan ekstrakurikuler menjadi
                        wadah bagi siswa untuk mengembangkan bakat,
                        minat, kreativitas, dan keterampilan.

                    </p>


                    <a
                        href="#"
                        class="btn-berita"
                    >

                        Baca Selengkapnya

                        <i class="fas fa-arrow-right ml-2"></i>

                    </a>

                </div>

            </div>

        </div>


        <!-- BERITA 4 -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="berita-card">

                <img
                    src="img/berita5.jpg"
                    class="berita-image"
                    alt="Kegiatan Sekolah"
                >

                <div class="berita-content">

                    <span class="berita-date">

                        <i class="far fa-calendar-alt"></i>

                        2 September 2026

                    </span>


                    <h3>

                        Semangat Siswa Mengikuti Kegiatan Sekolah

                    </h3>


                    <p>

                        Para siswa mengikuti berbagai kegiatan
                        sekolah dengan antusias dan penuh semangat.

                    </p>


                    <a
                        href="#"
                        class="btn-berita"
                    >

                        Baca Selengkapnya

                        <i class="fas fa-arrow-right ml-2"></i>

                    </a>

                </div>

            </div>

        </div>


        <!-- BERITA 5 -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="berita-card">

                <img
                    src="img/berita6.jpg"
                    class="berita-image"
                    alt="Guru SMK RAINBOW BUBBLEGUM"
                >

                <div class="berita-content">

                    <span class="berita-date">

                        <i class="far fa-calendar-alt"></i>

                        30 Agustus 2026

                    </span>


                    <h3>

                        Guru dan Staf Sekolah

                    </h3>


                    <p>

                        Guru dan staf SMK RAINBOW BUBBLEGUM
                        terus memberikan pelayanan terbaik dalam
                        mendukung kegiatan pendidikan siswa.

                    </p>


                    <a
                        href="#"
                        class="btn-berita"
                    >

                        Baca Selengkapnya

                        <i class="fas fa-arrow-right ml-2"></i>

                    </a>

                </div>

            </div>

        </div>


        <!-- BERITA 6 -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="berita-card">

                <img
                    src="img/berita7.jpg"
                    class="berita-image"
                    alt="Lingkungan Sekolah"
                >

                <div class="berita-content">

                    <span class="berita-date">

                        <i class="far fa-calendar-alt"></i>

                        28 Agustus 2026

                    </span>


                    <h3>

                        Menciptakan Lingkungan Sekolah yang Nyaman

                    </h3>


                    <p>

                        Sekolah terus berupaya menciptakan lingkungan
                        yang aman, nyaman, bersih, dan mendukung
                        proses belajar siswa.

                    </p>


                    <a
                        href="#"
                        class="btn-berita"
                    >

                        Baca Selengkapnya

                        <i class="fas fa-arrow-right ml-2"></i>

                    </a>

                </div>

            </div>

        </div>


    </div>

</div>


<!-- =====================================================
     FOOTER
===================================================== -->

<div class="footer">

    <div class="container">

        <h4>

            SMK RAINBOW BUBBLEGUM

        </h4>

        <p>

            Sekolah Menengah Kejuruan yang berkomitmen
            mengembangkan potensi dan keterampilan siswa.

        </p>

        <p class="mt-2">

            &copy; 2026 SMK RAINBOW BUBBLEGUM

        </p>

    </div>

</div>

<!-- BUTTON KEMBALI KE PROFIL -->

<div class="text-center" style="margin: 40px 0;">

    <a href="profil.php" class="btn-kembali-profil">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Profil
    </a>

</div>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<script src="lib/easing/easing.min.js"></script>

<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<script src="lib/isotope/isotope.pkgd.min.js"></script>

<script src="lib/lightbox/js/lightbox.min.js"></script>

<script src="js/main.js"></script>

</body>

</html>
