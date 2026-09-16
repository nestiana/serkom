<?php
// Halaman Ekstrakurikuler Pramuka
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pramuka | SMK RAINBOW BUBBLEGUM</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- ================= CSS PRAMUKA ================= -->
    <style>

        /* =========================
           RESET
        ========================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #252525;
            background: #fff;
            overflow-x: hidden;
        }

        img {
            width: 100%;
            display: block;
        }

        a {
            text-decoration: none;
        }


        /* =========================
           HERO
        ========================= */

        .hero-pramuka {
            min-height: 100vh;
            position: relative;
            overflow: hidden;

            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(139, 91, 48, .12),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 10% 90%,
                    rgba(180, 120, 70, .12),
                    transparent 25%
                ),
                #fff;

            display: flex;
            align-items: center;
        }

        .hero-pramuka::before {
            content: "";
            position: absolute;

            width: 500px;
            height: 500px;

            border-radius: 50%;

            background: rgba(139, 91, 48, .08);

            right: -180px;
            top: 80px;
        }

        .hero-pramuka .container {
            position: relative;
            z-index: 2;
        }

        .hero-content {
            padding-right: 40px;
        }

        .small-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: #8b5a2b;

            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;

            margin-bottom: 20px;
        }

        .small-badge i {
            font-size: 18px;
        }

        .hero-pramuka h1 {
            font-size: clamp(45px, 6vw, 78px);
            line-height: 1.02;

            font-weight: 800;
            letter-spacing: -3px;

            color: #242424;
        }

        .hero-pramuka h1 span {
            display: block;
            color: #9a6435;
        }

        .hero-description {
            max-width: 570px;

            margin-top: 25px;
            margin-bottom: 30px;

            color: #777;

            line-height: 1.8;
            font-size: 15px;
        }

        .btn-main {
            display: inline-flex;
            align-items: center;
            gap: 12px;

            padding: 15px 25px;

            border-radius: 50px;

            background: #8b5a2b;
            color: white;

            font-weight: 600;

            transition: .3s ease;
        }

        .btn-main:hover {
            background: #70451f;
            color: white;

            transform: translateY(-3px);
        }

        .hero-mini-info {
            display: flex;
            gap: 40px;

            margin-top: 45px;
        }

        .hero-mini-info div {
            display: flex;
            flex-direction: column;
        }

        .hero-mini-info strong {
            font-size: 25px;
            font-weight: 800;
        }

        .hero-mini-info small {
            color: #999;

            font-size: 11px;
            letter-spacing: 1px;

            text-transform: uppercase;
        }


        /* =========================
           HERO IMAGE
        ========================= */

        .hero-image-wrapper {
            position: relative;

            width: 100%;
            max-width: 550px;

            margin: auto;
            padding: 40px;
        }

        .hero-circle {
            position: absolute;

            width: 390px;
            height: 390px;

            border-radius: 50%;

            background: #c18a58;

            left: 50%;
            top: 50%;

            transform: translate(-50%, -50%);

            z-index: 0;
        }

        .hero-circle::after {
            content: "";

            position: absolute;

            inset: 15px;

            border: 2px dashed rgba(255,255,255,.7);

            border-radius: 50%;
        }

        .hero-image {
            position: relative;

            z-index: 2;

            width: 100%;
            height: 370px;

            object-fit: cover;

            border-radius: 25px;

            box-shadow: 0 25px 60px rgba(0,0,0,.18);
        }


        /* =========================
           FLOATING CARD
        ========================= */

        .floating-card {
            position: absolute;

            z-index: 5;

            background: #fff;

            padding: 13px 18px;

            border-radius: 15px;

            display: flex;
            align-items: center;

            gap: 10px;

            box-shadow: 0 12px 30px rgba(0,0,0,.12);

            font-size: 12px;
            font-weight: 700;

            white-space: nowrap;
        }

        .floating-card i {
            color: #8b5a2b;

            font-size: 20px;

            flex-shrink: 0;
        }

        .floating-card span {
            display: inline-block;

            white-space: nowrap;

            line-height: 1;
        }


        /* POSISI KARTU */

        .card-scout {
            top: 35px;
            left: 0;
        }

        .card-camp {
            right: -5px;
            top: 160px;
        }

        .card-leader {
            bottom: 25px;
            left: 20px;
        }


        /* =========================
           SECTION
        ========================= */

        .section-padding {
            padding: 110px 0;
        }

        .section-label {
            color: #9a6435;

            font-size: 12px;
            font-weight: 700;

            letter-spacing: 2px;

            margin-bottom: 12px;
        }

        .section-title {
            font-size: clamp(35px, 4vw, 52px);

            font-weight: 800;

            line-height: 1.15;
        }

        .section-title span {
            color: #9a6435;
        }

        .section-text {
            color: #777;

            line-height: 1.8;

            font-size: 15px;
        }


        /* =========================
           TENTANG
        ========================= */

        .about-section {
            background: #faf7f3;
        }

        .about-image {
            position: relative;

            padding: 20px;
        }

        .about-image img {
            height: 430px;

            object-fit: cover;

            border-radius: 25px;

            box-shadow: 0 20px 50px rgba(0,0,0,.12);
        }

        .experience-box {
            position: absolute;

            right: 0;
            bottom: 0;

            background: #8b5a2b;
            color: white;

            padding: 18px 25px;

            border-radius: 18px;

            display: flex;
            align-items: center;

            gap: 12px;

            box-shadow: 0 15px 30px rgba(0,0,0,.15);
        }

        .experience-box i {
            font-size: 28px;
        }

        .experience-box strong,
        .experience-box span {
            display: block;
        }

        .experience-box span {
            font-size: 11px;

            opacity: .8;
        }

        .about-list {
            margin-top: 25px;

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 15px;
        }

        .about-list div {
            font-size: 14px;

            font-weight: 600;
        }

        .about-list i {
            color: #8b5a2b;

            margin-right: 8px;
        }


        /* =========================
           KEGIATAN
        ========================= */

        .skill-section {
            background: white;
        }

        .section-heading {
            max-width: 700px;

            margin: 0 auto 55px;
        }

        .section-heading > p {
            color: #777;

            line-height: 1.8;

            margin-top: 15px;
        }

        .skill-card {
            position: relative;

            height: 100%;

            padding: 30px;

            border-radius: 22px;

            background: #faf7f3;

            border: 1px solid #eee5dc;

            transition: .35s ease;

            overflow: hidden;
        }

        .skill-card:hover {
            transform: translateY(-8px);

            box-shadow: 0 20px 40px rgba(0,0,0,.10);
        }

        .skill-icon {
            width: 60px;
            height: 60px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #8b5a2b;
            color: white;

            border-radius: 17px;

            font-size: 25px;

            margin-bottom: 22px;
        }

        .skill-card h4 {
            font-size: 20px;

            font-weight: 700;
        }

        .skill-card p {
            color: #777;

            font-size: 14px;

            line-height: 1.7;
        }

        .skill-card > span {
            position: absolute;

            right: 20px;
            bottom: 10px;

            font-size: 55px;

            font-weight: 800;

            color: rgba(139,90,43,.08);
        }


        /* =========================
           GALERI
        ========================= */

        .gallery-section {
            background: #faf7f3;
        }

        .gallery-description {
            color: #777;

            line-height: 1.8;
        }

        .gallery-grid {
            display: grid;

            grid-template-columns: 1.4fr 1fr;

            grid-template-rows: 250px 250px;

            gap: 18px;
        }

        .gallery-item {
            position: relative;

            overflow: hidden;

            border-radius: 22px;

            min-height: 200px;
        }

        .gallery-large {
            grid-row: span 2;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: .5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.08);
        }

        .gallery-overlay {
            position: absolute;

            inset: 0;

            display: flex;

            flex-direction: column;

            justify-content: flex-end;

            padding: 25px;

            color: white;

            background: linear-gradient(
                transparent 35%,
                rgba(0,0,0,.75)
            );
        }

        .gallery-overlay span {
            font-size: 11px;

            opacity: .8;
        }

        .gallery-overlay h4 {
            margin: 4px 0 0;

            font-size: 19px;
        }


        /* =========================
           PROJECT
        ========================= */

        .project-section {
            background: white;
        }

        .project-card {
            height: 100%;

            border-radius: 22px;

            overflow: hidden;

            background: white;

            box-shadow: 0 12px 35px rgba(0,0,0,.08);

            transition: .35s ease;
        }

        .project-card:hover {
            transform: translateY(-8px);
        }

        .project-image {
            position: relative;

            height: 240px;

            overflow: hidden;
        }

        .project-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: .5s ease;
        }

        .project-card:hover .project-image img {
            transform: scale(1.06);
        }

        .project-number {
            position: absolute;

            top: 15px;
            right: 15px;

            width: 42px;
            height: 42px;

            border-radius: 50%;

            background: white;

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: 700;

            color: #8b5a2b;
        }

        .project-body {
            padding: 25px;
        }

        .project-body small {
            color: #9a6435;

            font-weight: 700;

            font-size: 11px;

            letter-spacing: 1px;
        }

        .project-body h4 {
            margin-top: 8px;

            font-weight: 700;
        }

        .project-body p {
            color: #777;

            font-size: 14px;

            line-height: 1.7;
        }


        /* =========================
           MANFAAT
        ========================= */

        .career-section {
            background: #faf7f3;
        }

        .career-card {
            height: 100%;

            padding: 30px 25px;

            background: white;

            border-radius: 20px;

            text-align: center;

            transition: .3s ease;

            border: 1px solid #eee5dc;
        }

        .career-card:hover {
            transform: translateY(-7px);

            box-shadow: 0 15px 35px rgba(0,0,0,.08);
        }

        .career-card i {
            font-size: 35px;

            color: #8b5a2b;

            margin-bottom: 15px;
        }

        .career-card h5 {
            font-weight: 700;
        }

        .career-card p {
            color: #777;

            font-size: 13px;

            line-height: 1.6;
        }


        /* =========================
           CTA
        ========================= */

        .cta-section {
            padding: 100px 0;

            background: #faf7f3;
        }

        .cta-box {
            position: relative;

            overflow: hidden;

            padding: 70px;

            border-radius: 30px;

            background: #8b5a2b;

            color: white;

            text-align: center;
        }

        .cta-box::before {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            border-radius: 50%;

            border: 1px solid rgba(255,255,255,.2);

            top: -150px;
            left: -80px;
        }

        .cta-box span {
            font-size: 12px;

            font-weight: 700;

            letter-spacing: 2px;

            opacity: .8;
        }

        .cta-box h2 {
            margin: 15px 0;

            font-size: clamp(35px, 5vw, 55px);

            font-weight: 700;
        }

        .cta-box h2 strong {
            color: #f1d1ad;
        }

        .cta-box p {
            opacity: .8;

            margin-bottom: 30px;
        }

        .btn-cta {
            background: white;

            color: #8b5a2b;

            padding: 14px 25px;

            border-radius: 50px;

            font-weight: 700;
        }

        .btn-cta:hover {
            background: #f3e8dc;

            color: #70451f;
        }


        /* =========================
           FOOTER
        ========================= */

        .pramuka-footer {
            padding: 65px 0 25px;

            background: #211811;

            color: white;
        }

        .pramuka-footer h4 {
            font-weight: 700;
        }

        .pramuka-footer h4 i {
            color: #c18a58;

            margin-right: 8px;
        }

        .pramuka-footer p {
            color: #bcb4ae;

            line-height: 1.8;
        }

        .pramuka-footer h5 {
            color: #c18a58;

            font-size: 16px;
        }

        .pramuka-footer hr {
            border-color: rgba(255,255,255,.15);

            margin: 35px 0 20px;
        }

        .footer-bottom {
            display: flex;

            justify-content: space-between;

            color: #999;

            font-size: 12px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 991px) {

            .hero-pramuka {
                padding: 100px 0 70px;
            }

            .hero-content {
                padding-right: 0;

                text-align: center;

                margin-bottom: 60px;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-mini-info {
                justify-content: center;
            }

            .hero-image-wrapper {
                max-width: 500px;
            }

            .gallery-grid {
                grid-template-columns: 1fr 1fr;
            }
        }


        @media (max-width: 767px) {

            .section-padding {
                padding: 75px 0;
            }

            .hero-pramuka h1 {
                letter-spacing: -1px;
            }

            .hero-image {
                height: 300px;
            }

            .hero-circle {
                width: 300px;
                height: 300px;
            }

            .floating-card {
                padding: 9px 12px;

                font-size: 10px;
            }

            .card-scout {
                left: 0;
            }

            .card-camp {
                right: 0;
            }

            .card-leader {
                bottom: 10px;
            }

            .about-list {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                display: grid;

                grid-template-columns: 1fr;

                grid-template-rows: auto;
            }

            .gallery-large {
                grid-row: auto;
            }

            .gallery-item {
                height: 280px;
            }

            .cta-box {
                padding: 45px 25px;
            }

            .footer-bottom {
                flex-direction: column;

                gap: 10px;
            }
        }

    </style>

</head>


<body>


<!-- ================= HERO ================= -->

<section class="hero-pramuka">

    <div class="hero-shape shape-one"></div>
    <div class="hero-shape shape-two"></div>

    <div class="container position-relative">

        <div class="row align-items-center min-vh-100">

            <!-- TEXT -->

            <div class="col-lg-6 hero-content">

                <div class="small-badge">

                    <i class="bi bi-stars"></i>

                    EKSTRAKURIKULER

                </div>


                <h1>

                    EKSTRAKURIKULER

                    <span>PRAMUKA</span>

                </h1>


                <p class="hero-description">

                    Membentuk generasi muda yang disiplin, mandiri,
                    bertanggung jawab, dan memiliki jiwa kepemimpinan
                    melalui kegiatan kepramukaan.

                </p>


                <div class="hero-buttons">

                    <a href="#tentang" class="btn btn-main">

                        Jelajahi Pramuka

                        <i class="bi bi-arrow-down"></i>

                    </a>

                </div>


                <div class="hero-mini-info">

                    <div>

                        <strong>100+</strong>

                        <small>Anggota</small>

                    </div>


                    <div>

                        <strong>20+</strong>

                        <small>Kegiatan</small>

                    </div>


                    <div>

                        <strong>10+</strong>

                        <small>Prestasi</small>

                    </div>

                </div>

            </div>


            <!-- IMAGE -->

            <div class="col-lg-6">

                <div class="hero-image-wrapper">

                    <div class="floating-card card-scout">

                        <i class="bi bi-compass"></i>

                        <span>PRAMUKA</span>

                    </div>


                    <div class="floating-card card-camp">

                        <i class="bi bi-tree"></i>

                        <span>KEGIATAN</span>

                    </div>


                    <div class="floating-card card-leader">

                        <i class="bi bi-people"></i>

                        <span>TEAM</span>

                    </div>


                    <div class="hero-circle"></div>


                    <img
                        src="img/pramuka.jpeg"
                        class="hero-image"
                        alt="Kegiatan Pramuka"
                    >

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ================= TENTANG ================= -->

<section id="tentang" class="section-padding about-section">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="about-image">

                    <img
                        src="img/pramuka1.jpeg"
                        alt="Kegiatan Pramuka"
                    >


                    <div class="experience-box">

                        <i class="bi bi-compass"></i>

                        <div>

                            <strong>PRAMUKA</strong>

                            <span>Disiplin & Mandiri</span>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="section-label">
                    TENTANG PRAMUKA
                </div>


                <h2 class="section-title">

                    Belajar Bersama,

                    <span>Membangun Karakter.</span>

                </h2>


                <p class="section-text">

                    Pramuka merupakan kegiatan ekstrakurikuler yang
                    mengajarkan berbagai keterampilan, kedisiplinan,
                    kerja sama, dan tanggung jawab.

                </p>


                <p class="section-text">

                    Melalui berbagai kegiatan di dalam maupun di luar
                    sekolah, siswa dilatih untuk menjadi pribadi yang
                    mandiri, tangguh, kreatif, dan memiliki jiwa
                    kepemimpinan.

                </p>


                <div class="about-list">

                    <div>

                        <i class="bi bi-check-circle-fill"></i>

                        Melatih kedisiplinan

                    </div>


                    <div>

                        <i class="bi bi-check-circle-fill"></i>

                        Membangun kerja sama

                    </div>


                    <div>

                        <i class="bi bi-check-circle-fill"></i>

                        Melatih kepemimpinan

                    </div>


                    <div>

                        <i class="bi bi-check-circle-fill"></i>

                        Menumbuhkan kemandirian

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ================= KEGIATAN ================= -->

<section id="kegiatan" class="section-padding skill-section">

    <div class="container">

        <div class="text-center section-heading">

            <div class="section-label">
                KEGIATAN PRAMUKA
            </div>


            <h2 class="section-title">

                Apa Saja yang

                <span>Dilakukan?</span>

            </h2>


            <p>

                Berbagai kegiatan menarik untuk melatih keterampilan,
                kedisiplinan, dan kekompakan anggota Pramuka.

            </p>

        </div>


        <div class="row g-4">


            <!-- CARD 1 -->

            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">

                        <i class="bi bi-fire"></i>

                    </div>


                    <h4>
                        Perkemahan
                    </h4>


                    <p>

                        Mengikuti kegiatan perkemahan untuk melatih
                        kemandirian dan kekompakan.

                    </p>


                    <span>01</span>

                </div>

            </div>


            <!-- CARD 2 -->

            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">

                        <i class="bi bi-compass"></i>

                    </div>


                    <h4>
                        Penjelajahan
                    </h4>


                    <p>

                        Melatih kemampuan navigasi, ketahanan,
                        dan kerja sama melalui kegiatan penjelajahan.

                    </p>


                    <span>02</span>

                </div>

            </div>


            <!-- CARD 3 -->

            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">

                        <i class="bi bi-heart-pulse"></i>

                    </div>


                    <h4>
                        Pertolongan
                    </h4>


                    <p>

                        Mempelajari dasar-dasar pertolongan pertama
                        dan kepedulian terhadap sesama.

                    </p>


                    <span>03</span>

                </div>

            </div>


            <!-- CARD 4 -->

            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">

                        <i class="bi bi-people"></i>

                    </div>


                    <h4>
                        Kerja Sama
                    </h4>


                    <p>

                        Mengembangkan kekompakan dan kemampuan bekerja
                        sama dalam berbagai kegiatan.

                    </p>


                    <span>04</span>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ================= GALERI ================= -->

<section id="galeri" class="section-padding gallery-section">

    <div class="container">

        <div class="row align-items-end mb-5">

            <div class="col-lg-7">

                <div class="section-label">
                    GALERI KEGIATAN
                </div>


                <h2 class="section-title">

                    Aktivitas

                    <span>Anggota Pramuka</span>

                </h2>

            </div>


            <div class="col-lg-5">

                <p class="gallery-description">

                    Belajar tidak hanya di dalam kelas.
                    Anggota Pramuka juga aktif mengikuti berbagai
                    kegiatan yang melatih keterampilan dan karakter.

                </p>

            </div>

        </div>


        <div class="gallery-grid">


            <!-- FOTO 1 -->

            <div class="gallery-item gallery-large">

                <img
                    src="img/pramuka2.jpeg"
                    alt="Kegiatan Pramuka"
                >


                <div class="gallery-overlay">

                    <span>01</span>

                    <h4>
                        Kegiatan Perkemahan
                    </h4>

                </div>

            </div>


            <!-- FOTO 2 -->

            <div class="gallery-item">

                <img
                    src="img/pramuka3.jpeg"
                    alt="Kegiatan Pramuka"
                >


                <div class="gallery-overlay">

                    <span>02</span>

                    <h4>
                        Lomba perkemahan
                    </h4>

                </div>

            </div>


            <!-- FOTO 3 -->

            <div class="gallery-item">

                <img
                    src="img/pramuka4.jpeg"
                    alt="Kegiatan Pramuka"
                >


                <div class="gallery-overlay">

                    <span>03</span>

                    <h4>
                        Kerja Sama Tim
                    </h4>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ================= MANFAAT ================= -->

<section class="career-section section-padding">

    <div class="container">

        <div class="text-center section-heading">

            <div class="section-label">
                MANFAAT PRAMUKA
            </div>


            <h2 class="section-title">

                Jadi Pribadi yang

                <span>Lebih Hebat</span>

            </h2>

        </div>


        <div class="row g-4">


            <!-- MANDIRI -->

            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-person-check"></i>

                    <h5>
                        Mandiri
                    </h5>

                    <p>

                        Melatih siswa agar mampu melakukan berbagai
                        hal dengan mandiri.

                    </p>

                </div>

            </div>


            <!-- KOMPAK -->

            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-people"></i>

                    <h5>
                        Kompak
                    </h5>

                    <p>

                        Membangun kekompakan dan rasa kebersamaan
                        antaranggota.

                    </p>

                </div>

            </div>


            <!-- DISIPLIN -->

            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-award"></i>

                    <h5>
                        Disiplin
                    </h5>

                    <p>

                        Membiasakan siswa untuk bertanggung jawab
                        dan disiplin.

                    </p>

                </div>

            </div>


            <!-- PEMIMPIN -->

            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-star"></i>

                    <h5>
                        Pemimpin
                    </h5>

                    <p>

                        Melatih jiwa kepemimpinan dan keberanian
                        dalam mengambil keputusan.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ================= CTA ================= -->

<section class="cta-section">

    <div class="container">

        <div class="cta-box">

            <div class="cta-decoration"></div>

            <div class="position-relative">

                <span>
                    READY TO EXPLORE?
                </span>


                <h2>

                    Bersama Pramuka,

                    <strong>Bangun Karakter.</strong>

                </h2>


                <p>

                    Belajar, berpetualang, dan tumbuh bersama.

                </p>


                <a
                    href="eskul.php"
                    class="btn btn-cta"
                >

                    Kembali ke Website

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>

</section>



<!-- ================= FOOTER ================= -->

<footer class="pramuka-footer">

    <div class="container">

        <div class="row g-4">


            <div class="col-lg-6">

                <h4>

                    <i class="bi bi-compass"></i>

                    SMK RAINBOW BUBBLEGUM

                </h4>


                <p>

                    Ekstrakurikuler Pramuka —
                    Membentuk generasi yang disiplin,
                    mandiri, dan bertanggung jawab.

                </p>

            </div>


            <div class="col-lg-6 text-lg-end">

                <p class="mb-2">
                    Ekstrakurikuler
                </p>


                <h5>
                    PRAMUKA
                </h5>

            </div>

        </div>


        <hr>


        <div class="footer-bottom">

            <span>
                © 2026 SMK Rainbow Bubblegum
            </span>


            <span>
                PRAMUKA • Scout Generation
            </span>

        </div>

    </div>

</footer>



<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>