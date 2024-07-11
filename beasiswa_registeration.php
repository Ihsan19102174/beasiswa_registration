<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Beasiswa</title>
    <link rel="stylesheet" href="style.css">
    <script>
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

        function checkIPK(ipk) {
            if (ipk < 3) {
                document.getElementById("beasiswa").disabled = true;
                document.getElementById("berkas").disabled = true;
                document.getElementById("simpan").disabled = true;
            } else {
                document.getElementById("beasiswa").disabled = false;
                document.getElementById("berkas").disabled = false;
                document.getElementById("simpan").disabled = false;
                document.getElementById("beasiswa").focus();
            }
        }
    </script>
</head>
<body onload="checkIPK(<?php echo 3.4; ?>)">
    <div class="container">
        <h1>Registrasi Beasiswa</h1>
        <form name="beasiswaForm" action="act.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            
            <label for="nomor_hp">Nomor HP:</label>
            <input type="text" id="nomor_hp" name="nomor_hp" required><br>
            
            <label for="semester">Semester:</label>
            <select id="semester" name="semester" required>
                <?php for ($i = 1; $i <= 8; $i++) {
                    echo "<option value=\"$i\">$i</option>";
                } ?>
            </select><br>
            
            <label for="beasiswa">Pilih Beasiswa:</label>
            <select id="beasiswa" name="beasiswa" disabled>
                <option value="Beasiswa Akademik">Beasiswa Akademik</option>
                <option value="Beasiswa Non Akademik">Beasiswa Non Akademik</option>
            </select><br>
            
            <label for="berkas">Upload Berkas:</label>
            <input type="file" id="berkas" name="berkas" accept=".pdf,.jpg,.zip" disabled><br>
            
            <input type="hidden" name="ipk" value="3.4">
            <input type="submit" id="simpan" value="Daftar" disabled>
        </form>
    </div>
</body>
</html>
