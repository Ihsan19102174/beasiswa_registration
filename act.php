<?php
$nama = $_POST['nama'];
$email = $_POST['email'];
$nomor_hp = $_POST['nomor_hp'];
$semester = $_POST['semester'];
$ipk = $_POST['ipk'];
$beasiswa = isset($_POST['beasiswa']) ? $_POST['beasiswa'] : '';
$berkas = $_FILES['berkas']['name'];
$status_ajuan = "Belum di verifikasi";

// Upload file
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["berkas"]["name"]);
move_uploaded_file($_FILES["berkas"]["tmp_name"], $target_file);

// Simpan ke database
$conn = new mysqli("localhost", "root", "", "beasiswa");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO registrasi (nama, email, nomor_hp, semester, ipk, beasiswa, berkas, status_ajuan)
VALUES ('$nama', '$email', '$nomor_hp', '$semester', '$ipk', '$beasiswa', '$berkas', '$status_ajuan')";

if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil. <a href='view.php'>Liat Hasil</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
