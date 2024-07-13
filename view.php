<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hasil Registrasi</title>
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
                    <a class="nav-link active" aria-current="page" href="beasiswa_registeration.php">Registrasi</a>
                    <a class="nav-link disabled" href="view.php" tabindex="-1" aria-disabled="true">Data Registrasi</a>
                </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <h1>Data Registrasi Beasiswa</h1>
        <table class="table table-striped">
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
            $sql = "SELECT * FROM beasiswa.registrasi";
            $result = $conn->query($sql);
            
            // Data untuk pie chart
            $beasiswaA = 0;
            $beasiswaB = 0;

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

                    // Hitung data untuk pie chart
                    switch ($row["beasiswa"]) {
                        case "Beasiswa Akademik":
                            $beasiswaA++;
                            break;
                        case "Beasiswa Non Akademik":
                            $beasiswaB++;
                            break;
                    }
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data ditemukan</td></tr>";
            }
            
            // Tutup koneksi
            $conn->close();
            ?>
        </table>
        <a href="beasiswa_registeration.php">Kembali ke Form Registrasi</a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <br>
        <div class="container pt-5">	
		<div class="chart-container" style="position: relative; height:40vh; width:80vw">
			<canvas id="myChart"></canvas>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	const ctx = document.getElementById('myChart');
 
	new Chart(ctx, {
		type: 'pie',
		data: {
			labels: ['Beasiswa Akademik', 'Beasiswa Non Akademik'],
			datasets: [{
				label: 'Jumlah pendaftar',
				data: [<?php echo $beasiswaA; ?>, <?php echo $beasiswaB; ?>],
				backgroundColor: [
					'rgba(255, 99, 71, 1)',
					'rgba(9, 31, 242, 0.8)'
					],
				borderColor: [
					'rgba(255, 99, 71, 1)',
					'rgba(9, 31, 242, 0.8)'
					],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
</script>
</html>
