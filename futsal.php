<?php
// Halaman Program Keahlian Desain Komunikasi Visual (DKV)
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DKV | SMK Rainbow Bubblegum</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
    :root { 
        --primary: #ff5b35; 
        --primary-dark: #d93618; 
        --secondary: #fff1ec; 
        --dark: #171717; 
        --text: #6f6f6f; 
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
    
    .section-padding { 
        padding: 100px 0; 
    } 
    
    
    /* ================= HERO ================= */ 
    
    .hero-dkv { 
        min-height: 100vh; 
        position: relative; 
        overflow: hidden; 
        background: 
            radial-gradient( 
                circle at 85% 20%, 
                rgba(255,91,53,.15), 
                transparent 30% 
            ), 
            linear-gradient(135deg, #fff, #fff8f5); 
    } 
    
    .shape { 
        position: absolute; 
        border-radius: 50%; 
    } 
    
    .shape-1 { 
        width: 450px; 
        height: 450px; 
        background: rgba(255,91,53,.07); 
        top: -200px; 
        right: -100px; 
    } 
    
    .shape-2 { 
        width: 220px; 
        height: 220px; 
        background: rgba(0,0,0,.04); 
        left: -100px; 
        bottom: 5%; 
    } 
    
    .shape-3 { 
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
        box-shadow: 0 10px 30px rgba(0,0,0,.07); 
        margin-bottom: 25px; 
    } 
    
    .hero-content h1 { 
        font-size: clamp(48px, 6vw, 78px); 
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
        background: #171717; 
    } 
    
    .hero-image { 
        position: relative; 
        z-index: 2; 
        width: 460px; 
        max-height: 570px; 
        object-fit: contain; 
        filter: drop-shadow(0 25px 30px rgba(0,0,0,.2)); 
    } 
    
    .floating-card { 
        position: absolute; 
        z-index: 5; 
        display: flex; 
        align-items: center; 
        gap: 9px; 
        padding: 13px 18px; 
        background: rgba(255,255,255,.95); 
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
    
    .card-design { 
        left: 0; 
        top: 27%; 
    } 
    
    .card-photo { 
        right: 0; 
        top: 47%; 
        animation-delay: .7s; 
    } 
    
    .card-video { 
        left: 10%; 
        bottom: 16%; 
        animation-delay: 1.2s; 
    } 
    
    @keyframes floating { 
    
        0%,100% { 
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
        box-shadow: 0 25px 60px rgba(0,0,0,.12); 
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
        box-shadow: 0 15px 40px rgba(0,0,0,.12); 
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
        background: #f8f8f8; 
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
    } 
    
    .skill-card > span { 
        position: absolute; 
        right: 20px; 
        bottom: 15px; 
        font-size: 45px; 
        font-weight: 800; 
        color: rgba(255,91,53,.07); 
    } 
    
    
    /* ================= TOOLS ================= */ 
    
    .tools-section { 
        padding: 70px 0; 
        background: #171717; 
    } 
    
    .tools-box { 
        display: flex; 
        align-items: center; 
        justify-content: space-between; 
        gap: 40px; 
        padding: 50px; 
        border-radius: 30px; 
        background: var(--primary); 
        color: #fff; 
    } 
    
    .tools-box small { 
        font-size: 11px; 
        letter-spacing: 2px; 
        font-weight: 700; 
        opacity: .8; 
    } 
    
    .tools-box h3 { 
        font-size: 45px; 
        font-weight: 800; 
        margin: 10px 0 0; 
    } 
    
    .tools-box h3 span { 
        color: #ffd8ce; 
    } 
    
    .tools-list { 
        display: flex; 
        flex-wrap: wrap; 
        justify-content: flex-end; 
        gap: 12px; 
        max-width: 550px; 
    } 
    
    .tools-list div { 
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
            rgba(0,0,0,.8) 
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
        background: #f8f8f8; 
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
        border-color: rgba(255,91,53,.3); 
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
    
    
    /* ================= CTA ================= */ 
    
    .cta-section { 
        padding: 80px 0; 
        background: #f8f8f8; 
    } 
    
    .cta-box { 
        position: relative; 
        padding: 75px 30px; 
        text-align: center; 
        border-radius: 30px; 
        overflow: hidden; 
        background: #171717; 
        color: #fff; 
    } 
    
    .cta-circle { 
        position: absolute; 
        width: 350px; 
        height: 350px; 
        border-radius: 50%; 
        background: rgba(255,91,53,.18); 
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
        color: #171717; 
        font-weight: 600; 
        transition: .3s ease; 
    } 
    
    .btn-cta:hover { 
        background: var(--primary); 
        color: #fff; 
        transform: translateY(-3px); 
    } 
    
    
    /* ================= FOOTER ================= */ 
    
    .dkv-footer { 
        padding: 60px 0 25px; 
        background: #171717; 
        color: #fff; 
    } 
    
    .dkv-footer h4 { 
        font-size: 19px; 
        font-weight: 700; 
    } 
    
    .dkv-footer h4 i { 
        color: var(--primary); 
        margin-right: 8px; 
    } 
    
    .dkv-footer p { 
        color: #999; 
        font-size: 13px; 
        line-height: 1.8; 
    } 
    
    .dkv-footer h5 { 
        color: var(--primary); 
        font-weight: 700; 
    } 
    
    .dkv-footer hr { 
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
    
        .tools-box { 
            flex-direction: column; 
            text-align: center; 
        } 
    
        .tools-list { 
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
<section class="hero-dkv">

    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>

    <div class="container position-relative">

        <div class="row align-items-center min-vh-100">

            <div class="col-lg-6 hero-content">

                <div class="small-badge">
                    <i class="bi bi-palette-fill"></i>
                    PROGRAM KEAHLIAN
                </div>

                <h1>
                    DESAIN
                    <span>KOMUNIKASI VISUAL</span>
                </h1>

                <p>
                    Mengembangkan kreativitas melalui desain grafis,
                    ilustrasi, fotografi, videografi, branding,
                    dan berbagai karya visual yang menarik.
                </p>

                <a href="#tentang" class="btn btn-main">
                    Jelajahi DKV
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

                    <div class="floating-card card-design">
                        <i class="bi bi-vector-pen"></i>
                        <span>DESIGN</span>
                    </div>

                    <div class="floating-card card-photo">
                        <i class="bi bi-camera"></i>
                        <span>PHOTO</span>
                    </div>

                    <div class="floating-card card-video">
                        <i class="bi bi-camera-reels"></i>
                        <span>VIDEO</span>
                    </div>

                    <img src="img/dkvv.png"
                         class="hero-image"
                         alt="Siswa DKV">

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

                    <img src="img/dkv1.png"
                         alt="Kegiatan siswa DKV">

                    <div class="about-card">

                        <i class="bi bi-palette-fill"></i>

                        <div>
                            <strong>DESAIN KREATIF</strong>
                            <span>Visual • Digital • Branding</span>
                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="section-label">
                    TENTANG DKV
                </div>

                <h2 class="section-title">
                    Ubah Ide Menjadi
                    <span>Karya Visual.</span>
                </h2>

                <p class="section-text">
                    Desain Komunikasi Visual atau DKV merupakan program
                    keahlian yang mempelajari cara menyampaikan pesan
                    melalui berbagai bentuk komunikasi visual.
                </p>

                <p class="section-text">
                    Siswa belajar mengembangkan ide, membuat konsep,
                    mengolah visual, serta menghasilkan karya kreatif
                    menggunakan berbagai media dan teknologi digital.
                </p>

                <div class="check-list">

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Desain Grafis
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Ilustrasi
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Fotografi
                    </div>

                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        Videografi
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
                <span>Anak DKV</span>
            </h2>

            <p>
                Berbagai kemampuan yang dipelajari untuk menghasilkan
                karya visual yang kreatif dan komunikatif.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-vector-pen"></i>
                    </div>

                    <h4>Desain Grafis</h4>

                    <p>
                        Membuat desain visual untuk berbagai kebutuhan
                        digital maupun cetak.
                    </p>

                    <span>01</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-brush"></i>
                    </div>

                    <h4>Ilustrasi</h4>

                    <p>
                        Mengembangkan ide menjadi ilustrasi dan
                        karya visual yang menarik.
                    </p>

                    <span>02</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-camera"></i>
                    </div>

                    <h4>Fotografi</h4>

                    <p>
                        Mempelajari teknik pengambilan dan pengolahan
                        foto secara kreatif.
                    </p>

                    <span>03</span>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="skill-card">

                    <div class="skill-icon">
                        <i class="bi bi-camera-reels"></i>
                    </div>

                    <h4>Videografi</h4>

                    <p>
                        Membuat dan mengolah video untuk menyampaikan
                        pesan secara visual.
                    </p>

                    <span>04</span>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= CREATIVE TOOLS ================= -->
<section class="tools-section">

    <div class="container">

        <div class="tools-box">

            <div>

                <small>
                    CREATIVE WORLD
                </small>

                <h3>
                    Create.
                    <span>Design.</span>
                    Inspire.
                </h3>

            </div>

            <div class="tools-list">

                <div>
                    <i class="bi bi-brush"></i>
                    Graphic Design
                </div>

                <div>
                    <i class="bi bi-camera"></i>
                    Photography
                </div>

                <div>
                    <i class="bi bi-camera-video"></i>
                    Videography
                </div>

                <div>
                    <i class="bi bi-vector-pen"></i>
                    Illustration
                </div>

                <div>
                    <i class="bi bi-stars"></i>
                    Creative
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
                    <span>Siswa DKV</span>
                </h2>

            </div>

            <div class="col-lg-5">

                <p class="gallery-description">
                    Berbagai kegiatan kreatif siswa DKV dalam membuat
                    desain, mengambil foto, mengedit video, dan
                    menghasilkan karya visual.
                </p>

            </div>

        </div>


        <div class="gallery-grid">

            <div class="gallery-item gallery-large">

                <img src="img/dkv2.jpeg"
                     alt="Praktik desain grafis">

                <div class="gallery-overlay">

                    <span>01</span>

                    <h4>Desain Grafis</h4>

                </div>

            </div>


            <div class="gallery-item">

                <img src="img/dkv4.jpeg"
                     alt="Fotografi DKV">

                <div class="gallery-overlay">

                    <span>02</span>

                    <h4>Fotografi</h4>

                </div>

            </div>


            <div class="gallery-item">

                <img src="img/dkv3.png"
                     alt="Videografi DKV">

                <div class="gallery-overlay">

                    <span>03</span>

                    <h4>Videografi</h4>

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
                <span>Siswa DKV</span>
            </h2>

            <p>
                Ide, kreativitas, dan teknologi digabungkan menjadi
                karya visual yang menarik.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img src="img/dkv7.jpg"
                             alt="Project desain poster">

                        <div class="project-number">
                            01
                        </div>

                    </div>

                    <div class="project-body">

                        <small>GRAPHIC DESIGN</small>

                        <h4>Desain Poster</h4>

                        <p>
                            Membuat poster kreatif dengan perpaduan
                            tipografi, warna, dan ilustrasi.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img src="img/dkv5.png"
                             alt="Project branding">

                        <div class="project-number">
                            02
                        </div>

                    </div>

                    <div class="project-body">

                        <small>BRANDING</small>

                        <h4>Creative Branding</h4>

                        <p>
                            Membuat identitas visual dan konsep branding
                            untuk sebuah produk.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="project-card">

                    <div class="project-image">

                        <img src="img/dkv6.jpeg"
                             alt="Project fotografi">

                        <div class="project-number">
                            03
                        </div>

                    </div>

                    <div class="project-body">

                        <small>PHOTOGRAPHY</small>

                        <h4>Creative Photography</h4>

                        <p>
                            Menghasilkan foto dengan konsep dan
                            komposisi visual yang menarik.
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
                Lulusan DKV Bisa
                <span>Jadi Apa?</span>
            </h2>

        </div>


        <div class="row g-4">

            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-vector-pen"></i>

                    <h5>Graphic Designer</h5>

                    <p>
                        Membuat berbagai kebutuhan desain
                        untuk perusahaan maupun brand.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-camera"></i>

                    <h5>Fotografer</h5>

                    <p>
                        Menghasilkan karya fotografi untuk
                        berbagai kebutuhan visual.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-camera-reels"></i>

                    <h5>Videografer</h5>

                    <p>
                        Membuat dan mengolah video
                        untuk berbagai kebutuhan.
                    </p>

                </div>

            </div>


            <div class="col-6 col-lg-3">

                <div class="career-card">

                    <i class="bi bi-palette"></i>

                    <h5>Illustrator</h5>

                    <p>
                        Membuat ilustrasi dan karya visual
                        untuk media digital maupun cetak.
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
                    CREATE YOUR FUTURE
                </span>

                <h2>
                    Your Ideas.
                    <strong>Your Design.</strong>
                </h2>

                <p>
                    Jadikan kreativitasmu sebagai karya yang
                    menginspirasi.
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
<footer class="dkv-footer">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-6">

                <h4>
                    <i class="bi bi-palette-fill"></i>
                    SMK RAINBOW BUBBLEGUM
                </h4>

                <p>
                    Desain Komunikasi Visual —
                    Kreatif, Inovatif, dan Siap Berkarya.
                </p>

            </div>


            <div class="col-lg-6 text-lg-end">

                <p class="mb-2">
                    Program Keahlian
                </p>

                <h5>
                    DESAIN KOMUNIKASI VISUAL
                </h5>

            </div>

        </div>


        <hr>


        <div class="footer-bottom">

            <span>
                © 2026 SMK Rainbow Bubblegum
            </span>

            <span>
                DKV • DESIGN • CREATIVE
            </span>

        </div>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>