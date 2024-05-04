<?php 
session_start();
$_SESSION['username'] = 'unknown';
echo "<script>window.location.href='../index.php';</script>";
?>