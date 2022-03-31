<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User</title>
</head>
<body>
	<h1>Halaman User</h1>

	<a href="<?php echo base_url('user/add'); ?>">Tambah User</a>

	<table border="1">
		<tr>
			<td>ID User</td>
			<td>Nama User</td>
			<td>Username</td>
			<td>Password</td>
			<td>Role</td>
			<td>Aksi</td>
		</tr>
		
		<?php foreach($user as $u ) : ?>
		<tr>
			<td><?php echo $u->id_user; ?></td>
			<td><?php echo $u->nama_user; ?></td>
			<td><?php echo $u->username; ?></td>
			<td><?php echo $u->password; ?></td>
			<td><?php echo $u->role; ?></td>
			<td>
				<a href="<?php echo base_url('user/edit/') . $u->id_user ?>">Edit</a>
				<a href="<?php echo base_url('user/delete/') . $u->id_user ?>">Hapus</a>
			</td>
		</tr>
		<?php endforeach; ?>

	</table>
</body>
</html>
