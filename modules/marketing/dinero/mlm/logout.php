<?php
@session_start();
unset($_SESSION['userlogin']);
header('location:login.php')
?>