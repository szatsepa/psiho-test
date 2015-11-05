<?php
session_start();
session_unset();
unset($_SESSION['CID']);
setcookie('CID', '', time() - 3600, '/');
header("location:http://".$_SERVER['SERVER_NAME']);

?>