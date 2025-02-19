<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judulfoto = $_POST['namatugas'];
    $deskripsifoto = $_POST['deskripsitugas'];
    $tanggalunggah = date('Y-m-d');
    $albumid = $_POST['tugasid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../asset/img/';
    $namafoto = rand().'-'.$foto;

    move_uploaded_file($tmp, $lokasi.$namafoto);

    $sql = mysqli_query($koneksi, "INSERT INTO uploadtugas VALUES('','$namatugas','$deskripsitugas','$tanggalunggah','$namafoto','$tugasid','$userid')");
    echo "<script>
    alert ('Data berhasil disimpan');
    location.href='../admin/foto.php';
    </script>";
}

if(isset($_POST['edit'])){
    $fotoid = $_POST['tugasid'];
    $judulfoto = $_POST['namatugas'];
    $deskripsifoto = $_POST['deskripsitugas'];
    $tanggalunggah = date('Y-m-d');
    $albumid = $_POST['tugasid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../asset/img/';
    $namafoto = rand().'-'.$foto;

    if($foto == null) {
        $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto',deskripsifoto='$deskripsifoto',
        tanggalunggah='$tanggalunggah', albumid='$albumid' WHERE fotoid='$fotoid'");
}else{
    $query = mysqli_query($koneksi, "SELECT * FROM uploadtugas WHERE uploadtugasid='$uploadtugasid'");
    $data = mysqli_fetch_array($query);
    if (is_file('../asset/img/'.$data['lokasifile'])){
        unlink('../asset/img/'.$data['lokasifile']);
    }
    move_uploaded_file($tmp, $lokasi.$namafoto);
    $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto',deskripsifoto='$deskripsifoto',
        tanggalunggah='$tanggalunggah', albumid='$albumid' WHERE fotoid='$fotoid'");
    }
    echo "<script>
    alert ('Data berhasil disimpan');
    location.href='../admin/foto.php';
    </script>";
}

if (isset($_POST['hapus'])) {
    $fotoid = $_POST['fotoid'];
    $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
    $data = mysqli_fetch_array($query);
    if (is_file('../asset/img/'.$data['lokasifile'])) {
        unlink('../asset/img/'.$data['lokasifile']);
    }

    $sql = mysqli_query($koneksi, "DELETE FROM foto WHERE fotoid='$fotoid'");
    echo "<script>
    alert('Data berhasil dihapus!');
    location.href='../admin/foto.php';
    </script>";
}