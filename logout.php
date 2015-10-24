<?php
session_start();
session_unset();
unset($_SESSION['CID']);

header("location:http://".$_SERVER['SERVER_NAME']);

?>