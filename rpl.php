<?php
// Halaman Jurusan Rekayasa Perangkat Lunak
?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RPL | SMK Rainbow Bubblegum</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<style>

/* =====================================================
   GENERAL
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
    font-family: "Poppins", sans-serif;
    color: #20243a;
    background: #ffffff;
    overflow-x: hidden;
}

a {
    text-decoration: none;
}

.section-padding {
    padding: 100px 0;
}


/* =====================================================
   NAVBAR
===================================================== */

.rpl-navbar {
    background: rgba(255, 255, 255, 0.90);
    backdrop-filter: blur(15px);
    box-shadow: 0 5px 30px rgba(35, 30, 80, 0.08);
    padding: 15px 0;
    transition: 0.3s;
}

.navbar-brand {
    font-size: 18px;
    font-weight: 600;
    color: #252642;
    display: flex;
    align-items: center;
    gap: 10px;
}

.navbar-brand b {
    color: #635bff;
}

.logo-icon {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: linear-gradient(135deg, #665cff, #a855f7);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.nav-link {
    color: #45465f !important;
    font-size: 14px;
    font-weight: 500;
    margin-left: 22px;
    transition: 0.3s;
}

.nav-link:hover,
.nav-link.active {
    color: #635bff !important;
}

.btn-back {
    background: #635bff;
    color: white !important;
    border-radius: 50px;
    padding: 10px 20px;
    font-size: 13px;
}

.btn-back:hover {
    background: #4c45d8;
}

.navbar-toggler {
    border: none;
    font-size: 25px;
    color: #635bff;
}


/* =====================================================
   HERO
===================================================== */

.hero-rpl {
    min-height: 100vh;

    background:
        radial-gradient(
            circle at 80% 20%,
            rgba(168, 85, 247, 0.22),
            transparent 30%
        ),
        radial-gradient(
            circle at 10% 90%,
            rgba(99, 91, 255, 0.15),
            transparent 30%
        ),
        #f7f7ff;

    position: relative;
    overflow: hidden;
}

.hero-content {
    position: relative;
    z-index: 5;
}

.small-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 8px 16px;

    border-radius: 50px;

    background: white;
    color: #635bff;

    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;

    box-shadow: 0 8px 25px rgba(65, 60, 150, 0.08);

    margin-bottom: 20px;
}

.hero-content h1 {
    font-size: clamp(45px, 6vw, 78px);
    line-height: 1.02;
    font-weight: 800;
    letter-spacing: -3px;
    color: #252642;
    margin-bottom: 25px;
}

.hero-content h1 span {
    display: block;

    background: linear-gradient(
        90deg,
        #635bff,
        #a855f7,
        #ec4899
    );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-description {
    max-width: 560px;
    color: #6b6d82;
    line-height: 1.9;
    font-size: 15px;
}

.hero-buttons {
    display: flex;
    gap: 12px;
    margin-top: 30px;
}

.btn-main {
    background: linear-gradient(
        135deg,
        #635bff,
        #8b5cf6
    );

    color: white;

    padding: 14px 25px;

    border-radius: 50px;

    font-weight: 600;

    box-shadow: 0 12px 30px rgba(99, 91, 255, 0.25);

    transition: 0.3s;
}

.btn-main:hover {
    color: white;
    transform: translateY(-3px);

    box-shadow:
        0 15px 35px rgba(99, 91, 255, 0.35);
}

.btn-outline-main {
    border: 1px solid #d8d8eb;
    color: #46475d;

    padding: 14px 25px;

    border-radius: 50px;

    background: white;
    font-weight: 600;

    transition: 0.3s;
}

.btn-outline-main:hover {
    border-color: #635bff;
    color: #635bff;
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
    color: #292a45;
}

.hero-mini-info small {
    color: #85869a;
    font-size: 11px;
}


/* =====================================================
   HERO IMAGE
===================================================== */

.hero-image-wrapper {
    position: relative;

    width: 100%;
    height: 600px;

    display: flex;
    justify-content: center;
    align-items: center;
}

.hero-circle {
    position: absolute;

    width: 450px;
    height: 450px;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            #dcd9ff,
            #f4d8ff
        );
}

.hero-image {
    position: relative;
    z-index: 2;

    width: 85%;
    max-width: 500px;

    filter:
        drop-shadow(
            0 30px 30px rgba(53, 46, 130, 0.18)
        );

    animation:
        floating 5s ease-in-out infinite;
}

@keyframes floating {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-15px);
    }
}

.floating-card {
    position: absolute;
    z-index: 5;

    background: rgba(255, 255, 255, 0.95);

    backdrop-filter: blur(10px);

    border-radius: 15px;

    padding: 12px 18px;

    display: flex;
    align-items: center;

    gap: 10px;

    box-shadow:
        0 15px 35px rgba(48, 42, 120, 0.12);

    font-size: 11px;
    font-weight: 700;
}

.floating-card i {
    font-size: 20px;
    color: #635bff;
}

.card-code {
    top: 17%;
    left: 3%;

    animation:
        floatingSmall 4s infinite ease-in-out;
}

.card-web {
    right: 2%;
    top: 35%;

    animation:
        floatingSmall 4.5s infinite ease-in-out;
}

.card-app {
    left: 10%;
    bottom: 18%;

    animation:
        floatingSmall 5s infinite ease-in-out;
}

@keyframes floatingSmall {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-10px);
    }
}

.hero-shape {
    position: absolute;
    border-radius: 50%;
    filter: blur(1px);
}

.shape-one {
    width: 100px;
    height: 100px;

    background: #f0abfc;

    top: 15%;
    right: 8%;
}

.shape-two {
    width: 50px;
    height: 50px;

    background: #818cf8;

    bottom: 15%;
    right: 45%;
}

.shape-three {
    width: 35px;
    height: 35px;

    background: #f9a8d4;

    top: 30%;
    left: 45%;
}


/* =====================================================
   SECTION
===================================================== */

.section-label {
    color: #635bff;

    font-size: 11px;
    font-weight: 800;

    letter-spacing: 2px;

    margin-bottom: 12px;
}

.section-title {
    font-size: clamp(32px, 4vw, 48px);

    line-height: 1.2;

    font-weight: 800;

    color: #252642;
}

.section-title span {
    display: block;

    background:
        linear-gradient(
            90deg,
            #635bff,
            #a855f7
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}


/* =====================================================
   ABOUT
===================================================== */

.about-section {
    background: white;
}

.about-image {
    position: relative;
    padding: 20px;
}

.about-image img {
    width: 100%;
    height: 480px;

    object-fit: cover;

    border-radius: 30px;

    box-shadow:
        0 25px 60px rgba(44, 40, 100, 0.15);
}

.experience-box {
    position: absolute;

    bottom: 0;
    right: 0;

    background: #252642;

    color: white;

    border-radius: 20px;

    padding: 20px 25px;

    display: flex;
    align-items: center;

    gap: 15px;

    box-shadow:
        0 20px 40px rgba(30, 29, 70, 0.25);
}

.experience-box i {
    font-size: 35px;
    color: #a78bfa;
}

.experience-box strong,
.experience-box span {
    display: block;
}

.experience-box strong {
    font-size: 20px;
}

.experience-box span {
    font-size: 11px;
    color: #b8b8ca;
}

.section-text {
    color: #77798d;
    line-height: 1.9;
    font-size: 14px;
}

.about-list {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 15px;

    margin-top: 25px;
}

.about-list div {
    font-size: 13px;
    font-weight: 600;

    color: #45465b;
}

.about-list i {
    color: #635bff;
    margin-right: 7px;
}


/* =====================================================
   SKILL
===================================================== */

.skill-section {
    background: #f7f7ff;
}

.section-heading {
    max-width: 700px;

    margin: 0 auto 50px;
}

.section-heading p {
    color: #77798d;

    margin-top: 15px;

    font-size: 14px;
}

.skill-card {
    background: white;

    padding: 30px;

    border-radius: 25px;

    min-height: 300px;

    position: relative;

    overflow: hidden;

    box-shadow:
        0 10px 30px rgba(47, 43, 110, 0.05);

    transition: 0.4s;
}

.skill-card:hover {
    transform: translateY(-10px);

    box-shadow:
        0 25px 50px rgba(70, 65, 160, 0.15);
}

.skill-icon {
    width: 65px;
    height: 65px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            #635bff,
            #a855f7
        );

    color: white;

    font-size: 28px;

    margin-bottom: 25px;
}

.skill-card h4 {
    font-size: 19px;
    font-weight: 700;
}

.skill-card p {
    color: #85869a;

    font-size: 13px;

    line-height: 1.8;
}

.skill-card > span {
    position: absolute;

    right: 20px;
    bottom: 10px;

    font-size: 65px;

    font-weight: 800;

    color: #f0effb;
}


/* =====================================================
   TECHNOLOGY
===================================================== */

.technology-section {
    padding: 60px 0;

    background: #252642;
}

.technology-box {
    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 40px;
}

.technology-box small {
    color: #aaaac0;

    font-size: 10px;

    letter-spacing: 2px;
}

.technology-box h3 {
    color: white;

    font-size: 30px;

    margin: 10px 0 0;
}

.technology-box h3 span {
    color: #a78bfa;
}

.technology-list {
    display: flex;

    flex-wrap: wrap;

    gap: 10px;
}

.technology-list div {
    padding: 12px 18px;

    border: 1px solid rgba(255,255,255,0.12);

    border-radius: 50px;

    color: white;

    font-size: 12px;

    background:
        rgba(255,255,255,0.05);
}

.technology-list i {
    color: #a78bfa;

    margin-right: 5px;
}


/* =====================================================
   GALLERY
===================================================== */

.gallery-section {
    background: white;
}

.gallery-description {
    color: #77798d;

    font-size: 14px;

    line-height: 1.8;
}

.gallery-grid {
    display: grid;

    grid-template-columns: 1.5fr 1fr;

    grid-template-rows:
        260px 260px;

    gap: 20px;
}

.gallery-item {
    position: relative;

    overflow: hidden;

    border-radius: 25px;
}

.gallery-large {
    grid-row: span 2;
}

.gallery-item img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: 0.6s;
}

.gallery-item:hover img {
    transform: scale(1.08);
}

.gallery-overlay {
    position: absolute;

    inset: auto 0 0 0;

    padding: 25px;

    color: white;

    background:
        linear-gradient(
            transparent,
            rgba(15, 14, 40, 0.85)
        );
}

.gallery-overlay span {
    font-size: 11px;
    color: #c4b5fd;
}

.gallery-overlay h4 {
    margin: 5px 0 0;

    font-size: 18px;
}


/* =====================================================
   PROJECT
===================================================== */

.project-section {
    background: #f7f7ff;
}

.project-card {
    background: white;

    border-radius: 25px;

    overflow: hidden;

    box-shadow:
        0 10px 30px rgba(47, 43, 110, 0.06);

    transition: 0.4s;
}

.project-card:hover {
    transform: translateY(-8px);

    box-shadow:
        0 25px 50px rgba(70, 65, 160, 0.15);
}

.project-image {
    height: 250px;

    position: relative;

    overflow: hidden;
}

.project-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: 0.5s;
}

.project-card:hover .project-image img {
    transform: scale(1.08);
}

.project-number {
    position: absolute;

    top: 15px;
    left: 15px;

    width: 42px;
    height: 42px;

    border-radius: 50%;

    background: white;

    display: flex;

    align-items: center;
    justify-content: center;

    color: #635bff;

    font-weight: 700;
}

.project-body {
    padding: 25px;
}

.project-body small {
    color: #635bff;

    font-size: 9px;

    font-weight: 800;

    letter-spacing: 1.5px;
}

.project-body h4 {
    margin: 8px 0;

    font-size: 20px;
}

.project-body p {
    color: #85869a;

    font-size: 13px;

    line-height: 1.8;
}

.project-body a {
    color: #635bff;

    font-size: 12px;

    font-weight: 700;
}

.project-body a i {
    margin-left: 5px;
}


/* =====================================================
   CAREER
===================================================== */

.career-section {
    background: white;
}

.career-card {
    padding: 30px 20px;

    border: 1px solid #eeeef7;

    border-radius: 20px;

    text-align: center;

    transition: 0.4s;
}

.career-card:hover {
    transform: translateY(-8px);

    border-color: #c8c3ff;

    box-shadow:
        0 20px 40px rgba(70, 65, 160, 0.08);
}

.career-card i {
    font-size: 40px;

    color: #635bff;
}

.career-card h5 {
    margin-top: 15px;

    font-size: 16px;
}

.career-card p {
    color: #85869a;

    font-size: 12px;
}


/* =====================================================
   CTA
===================================================== */

.cta-section {
    padding: 40px 0 100px;

    background: white;
}

.cta-box {
    position: relative;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            #635bff,
            #8b5cf6,
            #c026d3
        );

    border-radius: 35px;

    padding: 70px;

    color: white;
}

.cta-box span {
    font-size: 10px;

    letter-spacing: 3px;

    font-weight: 700;
}

.cta-box h2 {
    font-size: clamp(35px, 5vw, 60px);

    font-weight: 800;

    margin: 15px 0;
}

.cta-box h2 strong {
    color: #f5d0fe;
}

.cta-box p {
    color: #eee8ff;
}

/* TOMBOL KEMBALI KE WEBSITE */
.btn-cta {
    margin-top: 15px;

    background: white;

    color: #635bff;

    border-radius: 50px;

    padding: 14px 25px;

    font-weight: 700;

    display: block;
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
}

.btn-cta:hover {
    background: #252642;

    color: white;
}

.cta-decoration {
    position: absolute;

    width: 350px;
    height: 350px;

    border: 70px solid rgba(255,255,255,0.08);

    border-radius: 50%;

    right: -100px;
    top: -150px;
}


/* =====================================================
   FOOTER
===================================================== */

.rpl-footer {
    background: #202139;

    color: white;

    padding: 60px 0 25px;
}

.rpl-footer h4 {
    font-size: 18px;
}

.rpl-footer h4 i {
    color: #a78bfa;

    margin-right: 8px;
}

.rpl-footer p {
    color: #999ab2;

    font-size: 12px;

    line-height: 1.8;
}

.rpl-footer h5 {
    color: #c4b5fd;

    font-size: 14px;
}

.rpl-footer hr {
    border-color: rgba(255,255,255,0.1);

    margin: 35px 0 20px;
}

.footer-bottom {
    display: flex;

    justify-content: space-between;

    color: #77788e;

    font-size: 11px;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 991px) {

    .nav-link {
        margin-left: 0;

        padding: 10px 0 !important;
    }

    .hero-rpl {
        padding-top: 80px;
    }

    .hero-image-wrapper {
        height: 450px;
    }

    .hero-circle {
        width: 350px;
        height: 350px;
    }

    .technology-box {
        flex-direction: column;

        align-items: flex-start;
    }

    .cta-box {
        padding: 50px 35px;
    }
}


@media (max-width: 767px) {

    .section-padding {
        padding: 70px 0;
    }

    .hero-content h1 {
        letter-spacing: -2px;
    }

    .hero-mini-info {
        gap: 25px;
    }

    .hero-image-wrapper {
        height: 380px;

        margin-top: 20px;
    }

    .hero-circle {
        width: 280px;
        height: 280px;
    }

    .floating-card {
        transform: scale(0.8);
    }

    .about-image img {
        height: 350px;
    }

    .about-list {
        grid-template-columns: 1fr;
    }

    .gallery-grid {
        display: block;
    }

    .gallery-item {
        height: 300px;

        margin-bottom: 20px;
    }

    .gallery-large {
        height: 400px;
    }

    .footer-bottom {
        flex-direction: column;

        gap: 10px;
    }

    .cta-box {
        border-radius: 25px;

        padding: 45px 25px;
    }
}

</style>

</head>

<body>


<!-- ================= HERO ================= -->

<section id="home" class="hero-rpl">

    <div class="hero-shape shape-one"></div>
    <div class="hero-shape shape-two"></div>
    <div class="hero-shape shape-three"></div>

    <div class="container position-relative">

        <div class="row align-items-center min-vh-100">

            <div class="col-lg-6 hero-content">

                <div class="small-badge">
                    <i class="bi bi-stars"></i>
                    PROGRAM KEAHLIAN
                </div>

                <h1>
                    REKAYASA
                    <span>PERANGKAT LUNAK</span>
                </h1>

                <p class="hero-description">
                    Belajar coding, membuat website, aplikasi,
                    database, dan teknologi digital untuk menciptakan
                    karya yang kreatif dan inovatif.
                </p>

                <div class="hero-buttons">

                    <a
                        href="#tentang"
                        class="btn btn-main"
                    >
                        Jelajahi RPL
                        <i class="bi bi-arrow-down"></i>
                    </a>

                </div>

                <div class="hero-mini-info">

                    <div>
                        <strong>100+</strong>
                        <small>Siswa</small>
                    </div>

                    <div>
                        <strong>70+</strong>
                        <small>Prestasi</small>
                    </div>

                    <div>
                        <strong>100+</strong>
                        <small>Project</small>
                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="hero-image-wrapper">

                    <div class="floating-card card-code">
                        <i class="bi bi-code-square"></i>
                        <span>CODING</span>
                    </div>

                    <div class="floating-card card-web">
                        <i class="bi bi-globe2"></i>
                        <span>WEB</span>
                    </div>

                    <div class="floating-card card-app">
                        <i class="bi bi-phone"></i>
                        <span>APP</span>
                    </div>

                    <div class="hero-circle"></div>

                    <img
                        src="img/rpl.png"
                        class="hero-image"
                        alt="Siswa RPL"
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
                        src="img/rpl11.jpeg"
                        alt="Kegiatan siswa RPL"
                    >

                    <div class="experience-box">

                        <i class="bi bi-laptop"></i>

                        <div>

                            <strong>RPL</strong>

                            <span>Future Digital</span>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="section-label">
                    TENTANG RPL
                </div>

                <h2 class="section-title">

                    Belajar Teknologi,

                    <span>
                        Menciptakan Masa Depan.
                    </span>

                </h2>

                <p class="section-text">

                    Rekayasa Perangkat Lunak atau RPL adalah program
                    keahlian yang mempelajari proses pembuatan dan
                    pengembangan perangkat lunak.

                </p>

                <p class="section-text">

                    Siswa tidak hanya belajar teori, tetapi juga
                    mengembangkan berbagai project seperti website,
                    aplikasi, database, dan sistem digital.

                </p>

                <div class="about-list">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Belajar pemrograman
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Membuat website
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Membuat aplikasi
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Mengelola database
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= KEAHLIAN ================= -->

<section id="keahlian" class="section-padding skill-section">

    <div class="container">

        <div class="text-center section-heading">

            <div class="section-label">
                YANG DIPELAJARI
            </div>

            <h2 class="section-title">

                Skill yang Kamu

                <span>
                    Pelajari di RPL
                </span>

            </h2>

            <p>
                Berbagai kemampuan digital yang dapat dikembangkan
                selama belajar di jurusan RPL.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-code-slash"></i>
                    </div>

                    <h4>Pemrograman</h4>

                    <p>
                        Mempelajari dasar dan logika pemrograman
                        untuk membuat berbagai aplikasi.
                    </p>

                    <span>01</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-window"></i>
                    </div>

                    <h4>Web Development</h4>

                    <p>
                        Membuat website menggunakan HTML,
                        CSS, JavaScript, PHP, dan teknologi lainnya.
                    </p>

                    <span>02</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-database"></i>
                    </div>

                    <h4>Database</h4>

                    <p>
                        Belajar menyimpan, mengatur, dan
                        mengelola data menggunakan database.
                    </p>

                    <span>03</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-phone"></i>
                    </div>

                    <h4>Aplikasi</h4>

                    <p>
                        Mengenal proses pengembangan aplikasi
                        berbasis mobile maupun desktop.
                    </p>

                    <span>04</span>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= TECHNOLOGY ================= -->

<section class="technology-section">

    <div class="container">

        <div class="technology-box">

            <div>

                <small>
                    TEKNOLOGI YANG DIGUNAKAN
                </small>

                <h3>
                    Explore.
                    <span>Code.</span>
                    Create.
                </h3>

            </div>


            <div class="technology-list">

                <div>
                    <i class="bi bi-filetype-html"></i>
                    HTML
                </div>

                <div>
                    <i class="bi bi-filetype-css"></i>
                    CSS
                </div>

                <div>
                    <i class="bi bi-filetype-js"></i>
                    JavaScript
                </div>

                <div>
                    <i class="bi bi-filetype-php"></i>
                    PHP
                </div>

                <div>
                    <i class="bi bi-database"></i>
                    MySQL
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

                    <span>
                        Siswa RPL
                    </span>

                </h2>

            </div>


            <div class="col-lg-5">

                <p class="gallery-description">

                    Belajar tidak hanya di dalam kelas.
                    Siswa RPL juga aktif mengerjakan project,
                    berdiskusi, dan mengembangkan kreativitas.

                </p>

            </div>

        </div>


        <div class="gallery-grid">

            <div class="gallery-item gallery-large">

                <img
                    src="img/rpl2.jpeg"
                    alt="Kegiatan RPL"
                >

                <div class="gallery-overlay">

                    <span>01</span>

                    <h4>Belajar Coding</h4>

                </div>

            </div>


            <div class="gallery-item">

                <img
                    src="img/rpl3.jpeg"
                    alt="Kegiatan RPL"
                >

                <div class="gallery-overlay">

                    <span>02</span>

                    <h4>Project Siswa</h4>

                </div>

            </div>


            <div class="gallery-item">

                <img
                    src="img/rpl4.jpeg"
                    alt="Kegiatan RPL"
                >

                <div class="gallery-overlay">

                    <span>03</span>

                    <h4>Team Work</h4>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= PROJECT ================= -->

<section id="project" class="section-padding project-section">

    <div class="container">

        <div class="text-center section-heading">

            <div class="section-label">
                STUDENT PROJECT
            </div>

            <h2 class="section-title">

                Karya Kreatif

                <span>
                    Siswa RPL
                </span>

            </h2>

            <p>
                Project menjadi tempat siswa menerapkan
                kemampuan yang sudah dipelajari.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img
                            src="img/rpl8.png"
                            alt="Project Website"
                        >

                        <div class="project-number">
                            01
                        </div>

                    </div>

                    <div class="project-body">

                        <small>
                            WEB DEVELOPMENT
                        </small>

                        <h4>
                            Website Sekolah
                        </h4>

                        <p>
                            Website informasi sekolah dengan
                            tampilan modern dan responsif.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img
                            src="img/rpl9.jpeg"
                            alt="Project Aplikasi"
                        >

                        <div class="project-number">
                            02
                        </div>

                    </div>

                    <div class="project-body">

                        <small>
                            MOBILE APP
                        </small>

                        <h4>
                            Aplikasi Digital
                        </h4>

                        <p>
                            Aplikasi sederhana yang dibuat
                            untuk membantu kebutuhan sehari-hari.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img
                            src="img/rpl7.jpeg"
                            alt="Project IoT"
                        >

                        <div class="project-number">
                            03
                        </div>

                    </div>

                    <div class="project-body">

                        <small>
                            TECHNOLOGY
                        </small>

                        <h4>
                            Project IoT
                        </h4>

                        <p>
                            Menggabungkan software dan teknologi
                            untuk menciptakan sistem pintar.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= CAREER ================= -->

<section class="career-section section-padding">

    <div class="container">

        <div class="text-center section-heading">

            <div class="section-label">
                MASA DEPAN
            </div>

            <h2 class="section-title">

                Lulusan RPL Bisa

                <span>
                    Jadi Apa?
                </span>

            </h2>

        </div>


        <div class="row g-4">

            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-laptop"></i>

                    <h5>
                        Web Developer
                    </h5>

                    <p>
                        Membuat dan mengembangkan website.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-phone"></i>

                    <h5>
                        App Developer
                    </h5>

                    <p>
                        Membuat aplikasi mobile.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-braces"></i>

                    <h5>
                        Programmer
                    </h5>

                    <p>
                        Mengembangkan berbagai program.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-palette"></i>

                    <h5>
                        UI/UX Designer
                    </h5>

                    <p>
                        Mendesain tampilan aplikasi.
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
                    READY TO CREATE?
                </span>

                <h2>

                    Jadilah Generasi

                    <strong>
                        Digital.
                    </strong>

                </h2>

                <p>
                    Belajar hari ini, berkarya untuk masa depan.
                </p>

                <!-- TOMBOL DI TENGAH -->
                <div class="text-center">

                    <a
                        href="jurusan.php"
                        class="btn btn-cta"
                    >
                        Kembali ke Website

                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer class="rpl-footer">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-6">

                <h4>

                    <i class="bi bi-code-slash"></i>

                    SMK RAINBOW BUBBLEGUM

                </h4>

                <p>

                    Rekayasa Perangkat Lunak —
                    Berkarya, Berinovasi, dan Menguasai Teknologi.

                </p>

            </div>


            <div class="col-lg-6 text-lg-end">

                <p class="mb-2">
                    Program Keahlian
                </p>

                <h5>
                    REKAYASA PERANGKAT LUNAK
                </h5>

            </div>

        </div>


        <hr>


        <div class="footer-bottom">

            <span>
                © 2026 SMK Rainbow Bubblegum
            </span>

            <span>
                RPL • Digital Generation
            </span>

        </div>

    </div>

</footer>


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>