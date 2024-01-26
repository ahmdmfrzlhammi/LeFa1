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
        $status  = $_POST['status'];
$id_ruangan=$_['id_ruangan'];
       $id_booking  = $_POST['id_booking'];

        // perintah query untuk mengubah data pada tabel obat
        $query = mysqli_query($conn, "UPDATE booking SET  status      = '$status '
                                                            
                                                      WHERE id_booking      = '$id_booking'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($conn));

        // cek query
        if ($query) {
            // jika berhasil tampilkan pesan berhasil update data
            header("location: booking.php");
       }  
     }    
    }     

    ?>