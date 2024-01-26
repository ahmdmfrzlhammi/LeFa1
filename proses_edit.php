<?php
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
{ if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // ambil data hasil submit dari form
        $jenis  = $_POST['jenis'];
		$nama  = $_POST['nama'];
		$kapasitas  = $_POST['kapasitas'];

       $status  = $_POST['status'];
	   $id  = $_POST['id'];

        // perintah query untuk mengubah data pada tabel obat
        $query = mysqli_query($conn, "UPDATE ruangan SET  jenis_ruangan = '$jenis ',nama_ruangan = '$nama',kapasitas      = '$kapasitas '
                                                            
                                                      WHERE id_ruangan      = '$id'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($conn));

        // cek query
        if ($query) {
            // jika berhasil tampilkan pesan berhasil update data
            header("location: informasi.php");
       }  
     }    
    }     

    ?>