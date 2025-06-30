<?php
session_start();
//unset($_SESSION[currentClient]);
session_destroy();
echo "<script type='text/javascript'>location.href='../clients/clientLogin.php';</script>";
?>