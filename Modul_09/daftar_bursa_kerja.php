<?php
include 'Latihan_09_config.php';

// Menggunakan kolom yang ada dalam tabel
$sql = "SELECT * FROM bursa_kerja ORDER BY created_at DESC"; // Gantikan 'tanggal' jika ini bukan kolom yang ada
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>
    <tr>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Perusahaan</th>
        <th>Lokasi</th>
    </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["judul"] . "</td>
            <td>" . $row["deskripsi"] . "</td>
            <td>" . $row["perusahaan"] . "</td>
            <td>" . $row["lokasi"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada lowongan kerja.</p>";
}
?>