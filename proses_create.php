<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "insiden";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$kategori= $_POST['kategori'];
$lokasi = $_POST['lokasi'];
$nama_lokasi = $_POST['nama_lokasi'];
$hari_mulai = $_POST['hari_mulai'];
$waktu_mulai = $_POST['waktu_mulai'];
$hari_berhenti = $_POST['hari_berhenti'];
$waktu_berhenti = $_POST['waktu_berhenti'];
$durasi = $_POST['durasi'];
$downtime = $_POST['downtime'];
$cause = $_POST['cause'];
$impact = $_POST['impact'];
$detail_solution = $_POST['detail_solution'];
$solved = $_POST['solved'];
$executor = $_POST['executor'];

$sql = "INSERT INTO list_insiden (kategori, lokasi, nama_lokasi, hari_mulai, waktu_mulai, hari_berhenti, waktu_berhenti, durasi, downtime, cause, impact, detail_solution, solved, executor) VALUES ('$kategori','$lokasi','$nama_lokasi','$hari_mulai','$waktu_mulai','$hari_berhenti','$waktu_berhenti','$durasi','$downtime','$cause','$impact','$detail_solution','$solved','$executor')";

if ($conn->query($sql) === TRUE) {
    // Data berhasil ditambahkan, tampilkan popup dengan JavaScript
    echo '<script>alert("Data berhasil ditambahkan");</script>';
    // Reset formulir
    echo '<script>document.getElementById("myForm").reset();</script>';
    // Redirect ke halaman insiden.php
    echo '<script>window.location.href = "insiden.php";</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
