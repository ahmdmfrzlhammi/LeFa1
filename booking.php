<?php

session_start();
if (!isset($_SESSION['username'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
}

if ($_SESSION["level"] == 2) {
    header("location: informasi.php");
}

// Panggil koneksi database.php untuk koneksi database
require_once "config.php";

// fungsi untuk pengecekan status login user
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1

// Query to fetch data from the database
$query = "SELECT * FROM booking"; // Change 'nama_tabel_pesanan' to your actual table name
$result = mysqli_query($mysqli, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin </title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>

    <header>
        <h1>Admin</h1>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="beranda.php">Beranda</a></li>
            <li><a href="informasi.php">Informasi Ruangan</a></li>
			
            <li><a href="Login.php">Logout</a></li>
        </ul>
    </nav>

    <div class="content">
        <h2>Daftar Pesanan Booking</h2>

        <!-- Tabel pesanan -->
        <table border="1" class="order-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>nama_dosen</th>
                    <th>prodi</th>
                    <th>waktu</th>
                    <th>selesai</th>
                    <th>ruangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data pesanan dari database -->
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td>{$row['nama_dosen']}</td>";
                    echo "<td>{$row['prodi']}</td>";
                    echo "<td>{$row['waktu']}</td>";
                    echo "<td>{$row['selesai']}</td>";
                    echo "<td>{$row['id_ruangan']}</td>";
                    echo "<td>{$row['status']}</td>";
                    echo "<td>
                    <form name='form' method='post' action='prosesbooking.php'><input name='id_booking' type='hidden' value='{$row['id_booking']}'' >
                    <input name='status' type='hidden' value='disetujui'><button class='approve-btn'>Setujui</button></form>
                    <form name='form' method='post' action='prosesbooking.php'><input name='id_booking' type='hidden' value='{$row['id_booking']}'' > 
                    <input name='status' type='hidden' value='ditolak'><button class='reject-btn'>Tolak</button></form>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
