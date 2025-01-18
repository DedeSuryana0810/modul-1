<div class="container mt-5">
    <h2 class="mb-4">Tambah Lowongan Kerja</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Lowongan</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <div class="mb-3">
            <label for="perusahaan" class="form-label">Perusahaan</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Lowongan</button>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "Latihan_09_config.php"; // Koneksi database
    
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $perusahaan = $_POST['perusahaan'];
    $lokasi = $_POST['lokasi'];
    
    $sql = "INSERT INTO bursa_kerja (judul, deskripsi, perusahaan, lokasi) VALUES ('$judul', '$deskripsi', '$perusahaan', '$lokasi')";
    
    $result = $conn->query($sql);
    if ($result) {
        echo "<div class='alert alert-success'>Lowongan berhasil ditambahkan.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
    
    $conn->close();
}
?>