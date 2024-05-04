<section class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
        <h2 class="text-3xl mb-4 font-black text-blue-500">Rndwst | Absensi</h2>
        <h2 class="text-2xl mb-4 font-semibold text-gray-800">Login</h2>
        <div class="mt-2">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-semibold mb-2">Nama Pengguna</label>
                <input type="text" id="username" class="border border-gray-300 px-4 py-2 rounded w-full focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Sandi</label>
                <input type="password" id="password" class="border border-gray-300 px-4 py-2 rounded w-full focus:outline-none focus:border-blue-500">
            </div>
            <button type="button" id="loginBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Masuk</button>
        </div>
    </div>

    <script>
        const loginBtn = document.getElementById("loginBtn");
        
        loginBtn.addEventListener('click', function() {
            const username_value = document.getElementById("username").value;
            const password_value = document.getElementById("password").value;

            if(username_value == "" || password_value == "") 
            {
                Swal.fire({
                    title: 'Ups!',
                    icon: 'error',
                    text: 'Tolong lengkapi kolom terlebih dahulu sebelum login.'
                });
            }
            else 
            {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "backend/login.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        if(xhr.responseText == "Login berhasil")
                        {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Login berhasil.',
                                icon: 'success'
                            }).then((result) => {
                                window.location.href = "index.php?page=admin";
                            });
                        }
                        else 
                        {
                            Swal.fire({
                                title: 'Ups!',
                                text: 'Nama atau password salah.',
                                icon: 'error'
                            });
                        }
                    }
                    else 
                    {
                        Swal.fire({
                            title: 'Error',
                            text: 'Terjadi kesalahan pada saat mengirim data login.',
                            icon: 'error'
                        });
                    }
                };
                xhr.send("username=" + username_value + "&password=" + password_value);
            }
        });
    </script>
</section>
