<?php
include ('config.php');

unset($_SESSION['id']);
echo "<script language=javascript>alert('Successfully Logout.');window.location='login.php';</script>";
?>
