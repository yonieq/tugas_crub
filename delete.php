<?php
include('config.php');
if(isset($_GET['username'])){
    $username = $_GET['username'];

    $cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username='$username'") or die(mysqli_error($koneksi));

    if(mysqli_num_rows($cek) > 0){
        $del = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE username='$username'") or die(mysqli_error($koneksi));
        if($del){
            echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
        }else{
            echo '<script>alert("Gagal mengahpus data".); document.location="index.php";</script>';
        }
    }else{
        echo '<script>alert("Username tidak ditemukan"); document.location="index.php";</script>';
    }
}
?>