<?php 
    require 'function.php';

    $id = $_GET['id'];
    mysqli_query($koneksi,"DELETE FROM produk WHERE id = '$id'");

    header("Location: /pijarcamp");
?>