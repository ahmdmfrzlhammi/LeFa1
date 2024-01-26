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
$us=$_GET['id'];
                   $queryi234 = mysqli_query($mysqli,"SELECT * FROM ruangan WHERE id_ruangan=$us ");
$user = mysqli_fetch_array($queryi234);
                    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
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
			<li><a href="ruang.php">update ruangan</a></li>
            <li><a href="Login.php">Logout</a></li>
        </ul>
    </nav>

    <div class="content">
        <h2>Daftar Ruangan</h2>

        <!-- Tabel pesanan -->
        <form name="form1" method="post" action="proses_edit.php"><table border="1" class="order-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis ruangan </th>
                    <th>Nama ruangan </th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                  <th>1</th>
                  <th><input name="jenis" type="text" value="<?php echo $user['jenis_ruangan']; ?>"> <input name="id" type="hidden" id="id" value="<?php echo $user['id_ruangan']; ?>"></th>
                  <th><input name="nama" type="text" value="<?php echo $user['nama_ruangan']; ?>"></th>
                  <th><input name="kapasitas" type="text" value="<?php echo $user['kapasitas']; ?>"></th>
                  <th><input name="status" type="text" value="<?php echo $user['status']; ?>"> </th>
                  <th><input type="submit" name="Submit" value="Submit"></th>
                </tr>
            </thead>
            <tbody>
                <!-- Data pesanan dari database -->
               
            </tbody>
        </table></form>
    </div>

</body>

</html>
