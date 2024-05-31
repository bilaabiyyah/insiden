document.addEventListener("DOMContentLoaded", function () {
    var logoutButton = document.getElementById("logoutButton");

    logoutButton.addEventListener("click", function () {
        fetch("logout.php", {
            method: "POST",
            body: new URLSearchParams({
                'logout': true
            }),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
        .then(function (response) {
            if (response.ok) {
                window.location.href = "index.php";
            } else {
                console.error("Failed to logout");
            }
        })
        .catch(function (error) {
            console.error("An error occurred: " + error);
        });
    });
});

    function hitungDurasi() {
        // Ambil nilai waktu_mulai dan waktu_berhenti
        var waktuMulai = document.getElementById('waktu_mulai').value;
        var waktuBerhenti = document.getElementById('waktu_berhenti').value;

        // Pisahkan jam dan menit dari nilai waktu_mulai dan waktu_berhenti
        var [jamMulai, menitMulai] = waktuMulai.split(':').map(Number);
        var [jamBerhenti, menitBerhenti] = waktuBerhenti.split(':').map(Number);

        // Hitung selisih waktu dalam menit
        var selisihMenit = ((jamBerhenti * 60 + menitBerhenti) - (jamMulai * 60 + menitMulai));

        // Tampilkan hasil durasi di input durasi
        document.getElementById('durasi').value = selisihMenit + ' menit';
    }

    // Tambahkan event listener untuk perubahan input waktu_mulai dan waktu_berhenti
    document.getElementById('waktu_mulai').addEventListener('input', hitungDurasi);
    document.getElementById('waktu_berhenti').addEventListener('input', hitungDurasi);

