<?php
$koneksi = mysqli_connect("localhost","root","","crud_tugas");
if (mysqli_connect_error()){
    echo "Gagal menyambung ke database" . mysqli_connect_error();
}
?>