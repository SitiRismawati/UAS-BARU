<?php
    session_start();


    $mysqli = new mysqli('localhost', 'root', '', 'uas');

    $sql = $mysqli->query("SELECT * FROM alumni");
    
    if (isset($_POST['nim_mahasiswa']) && isset($_POST['nim_mahasiswa'])) {
        $nim_mahasiswa = $_POST['nim_mahasiswa'];
        $nama_mahasiswa = $_POST['nama_mahasiswa'];
        $tahun_lulus = $_POST['tahun_lulus'];
        $pekerjaan_sekarang = $_POST['pekerjaan_sekarang'];

        $insert = $mysqli->query("INSERT INTO alumni(nim_mahasiswa, nama_mahasiswa, tahun_lulus, pekerjaan_sekarang) 
                                            VALUES ('$nim_mahasiswa', '$nama_mahasiswa', '$tahun_lulus', '$pekerjaan_sekarang')");
        if ($insert) {
            $_SESSION['success'] = true;
            $_SESSION['message'] = 'Data Berhasil Ditambahkan';
            header("Location: index.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Alumni Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
    <h1 class="text-center">Tambah Alumni Mahasiswa</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="nim_mahasiswa" class="form-label">NIM Mahasiswa</label>
            <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa">
        </div>
        <div class="mb-3">
            <label for="nama_mahasiswa" class="form-label">Nama mahasiswa</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa">
        </div>
        <div class="mb-3">
            <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
            <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus">
        </div>
        <div class="mb-3">
            <label for="pekerjaan_sekarang" class="form-label">Pekerjaan Sekarang</label>
            <input type="text" class="form-control" id="pekerjaan_sekarang" name="pekerjaan_sekarang">
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-warning">Cancel</a>
        </div>
    </form>
</body>
</html>