<?php
      
    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'uas');

    $id = $_GET['id'];
    $sql = $mysqli->query("SELECT * FROM alumni WHERE id='$id'");
    $data = $sql->fetch_assoc();     
    
    if (isset($_POST['nama_mahasiswa'])) {
        $nim_mahasiswa = $_POST['nim_mahasiswa'];
        $nama_mahasiswa = $_POST['nama_mahasiswa'];
        $tahun_lulus = $_POST['tahun_lulus'];
        $pekerjaan_sekarang = $_POST['pekerjaan_sekarang'];
       
        $update = $mysqli->query("UPDATE alumni SET nama_mahasiswa='$nama_mahasiswa', nim_mahasiswa='$nim_mahasiswa', tahun_lulus='$tahun_lulus', pekerjaan_sekarang='$pekerjaan_sekarang' WHERE id='$id'");

        if($update) {
            $_SESSION['success'] = true;
            $_SESSION['message'] = 'Data Berhasil Diubah';
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
    <title>Form Update alumni Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class ="container">
    <h1 class="text-center">Update alumni Mahasiswa</h1>
    <form method ="POST">
        <div class="mb-3">
            <label for="nim_mahasiswa" class="form-label">Mahasiswa</label>
            <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa" value="<?= $data['nim_mahasiswa']?>">
        </div>
        <div class="mb-3">
            <label for="nama_mahasiswa" class="form-label">Mahasiswa</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= $data['nama_mahasiswa']?>">
        </div>
        <div class="mb-3">
            <label for="tahun_lulus" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" value="<?= $data['tahun_lulus']?>">
        </div>
        <div class="mb-3">
            <label for="pekerjaan_sekarang" class="form-label">pekerjaan_sekarang</label>
            <textarea class="form-control" id="pekerjaan_sekarang" name="pekerjaan_sekarang" rows="3"><?= $data['pekerjaan_sekarang'] ?></textarea>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-warning">Cancel</a>
        </div>
    </form>   
</body>
</html>