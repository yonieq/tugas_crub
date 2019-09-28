<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tugas CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Tugas CRUD</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

    <div class="container" style="margin-top:20px">
        <h2>Edit Data Mahasiswa</h2>

        <hr>

        <?php

        if(isset($_GET['username'])){
            $username = $_GET['username'];

            $select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username='$username'") or die(mysqli_error($koneksi));

            if(mysqli_num_rows($select) == 0){
                echo '<div class="alert alert-warning">Username Tidak ada di database</div>';
                exit();
            }else{
                $data = mysqli_fetch_assoc($select);
            }
        }

        ?>

        <?php

        if(isset($_POST['submit'])){
            $nama       = $_POST['nama'];
            $password   = $_POST['password'];
            $email      = $_POST['email'];

            $sql = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', password='$password', email='$email' WHERE username='$username'") or die (mysqli_error($koneksi));

            if($sql){
                echo '<script>alert("Berhasil Menyimpan Data."); document.location="edit.php?username='.$username.'";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal merubah data.</div>';
            }
        }

        ?>

        <form action="edit.php?username=<?php echo $username; ?>" method="post">
            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" size="4" value="<?php echo $data['nama']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" size="4" value="<?php echo $data['password']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" size="4" value="<?php echo $data['email']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
        </form>


    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>