<?php

    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'uas');

    $id = $_GET['id'];
    $delete = $mysqli->query("DELETE FROM alumni WHERE id='$id'");

    if($delete) {
        $_SESSION['success'] = true;
            $_SESSION['message'] = 'Data Berhasil Dihapus';
        header("Location: index.php");
        exit();
    }
?>