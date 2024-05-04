<?php
include "../config.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO `admin` (`nama`, `password`) VALUE ('$username', '$password')";
$result = $conn->query($sql);

if ($result == TRUE) 
{
    echo "Tambah berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
