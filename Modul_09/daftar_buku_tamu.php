<h3>Daftar Buku Tamu</h3>
<hr>

<?php
// Mengaktifkan pengaturan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mencakup file konfigurasi
include 'Latihan_09_config.php';

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM buku_tamu ORDER BY tanggal DESC"; // Menggunakan tanggal
$result = $conn->query($sql);

// Memeriksa apakah query berhasil
if (!$result) {
    die("Query gagal: " . $conn->error);
}

// Memeriksa dan menampilkan data
if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th> <!-- Menambahkan kolom tanggal -->
            </tr>";
    // Menampilkan data dalam tabel
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['nama']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['pesan']) . "</td>
                <td>" . htmlspecialchars($row['tanggal']) . "</td> <!-- Tambahkan tanggal di sini -->
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada pesan.</p>";
}

// Menutup koneksi
$conn->close();
?>