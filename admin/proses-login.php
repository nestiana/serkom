<?php
session_start();

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "website_sekolah"
);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM admin 
     WHERE username='$username' 
     AND password='$password'"
);

if (mysqli_num_rows($query) > 0) {

    $data = mysqli_fetch_assoc($query);

    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];

    header("Location: dashboard.php");
    exit;

} else {

    header("Location: login.php?error=1");
    exit;

}
?>