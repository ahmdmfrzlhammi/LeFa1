<?php
session_start();
// Lakukan koneksi ke database (ganti dengan informasi koneksi yang sesuai)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookinglab";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_dosen'];
    $prodi = $_POST['prodi'];
    $waktu = $_POST['waktu'];
    $selesai =$_POST['selesai'];
    $id_ruangan = $_POST['id_ruangan'];
   $status = $_POST['status'];
 
    $id_user=  $_SESSION['id_user'];
    // Query untuk memasukkan data ke dalam tabel database (ganti sesuai dengan struktur tabelmu)
    $sql = "INSERT INTO booking (nama_dosen, prodi, waktu,selesai, status, id_user, id_ruangan) VALUES ('$nama', '$prodi', '$waktu','$selesai','$status','$id_user','$id_ruangan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
        if ($sql) {
            header("location: informasi.php");
            
		}	
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; 

    } 
}

$conn->close();
?>
 