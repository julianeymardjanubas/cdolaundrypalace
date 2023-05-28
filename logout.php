<?php
session_start();
session_destroy();
header("Location: PHPLogin.php");
exit();
?>