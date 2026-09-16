<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin | SMK RAINBOW BUBBLEGUM</title>

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- ================= CSS ================= -->

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #fff6fb 0%, #f8f2ff 48%, #eef8ff 100%);
            color: #303b63;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 270px;
            height: 100vh;
            background: rgba(255, 255, 255, 0.96);
            border-right: 1px solid #eee7f5;
            box-shadow: 5px 0 25px rgba(117, 83, 145, 0.08);
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        /* ================= LOGO ================= */

        .sidebar-header {
            height: 90px;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #eee7f5;
        }

        .sidebar-header img {
            width: 55px;
            height: 55px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 12px;
        }

        .sidebar-header h2 {
            font-size: 15px;
            margin-bottom: 4px;
            color: #29375f;
        }

        .sidebar-header span {
            font-size: 10px;
            color: #a85bd2;
            font-weight: bold;
        }

        /* ================= JUDUL MENU ================= */

        .menu-title {
            font-size: 11px;
            font-weight: bold;
            color: #aaa5b5;
            padding: 20px 25px 10px;
        }

        /* ================= MENU ================= */

        .sidebar-menu {
            list-style: none;
            padding: 0 12px;
            overflow-y: auto;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 13px 15px;
            text-decoration: none;
            color: #626176;
            border-radius: 12px;
            transition: 0.3s;
        }

        .sidebar-menu li a i {
            width: 30px;
            font-size: 16px;
        }

        .sidebar-menu li a span {
            font-size: 14px;
        }

        .sidebar-menu li a:hover {
            background: #fff0f8;
            color: #b65bd4;
            transform: translateX(3px);
        }

        .sidebar-menu li a.active {
            background: linear-gradient(135deg, #f36aac, #ad63e8);
            color: white;
            box-shadow: 0 8px 20px rgba(188, 91, 211, 0.25);
        }

        /* ================= LOGOUT ================= */

        .sidebar-bottom {
            margin-top: auto;
            padding: 15px;
            border-top: 1px solid #eee7f5;
        }

        .sidebar-bottom a {
            display: flex;
            align-items: center;
            padding: 13px 15px;
            border-radius: 10px;
            text-decoration: none;
            color: #e96b70;
            font-size: 14px;
        }

        .sidebar-bottom a i {
            width: 30px;
        }

        .sidebar-bottom a:hover {
            background: #fff0f1;
        }

        /* ================= MAIN ================= */

        .main-content {
            margin-left: 270px;
            min-height: 100vh;
        }

        /* ================= TOPBAR ================= */

        .topbar {
            height: 90px;
            background: rgba(255, 255, 255, 0.94);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            border-bottom: 1px solid #eee7f5;
            box-shadow: 0 5px 20px rgba(117, 83, 145, 0.05);
        }

        .topbar h1 {
            font-size: 25px;
            margin-bottom: 5px;
            color: #29375f;
        }

        .topbar p {
            color: #8c8899;
            font-size: 13px;
        }

        /* ================= ADMIN ================= */

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ffe1ef, #e5ddff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a55bd2;
        }

        .admin-profile strong {
            display: block;
            font-size: 14px;
            color: #29375f;
        }

        .admin-profile small {
            color: #9994a5;
            font-size: 11px;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 30px 35px;
        }

        /* ================= WELCOME ================= */

        .welcome-box {
            position: relative;
            overflow: hidden;
            background: linear-gradient(
                135deg,
                #f579b2 0%,
                #c77bd9 48%,
                #8faef2 100%
            );
            color: white;
            padding: 30px;
            border-radius: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 15px 35px rgba(178, 94, 194, 0.22);
        }

        .welcome-box::before {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.10);
            right: -60px;
            top: -90px;
        }

        .welcome-box::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            right: 150px;
            bottom: -70px;
        }

        .welcome-box > div {
            position: relative;
            z-index: 2;
        }

        .welcome-box span {
            font-size: 12px;
            font-weight: bold;
        }

        .welcome-box h2 {
            margin: 8px 0;
            font-size: 25px;
        }

        .welcome-box p {
            font-size: 14px;
            opacity: 0.95;
        }

        .welcome-box > i {
            position: relative;
            z-index: 2;
            font-size: 75px;
            opacity: 0.20;
            margin-right: 25px;
        }

        /* ================= CARD ================= */

        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.97);
            border: 1px solid #f0e9f5;
            border-radius: 17px;
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 8px 22px rgba(107, 80, 135, 0.07);
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(163, 93, 181, 0.14);
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            flex-shrink: 0;
            border-radius: 14px;
            background: linear-gradient(135deg, #ffe1ef, #e4ddff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a95bd4;
            font-size: 22px;
        }

        .stat-card span {
            color: #9b96a7;
            font-size: 10px;
            font-weight: bold;
        }

        .stat-card h3 {
            font-size: 17px;
            margin-top: 5px;
            color: #29375f;
        }

        /* ================= INFORMASI ================= */

        .info-box {
            background: rgba(255, 255, 255, 0.97);
            padding: 25px;
            border-radius: 18px;
            border: 1px solid #f0e9f5;
            box-shadow: 0 8px 22px rgba(107, 80, 135, 0.06);
        }

        .info-header h2 {
            font-size: 18px;
            margin-bottom: 12px;
            color: #29375f;
        }

        .info-header i {
            color: #ad60d8;
        }

        .info-box p {
            color: #777387;
            font-size: 14px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {

            .card-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 700px) {

            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }

            .card-grid {
                grid-template-columns: 1fr;
            }

        }
</style>

</head>

<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar">


    <!-- LOGO -->

    <div class="sidebar-header">

        <img
            src="../img/logo.jpg"
            alt="Logo SMK RAINBOW BUBBLEGUM"
        >

        <div>

            <h2>SMK RAINBOW</h2>

            <span>ADMIN PANEL</span>

        </div>

    </div>


    <!-- JUDUL -->

    <div class="menu-title">
        MENU UTAMA
    </div>


    <!-- MENU -->

    <ul class="sidebar-menu">


        <!-- 1 ADMIN -->

        <li>

            <a
                href="dashboard.php"
                class="active"
            >

                <i class="fa-solid fa-gauge"></i>

                <span>
                    Dashboard
                </span>

            </a>

        </li>

        <!--  KEPALA SEKOLAH -->

        <li>

            <a href="profil.php">

                <i class="fa-solid fa-user-tie"></i>

                <span>
                    Kelola Profil
                </span>

            </a>

        </li>


        <!-- 2 EKSTRAKULIKULER -->

        <li>

            <a href="ekstrakurikuler.php">

                <i class="fa-solid fa-people-group"></i>

                <span>
                    Ekstrakurikuler
                </span>

            </a>

        </li>


        <!-- 3 GALERI -->

        <li>

            <a href="galeri.php">

                <i class="fa-solid fa-images"></i>

                <span>
                    Galeri
                </span>

            </a>

        </li>


        <!-- 4 GALERI ESKUL -->

        <li>

            <a href="galeri_eskul.php">

                <i class="fa-solid fa-photo-film"></i>

                <span>
                    Galeri Eskul
                </span>

            </a>

        </li>


        <!--  GURU -->

        <li>

            <a href="berita.php">

                <i class="fa-solid fa-chalkboard-user"></i>

                <span>
                    Berita
                </span>

            </a>

        </li>


        <!--  JURUSAN -->

        <li>

            <a href="jurusan.php">

                <i class="fa-solid fa-school"></i>

                <span>
                    Jurusan
                </span>

            </a>

        </li>


        <!--  KEGIATAN ESKUL -->

        <li>

            <a href="kegiatan_eskul.php">

                <i class="fa-solid fa-calendar-days"></i>

                <span>
                    Kegiatan Eskul
                </span>

            </a>

        </li>


        <!--  MANFAAT ESKUL -->

        <li>

            <a href="manfaat_eskul.php">

                <i class="fa-solid fa-star"></i>

                <span>
                    Manfaat Eskul
                </span>

            </a>

        </li>


    </ul>


    <!-- LOGOUT -->

    <div class="sidebar-bottom">

        <a href="logout.php">

            <i class="fa-solid fa-right-from-bracket"></i>

            <span>
                Logout
            </span>

        </a>

    </div>

</aside>



<!-- =====================================================
     MAIN CONTENT
===================================================== -->

<main class="main-content">


    <!-- TOPBAR -->

    <header class="topbar">

        <div>

            <h1>
                Dashboard
            </h1>

            <p>
                Selamat datang di halaman administrator
            </p>

        </div>


        <!-- PROFILE -->

        <div class="admin-profile">

            <div class="admin-icon">

                <i class="fa-solid fa-user"></i>

            </div>


            <div>

                <strong>

                    <?php

                    echo isset($_SESSION['username'])
                        ? htmlspecialchars($_SESSION['username'])
                        : 'Admin';

                    ?>

                </strong>

                <small>
                    Administrator
                </small>

            </div>

        </div>

    </header>



    <!-- CONTENT -->

    <section class="content">


        <!-- WELCOME -->

        <div class="welcome-box">

            <div>

                <span>
                    SELAMAT DATANG 👋
                </span>

                <h2>
                    Admin SMK RAINBOW BUBBLEGUM
                </h2>

                <p>
                    Kelola seluruh data website sekolah
                    melalui halaman dashboard ini.
                </p>

            </div>


            <i class="fa-solid fa-school"></i>

        </div>



        <!-- ================= CARD ================= -->

        <div class="card-grid">


            <div class="stat-card">

                <div class="stat-icon">

                    <i class="fa-solid fa-user-shield"></i>

                </div>

                <div>

                    <span>
                        DATA ADMIN
                    </span>

                    <h3>
                        Admin
                    </h3>

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon">

                    <i class="fa-solid fa-people-group"></i>

                </div>

                <div>

                    <span>
                        PROGRAM
                    </span>

                    <h3>
                        Ekstrakulikuler
                    </h3>

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon">

                    <i class="fa-solid fa-images"></i>

                </div>

                <div>

                    <span>
                        DATA
                    </span>

                    <h3>
                        Galeri
                    </h3>

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon">

                    <i class="fa-solid fa-chalkboard-user"></i>

                </div>

                <div>

                    <span>
                        DATA
                    </span>

                    <h3>
                        Guru
                    </h3>

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon">

                    <i class="fa-solid fa-school"></i>

                </div>

                <div>

                    <span>
                        PROGRAM
                    </span>

                    <h3>
                        Jurusan
                    </h3>

                </div>

            </div>



            <div class="stat-card">

                <div class="stat-icon">

                    <i class="fa-solid fa-user-tie"></i>

                </div>

                <div>

                    <span>
                        DATA
                    </span>

                    <h3>
                        Kepala Sekolah
                    </h3>

                </div>

            </div>


        </div>



        <!-- ================= INFORMASI ================= -->

        <div class="info-box">

            <div class="info-header">

                <h2>

                    <i class="fa-solid fa-circle-info"></i>

                    Informasi Dashboard

                </h2>

            </div>


            <p>

                Gunakan menu di sebelah kiri untuk mengelola
                data website SMK RAINBOW BUBBLEGUM.

            </p>

        </div>


    </section>

</main>


</body>

</html>