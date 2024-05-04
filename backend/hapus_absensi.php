<?php 
include "../config.php";

$id = $_GET['id'];

$sql = "SELECT * FROM `data_absensi` WHERE `id` = '".$id."'";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $sql = "DELETE FROM `data_absensi` WHERE `id` = '".$id."'";
        $result = $conn->query($sql);
    }
}

$conn->close();

echo "<script>window.location.href='../index.php';</script>";
?>