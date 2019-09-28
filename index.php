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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedConten" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggle-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
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
		<h2>Akun Mahasiswa</h2>
		
		<hr>
		
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Nama</th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
                    <th>Opsi</th>
				</tr>
			</thead>
            <tbody>
                <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY username DESC") or die(mysqli_error($koneksi));
                    if(mysqli_num_rows($sql) > 0){
                        $no = 1;
                        while($data = mysqli_fetch_assoc($sql)){
                            echo '
                            <tr>
                                <td>'.$data['nama'].'</td>
                                <td>'.$data['username'].'</td>
                                <td>'.$data['password'].'</td>
                                <td>'.$data['email'].'</td>
                                <td>
                                    <a href="edit.php?username='.$data['username'].'" class="badge badge-warning">Edit</a>
                                    <a href="delete.php?username='.$data['username'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data?\')">Delete</a>
                                </td>
                            </tr>
                            ';
                            $no++;
                        }
                    }else{
                        echo '
                        <tr>
                            <td colspan="6">Tidak Ada Data</td>
                        </tr>
                        ';
                    }

                ?>
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>