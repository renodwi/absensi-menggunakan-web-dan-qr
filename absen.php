<?php 
include "config.php";
session_start();
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
    if(isset($_GET['nama']))
    {
        $name_fix = str_replace("_", " ", $_GET['nama']);
        
        $sql = "SELECT * FROM `data_absensi` WHERE `nama` = '".$name_fix."'";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            echo '
            <div class="flex justify-center items-center h-screen">
                <div class="text-center">
                    <h1 class="text-red-500 font-black text-3xl">Error</h1>
                    <h1 class="text-blue-500 font-black text-lg">Data ini telah dibaca oleh sistem sebelumnya!</h1>
                </div>
            </div>';
        }
        else 
        { 
            echo '
            <div class="flex justify-center items-center h-screen">
                <div class="text-center">
                    <h1 class="text-blue-500 font-black text-3xl">'.$name_fix.'</h1>
                    <h1 class="text-blue-500 font-black text-lg">Data absensi kamu telah direkam! terimakasih.</h1>
                </div>
            </div>';

            date_default_timezone_set('Asia/Jakarta');
            $waktu_sekarang = date('l, j F Y (H:i:s)');

            $sql = "INSERT INTO `data_absensi` (`nama`, `waktu`) VALUE ('$name_fix', '$waktu_sekarang')";
            $result = $conn->query($sql);
        }
    }
    else 
    {
        echo '
        <div class="flex justify-center items-center h-screen">
            <div class="text-center">
                <h1 class="text-red-500 font-black text-3xl">Error</h1>
                <h1 class="text-blue-500 font-black text-lg">Data tidak terdeteksi</h1>
            </div>
        </div>';
    }
    ?>
</body>
</html>