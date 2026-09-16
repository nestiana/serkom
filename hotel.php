<?php
// Halaman Program Keahlian Perhotelan
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Perhotelan | SMK Rainbow Bubblegum</title>

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

    <!-- =====================================================
         CSS PERHOTELAN
    ====================================================== -->

    <style>

    /* =====================================================
       RESET
    ===================================================== */

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
        color: #222;
        background: #fff;
        overflow-x: hidden;
    }

    a {
        text-decoration: none;
    }

    img {
        max-width: 100%;
        display: block;
    }


    /* =====================================================
       GLOBAL
    ===================================================== */

    :root {
        --primary: #e88919;
        --primary-dark: #c96d08;
        --secondary: #fff3df;
        --dark: #1f1f1f;
        --text: #666;
        --white: #fff;
        --light: #fffaf3;
        --border: #eeeeee;
    }

    .section-padding {
        padding: 100px 0;
    }

    .section-label {
        display: inline-block;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
        color: var(--primary);
        margin-bottom: 12px;
    }

    .section-title {
        font-size: 42px;
        line-height: 1.2;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 20px;
    }

    .section-title span {
        color: var(--primary);
    }

    .section-heading {
        max-width: 700px;
        margin: 0 auto 50px;
    }

    .section-heading p {
        color: var(--text);
        line-height: 1.8;
    }


    /* =====================================================
       HERO
    ===================================================== */

    .hero-rpl {
        position: relative;
        min-height: 100vh;
        overflow: hidden;
        background:
            linear-gradient(
                135deg,
                #fffaf3 0%,
                #ffffff 55%,
                #fff0d7 100%
            );
    }

    .hero-content {
        position: relative;
        z-index: 5;
    }

    .small-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        border-radius: 50px;
        background: rgba(232, 137, 25, 0.1);
        color: var(--primary);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
        margin-bottom: 22px;
    }

    .small-badge i {
        font-size: 15px;
    }

    .hero-content h1 {
        font-size: clamp(48px, 6vw, 82px);
        line-height: .98;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 25px;
    }

    .hero-content h1 span {
        display: block;
        color: var(--primary);
    }

    .hero-description {
        max-width: 560px;
        color: #666;
        font-size: 16px;
        line-height: 1.9;
        margin-bottom: 32px;
    }

    .hero-buttons {
        display: flex;
        gap: 15px;
    }

    .btn-main {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 14px 27px;
        border-radius: 50px;
        background: var(--primary);
        color: white;
        font-size: 14px;
        font-weight: 600;
        transition: .3s ease;
        box-shadow: 0 10px 25px rgba(232, 137, 25, .25);
    }

    .btn-main:hover {
        background: var(--primary-dark);
        color: white;
        transform: translateY(-3px);
    }

    .hero-mini-info {
        display: flex;
        gap: 45px;
        margin-top: 45px;
    }

    .hero-mini-info div {
        display: flex;
        flex-direction: column;
    }

    .hero-mini-info strong {
        font-size: 25px;
        color: var(--dark);
        font-weight: 700;
    }

    .hero-mini-info small {
        color: #888;
        font-size: 12px;
    }


    /* =====================================================
       HERO IMAGE
    ===================================================== */

    .hero-image-wrapper {
        position: relative;
        width: 520px;
        max-width: 100%;
        height: 560px;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-circle {
        position: absolute;
        width: 430px;
        height: 430px;
        border-radius: 50%;
        background: linear-gradient(
            135deg,
            #ffdca8,
            #f5a742
        );
        opacity: .9;
    }

    .hero-image {
        position: relative;
        z-index: 2;
        width: 450px;
        max-height: 550px;
        object-fit: contain;
        filter: drop-shadow(
            0 25px 30px rgba(0, 0, 0, .18)
        );
    }

    .floating-card {
        position: absolute;
        z-index: 5;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 13px 18px;
        background: rgba(255, 255, 255, .95);
        border-radius: 15px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, .12);
        font-size: 12px;
        font-weight: 700;
        color: var(--dark);
        animation: floating 3s ease-in-out infinite;
    }

    .floating-card i {
        font-size: 22px;
        color: var(--primary);
    }

    .card-code {
        top: 90px;
        left: 15px;
    }

    .card-web {
        right: 5px;
        top: 210px;
        animation-delay: .5s;
    }

    .card-app {
        left: 35px;
        bottom: 85px;
        animation-delay: 1s;
    }

    @keyframes floating {

        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-12px);
        }

    }


    /* =====================================================
       HERO SHAPES
    ===================================================== */

    .hero-shape {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }

    .shape-one {
        width: 120px;
        height: 120px;
        background: #ffe2b5;
        top: 8%;
        left: -40px;
    }

    .shape-two {
        width: 180px;
        height: 180px;
        background: #fff0d5;
        right: -80px;
        bottom: 5%;
    }

    .shape-three {
        width: 70px;
        height: 70px;
        border: 12px solid #ffd18e;
        right: 43%;
        top: 12%;
    }


    /* =====================================================
       TENTANG
    ===================================================== */

    .about-section {
        background: white;
    }

    .about-image {
        position: relative;
        padding-right: 30px;
    }

    .about-image > img {
        width: 100%;
        height: 480px;
        object-fit: cover;
        border-radius: 25px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .12);
    }

    .experience-box {
        position: absolute;
        right: 0;
        bottom: 30px;
        display: flex;
        align-items: center;
        gap: 13px;
        background: white;
        padding: 17px 22px;
        border-radius: 15px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, .12);
    }

    .experience-box i {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: var(--secondary);
        color: var(--primary);
        font-size: 23px;
    }

    .experience-box div {
        display: flex;
        flex-direction: column;
    }

    .experience-box strong {
        font-size: 18px;
    }

    .experience-box span {
        font-size: 11px;
        color: #888;
    }

    .section-text {
        color: var(--text);
        line-height: 1.9;
        margin-bottom: 15px;
    }

    .about-list {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        margin-top: 25px;
    }

    .about-list div {
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: 14px;
        font-weight: 500;
    }

    .about-list i {
        color: var(--primary);
        font-size: 17px;
    }


    /* =====================================================
       KEAHLIAN
    ===================================================== */

    .skill-section {
        background: #fffaf3;
    }

    .skill-card {
        position: relative;
        height: 100%;
        padding: 30px 25px;
        background: white;
        border-radius: 20px;
        border: 1px solid #f3eadf;
        overflow: hidden;
        transition: .35s ease;
    }

    .skill-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, .08);
        border-color: transparent;
    }

    .skill-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--secondary);
        color: var(--primary);
        border-radius: 16px;
        margin-bottom: 22px;
    }

    .skill-icon i {
        font-size: 27px;
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
        margin: 0;
    }

    .skill-card > span {
        position: absolute;
        right: 20px;
        bottom: 15px;
        font-size: 42px;
        font-weight: 800;
        color: #f8eee1;
    }


    /* =====================================================
       TECHNOLOGY / HOSPITALITY
    ===================================================== */

    .technology-section {
        padding: 70px 0;
        background: white;
    }

    .technology-box {
        padding: 45px;
        border-radius: 25px;
        background: #201a14;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
        overflow: hidden;
        position: relative;
    }

    .technology-box small {
        color: #e9a65d;
        font-size: 11px;
        letter-spacing: 2px;
        font-weight: 600;
    }

    .technology-box h3 {
        font-size: 35px;
        margin: 8px 0 0;
        font-weight: 700;
    }

    .technology-box h3 span {
        color: #e99a3d;
    }

    .technology-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 12px;
    }

    .technology-list div {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 11px 16px;
        border: 1px solid rgba(255,255,255,.15);
        border-radius: 50px;
        font-size: 12px;
        color: #eee;
    }

    .technology-list i {
        color: #efa352;
        font-size: 17px;
    }


    /* =====================================================
       GALERI
    ===================================================== */

    .gallery-section {
        background: #fffaf3;
    }

    .gallery-description {
        color: #777;
        line-height: 1.8;
        margin: 0;
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
        border-radius: 20px;
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
        transform: scale(1.07);
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        padding: 25px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        background: linear-gradient(
            transparent 35%,
            rgba(0,0,0,.75)
        );
        color: white;
    }

    .gallery-overlay span {
        font-size: 11px;
        color: #ffbd70;
        font-weight: 700;
    }

    .gallery-overlay h4 {
        font-size: 20px;
        margin: 5px 0 0;
    }


    /* =====================================================
       CAREER
    ===================================================== */

    .career-section {
        background: white;
    }

    .career-card {
        height: 100%;
        text-align: center;
        padding: 35px 20px;
        background: #fffaf3;
        border-radius: 20px;
        border: 1px solid #f5eadb;
        transition: .3s ease;
    }

    .career-card:hover {
        transform: translateY(-7px);
        background: var(--primary);
        color: white;
        box-shadow: 0 20px 35px rgba(232, 137, 25, .2);
    }

    .career-card i {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 65px;
        height: 65px;
        border-radius: 50%;
        background: white;
        color: var(--primary);
        font-size: 27px;
        margin-bottom: 18px;
    }

    .career-card h5 {
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .career-card p {
        color: #777;
        font-size: 12px;
        line-height: 1.7;
        margin: 0;
    }

    .career-card:hover p {
        color: rgba(255,255,255,.85);
    }


    /* =====================================================
       CTA
    ===================================================== */

    .cta-section {
        padding: 70px 0 85px;
        background: #fff;
    }

    .cta-box {
        position: relative;
        overflow: hidden;
        text-align: center;
        min-height: 320px;
        padding: 60px;
        border-radius: 30px;
        background: linear-gradient(
            135deg,
            #e88919,
            #c96808
        );
        color: white;
        box-shadow: 0 20px 45px rgba(232, 137, 25, .18);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cta-box > div:not(.cta-decoration) {
        position: relative;
        z-index: 2;
        width: 100%;
    }

    .cta-box span {
        display: block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        opacity: .9;
        margin-bottom: 12px;
    }

    .cta-box h2 {
        font-size: 42px;
        font-weight: 500;
        margin: 0 0 12px;
        line-height: 1.2;
    }

    .cta-box h2 strong {
        font-weight: 800;
    }

    .cta-box p {
        font-size: 14px;
        opacity: .9;
        margin-bottom: 25px;
    }

    .btn-cta {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 13px 25px;
        border-radius: 50px;
        background: white;
        color: var(--primary-dark);
        font-weight: 600;
        font-size: 13px;
        transition: .3s ease;
    }

    .btn-cta:hover {
        background: #201a14;
        color: white;
        transform: translateY(-3px);
    }

    .cta-decoration {
        position: absolute !important;
        width: 160px !important;
        height: 160px !important;
        border: 30px solid rgba(255,255,255,.08);
        border-radius: 50%;
        top: -80px;
        right: -40px;
        z-index: 1;
    }


    /* =====================================================
       FOOTER
    ===================================================== */

    .rpl-footer {
        padding: 60px 0 25px;
        background: #1e1914;
        color: white;
    }

    .rpl-footer h4 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .rpl-footer h4 i {
        color: var(--primary);
        margin-right: 8px;
    }

    .rpl-footer p {
        color: #aaa;
        font-size: 13px;
        line-height: 1.8;
    }

    .rpl-footer h5 {
        color: var(--primary);
        font-size: 15px;
        font-weight: 700;
    }

    .rpl-footer hr {
        margin: 35px 0 20px;
        border-color: rgba(255,255,255,.1);
    }

    .footer-bottom {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        color: #888;
        font-size: 11px;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 991px) {

        .section-padding {
            padding: 75px 0;
        }

        .hero-rpl {
            padding: 60px 0;
        }

        .hero-content {
            text-align: center;
            margin-bottom: 30px;
        }

        .hero-description {
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-mini-info {
            justify-content: center;
        }

        .hero-image-wrapper {
            height: 500px;
        }

        .technology-box {
            flex-direction: column;
            text-align: center;
        }

        .technology-list {
            justify-content: center;
        }

        .section-title {
            font-size: 35px;
        }
    }


    @media (max-width: 767px) {

        .section-padding {
            padding: 60px 0;
        }

        .hero-content h1 {
            font-size: 48px;
        }

        .hero-image-wrapper {
            height: 420px;
        }

        .hero-circle {
            width: 320px;
            height: 320px;
        }

        .hero-image {
            width: 340px;
        }

        .floating-card {
            padding: 10px 13px;
            font-size: 10px;
        }

        .floating-card i {
            font-size: 17px;
        }

        .card-code {
            left: 0;
            top: 60px;
        }

        .card-web {
            right: 0;
            top: 160px;
        }

        .card-app {
            left: 10px;
            bottom: 50px;
        }

        .about-image {
            padding-right: 0;
        }

        .about-image > img {
            height: 350px;
        }

        .about-list {
            grid-template-columns: 1fr;
        }

        .technology-box {
            padding: 35px 20px;
        }

        .technology-box h3 {
            font-size: 28px;
        }

        .gallery-grid {
            display: flex;
            flex-direction: column;
        }

        .gallery-item,
        .gallery-large {
            height: 280px;
        }

        .cta-box {
            padding: 60px 20px;
        }

        .cta-box h2 {
            font-size: 32px;
        }

        .footer-bottom {
            flex-direction: column;
            text-align: center;
        }
    }


    @media (max-width: 480px) {

        .hero-content h1 {
            font-size: 40px;
        }

        .hero-mini-info {
            gap: 25px;
        }

        .hero-mini-info strong {
            font-size: 20px;
        }

        .hero-image-wrapper {
            height: 360px;
        }

        .hero-circle {
            width: 270px;
            height: 270px;
        }

        .hero-image {
            width: 290px;
        }

        .section-title {
            font-size: 30px;
        }

        .experience-box {
            right: 10px;
            bottom: 15px;
        }

        .experience-box i {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }
    }

    </style>

</head>

<body>


<!-- =====================================================
     HERO
====================================================== -->

<section id="home" class="hero-rpl">

    <div class="hero-shape shape-one"></div>
    <div class="hero-shape shape-two"></div>
    <div class="hero-shape shape-three"></div>

    <div class="container position-relative">

        <div class="row align-items-center min-vh-100">

            <!-- TEXT -->

            <div class="col-lg-6 hero-content">

                <div class="small-badge">

                    <i class="bi bi-stars"></i>

                    PROGRAM KEAHLIAN

                </div>

                <h1>

                    PERHOTELAN

                    <span>HOSPITALITY</span>

                </h1>

                <p class="hero-description">

                    Belajar tentang pelayanan tamu, pengelolaan hotel,
                    tata graha, front office, dan berbagai keterampilan
                    di dunia perhotelan.

                </p>

                <div class="hero-buttons">

                    <a href="#tentang" class="btn btn-main">

                        Jelajahi Perhotelan

                        <i class="bi bi-arrow-down"></i>

                    </a>

                </div>

                <div class="hero-mini-info">

                    <div>

                        <strong>100+</strong>

                        <small>Siswa</small>

                    </div>

                    <div>

                        <strong>100+</strong>

                        <small>Project</small>

                    </div>

                    <div>

                        <strong>50+</strong>

                        <small>Kegiatan</small>

                    </div>

                </div>

            </div>


            <!-- IMAGE -->

            <div class="col-lg-6">

                <div class="hero-image-wrapper">

                    <div class="floating-card card-code">

                        <i class="bi bi-building"></i>

                        <span>HOTEL</span>

                    </div>

                    <div class="floating-card card-web">

                        <i class="bi bi-person-badge"></i>

                        <span>SERVICE</span>

                    </div>

                    <div class="floating-card card-app">

                        <i class="bi bi-star"></i>

                        <span>HOSPITALITY</span>

                    </div>

                    <div class="hero-circle"></div>

                    <img src="img/hotel.png"
                         class="hero-image"
                         alt="Siswa Perhotelan">

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     TENTANG
====================================================== -->

<section id="tentang" class="section-padding about-section">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="about-image">

                    <img src="img/hotel1.jpeg"
                         alt="Kegiatan siswa Perhotelan">

                    <div class="experience-box">

                        <i class="bi bi-building"></i>

                        <div>

                            <strong>HOTEL</strong>

                            <span>Hospitality Future</span>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="section-label">

                    TENTANG PERHOTELAN

                </div>

                <h2 class="section-title">

                    Belajar Melayani,

                    <span>Membangun Pengalaman.</span>

                </h2>

                <p class="section-text">

                    Perhotelan merupakan program keahlian yang
                    mempelajari pelayanan tamu, pengelolaan hotel,
                    serta berbagai kegiatan operasional di bidang
                    hospitality.

                </p>

                <p class="section-text">

                    Siswa tidak hanya belajar teori, tetapi juga
                    melakukan praktik pelayanan, tata graha,
                    front office, dan kegiatan perhotelan lainnya.

                </p>

                <div class="about-list">

                    <div>

                        <i class="bi bi-check-circle-fill"></i>

                        Pelayanan tamu

                    </div>

                    <div>

                        <i class="bi bi-check-circle-fill"></i>

                        Front Office

                    </div>

                    <div>

                        <i class="bi bi-check-circle-fill"></i>

                        Tata Graha

                    </div>

                    <div>

                        <i class="bi bi-check-circle-fill"></i>

                        Pengelolaan Hotel

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     KEAHLIAN
====================================================== -->

<section id="keahlian" class="section-padding skill-section">

    <div class="container">

        <div class="text-center section-heading">

            <div class="section-label">

                YANG DIPELAJARI

            </div>

            <h2 class="section-title">

                Skill yang Kamu

                <span>Pelajari di Perhotelan</span>

            </h2>

            <p>

                Berbagai keterampilan yang dapat dikembangkan
                selama belajar di jurusan Perhotelan.

            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">

                        <i class="bi bi-person-check"></i>

                    </div>

                    <h4>Pelayanan</h4>

                    <p>

                        Mempelajari cara memberikan pelayanan
                        terbaik kepada tamu.

                    </p>

                    <span>01</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">

                        <i class="bi bi-door-open"></i>

                    </div>

                    <h4>Front Office</h4>

                    <p>

                        Mempelajari proses penerimaan dan
                        pelayanan tamu hotel.

                    </p>

                    <span>02</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">

                        <i class="bi bi-house-check"></i>

                    </div>

                    <h4>Housekeeping</h4>

                    <p>

                        Mempelajari kebersihan dan pengelolaan
                        kamar serta area hotel.

                    </p>

                    <span>03</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">

                        <i class="bi bi-briefcase"></i>

                    </div>

                    <h4>Hospitality</h4>

                    <p>

                        Mengenal dunia kerja dan industri
                        hospitality secara profesional.

                    </p>

                    <span>04</span>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     GALERI
====================================================== -->

<section id="galeri" class="section-padding gallery-section">

    <div class="container">

        <div class="row align-items-end mb-5">

            <div class="col-lg-7">

                <div class="section-label">

                    GALERI KEGIATAN

                </div>

                <h2 class="section-title">

                    Aktivitas

                    <span>Siswa Perhotelan</span>

                </h2>

            </div>

            <div class="col-lg-5">

                <p class="gallery-description">

                    Belajar tidak hanya di dalam kelas.
                    Siswa Perhotelan juga aktif melakukan praktik
                    pelayanan dan berbagai kegiatan hospitality.

                </p>

            </div>

        </div>


        <div class="gallery-grid">

            <div class="gallery-item gallery-large">

                <img src="img/hotel2.jpeg"
                     alt="Kegiatan Perhotelan">

                <div class="gallery-overlay">

                    <span>01</span>

                    <h4>Praktik Pelayanan</h4>

                </div>

            </div>


            <div class="gallery-item">

                <img src="img/hotel3.jpeg"
                     alt="Kegiatan Perhotelan">

                <div class="gallery-overlay">

                    <span>02</span>

                    <h4>Praktik Hotel</h4>

                </div>

            </div>


            <div class="gallery-item">

                <img src="img/hotel4.jpg"
                     alt="Kegiatan Perhotelan">

                <div class="gallery-overlay">

                    <span>03</span>

                    <h4>Team Work</h4>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     CAREER
====================================================== -->

<section class="career-section section-padding">

    <div class="container">

        <div class="text-center section-heading">

            <div class="section-label">

                MASA DEPAN

            </div>

            <h2 class="section-title">

                Lulusan Perhotelan Bisa

                <span>Jadi Apa?</span>

            </h2>

        </div>


        <div class="row g-4">

            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-building"></i>

                    <h5>Hotel Staff</h5>

                    <p>

                        Bekerja dalam berbagai bagian
                        operasional hotel.

                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-person-badge"></i>

                    <h5>Front Office</h5>

                    <p>

                        Melayani tamu dan menangani kebutuhan
                        di bagian front office.

                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-house-check"></i>

                    <h5>Housekeeper</h5>

                    <p>

                        Menangani kebersihan dan kenyamanan
                        kamar hotel.

                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-star"></i>

                    <h5>Hospitality Staff</h5>

                    <p>

                        Bekerja dalam bidang pelayanan dan
                        industri hospitality.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     CTA
====================================================== -->

<section class="cta-section">

    <div class="container">

        <div class="cta-box">

            <div class="cta-decoration"></div>

            <div class="position-relative text-center">

                <span>READY TO SERVE?</span>

                <h2>

                    Jadilah Generasi

                    <strong>Hospitality.</strong>

                </h2>

                <p>

                    Belajar hari ini, melayani dengan profesional
                    untuk masa depan.

                </p>

                <a href="jurusan.php"
                   class="btn btn-cta">

                    Kembali ke Website

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     FOOTER
====================================================== -->

<footer class="rpl-footer">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-6">

                <h4>

                    <i class="bi bi-building"></i>

                    SMK RAINBOW BUBBLEGUM

                </h4>

                <p>

                    Perhotelan —
                    Melayani, Berinovasi, dan Berkarya
                    secara profesional.

                </p>

            </div>


            <div class="col-lg-6 text-lg-end">

                <p class="mb-2">

                    Program Keahlian

                </p>

                <h5>

                    PERHOTELAN

                </h5>

            </div>

        </div>


        <hr>


        <div class="footer-bottom">

            <span>

                © 2026 SMK Rainbow Bubblegum

            </span>

            <span>

                PERHOTELAN • Hospitality Generation

            </span>

        </div>

    </div>

</footer>



<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>