<?php
include'koneksi.php';

$username = $_POST['username'];
$password = md5 ($_POST['password']);
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];

$sql = mysqli_query($koneksi, "INSERT INTO users VALUES('','$username','$password','$email','$namalengkap')");


if ($sql) {
    echo "<script>alert('Pendaftaran akun berhasil');</script>";
    header("Location:http://localhost/UKK2025_XIIPPLG2_7728/login.php");
    exit;
}

?>  