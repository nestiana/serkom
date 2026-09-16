<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SMK RAINBOW BUBBLEGUM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="img/logo.jpg" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <link
        href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
        rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet"
    />

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>

    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">

        <nav
            class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
        >

            <a href="index.php" class="navbar-brand d-flex align-items-center px-3">

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

            
            </a>
           <div class="navbar-nav font-weight-bold mx-auto py-0">
            <a href="index.php" class="nav-item nav-link">HOME</a>
            <a href="eskul.php" class="nav-item nav-link">ESTRAKULIKULER</a>
            <a href="profil.php" class="nav-item nav-link">PROFIL</a>
                <a href="gallery.html" class="nav-item nav-link">GALLERY</a>
            <a href="admin/login.php/" class="nav-item nav-link">LOGIN</a>
          <div class="nav-item dropdown">
              <a href="jurusan"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown">JURUSAN</a>
                <div class="dropdown-menu rounded-0 m-0">
                <a href="rpl.php" class="dropdown-item">RPL</a>
                <a href="tkj.php" class="dropdown-item">TKJT</a>
                <a href="tbsm.php" class="dropdown-item">TBSM</a>
                <a href="hotel.php" class="dropdown-item">HOTEL</a>
                <a href="tataboga.php" class="dropdown-item">TATA BOGA</a>
                <a href="busana.php" class="dropdown-item">TRK</a>
                <a href="akl.php" class="dropdown-item">AKL</a>
                <a href="dkv.php" class="dropdown-item">DKV</a>
                <a href="busana.php" class="dropdown-item">TATA BUSANA</a>
              </div>
            </div>
           </div>
        </div>
      </nav>
    <!-- Navbar End -->


    <!-- Header Start -->

    <div class="container-fluid bg-primary mb-5">

        <div
            class="position-relative d-flex flex-column align-items-center justify-content-center"
            style="min-height: 300px; padding-top: 200px;"
        >

            <!-- Tombol Kiri -->

            <a
                href="index.php"
                style="
                    position: absolute;
                    left: 30px;
                    top: 100%;
                    transform: translateY(-50%);
                    z-index: 2;
                    color: #0d37f3;
                    font-size: 45px;
                    text-decoration: none;
                "
            >

                <i class="fa fa-angle-left"></i>

            </a>

        </div>

    </div>

    <!-- Header End -->


    <!-- Class Start -->

    <div class="container-fluid pt-5 jurusan-section">
    </div>

    <div class="container">

        <div class="text-center pb-2">

            <p class="section-title px-5">

                <span class="px-2">
                    JURUSAN
                </span>

            </p>

            <h1 class="mb-4 text-white">
                PROGRAM KEAHLIAN
            </h1>

        </div>


        <div class="row">


            <!-- RPL -->

            <div class="col-lg-4 mb-5">

                <div class="card border-0 bg-light shadow-sm pb-2">

                    <img
                        class="card-img-top mb-2"
                        src="img/rpl.png"
                        alt="RPL"
                    />

                    <div class="card-body text-center">

                        <h4 class="card-title">
                            Rekayasa Perangkat Lunak
                        </h4>

                        <p class="card-text">
                            Rekayasa Perangkat Lunak mempelajari pembuatan website,
                            aplikasi, dan pengembangan perangkat lunak.
                        </p>

                    </div>

                    <a
                        href="rpl.php"
                        class="btn btn-primary px-4 mx-auto mb-4"
                    >
                        Lihat Jurusan
                    </a>

                </div>

            </div>


            <!-- TKJT -->

            <div class="col-lg-4 mb-5">

                <div class="card border-0 bg-light shadow-sm pb-2">

                    <img
                        class="card-img-top mb-2"
                        src="img/tkj.png"
                        alt="TKJT"
                    />

                    <div class="card-body text-center">

                        <h4 class="card-title">
                            Teknik Komputer dan Jaringan Telekomunikasi
                        </h4>

                        <p class="card-text">
                            Teknik Komputer mempelajari komputer,
                            jaringan,server,dan teknologi internet
                        </p>

                    </div>

                    <a
                        href="tkj.php"
                        class="btn btn-primary px-4 mx-auto mb-4"
                    >
                        Lihat Jurusan
                    </a>

                </div>

            </div>


            <!-- TBSM -->

            <div class="col-lg-4 mb-5">

                <div class="card border-0 bg-light shadow-sm pb-2">

                    <img
                        class="card-img-top mb-2"
                        src="img/tbsm.png"
                        alt="TBSM"
                    />

                    <div class="card-body text-center">

                        <h4 class="card-title">
                            Teknik dan Bisnis Sepeda Motor
                        </h4>

                        <p class="card-text">
                            Teknik dan Bisnis Sepeda Motor mempelajari
                            perawatan, perbaikan kendaraan bermotor.
                        </p>

                    </div>

                    <a
                        href="tbsm.php"
                        class="btn btn-primary px-4 mx-auto mb-4"
                    >
                        Lihat Jurusan
                    </a>

                </div>

            </div>


            <!-- HOTEL -->

            <div class="col-lg-4 mb-5">

                <div class="card border-0 bg-light shadow-sm pb-2">

                    <img
                        class="card-img-top mb-2"
                        src="img/hotel.png"
                        alt="HOTEL"
                    />

                    <div class="card-body text-center">

                        <h4 class="card-title">
                            HOTEL
                        </h4>

                        <p class="card-text">
                            Perhotelan mempelajari pelayanan, pengelolaan,
                            dan operasional hotel.
                        </p>

                    </div>

                    <a
                        href="hotel.php"
                        class="btn btn-primary px-4 mx-auto mb-4"
                    >
                        Lihat Jurusan
                    </a>

                </div>

            </div>


            <!-- TATA BOGA -->

            <div class="col-lg-4 mb-5">

                <div class="card border-0 bg-light shadow-sm pb-2">

                    <img
                        class="card-img-top mb-2"
                        src="img/tt boga.png"
                        alt="TATA BOGA"
                    />

                    <div class="card-body text-center">

                        <h4 class="card-title">
                            TATA BOGA
                        </h4>

                        <p class="card-text">
                            Mempelajari memasak, mengolah makanan,
                            membuat pastryy, menyajikan hidangan yang lezat,
                            kreatif, dan menarik
                        </p>

                    </div>

                    <a
                        href="tataboga.php"
                        class="btn btn-primary px-4 mx-auto mb-4"
                    >
                        Lihat Jurusan
                    </a>

                </div>

            </div>


            <!-- TATA RIAS DAN KECANTIKAN -->

            <div class="col-lg-4 mb-5">

                <div class="card border-0 bg-light shadow-sm pb-2">

                    <img
                        class="card-img-top mb-1"
                        src="img/trk.png"
                        alt="TRK"
                    />

                    <div class="card-body text-center">

                        <h4 class="card-title">
                            Tata Rias dan Kecantikan
                        </h4>

                        <p class="card-text">
                            Mengembangkan kreativitas dalam merias wajah,
                            dan menciptakan penampilan yang menarik,
                            elegan, dan percaya diri
                        </p>

                    </div>

                    <a
                        href="trk.php"
                        class="btn btn-primary px-4 mx-auto mb-4"
                    >
                        Lihat Jurusan
                    </a>

                </div>

            </div>


            <!-- AKL -->

            <div class="col-lg-4 mb-5">

                <div class="card border-0 bg-light shadow-sm pb-2">

                    <img
                        class="card-img-top mb-2"
                        src="img/akl.png"
                        alt="AKL"
                    />

                    <div class="card-body text-center">

                        <h4 class="card-title">
                            Akuntansi
                        </h4>

                        <p class="card-text">
                            Akuntansi dan Keuangan Lembaga mempelajari pencatatan,
                            pengelolaan,dan penyusunan laporan keuangan
                        </p>

                    </div>

                    <a
                        href="akl.php"
                        class="btn btn-primary px-4 mx-auto mb-4"
                    >
                        Lihat Jurusan
                    </a>

                </div>

            </div>


            <!-- DKV -->

            <div class="col-lg-4 mb-5">

                <div class="card border-0 bg-light shadow-sm pb-2">

                    <img
                        class="card-img-top mb-2"
                        src="img/dkvv.png"
                        alt="DKV"
                    />

                    <div class="card-body text-center">

                        <h4 class="card-title">
                            Desain Komunikasi Visual
                        </h4>

                        <p class="card-text">
                            Desain Komunikasi Visual mempelajari desain grafis,
                            ilustrasi, fotografi, dan media visual.
                        </p>

                    </div>

                    <a
                        href="dkv.php"
                        class="btn btn-primary px-4 mx-auto mb-4"
                    >
                        Lihat Jurusan
                    </a>

                </div>

            </div>


            <!-- TATA BUSANA -->

            <div class="col-lg-4 mb-5">

                <div class="card border-0 bg-light shadow-sm pb-2">

                    <img
                        class="card-img-top mb-2"
                        src="img/busana2.png"
                        alt="TATA BUSANA"
                    />

                    <div class="card-body text-center">

                        <h4 class="card-title">
                            TATA BUSANA
                        </h4>

                        <p class="card-text">
                            Teknik Pemesinan mempelajari proses produksi,
                            penggunaan mesin, dan pembuatan berbagai komponen.
                        </p>

                    </div>

                    <a
                        href="busana.php"
                        class="btn btn-primary px-4 mx-auto mb-4"
                    >
                        Lihat Jurusan
                    </a>

                </div>

            </div>


        </div>

    </div>

    <!-- Class End -->


    <!-- JavaScript Libraries -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <script src="lib/easing/easing.min.js"></script>

    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="lib/isotope/isotope.pkgd.min.js"></script>

    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->

    <script src="mail/jqBootstrapValidation.min.js"></script>

    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->

    <script src="js/main.js"></script>

</body>

</html>
