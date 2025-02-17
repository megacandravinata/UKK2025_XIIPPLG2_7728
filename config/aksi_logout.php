<?php
session_start();
session_destroy();
echo "<script>
alret('Logout Berhasil');
location.href='../index.php';
</scropt>";

?>