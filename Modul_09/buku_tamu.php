<div class="container mt-5">
    <h2 class="mb-4">Buku Tamu</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "Latihan_09_config.php"; // Koneksi database
    
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];
    $tanggal = date('Y-m-d H:i:s'); // Menambahkan tanggal

    // Menggunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO buku_tamu (nama, email, pesan, tanggal) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $email, $pesan, $tanggal); // Mengikat parameter

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Pesan berhasil dikirim.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conn->close();
}
?>