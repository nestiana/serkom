<?php
// Halaman Program Keahlian Tata Busana
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tata Busana | SMK Rainbow Bubblegum</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #b85c8a;
            --primary-dark: #8e3d68;
            --secondary: #f9eaf2;
            --dark: #211b20;
            --text: #777;
            --white: #fff;
        }

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
            color: var(--dark);
            background: #fff;
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
            display: block;
        }

        a {
            text-decoration: none;
        }

        .section-padding {
            padding: 100px 0;
        }

        /* ================= HERO ================= */

        .hero-busana {
            min-height: 100vh;
            position: relative;
            overflow: hidden;

            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(184, 92, 138, .15),
                    transparent 30%
                ),
                linear-gradient(135deg, #fff, #fff8fb);
        }

        .decor {
            position: absolute;
            border-radius: 50%;
        }

        .decor-1 {
            width: 450px;
            height: 450px;
            background: rgba(184, 92, 138, .07);
            top: -200px;
            right: -100px;
        }

        .decor-2 {
            width: 220px;
            height: 220px;
            background: rgba(0, 0, 0, .04);
            left: -100px;
            bottom: 5%;
        }

        .decor-3 {
            width: 75px;
            height: 75px;
            background: var(--primary);
            opacity: .08;
            top: 20%;
            left: 45%;
        }

        .hero-content {
            position: relative;
            z-index: 5;
        }

        /* ================= BADGE ================= */

        .small-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 50px;
            background: #fff;
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .07);
            margin-bottom: 25px;
        }

        /* ================= HERO TEXT ================= */

        .hero-content h1 {
            font-size: clamp(50px, 6vw, 80px);
            line-height: .98;
            font-weight: 800;
            letter-spacing: -4px;
            margin-bottom: 25px;
        }

        .hero-content h1 span {
            display: block;
            color: var(--primary);
        }

        .hero-content > p {
            max-width: 570px;
            color: var(--text);
            font-size: 16px;
            line-height: 1.9;
            margin-bottom: 30px;
        }

        /* ================= BUTTON ================= */

        .btn-main {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            background: var(--dark);
            color: #fff;
            border-radius: 50px;
            padding: 15px 25px;
            font-weight: 600;
            transition: .3s ease;
        }

        .btn-main:hover {
            background: var(--primary);
            color: #fff;
            transform: translateY(-3px);
        }

        /* ================= HERO INFO ================= */

        .hero-info {
            display: flex;
            gap: 45px;
            margin-top: 45px;
        }

        .hero-info div {
            display: flex;
            flex-direction: column;
        }

        .hero-info strong {
            font-size: 27px;
            font-weight: 800;
        }

        .hero-info small {
            color: #888;
            font-size: 12px;
        }

        /* ================= HERO IMAGE ================= */

        .hero-image-wrapper {
            position: relative;
            width: 100%;
            max-width: 570px;
            height: 620px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .circle-bg {
            position: absolute;
            width: 480px;
            height: 480px;
            border-radius: 50%;
            background: #211b20;
        }

        .hero-image {
            position: relative;
            z-index: 2;
            width: 460px;
            max-height: 570px;
            object-fit: contain;
            filter: drop-shadow(0 25px 30px rgba(0, 0, 0, .2));
        }

        /* ================= FLOATING CARD ================= */

        .floating-card {
            position: absolute;
            z-index: 5;
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 13px 18px;
            background: rgba(255, 255, 255, .95);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .1);
            font-size: 12px;
            font-weight: 700;
            animation: floating 3s ease-in-out infinite;
        }

        .floating-card i {
            color: var(--primary);
            font-size: 20px;
        }

        .card-scissors {
            left: 0;
            top: 27%;
        }

        .card-design {
            right: 0;
            top: 47%;
            animation-delay: .7s;
        }

        .card-fashion {
            left: 10%;
            bottom: 16%;
            animation-delay: 1.2s;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        /* ================= SECTION ================= */

        .section-label {
            color: var(--primary);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: clamp(35px, 4vw, 52px);
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .section-title span {
            color: var(--primary);
        }

        .section-text {
            color: var(--text);
            line-height: 1.9;
            margin-bottom: 18px;
        }

        /* ================= ABOUT ================= */

        .about-image {
            position: relative;
            padding-right: 30px;
        }

        .about-image img {
            width: 100%;
            height: 520px;
            object-fit: cover;
            border-radius: 25px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .12);
        }

        .about-card {
            position: absolute;
            right: 0;
            bottom: 30px;
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 18px 22px;
            background: #fff;
            border-radius: 17px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .12);
        }

        .about-card i {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--secondary);
            color: var(--primary);
            border-radius: 12px;
            font-size: 23px;
        }

        .about-card strong,
        .about-card span {
            display: block;
        }

        .about-card strong {
            font-size: 14px;
        }

        .about-card span {
            color: #999;
            font-size: 11px;
        }

        .check-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 30px;
        }

        .check-list div {
            color: #555;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .check-list i {
            color: var(--primary);
        }

        /* ================= SKILL ================= */

        .skill-section {
            background: #f9f8f9;
        }

        .section-heading {
            max-width: 700px;
            margin: 0 auto 55px;
        }

        .section-heading > p {
            color: var(--text);
            line-height: 1.8;
        }

        .skill-card {
            position: relative;
            height: 100%;
            padding: 35px 28px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #eee;
            transition: .3s ease;
        }

        .skill-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, .09);
        }

        .skill-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 17px;
            background: var(--secondary);
            color: var(--primary);
            font-size: 27px;
            margin-bottom: 25px;
        }

        .skill-card h4 {
            font-size: 19px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .skill-card p {
            color: #777;
            font-size: 13px;
            line-height: 1.8;
        }

        .skill-card > span {
            position: absolute;
            right: 20px;
            bottom: 15px;
            font-size: 45px;
            font-weight: 800;
            color: rgba(184, 92, 138, .07);
        }

        /* ================= FASHION ================= */

        .fashion-section {
            padding: 70px 0;
            background: #211b20;
        }

        .fashion-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            padding: 50px;
            border-radius: 30px;
            background: var(--primary);
            color: #fff;
        }

        .fashion-box small {
            font-size: 11px;
            letter-spacing: 2px;
            font-weight: 700;
            opacity: .8;
        }

        .fashion-box h3 {
            font-size: 45px;
            font-weight: 800;
            margin: 10px 0 0;
        }

        .fashion-box h3 span {
            color: #ffd8e9;
        }

        .fashion-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 12px;
            max-width: 550px;
        }

        .fashion-list div {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 17px;
            border-radius: 50px;
            background: rgba(255, 255, 255, .15);
            border: 1px solid rgba(255, 255, 255, .2);
            font-size: 12px;
            font-weight: 600;
        }

        /* ================= GALLERY ================= */

        .gallery-section {
            background: #fff;
        }

        .gallery-description {
            color: var(--text);
            line-height: 1.8;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            grid-template-rows: 250px 250px;
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 22px;
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
            left: 0;
            right: 0;
            bottom: 0;
            padding: 70px 25px 25px;
            color: #fff;
            background: linear-gradient(
                transparent,
                rgba(0, 0, 0, .8)
            );
        }

        .gallery-overlay span {
            font-size: 11px;
            opacity: .7;
        }

        .gallery-overlay h4 {
            font-size: 18px;
            margin: 5px 0 0;
        }

        /* ================= PROJECT ================= */

        .project-section {
            background: #f9f8f9;
        }

        .project-card {
            background: #fff;
            border-radius: 22px;
            overflow: hidden;
            height: 100%;
            transition: .3s ease;
            box-shadow: 0 10px 35px rgba(0, 0, 0, .05);
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, .1);
        }

        .project-image {
            height: 270px;
            position: relative;
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
            top: 18px;
            right: 18px;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #fff;
            color: var(--primary);
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .12);
        }

        .project-body {
            padding: 25px;
        }

        .project-body small {
            color: var(--primary);
            font-size: 10px;
            letter-spacing: 1.5px;
            font-weight: 800;
        }

        .project-body h4 {
            margin: 10px 0;
            font-weight: 700;
        }

        .project-body p {
            color: #777;
            font-size: 13px;
            line-height: 1.8;
        }

        /* ================= CAREER ================= */

        .career-section {
            background: #fff;
        }

        .career-card {
            text-align: center;
            height: 100%;
            padding: 35px 20px;
            border: 1px solid #eee;
            border-radius: 20px;
            transition: .3s ease;
        }

        .career-card:hover {
            transform: translateY(-7px);
            border-color: rgba(184, 92, 138, .3);
            box-shadow: 0 15px 40px rgba(0, 0, 0, .07);
        }

        .career-card i {
            font-size: 42px;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .career-card h5 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .career-card p {
            color: #777;
            font-size: 12px;
            line-height: 1.7;
        }

        /* ================= CTA ================= */

        .cta-section {
            padding: 80px 0;
            background: #f9f8f9;
        }

        .cta-box {
            position: relative;
            padding: 75px 30px;
            text-align: center;
            border-radius: 30px;
            overflow: hidden;
            background: #211b20;
            color: #fff;
        }

        .cta-circle {
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(184, 92, 138, .18);
            right: -120px;
            top: -170px;
        }

        .cta-box span {
            color: var(--primary);
            font-size: 11px;
            letter-spacing: 2px;
            font-weight: 800;
        }

        .cta-box h2 {
            font-size: clamp(35px, 5vw, 60px);
            font-weight: 700;
            margin: 15px 0;
        }

        .cta-box h2 strong {
            color: var(--primary);
        }

        .cta-box p {
            color: #aaa;
            margin-bottom: 30px;
        }

        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 14px 25px;
            border-radius: 50px;
            background: #fff;
            color: #211b20;
            font-weight: 600;
            transition: .3s ease;
        }

        .btn-cta:hover {
            background: var(--primary);
            color: #fff;
            transform: translateY(-3px);
        }

        /* ================= FOOTER ================= */

        .busana-footer {
            padding: 60px 0 25px;
            background: #211b20;
            color: #fff;
        }

        .busana-footer h4 {
            font-size: 19px;
            font-weight: 700;
        }

        .busana-footer h4 i {
            color: var(--primary);
            margin-right: 8px;
        }

        .busana-footer p {
            color: #999;
            font-size: 13px;
            line-height: 1.8;
        }

        .busana-footer h5 {
            color: var(--primary);
            font-weight: 700;
        }

        .busana-footer hr {
            border-color: rgba(255, 255, 255, .1);
            margin: 35px 0 20px;
        }

        .footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #777;
            font-size: 11px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 991px) {

            .hero-content {
                text-align: center;
                padding-top: 80px;
            }

            .hero-content > p {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-image-wrapper {
                height: 500px;
                margin-top: 20px;
            }

            .circle-bg {
                width: 380px;
                height: 380px;
            }

            .hero-image {
                width: 380px;
                max-height: 460px;
            }

            .fashion-box {
                flex-direction: column;
                text-align: center;
            }

            .fashion-list {
                justify-content: center;
            }
        }

        @media (max-width: 767px) {

            .section-padding {
                padding: 70px 0;
            }

            .hero-content h1 {
                font-size: 48px;
                letter-spacing: -2px;
            }

            .hero-image-wrapper {
                height: 430px;
            }

            .circle-bg {
                width: 310px;
                height: 310px;
            }

            .hero-image {
                width: 310px;
                max-height: 390px;
            }

            .about-image {
                padding-right: 0;
            }

            .about-image img {
                height: 400px;
            }

            .check-list {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                grid-template-rows: 300px 220px 220px;
            }

            .gallery-large {
                grid-row: span 1;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
        }

        @media (max-width: 480px) {

            .hero-content h1 {
                font-size: 40px;
            }

            .hero-image-wrapper {
                height: 360px;
            }

            .circle-bg {
                width: 260px;
                height: 260px;
            }

            .hero-image {
                width: 260px;
            }

            .floating-card {
                transform: scale(.85);
            }
        }
    </style>
</head>

<body>

<!-- ================= HERO ================= -->

<section class="hero-busana">

    <div class="decor decor-1"></div>
    <div class="decor decor-2"></div>
    <div class="decor decor-3"></div>

    <div class="container position-relative">

        <div class="row align-items-center min-vh-100">

            <div class="col-lg-6 hero-content">

                <div class="small-badge">
                    <i class="bi bi-scissors"></i>
                    PROGRAM KEAHLIAN
                </div>

                <h1>
                    TATA
                    <span>BUSANA</span>
                </h1>

                <p>
                    Mengembangkan kreativitas dalam dunia fashion
                    melalui desain busana, teknik menjahit,
                    pembuatan pola, hingga menghasilkan karya
                    busana yang kreatif dan berkualitas.
                </p>

                <a href="#tentang" class="btn btn-main">
                    Jelajahi Tata Busana
                    <i class="bi bi-arrow-right"></i>
                </a>

                <div class="hero-info">

                    <div>
                        <strong>100+</strong>
                        <small>Siswa</small>
                    </div>

                    <div>
                        <strong>50+</strong>
                        <small>Karya</small>
                    </div>

                    <div>
                        <strong>20+</strong>
                        <small>Project</small>
                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="hero-image-wrapper">

                    <div class="circle-bg"></div>

                    <div class="floating-card card-scissors">
                        <i class="bi bi-scissors"></i>
                        <span>SEWING</span>
                    </div>

                    <div class="floating-card card-design">
                        <i class="bi bi-pencil"></i>
                        <span>DESIGN</span>
                    </div>

                    <div class="floating-card card-fashion">
                        <i class="bi bi-stars"></i>
                        <span>FASHION</span>
                    </div>

                    <img src="img/busana2.png"
                         class="hero-image"
                         alt="Siswa Tata Busana">

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

                    <img src="img/busana.png"
                         alt="Kegiatan Tata Busana">

                    <div class="about-card">

                        <i class="bi bi-scissors"></i>

                        <div>
                            <strong>KREATIF & TERAMPIL</strong>
                            <span>Fashion • Sewing • Design</span>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="section-label">
                    TENTANG TATA BUSANA
                </div>

                <h2 class="section-title">
                    Dari Ide Menjadi
                    <span>Karya Busana.</span>
                </h2>

                <p class="section-text">
                    Tata Busana merupakan program keahlian yang
                    mempelajari berbagai keterampilan dalam dunia
                    fashion dan pembuatan pakaian.
                </p>

                <p class="section-text">
                    Siswa belajar membuat desain, mengambil ukuran,
                    membuat pola, memotong bahan, menjahit,
                    hingga menghasilkan busana yang menarik.
                </p>

                <div class="check-list">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Desain Busana
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Pembuatan Pola
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Teknik Menjahit
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Fashion Styling
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= SKILL ================= -->

<section class="section-padding skill-section">

    <div class="container">

        <div class="section-heading text-center">

            <div class="section-label">
                YANG DIPELAJARI
            </div>

            <h2 class="section-title">
                Skill Kreatif
                <span>Anak Tata Busana</span>
            </h2>

            <p>
                Berbagai keterampilan yang dipelajari untuk
                menghasilkan busana yang kreatif dan berkualitas.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-3">
                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-pencil"></i>
                    </div>

                    <h4>Desain Busana</h4>

                    <p>
                        Membuat rancangan dan desain pakaian
                        sesuai konsep dan kreativitas.
                    </p>

                    <span>01</span>

                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-rulers"></i>
                    </div>

                    <h4>Pembuatan Pola</h4>

                    <p>
                        Mempelajari teknik membuat pola pakaian
                        berdasarkan ukuran tubuh.
                    </p>

                    <span>02</span>

                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-scissors"></i>
                    </div>

                    <h4>Teknik Menjahit</h4>

                    <p>
                        Mempraktikkan berbagai teknik menjahit
                        untuk menghasilkan pakaian.
                    </p>

                    <span>03</span>

                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-stars"></i>
                    </div>

                    <h4>Fashion Styling</h4>

                    <p>
                        Mengembangkan konsep dan penampilan
                        busana agar terlihat menarik.
                    </p>

                    <span>04</span>

                </div>
            </div>

        </div>

    </div>

</section>


<!-- ================= CREATIVE FASHION ================= -->

<section class="fashion-section">

    <div class="container">

        <div class="fashion-box">

            <div>

                <small>
                    FASHION CREATIVE
                </small>

                <h3>
                    Design.
                    <span>Sew.</span>
                    Create.
                </h3>

            </div>

            <div class="fashion-list">

                <div>
                    <i class="bi bi-pencil"></i>
                    Fashion Design
                </div>

                <div>
                    <i class="bi bi-rulers"></i>
                    Pattern Making
                </div>

                <div>
                    <i class="bi bi-scissors"></i>
                    Sewing
                </div>

                <div>
                    <i class="bi bi-stars"></i>
                    Styling
                </div>

                <div>
                    <i class="bi bi-heart"></i>
                    Creativity
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
                    <span>Siswa Tata Busana</span>
                </h2>

            </div>

            <div class="col-lg-5">

                <p class="gallery-description">
                    Berbagai kegiatan siswa Tata Busana mulai dari
                    menggambar desain, membuat pola, memotong kain,
                    hingga praktik menjahit.
                </p>

            </div>

        </div>

        <div class="gallery-grid">

            <div class="gallery-item gallery-large">

                <img src="img/busana5.jpg"
                     alt="Praktik menjahit">

                <div class="gallery-overlay">
                    <span>01</span>
                    <h4>Praktik Menjahit</h4>
                </div>

            </div>

            <div class="gallery-item">

                <img src="img/busana3.jpeg"
                     alt="Desain busana">

                <div class="gallery-overlay">
                    <span>02</span>
                    <h4>Desain Busana</h4>
                </div>

            </div>

            <div class="gallery-item">

                <img src="img/busana4.jpeg"
                     alt="Pembuatan pola">

                <div class="gallery-overlay">
                    <span>03</span>
                    <h4>Pembuatan Pola</h4>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= PROJECT ================= -->

<section class="section-padding project-section">

    <div class="container">

        <div class="section-heading text-center">

            <div class="section-label">
                STUDENT PROJECT
            </div>

            <h2 class="section-title">
                Karya Kreatif
                <span>Siswa Tata Busana</span>
            </h2>

            <p>
                Kreativitas siswa dituangkan menjadi berbagai
                rancangan dan karya busana.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img src="img/busana6.jpeg"
                             alt="Project desain pakaian">

                        <div class="project-number">
                            01
                        </div>

                    </div>

                    <div class="project-body">

                        <small>FASHION DESIGN</small>

                        <h4>Desain Pakaian</h4>

                        <p>
                            Membuat rancangan pakaian dengan
                            konsep dan desain yang kreatif.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img src="img/busana.jpeg"
                             alt="Project pakaian">

                        <div class="project-number">
                            02
                        </div>

                    </div>

                    <div class="project-body">

                        <small>SEWING PROJECT</small>

                        <h4>Karya Jahit</h4>

                        <p>
                            Menghasilkan pakaian melalui proses
                            pemotongan bahan dan teknik menjahit.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img src="img/busana7.jpeg"
                             alt="Fashion styling">

                        <div class="project-number">
                            03
                        </div>

                    </div>

                    <div class="project-body">

                        <small>FASHION STYLING</small>

                        <h4>Fashion Styling</h4>

                        <p>
                            Menggabungkan busana dan aksesoris
                            untuk menciptakan penampilan menarik.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= CAREER ================= -->

<section class="section-padding career-section">

    <div class="container">

        <div class="section-heading text-center">

            <div class="section-label">
                MASA DEPAN
            </div>

            <h2 class="section-title">
                Lulusan Tata Busana
                <span>Bisa Jadi Apa?</span>
            </h2>

        </div>

        <div class="row g-4">

            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-pencil"></i>

                    <h5>Fashion Designer</h5>

                    <p>
                        Merancang dan menciptakan berbagai
                        model pakaian.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-scissors"></i>

                    <h5>Penjahit</h5>

                    <p>
                        Membuat dan memperbaiki pakaian
                        sesuai kebutuhan pelanggan.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-stars"></i>

                    <h5>Fashion Stylist</h5>

                    <p>
                        Menentukan perpaduan busana dan
                        aksesoris untuk sebuah penampilan.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-shop"></i>

                    <h5>Fashion Entrepreneur</h5>

                    <p>
                        Mengembangkan usaha dan bisnis
                        di bidang fashion.
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

            <div class="cta-circle"></div>

            <div class="position-relative">

                <span>
                    CREATE YOUR STYLE
                </span>

                <h2>
                    Your Style.
                    <strong>Your Creation.</strong>
                </h2>

                <p>
                    Wujudkan kreativitasmu menjadi karya
                    fashion yang membanggakan.
                </p>

                <a href="jurusan.php" class="btn btn-cta">
                    Kembali ke Website
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

        </div>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer class="busana-footer">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-6">

                <h4>
                    <i class="bi bi-scissors"></i>
                    SMK RAINBOW BUBBLEGUM
                </h4>

                <p>
                    Tata Busana —
                    Kreatif, Terampil, dan Siap Berkarya.
                </p>

            </div>

            <div class="col-lg-6 text-lg-end">

                <p class="mb-2">
                    Program Keahlian
                </p>

                <h5>
                    TATA BUSANA
                </h5>

            </div>

        </div>

        <hr>

        <div class="footer-bottom">

            <span>
                © <?php echo date("Y"); ?> SMK Rainbow Bubblegum
            </span>

            <span>
                FASHION • DESIGN • CREATIVE
            </span>

        </div>

    </div>

</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>