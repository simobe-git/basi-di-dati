<?php
session_start();

session_destroy();
header('Location: http://localhost/progetto-basi/basi-di-dati/home.php');
exit();

?>