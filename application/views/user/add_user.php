<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add User</title>
</head>
<body>

	<h1>Tambah User</h1>

	<form action="<?php echo base_url('user/insert'); ?>" method="POST">
		<label for="">Nama Lengkap</label>
		<input type="text" name="nama_user">
		<br>
		<label for="">Username</label>
		<input type="text" name="username">
		<br>
		<label for="">Password</label>
		<input type="text" name="password">
		<br>
		<label for="role">ROLE</label>
		<select name="role" id="role">
			<option value>Pilih Role</option>
			<option value="admin">Administrator</option>
			<option value="kepala_toko">Kepala Toko</option>
		</select>
		<br>
		<button type="submit" class="btn btn-success">Simpan</button>
		<a href="<?php echo base_url('user'); ?>" >Kembali</a>
	</form>
	
</body>
</html>
