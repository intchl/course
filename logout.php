<?php
// mengaktifkan session php
session_start();

// menghapus semua session
session_destroy();
header('Location: login.php ');
exit();
