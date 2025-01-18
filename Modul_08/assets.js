$(document).ready(function () {
  // Fungsi untuk memuat data alumni
  function loadAlumni() {
    $.get("alumni_data.php", function (data) {
      const alumni = JSON.parse(data);
      let rows = "";
      alumni.forEach((item, index) => {
        rows += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.name}</td>
                        <td>${item.year}</td>
                        <td>
                            <button class="btn btn-danger btn-sm delete-btn" data-index="${index}">Hapus</button>
                        </td>
                    </tr>
                `;
      });
      $("#alumniTable tbody").html(rows);
    });
  }

  // Muat data alumni saat halaman dimuat
  loadAlumni();

  // Tambah data alumni
  $("#alumniForm").on("submit", function (e) {
    e.preventDefault();
    const formData = $(this).serialize();
    $.post("alumni_data.php", formData, function (response) {
      loadAlumni(); // Perbarui tabel
      $("#alumniForm")[0].reset(); // Reset formulir
    });
  });

  // Hapus data alumni
  $(document).on("click", ".delete-btn", function () {
    const index = $(this).data("index");
    $.ajax({
      url: "alumni_data.php",
      type: "DELETE",
      data: { index },
      success: function () {
        loadAlumni(); // Perbarui tabel
      },
    });
  });
});
