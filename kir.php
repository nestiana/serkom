<?php
// Halaman Jurusan Akuntansi
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Akuntansi | SMK Rainbow Bubblegum</title>

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
   AKUNTANSI | SMK RAINBOW BUBBLEGUM
   HTML + CSS DALAM SATU FILE
===================================================== */

/* =========================
   RESET
========================= */

:root {
    --primary: #c99a3d;
    --primary-dark: #9f7425;
    --secondary: #fff8e8;
    --dark: #292723;
    --text: #716d67;
    --white: #ffffff;
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


/* =========================
   HERO
========================= */

.hero-akuntansi {
    min-height: 100vh;
    position: relative;
    overflow: hidden;

    background:
        radial-gradient(
            circle at 80% 20%,
            rgba(201,154,61,.15),
            transparent 30%
        ),
        linear-gradient(135deg, #fffdf8, #ffffff);
}

.hero-shape {
    position: absolute;
    border-radius: 50%;
}

.shape-one {
    width: 400px;
    height: 400px;
    background: rgba(201,154,61,.08);
    top: -180px;
    right: -100px;
}

.shape-two {
    width: 220px;
    height: 220px;
    background: rgba(229,194,117,.12);
    bottom: 5%;
    left: -100px;
}

.shape-three {
    width: 80px;
    height: 80px;
    background: rgba(201,154,61,.12);
    top: 25%;
    left: 45%;
}

.hero-content {
    position: relative;
    z-index: 5;
}

.small-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 18px;
    border-radius: 50px;
    background: #fff;
    color: var(--primary-dark);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1.5px;
    box-shadow: 0 10px 30px rgba(0,0,0,.07);
    margin-bottom: 25px;
}

.hero-content h1 {
    font-size: clamp(50px, 6vw, 82px);
    line-height: .98;
    font-weight: 800;
    letter-spacing: -4px;
    margin-bottom: 25px;
}

.hero-content h1 span {
    display: block;
    color: var(--primary);
}

.hero-description {
    max-width: 570px;
    color: var(--text);
    font-size: 16px;
    line-height: 1.9;
    margin-bottom: 30px;
}

.hero-buttons {
    margin-bottom: 45px;
}

.btn-main {
    display: inline-flex;
    align-items: center;
    gap: 15px;
    background: var(--primary);
    color: #fff;
    border-radius: 50px;
    padding: 15px 25px;
    font-weight: 600;
    border: none;
    transition: .3s ease;
}

.btn-main:hover {
    background: var(--primary-dark);
    color: #fff;
    transform: translateY(-3px);
}

.hero-mini-info {
    display: flex;
    gap: 45px;
}

.hero-mini-info div {
    display: flex;
    flex-direction: column;
}

.hero-mini-info strong {
    font-size: 27px;
    font-weight: 800;
}

.hero-mini-info small {
    color: #888;
    font-size: 12px;
}


/* =========================
   HERO IMAGE
========================= */

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

.hero-circle {
    position: absolute;
    width: 470px;
    height: 470px;
    border-radius: 50%;
    background: linear-gradient(
        145deg,
        #f0dba8,
        #fff8e8
    );
}

.hero-image {
    position: relative;
    z-index: 2;
    width: 470px;
    max-height: 570px;
    object-fit: contain;
    filter: drop-shadow(0 25px 25px rgba(0,0,0,.15));
}

.floating-card {
    position: absolute;
    z-index: 5;
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 13px 18px;
    background: rgba(255,255,255,.94);
    border-radius: 15px;
    box-shadow: 0 15px 35px rgba(0,0,0,.1);
    font-size: 12px;
    font-weight: 700;
    animation: floating 3s ease-in-out infinite;
}

.floating-card i {
    color: var(--primary);
    font-size: 20px;
}

.card-accounting {
    left: 0;
    top: 28%;
}

.card-report {
    right: 0;
    top: 48%;
    animation-delay: .7s;
}

.card-money {
    left: 10%;
    bottom: 17%;
    animation-delay: 1.3s;
}

@keyframes floating {

    0%,100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-12px);
    }
}


/* =========================
   SECTION
========================= */

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


/* =========================
   ABOUT
========================= */

.about-section {
    background: #fff;
}

.about-image {
    position: relative;
    padding-right: 30px;
}

.about-image img {
    width: 100%;
    height: 520px;
    object-fit: cover;
    border-radius: 25px;
    box-shadow: 0 25px 60px rgba(0,0,0,.12);
}

.experience-box {
    position: absolute;
    right: 0;
    bottom: 30px;
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 18px 22px;
    background: #fff;
    border-radius: 17px;
    box-shadow: 0 15px 40px rgba(0,0,0,.12);
}

.experience-box i {
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

.experience-box strong,
.experience-box span {
    display: block;
}

.experience-box strong {
    font-size: 14px;
}

.experience-box span {
    color: #999;
    font-size: 11px;
}

.about-list {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-top: 30px;
}

.about-list div {
    color: #555;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 9px;
}

.about-list i {
    color: var(--primary);
}


/* =========================
   SKILL
========================= */

.skill-section {
    background: #fff9ee;
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
    border: 1px solid rgba(0,0,0,.04);
    transition: .3s ease;
}

.skill-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 45px rgba(0,0,0,.09);
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
    margin-bottom: 25px;
}

.skill-card > span {
    position: absolute;
    right: 20px;
    bottom: 15px;
    font-size: 45px;
    font-weight: 800;
    color: rgba(201,154,61,.07);
}


/* =========================
   TOOLS
========================= */

.technology-section {
    padding: 70px 0;
    background: #292723;
}

.technology-box {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
    padding: 50px;
    border-radius: 30px;
    background: linear-gradient(
        135deg,
        #c99a3d,
        #9f7425
    );
    color: #fff;
}

.technology-box small {
    font-size: 11px;
    letter-spacing: 2px;
    font-weight: 700;
    opacity: .8;
}

.technology-box h3 {
    font-size: 45px;
    font-weight: 800;
    margin: 10px 0 0;
}

.technology-box h3 span {
    color: #fff1c9;
}

.technology-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    gap: 12px;
    max-width: 550px;
}

.technology-list div {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 17px;
    border-radius: 50px;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.2);
    font-size: 12px;
    font-weight: 600;
}

.technology-list i {
    font-size: 17px;
}


/* =========================
   GALLERY
========================= */

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
        rgba(0,0,0,.75)
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


/* =========================
   PROJECT
========================= */

.project-section {
    background: #fff9ee;
}

.project-card {
    background: #fff;
    border-radius: 22px;
    overflow: hidden;
    height: 100%;
    transition: .3s ease;
    box-shadow: 0 10px 35px rgba(0,0,0,.05);
}

.project-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 45px rgba(0,0,0,.1);
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
    box-shadow: 0 8px 20px rgba(0,0,0,.12);
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


/* =========================
   CAREER
========================= */

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
    border-color: rgba(201,154,61,.3);
    box-shadow: 0 15px 40px rgba(0,0,0,.07);
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


/* =========================
   CTA
========================= */

.cta-section {
    padding: 80px 0;
    background: #fff9ee;
}

.cta-box {
    position: relative;
    padding: 75px 30px;
    text-align: center;
    border-radius: 30px;
    overflow: hidden;
    background: #292723;
    color: #fff;
}

.cta-decoration {
    position: absolute;
    width: 350px;
    height: 350px;
    border-radius: 50%;
    background: rgba(201,154,61,.2);
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
    color: #292723;
    font-weight: 600;
    transition: .3s ease;
}

.btn-cta:hover {
    background: var(--primary);
    color: #fff;
    transform: translateY(-3px);
}


/* =========================
   FOOTER
========================= */

.akuntansi-footer {
    padding: 60px 0 25px;
    background: #292723;
    color: #fff;
}

.akuntansi-footer h4 {
    font-size: 19px;
    font-weight: 700;
}

.akuntansi-footer h4 i {
    color: var(--primary);
    margin-right: 8px;
}

.akuntansi-footer p {
    color: #999;
    font-size: 13px;
    line-height: 1.8;
}

.akuntansi-footer h5 {
    color: var(--primary);
    font-weight: 700;
}

.akuntansi-footer hr {
    border-color: rgba(255,255,255,.1);
    margin: 35px 0 20px;
}

.footer-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #777;
    font-size: 11px;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 991px) {

    .hero-content {
        text-align: center;
        padding-top: 80px;
    }

    .hero-description {
        margin-left: auto;
        margin-right: auto;
    }

    .hero-buttons {
        display: flex;
        justify-content: center;
    }

    .hero-mini-info {
        justify-content: center;
    }

    .hero-image-wrapper {
        height: 500px;
        margin-top: 20px;
    }

    .hero-circle {
        width: 380px;
        height: 380px;
    }

    .hero-image {
        width: 380px;
        max-height: 460px;
    }

    .technology-box {
        flex-direction: column;
        text-align: center;
    }

    .technology-list {
        justify-content: center;
    }
}


@media (max-width: 767px) {

    .section-padding {
        padding: 70px 0;
    }

    .hero-content h1 {
        font-size: 50px;
        letter-spacing: -2px;
    }

    .hero-image-wrapper {
        height: 430px;
    }

    .hero-circle {
        width: 310px;
        height: 310px;
    }

    .hero-image {
        width: 310px;
        max-height: 390px;
    }

    .floating-card {
        padding: 10px 13px;
        font-size: 10px;
    }

    .card-accounting {
        left: 2%;
    }

    .card-report {
        right: 2%;
    }

    .about-image {
        padding-right: 0;
    }

    .about-image img {
        height: 400px;
    }

    .about-list {
        grid-template-columns: 1fr;
    }

    .technology-box {
        padding: 35px 20px;
    }

    .technology-box h3 {
        font-size: 35px;
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
        font-size: 43px;
    }

    .hero-description {
        font-size: 14px;
    }

    .hero-mini-info {
        gap: 25px;
    }

    .hero-mini-info strong {
        font-size: 22px;
    }

    .hero-image-wrapper {
        height: 360px;
    }

    .hero-circle {
        width: 260px;
        height: 260px;
    }

    .hero-image {
        width: 260px;
    }

    .floating-card {
        transform: scale(.85);
    }

    .card-accounting {
        left: -5px;
    }

    .card-report {
        right: -5px;
    }

    .card-money {
        left: 0;
    }
}

</style>
</head>

<body>


<!-- ================= HERO ================= -->

<section id="home" class="hero-akuntansi">

    <div class="hero-shape shape-one"></div>
    <div class="hero-shape shape-two"></div>
    <div class="hero-shape shape-three"></div>

    <div class="container position-relative">

        <div class="row align-items-center min-vh-100">

            <div class="col-lg-6 hero-content">

                <div class="small-badge">
                    <i class="bi bi-calculator"></i>
                    PROGRAM KEAHLIAN
                </div>

                <h1>
                    AKUNTANSI
                    <span>& KEUANGAN</span>
                </h1>

                <p class="hero-description">
                    Mempelajari pencatatan, pengelolaan, dan penyusunan
                    laporan keuangan serta membangun keterampilan
                    administrasi dan ketelitian dalam dunia kerja.
                </p>

                <div class="hero-buttons">
                    <a href="#tentang" class="btn btn-main">
                        Jelajahi Akuntansi
                        <i class="bi bi-arrow-down"></i>
                    </a>
                </div>

                <div class="hero-mini-info">

                    <div>
                        <strong>100+</strong>
                        <small>Siswa</small>
                    </div>

                    <div>
                        <strong>50+</strong>
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

                    <div class="floating-card card-accounting">
                        <i class="bi bi-calculator"></i>
                        <span>ACCOUNTING</span>
                    </div>

                    <div class="floating-card card-report">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>LAPORAN</span>
                    </div>

                    <div class="floating-card card-money">
                        <i class="bi bi-cash-stack"></i>
                        <span>FINANCE</span>
                    </div>

                    <div class="hero-circle"></div>

                    <img src="img/akl.png"
                         class="hero-image"
                         alt="Siswa Akuntansi">

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

                    <img src="img/akl1.jpeg"
                         alt="Kegiatan siswa Akuntansi">

                    <div class="experience-box">

                        <i class="bi bi-calculator"></i>

                        <div>
                            <strong>AKUNTANSI</strong>
                            <span>Finance & Administration</span>
                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="section-label">
                    TENTANG AKUNTANSI
                </div>

                <h2 class="section-title">
                    Teliti Mengelola Angka,
                    <span>Siap Mengelola Keuangan.</span>
                </h2>

                <p class="section-text">
                    Program keahlian Akuntansi mempelajari berbagai
                    keterampilan dalam pencatatan transaksi, pengelolaan
                    keuangan, administrasi, dan penyusunan laporan keuangan.
                </p>

                <p class="section-text">
                    Siswa dilatih untuk bekerja secara teliti, disiplin,
                    bertanggung jawab, dan mampu menggunakan teknologi
                    untuk membantu pekerjaan di bidang akuntansi dan keuangan.
                </p>

                <div class="about-list">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Pencatatan transaksi
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Jurnal dan buku besar
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Laporan keuangan
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Administrasi keuangan
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
                <span>Pelajari di Akuntansi</span>
            </h2>

            <p>
                Berbagai keterampilan yang membantu siswa memahami
                dunia akuntansi, keuangan, dan administrasi.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-calculator"></i>
                    </div>

                    <h4>Akuntansi</h4>

                    <p>
                        Mempelajari proses pencatatan dan pengelolaan
                        transaksi keuangan.
                    </p>

                    <span>01</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-journal-text"></i>
                    </div>

                    <h4>Pembukuan</h4>

                    <p>
                        Mempelajari jurnal, buku besar, dan proses
                        pembukuan secara sistematis.
                    </p>

                    <span>02</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                    </div>

                    <h4>Laporan Keuangan</h4>

                    <p>
                        Membuat dan memahami berbagai jenis
                        laporan keuangan.
                    </p>

                    <span>03</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-pc-display"></i>
                    </div>

                    <h4>Komputer Akuntansi</h4>

                    <p>
                        Menggunakan komputer dan aplikasi untuk
                        membantu pekerjaan akuntansi.
                    </p>

                    <span>04</span>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= TOOLS ================= -->

<section class="technology-section">

    <div class="container">

        <div class="technology-box">

            <div>

                <small>
                    DUNIA AKUNTANSI
                </small>

                <h3>
                    Count.
                    <span>Record.</span>
                    Manage.
                </h3>

            </div>


            <div class="technology-list">

                <div>
                    <i class="bi bi-calculator"></i>
                    Accounting
                </div>

                <div>
                    <i class="bi bi-file-earmark-text"></i>
                    Financial Report
                </div>

                <div>
                    <i class="bi bi-pc-display"></i>
                    Computer
                </div>

                <div>
                    <i class="bi bi-table"></i>
                    Spreadsheet
                </div>

                <div>
                    <i class="bi bi-graph-up"></i>
                    Finance
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
                    <span>Siswa Akuntansi</span>
                </h2>

            </div>

            <div class="col-lg-5">

                <p class="gallery-description">
                    Siswa Akuntansi aktif melakukan praktik pencatatan,
                    pengolahan data keuangan, penggunaan komputer,
                    serta berbagai kegiatan pembelajaran lainnya.
                </p>

            </div>

        </div>


        <div class="gallery-grid">

            <div class="gallery-item gallery-large">

                <img src="img/akl3.jpeg"
                     alt="Praktik Akuntansi">

                <div class="gallery-overlay">

                    <span>01</span>

                    <h4>Praktik Akuntansi</h4>

                </div>

            </div>


            <div class="gallery-item">

                <img src="img/akl6.jpeg"
                     alt="Komputer Akuntansi">

                <div class="gallery-overlay">

                    <span>02</span>

                    <h4>Komputer Akuntansi</h4>

                </div>

            </div>


            <div class="gallery-item">

                <img src="img/akl4.jpeg"
                     alt="Laporan Keuangan">

                <div class="gallery-overlay">

                    <span>03</span>

                    <h4>Laporan Keuangan</h4>

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
                Karya & Praktik
                <span>Siswa Akuntansi</span>
            </h2>

            <p>
                Siswa menerapkan keterampilan akuntansi melalui
                berbagai latihan dan project.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img src="img/akl8.jpeg"
                             alt="Project Pembukuan">

                        <div class="project-number">
                            01
                        </div>

                    </div>

                    <div class="project-body">

                        <small>PEMBUKUAN</small>

                        <h4>Praktik Pembukuan</h4>

                        <p>
                            Praktik membuat pencatatan transaksi
                            secara sistematis dan terstruktur.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img src="img/akl7.jpeg"
                             alt="Project Laporan">

                        <div class="project-number">
                            02
                        </div>

                    </div>

                    <div class="project-body">

                        <small>LAPORAN</small>

                        <h4>Laporan Keuangan</h4>

                        <p>
                            Membuat dan menyusun laporan keuangan
                            berdasarkan data transaksi.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img src="img/akl9.jpeg"
                             alt="Komputer Akuntansi">

                        <div class="project-number">
                            03
                        </div>

                    </div>

                    <div class="project-body">

                        <small>KOMPUTER</small>

                        <h4>Computer Accounting</h4>

                        <p>
                            Mengolah data keuangan menggunakan
                            komputer dan aplikasi pendukung.
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
                Lulusan Akuntansi Bisa
                <span>Jadi Apa?</span>
            </h2>

        </div>


        <div class="row g-4">

            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-calculator"></i>

                    <h5>Staff Akuntansi</h5>

                    <p>
                        Membantu proses pencatatan dan pengelolaan
                        data keuangan.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-file-earmark-text"></i>

                    <h5>Administrasi</h5>

                    <p>
                        Mengelola dokumen dan administrasi perusahaan.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-shop"></i>

                    <h5>Wirausaha</h5>

                    <p>
                        Membangun dan mengelola usaha sendiri.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-graph-up"></i>

                    <h5>Finance Staff</h5>

                    <p>
                        Membantu pengelolaan keuangan dalam perusahaan.
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
                    READY TO COUNT?
                </span>

                <h2>
                    Build Your
                    <strong>Future.</strong>
                </h2>

                <p>
                    Belajar mengelola angka, membangun masa depan.
                </p>

                <a href="eskul.php" class="btn btn-cta">
                    Kembali ke Website
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

        </div>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer class="akuntansi-footer">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-6">

                <h4>
                    <i class="bi bi-calculator"></i>
                    SMK RAINBOW BUBBLEGUM
                </h4>

                <p>
                    Akuntansi & Keuangan —
                    Teliti, Profesional, dan Siap Menghadapi
                    Dunia Kerja.
                </p>

            </div>

            <div class="col-lg-6 text-lg-end">

                <p class="mb-2">
                    Program Keahlian
                </p>

                <h5>
                    AKUNTANSI & KEUANGAN
                </h5>

            </div>

        </div>

        <hr>

        <div class="footer-bottom">

            <span>
                © 2026 SMK Rainbow Bubblegum
            </span>

            <span>
                AKUNTANSI • FINANCE • FUTURE
            </span>

        </div>

    </div>

</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>