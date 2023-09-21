<?php
session_start();
unset($_SESSION['aid']);
unset($_SESSION['uid']);
unset($_SESSION['rid']);

header("location: index.php");

?>