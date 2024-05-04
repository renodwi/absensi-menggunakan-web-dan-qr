<div class="p-5">
    <div class="border-2 border-black shadow-xl">
        <div class="bg-blue-500 p-2 text-lg">
            <h1 class="font-black text-white">Data Absensi</h1>
        </div>
        <?php 
            $sql = "SELECT * FROM `data_absensi` LIMIT 50";
            $result = $conn->query($sql);

            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    echo '<div class="p-5">';
                    echo '    <div class="mb-5">';
                    echo '        <div class="flex justify-between">';
                    echo '            <div class="flex flex-col justify-center">';
                    echo '                <div>';
                    echo '                    <span class="text-base font-semibold">'.$row['nama'].'</span>';
                    echo '                </div>';
                    echo '                <div>';
                    echo '                    <span class="text-sm text-gray-500">'.$row['waktu'].'</span>';
                    echo '                </div>';
                    echo '            </div>';
                    echo '            <div class="flex flex-col justify-center">';
                    echo '                <a href="backend/hapus_absensi.php?id='.$row['id'].'"><button type="button" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Hapus Absensi</button></a>';
                    echo '            </div>';
                    echo '        </div>';
                    echo '        <hr class="mt-2 border border-blue-500">';
                    echo '    </div>';
                    echo '</div>';
                }
            }
            else 
            {
                echo '<span class="text-base font-semibold ml-10">Tidak ada data absensi</span>';
            }
        ?>
    </div>
</div>