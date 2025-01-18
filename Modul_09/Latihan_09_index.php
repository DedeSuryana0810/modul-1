<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul_09</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        body {
            margin: 0; /* Menghilangkan margin default dari body */
        }

        .jumbotron-bg{background-image: url('logo.JPG');
            background-size: cover;
            background-position: center;
            color: white;
        }
    </style>
</head>

<body>
    <header class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Selamat Datang di Website Alumni</h1>
            <p class="lead">Ini adalah contoh website alumni dengan beberapa fitur dalamnya.</p>
        </div>
    </header>

    <div class="container-fluid my-4">
        <div class="row">
            <?php
            include "Latihan_09_menu.php";
            ?>
            
            <main class="col-md-10">
                <article>
                    <?php
                    extract($_GET);
                    if(isset($menu)) {
                        if($menu=="home"){ @include"Latihan_09_home.php";}
                        else if($menu=="alumni"){@include"Latihan_09_ralumni.php";}
                        else if($menu=="calumni"){@include"Latihan_09_calumni.php";}
                        else if($menu=="ualumni"){@include"Latihan_09_ualumni.php";}
                        else if ($menu == "daftar_buku_tamu") {include "daftar_buku_tamu.php";}
                        else if ($menu == "buku_tamu") {include "buku_tamu.php";}
                        else if ($menu == "bursa_kerja") {include "bursa_kerja.php";}
                        else if ($menu == "daftar_bursa_kerja") {include "daftar_bursa_kerja.php";}
                    } else{
                        @include"Latihan_09_home.php";
                    }
                    ?>
                </article>
            </main>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 Website Alumni. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>