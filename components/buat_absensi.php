<div class="p-5">
    <div class="border-2 border-black shadow-xl">
        <div class="bg-blue-500 p-2 text-lg">
            <h1 class="font-black text-white">Buat Absensi</h1>
        </div>
        <div class="p-5">
            <div class="mb-4">
                <label for="absensi_nama" class="block text-sm font-semibold mb-2">Nama:</label>
                <input type="text" id="absensi_nama" name="absensi_nama" placeholder="Masukkan nama" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div id="qrCodeContainer" class="mt-4 mb-4 hidden">
                <img id="qrCode" src="" alt="QR Code" class="mx-auto">
            </div>
            <h1 id="absensi_info" class="m-5"></h1>
            <button type="button" id="absensi_btn" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Buat QR Absensi</button>
        </div>
    </div>
</div>
<script>
    const absensi_btn = document.getElementById("absensi_btn");
    const absensi_info = document.getElementById("absensi_info");
    absensi_btn.addEventListener("click", function() {
        var qrCodeImg = document.getElementById('qrCode');
        var qrCodeContainer = document.getElementById('qrCodeContainer');
        var absensi_nama_value = document.getElementById("absensi_nama").value;
        var absensi_link = "https://<?php echo $domain;?>/absen.php?nama=" + absensi_nama_value.split(' ').join('_');;
        var apiUrl = 'https://api.qrserver.com/v1/create-qr-code/?data=' + absensi_link;
        qrCodeImg.src = apiUrl;
        qrCodeContainer.classList.remove('hidden');
        absensi_info.textContent = "Scan qr code untuk melakukan absensi. " + absensi_nama_value;
    });
</script>