<h3>FORM DATA ALUMNI</h3>
<hr>
<?php

include "Latihan_09_config.php"; // Memasukkan file konfigurasi untuk koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $jurusan = $_POST['jurusan'];
    $foto = ""; // Atur default foto

    // Mengelola Upload Foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Memeriksa apakah file benar-benar gambar
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            // File adalah gambar
            $uploadOk = 1;
        } else {
            echo "<div class='alert alert-danger'>File bukan gambar.</div>";
            $uploadOk = 0;
        }

        // Memeriksa ukuran file (5MB maks)
        if ($_FILES["foto"]["size"] > 5000000) {
            echo "<div class='alert alert-danger'>Ukuran file terlalu besar.</div>";
            $uploadOk = 0;
        }

        // Mengizinkan format file tertentu
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            echo "<div class='alert alert-danger'>Hanya file JPG, JPEG, PNG & GIF yang diizinkan.</div>";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            // Memindahkan file ke direktori yang diinginkan
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                $foto = $target_file;
            } else {
                echo "<div class='alert alert-danger'>Terjadi kesalahan saat mengunggah file.</div>";
            }
        }
    }

    // Menyimpan data ke database, walaupun tanpa foto
    $sql = "INSERT INTO alumni (nama, tahun_lulus, jurusan, foto) 
            VALUES ('$nama', '$tahun_lulus', '$jurusan', '$foto')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Data berhasil ditambahkan.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$conn->close();
?>

<div class="container mt-5">
    <h2 class="mb-4">Tambah Data Alumni</h2>
    <!-- Form tambah data -->
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
            <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>