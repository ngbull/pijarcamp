<?php 
    require 'function.php';

    if (isset($_POST['tambah'])) {
        $namaprod = $_POST['namap'];
        $ket = $_POST['ketr'];
        $harga = $_POST['harga'];
        $jml = $_POST['juml'];
        if (isset($namaprod,$ket,$harga,$jml)) {
            $tambah = mysqli_query($koneksi, "INSERT INTO produk VALUES (
                '','$namaprod','$ket','$harga','$jml'
            )");

        }
        header("Location: /pijarcamp/");
    }

    if (isset($_POST['hapus'])) {
        mysqli_query($koneksi, "DELETE FROM tb_user WHERE d = 'id'");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .tb,.tb th,.tb td {
            border: 1px solid black;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="input">
        <form action="" method="post">
        <table>
            <tr><td>Nama Produk : <input type="text" name="namap" required></td></tr>
            <tr><td>Keterangan : <textarea type="text" name="ketr" required></textarea></td></tr>
            <tr><td>Harga : <input type="text" name="harga" required></td></tr>
            <tr><td>Jumlah : <input type="text" name="juml" required></td></tr>
            <tr><td ><button method="POST" type="submit" name="tambah" required>TAMBAH</button></td></tr>
            
        </table>
        </form>
    </div>
    <table class="tb" style="margin-top: 20px;">
        <tr>
            <th>No</th>
            <th>Nama produk</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>
        <?php $hasil = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id ASC"); 
        
        $n = 1;
        while ($row = mysqli_fetch_assoc($hasil)) {
            
            ?>
            <tr>
                <td><?=$n++?></td>
                <td><?=$row['nama_produk']?></td>
                <td><?=$row['keterangan']?></td>
                <td><?= "Rp",$row['harga']?></td>
                <td><?=$row['jumlah']?></td>
                <td><button style="background-color: red;" name="hapus" method="POST" ><a href="hapus.php?id=<?=$row['id']?>">HAPUS</a></button></td>
            </tr>
            <?php 
        }
        ?>

    </table>
</body>
</html>

