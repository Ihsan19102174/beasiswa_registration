<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Registrasi</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Registrasi Beasiswa</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>Beasiswa</th>
                <th>Berkas</th>
                <th>Status Ajuan</th>
            </tr>
            <?php
            // Koneksi ke database
            $conn = new mysqli("localhost", "root", "", "beasiswa");

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Ambil data dari tabel registrasi
            $sql = "SELECT * FROM registrasi";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data dari setiap baris
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nama"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["nomor_hp"] . "</td>";
                    echo "<td>" . $row["semester"] . "</td>";
                    echo "<td>" . $row["ipk"] . "</td>";
                    echo "<td>" . $row["beasiswa"] . "</td>";
                    echo "<td><a href='uploads/" . $row["berkas"] . "'>Download</a></td>";
                    echo "<td>" . $row["status_ajuan"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data ditemukan</td></tr>";
            }

            // Tutup koneksi
            $conn->close();
            ?>
        </table>
        <br>
        <a href="beasiswa_registeration.php">Kembali ke Form Registrasi</a>
    </div>
</body>
</html>
