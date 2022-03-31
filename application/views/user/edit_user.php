<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit User</title>
</head>
<body>
	<h1>Edit User</h1>

	<?php foreach ($user as $u) : ?>

	<form action="<?php echo base_url('user/update'); ?>" method="POST">
		<input type="hidden" id="id_user" name="id_user" value="<?php echo $u->id_user; ?>">
		<label for="">Nama Lengkap</label>
		<input type="text" name="nama_user" value="<?php echo $u->nama_user; ?>">
		<br>
		<label for="">Username</label>
		<input type="text" name="username" value="<?php echo $u->username; ?>">
		<br>
		<label for="">Password</label>
		<input type="text" name="password" value="<?php echo $u->password; ?>">
		<br>
		<label for="role">ROLE</label>
		<select name="role" id="role">
			<option value>Pilih Role</option>
			<option <?php if ($u->role == 'admin') {
								echo 'SELECTED';
					} ?> value="admin">Administrator</option>
			<option <?php if ($u->role == 'kepala_toko') {
								echo 'SELECTED';
					} ?> value="kepala_toko">Kepala Toko</option>
		</select>
		<br>
		<button type="submit" class="btn btn-success">Simpan</button>
		<a href="<?php echo base_url('user'); ?>" >Kembali</a>
	</form>

	<?php endforeach; ?>
	
</body>
</html>
