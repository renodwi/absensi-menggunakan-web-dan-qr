<div class="p-5">
    <div class="border-2 border-black shadow-xl">
        <div class="bg-blue-500 p-2 text-lg">
            <h1 class="font-black text-white">Tambah Admin</h1>
        </div>
        <div class="p-5">
            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold mb-2">Nama:</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold mb-2">Password:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <button type="button" id="tambahAdminBtn" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Tambah Admin</button>
        </div>
    </div>
</div>

<script>
    const tambahAdminBtn = document.getElementById("tambahAdminBtn");
    

    tambahAdminBtn.addEventListener("click", function() {
        const nama_value = document.getElementById("nama").value;
        const password_value = document.getElementById("password").value;

        if(nama_value == "" || password_value == "")
        {
            Swal.fire({
                title: 'Ups!',
                icon: 'error',
                text: 'Tolong lengkapi kolom terlebih dahulu sebelum menambahkan.'
            });
        }
        else 
        {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "backend/tambah_admin.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if(xhr.responseText == "Tambah berhasil")
                    {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Berhasil menambahkan admin.',
                            icon: 'success'
                        });
                    }
                    else 
                    {
                        Swal.fire({
                            title: 'Ups!',
                            text: 'Terjadi sebuah kesalahan.' + xhr.responseText,
                            icon: 'error'
                        });
                    }
                }
                else 
                {
                    Swal.fire({
                        title: 'Error',
                        text: 'Terjadi sebuah kesalahan.' + xhr.responseText,
                        icon: 'error'
                    });
                }
            };
            xhr.send("username=" + nama_value + "&password=" + password_value);
        }
    });
</script>