<?php 
include "config.php";
session_start();

if(!isset($_SESSION['username'])) $_SESSION['username'] = "unknown";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rndwst | Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="bg-gray-100">
    <?php 
        if(isset($_GET['page'])) $page = $_GET['page'];
        else $page = "login";

        if($_SESSION['username'] !== "unknown") $page = "admin";

        if($page == "admin")
        {
            require "layout/admin.php";
            require "components/footer.php";
        }
        else if($page == "login")
        {
            require "layout/login.php";
        }
    ?>
</body>
</html>
