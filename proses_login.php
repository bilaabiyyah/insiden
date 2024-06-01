<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "insiden";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM user WHERE username = ? AND password = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['name'] = $row['name']; // Perbaikan di sini
    $_SESSION['username'] = $username;
    header("location: insiden.php");
    exit();
} else {
    $_SESSION['error_message'] = 'Username atau password salah.';
    header("location: index.php");
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>