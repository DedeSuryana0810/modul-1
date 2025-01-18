<h3>DAFTAR ALUMNI</h3>
<hr>

<a href="?menu=calumni" class="btn btn-primary mb-3">Tambah</a>

<!-- Form pencarian alumni -->
<form method="POST" action="" class="mb-3">
    <div class="input-group">
        <input type="text" name="search_query" class="form-control" placeholder="Cari alumni berdasarkan nama, tahun lulus, atau jurusan">
        <button type="submit" name="search_alumni" class="btn btn-outline-secondary">Cari</button>
    </div>
</form>

<?php
include 'Latihan_09_config.php';

// Menangani Input dari Form Pencarian
$search_query = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_alumni'])) {
    $search_query = $_POST['search_query'];
}

$sql = "SELECT * FROM alumni WHERE 
        nama LIKE '%$search_query%' OR 
        tahun_lulus LIKE '%$search_query%' OR 
        jurusan LIKE '%$search_query%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "
    <table class='table table-bordered'>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Tahun Lulus</th>
            <th>Jurusan</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['nama'] . "</td>
            <td>" . $row['tahun_lulus'] . "</td>
            <td>" . $row['jurusan'] . "</td>
            <td><img src='" . $row['foto'] . "' width='50'></td>
            <td>
                <a href='Latihan_09_index.php?menu=ualumni&id=" . $row['id'] . "' class='btn btn-warning'>Edit</a> | 
                <a href='Latihan_09_dalumni.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a>
            </td>
        </tr>";
    }
    
    echo "</table>";
} else {
    echo "<p>Tidak ada data</p>";
}

$conn->close();
?>