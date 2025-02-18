<?php
session_start();
include 'koneksi.php';

if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda Belum Login!');
    location.href='../index.php'
    </script>";
    exit;
}

if (isset($_POST['tambah'])) {
    $namatugas = $_POST['namatugas'];
    $mapel = $_POST['mapel'];
    $deadline = $_POST['deadline'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "INSERT INTO tugas VALUES('','$namatugas','$mapel','$deadline','$tanggal','$userid')");
    echo "<script>
    alert ('Data berhasil disimpan');
    location.href='../admin/tugas.php';
    </script>";
}

if (isset($_POST['edit'])) {
    $tugas = $_POST['tugasid'];
    $namatugas = $_POST['namatugas'];
    $mapel = $_POST['mapel'];
    $deadline = $_POST['deadline'];

    $sql = mysqli_query($koneksi, "UPDATE tugas SET namatugas='$namatugas', mapel='$mapel', deadline='$deadline' WHERE tugasid='$tugasid'");
    if ($sql) { // Query succeeded
        echo "<script>
        alert('Data berhasil disimpan!');
        location.href='../admin/tugas.php';
        </script>";
    } else { // Query failed
        echo "<script>
        alert('Error: " . mysqli_error($koneksi) . "');
        </script>";
    }
    
}


if (isset($_POST['hapus'])) {
    $albumid = $_POST['tugasid'];

    $sql = mysqli_query($koneksi, "DELETE FROM album WHERE albumid='$albumid'");
    echo "<script>
    alert ('Data berhasil dihapus');
    location.href='../admin/tugas.php';
    </script>";
}

?>