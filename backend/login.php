<?php
include "../config.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `admin` WHERE `nama` = '".$username."' AND `password` = '".$password."'";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo "Login berhasil";
        $_SESSION['username'] = $username;
    } else {
        echo "Nama atau password salah";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
