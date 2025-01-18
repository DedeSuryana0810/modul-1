<?php
if (!file_exists('data.txt')) {
    file_put_contents('data.txt', '');
}
$data = file('data.txt', FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color:rgb(212, 252, 220);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="jurusan"], input[type="email"]{
            width: 98%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        #dataDisplay {
            margin-top: 20px;
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 5px;
            border-bottom: 1px solid #eee;
        }
    </style>
</head>
<body>
    <h1>Tracer Alumni</h1>
    
    <form id="tracerForm">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit">Kirim</button>
    </form>

    <h2>Daftar Mahasiswa:</h2>
    <div id="dataDisplay">
        <ul>
            <?php foreach ($data as $line): ?>
                <li><?php echo htmlspecialchars($line); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script>
        $(document).ready(function() {
            $('#tracerForm').on('submit', function(e) {
                e.preventDefault();

                var name = $('#name').val();
                var jurusan = $('#jurusan').val();
                var email = $('#email').val();

                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: { name: name, jurusan: jurusan, email: email },
                    success: function(response) {
                        $('#dataDisplay').html($(response).find('#dataDisplay').html());
                        $('#tracerForm')[0].reset();
                    }
                });
            });
        });
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $jurusan = htmlspecialchars($_POST['jurusan']);
        $email = htmlspecialchars($_POST['email']);
        $entry = "$name - $jurusan - $email\n";
        file_put_contents('data.txt', $entry, FILE_APPEND);
        header("Location: index.php");
        exit();
    }
    ?>
</body>
</html>