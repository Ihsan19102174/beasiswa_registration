<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registrasi Beasiswa</title>
    <script>
        // fungsion untuk memvalidasi email dan nomor hp sesuai dengan format
        function validateForm() {
            var email = document.forms["beasiswaForm"]["email"].value;
            var phone = document.forms["beasiswaForm"]["nomor_hp"].value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Format email tidak valid");
                return false; 
            }
            if (isNaN(phone)) {
                alert("Nomor HP harus berupa angka");
                return false;
            }
        }
    </script>
  </head>
  <body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
            <div class="container" >
                <a class="navbar-brand" href="#">Beasiswa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    <a class="nav-link disabled" href="beasiswa_registeration.php" tabindex="-1" aria-disabled="true">Registrasi</a>
                    <a class="nav-link active" aria-current="page" href="view.php">Data Registrasi</a>
                </div>
                </div>
            </div>
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
<body onload="checkIPK(<?php echo 3.4; ?>)">
    <div class="container">
        <h1>Registrasi Beasiswa</h1>
        <form name="beasiswaForm" action="act.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" class="form-control" name="nama" required><br>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" class="form-control" name="email" required><br>
            </div>
            <div class="mb-3">
                <label for="ipk" class="form-label">IPK Terakhir:</label>
                <input type="number" id="ipk" class="form-control" name="ipk" step="0.1" min="0" max="4" required>
            </div>
            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP:</label>
                <input type="text" id="nomor_hp" class="form-control" name="nomor_hp" required><br>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester:</label>
                <select id="semester" class="form-control" name="semester" required>
                    <?php for ($i = 1; $i <= 8; $i++) {
                        echo "<option value=\"$i\">$i</option>";
                    } ?>
                </select><br>
            </div>
            <div class="mb-3">
                <label for="beasiswa" class="form-label">Pilih Beasiswa:</label>
                <select id="beasiswa" class="form-control" name="beasiswa">
                    <option value="Beasiswa Akademik">Beasiswa Akademik</option>
                    <option value="Beasiswa Non Akademik">Beasiswa Non Akademik</option>
                </select><br>
            </div>
            <div class="mb-3">
                <label for="berkas" class="form-label">Upload Berkas:</label>
                <input type="file" id="berkas" name="berkas" accept=".pdf,.jpg,.zip"><br>
            </div>
                <input type="submit" id="simpan" class="btn btn-success"value="Daftar">
        </form>

        <script>
            // untuk mengecek apakah ipk lebih dari 3 atau kurang dari 3 untuk menentukan apakah dapat lanjut mengisi form beasiswa upload berkas dan submit 
            document.getElementById('ipk').addEventListener('input', function () {
                let ipk = parseFloat(this.value);
                if (ipk >= 3) {
                    document.getElementById('beasiswa').disabled = false;
                    document.getElementById('berkas').disabled = false;
                    document.getElementById('daftar').disabled = false;
                } else {
                    document.getElementById('beasiswa').disabled = true;
                    document.getElementById('berkas').disabled = true;
                    document.getElementById('daftar').disabled = true;
                }
            });
        </script>
    </div>
</body>
</html>
