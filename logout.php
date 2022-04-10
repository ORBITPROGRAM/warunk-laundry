<?php

session_start();
// menghapus session
session_unset();
session_destroy();

echo "
<script>
  alert('Logout berhasil');
  window.location.href = 'login.php';
</script>
";

?>
