<?php
session_start();

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    // Akun contoh untuk login pengunjung
    if ($username === "admin" && $password === "123") {

        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;

        header("Location: ../dashboard.php");
        exit;

    } else {

        $pesan = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | SMK RAINBOW BUBBLEGUM</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* =========================
           RESET
        ========================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }


        /* =========================
           BACKGROUND
        ========================= */

        .login-page {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px 20px;

            position: relative;
            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    #fff5fa,
                    #f7f4ff,
                    #eaf7ff
                );
        }


        .shape {
            position: absolute;
            border-radius: 50%;
        }

        .shape-one {
            width: 350px;
            height: 350px;

            background: rgba(255, 157, 196, .25);

            top: -150px;
            left: -100px;
        }

        .shape-two {
            width: 300px;
            height: 300px;

            background: rgba(159, 211, 255, .28);

            right: -100px;
            bottom: -100px;
        }

        .shape-three {
            width: 120px;
            height: 120px;

            background: rgba(221, 190, 255, .35);

            right: 12%;
            top: 10%;
        }


        /* =========================
           LOGIN CONTAINER
        ========================= */

        .login-container {
            width: 100%;
            max-width: 1050px;

            min-height: 620px;

            display: grid;
            grid-template-columns: 1fr 1fr;

            background: rgba(255, 255, 255, .95);

            border-radius: 30px;

            overflow: hidden;

            box-shadow:
                0 25px 70px rgba(80, 70, 120, .18);

            position: relative;
            z-index: 2;
        }


        /* =========================
           LEFT SIDE
        ========================= */

        .login-image {
            min-height: 620px;

            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 50px;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    rgba(255, 91, 157, .7),
                    rgba(88, 151, 255, .65)
                ),
                url("img/sekolah.jpg");

            background-size: cover;
            background-position: center;
        }


        .image-content {
            position: relative;
            z-index: 2;

            text-align: center;

            max-width: 420px;
        }


        /* LOGO */

        .school-logo {
            width: 85px;
            height: 85px;

            margin: 0 auto 25px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 25px;

            background: rgba(255, 255, 255, .2);

            border: 2px solid rgba(255, 255, 255, .6);

            backdrop-filter: blur(10px);

            font-size: 40px;
        }


        .image-content h1 {
            font-size: 36px;

            font-weight: 800;

            line-height: 1.2;

            margin-bottom: 20px;
        }


        .image-content h1 span {
            display: block;

            color: #ffe1ef;
        }


        .image-content p {
            font-size: 15px;

            line-height: 1.8;

            color: rgba(255,255,255,.95);

            margin-bottom: 30px;
        }


        /* INFO */

        .school-info {
            display: flex;

            justify-content: center;

            gap: 12px;

            flex-wrap: wrap;
        }


        .school-info div {
            display: flex;

            align-items: center;

            gap: 8px;

            padding: 10px 15px;

            border-radius: 30px;

            background: rgba(255,255,255,.18);

            backdrop-filter: blur(10px);

            font-size: 12px;
        }


        /* =========================
           RIGHT FORM
        ========================= */

        .login-form {
            padding: 65px 70px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        .form-header {
            text-align: center;

            margin-bottom: 35px;
        }


        .form-icon {
            width: 70px;
            height: 70px;

            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 20px;

            background:
                linear-gradient(
                    135deg,
                    #ff72aa,
                    #a879ff
                );

            color: white;

            font-size: 30px;

            box-shadow:
                0 10px 25px rgba(255,114,170,.25);
        }


        .form-header h2 {
            color: #27315f;

            font-size: 28px;

            margin-bottom: 8px;
        }


        .form-header p {
            color: #8589a5;

            font-size: 13px;

            line-height: 1.6;
        }


        /* =========================
           PESAN ERROR
        ========================= */

        .error-message {
            padding: 12px 15px;

            margin-bottom: 20px;

            border-radius: 10px;

            background: #fff0f3;

            color: #d94b6b;

            font-size: 12px;

            text-align: center;
        }


        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 22px;
        }


        .form-group label {
            display: block;

            color: #30365d;

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 9px;
        }


        .input-box {
            position: relative;
        }


        .input-box > i {
            position: absolute;

            left: 18px;

            top: 50%;

            transform: translateY(-50%);

            color: #a879ff;

            font-size: 18px;

            z-index: 2;
        }


        .input-box input {
            width: 100%;

            height: 53px;

            padding: 0 50px;

            border: 1.5px solid #e4e3ee;

            border-radius: 14px;

            outline: none;

            background: #fafaff;

            color: #30365d;

            font-family: 'Poppins', sans-serif;

            font-size: 13px;

            transition: .3s;
        }


        .input-box input:focus {
            border-color: #a879ff;

            background: white;

            box-shadow:
                0 0 0 4px rgba(168,121,255,.10);
        }


        .input-box input::placeholder {
            color: #b4b5c7;
        }


        /* =========================
           SHOW PASSWORD
        ========================= */

        .show-password {
            position: absolute;

            right: 16px;

            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            cursor: pointer;

            color: #9a9cb2;

            font-size: 17px;
        }


        /* =========================
           OPTIONS
        ========================= */

        .form-options {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin: 5px 0 25px;

            font-size: 12px;
        }


        .remember {
            display: flex;

            align-items: center;

            gap: 7px;

            color: #777b96;

            cursor: pointer;
        }


        .remember input {
            accent-color: #ff72aa;
        }


        .form-options a {
            color: #a05eff;

            text-decoration: none;

            font-weight: 600;
        }


        /* =========================
           BUTTON
        ========================= */

        .login-button {
            width: 100%;

            height: 55px;

            border: none;

            border-radius: 15px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 12px;

            cursor: pointer;

            color: white;

            font-family: 'Poppins', sans-serif;

            font-size: 14px;

            font-weight: 600;

            background:
                linear-gradient(
                    135deg,
                    #ff6fa8,
                    #a56eff
                );

            box-shadow:
                0 10px 25px rgba(190,100,210,.25);

            transition: .3s;
        }


        .login-button:hover {
            transform: translateY(-3px);

            box-shadow:
                0 15px 30px rgba(190,100,210,.32);
        }


        .login-button i {
            transition: .3s;
        }


        .login-button:hover i {
            transform: translateX(5px);
        }


        /* =========================
           REGISTER
        ========================= */

        .register-text {
            text-align: center;

            margin-top: 28px;

            font-size: 12px;

            color: #85879d;
        }


        .register-text a {
            color: #a05eff;

            font-weight: 600;

            text-decoration: none;

            margin-left: 4px;
        }


        /* =========================
           BACK HOME
        ========================= */

        .back-home {
            display: flex;

            justify-content: center;

            align-items: center;

            gap: 7px;

            margin-top: 25px;

            color: #777b96;

            font-size: 12px;

            text-decoration: none;
        }


        .back-home:hover {
            color: #ff6fa8;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .login-container {
                grid-template-columns: 1fr;

                max-width: 550px;
            }

            .login-image {
                min-height: 350px;
            }

            .login-form {
                padding: 50px 45px;
            }
        }


        @media (max-width: 500px) {

            .login-page {
                padding: 20px 15px;
            }

            .login-image {
                min-height: 300px;

                padding: 30px 20px;
            }

            .image-content h1 {
                font-size: 25px;
            }

            .image-content p {
                font-size: 12px;
            }

            .login-form {
                padding: 40px 25px;
            }

            .form-header h2 {
                font-size: 24px;
            }
        }

    </style>

</head>


<body>

<div class="login-page">

    <div class="shape shape-one"></div>
    <div class="shape shape-two"></div>
    <div class="shape shape-three"></div>


    <div class="login-container">


        <!-- =================
             BAGIAN KIRI
        ================= -->

        <div class="login-image">

            <div class="image-content">

                <div class="school-logo">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>

                <h1>
                    SMK RAINBOW
                    <span>BUBBLEGUM</span>
                </h1>

                <p>
                    Selamat datang di website resmi
                    SMK Rainbow Bubblegum.
                </p>


                <div class="school-info">

                    <div>
                        <i class="bi bi-stars"></i>
                        Sekolah Unggul
                    </div>

                    <div>
                        <i class="bi bi-people-fill"></i>
                        Generasi Berprestasi
                    </div>

                </div>

            </div>

        </div>


        <!-- =================
             FORM LOGIN
        ================= -->

        <div class="login-form">

            <div class="form-header">

                <div class="form-icon">
                    <i class="bi bi-person-circle"></i>
                </div>

                <h2>Selamat Datang!</h2>

                <p>
                    Login untuk mengakses
                    website sekolah.
                </p>

            </div>


            <?php if ($pesan != ""): ?>

                <div class="error-message">
                    <i class="bi bi-exclamation-circle"></i>
                    <?= htmlspecialchars($pesan); ?>
                </div>

            <?php endif; ?>


            <form method="POST">


                <!-- USERNAME -->

                <div class="form-group">

                    <label for="username">
                        Username
                    </label>

                    <div class="input-box">

                        <i class="bi bi-person"></i>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Masukkan username"
                            required
                        >

                    </div>

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-box">

                        <i class="bi bi-lock"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                        >

                        <button
                            type="button"
                            class="show-password"
                            onclick="togglePassword()"
                        >

                            <i
                                class="bi bi-eye"
                                id="eyeIcon"
                            ></i>

                        </button>

                    </div>

                </div>


                <!-- OPTIONS -->

                <div class="form-options">

                    <label class="remember">

                        <input type="checkbox">

                        Ingat saya

                    </label>

                    <a href="#">
                        Lupa password?
                    </a>

                </div>


                <!-- LOGIN -->

                <button
                    type="submit"
                    class="login-button"
                >

                    Masuk

                    <i class="bi bi-arrow-right"></i>

                </button>

            </form>


            <div class="register-text">

                Belum memiliki akun?

                <a href="#">
                    Daftar sekarang
                </a>

            </div>


            <a
                href="index.html"
                class="back-home"
            >

                <i class="bi bi-arrow-left"></i>

                Kembali ke Beranda

            </a>

        </div>

    </div>

</div>


<script>

function togglePassword() {

    const password =
        document.getElementById("password");

    const eyeIcon =
        document.getElementById("eyeIcon");


    if (password.type === "password") {

        password.type = "text";

        eyeIcon.classList.remove("bi-eye");

        eyeIcon.classList.add("bi-eye-slash");

    } else {

        password.type = "password";

        eyeIcon.classList.remove("bi-eye-slash");

        eyeIcon.classList.add("bi-eye");

    }

}

</script>

</body>
</html>