<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
}

// Panggil koneksi database.php untuk koneksi database
require_once "config.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Beranda</title>
    <link rel="stylesheet" href="stylesberanda.css">
</head>

<body>

    <nav class="navbar">
        <ul>
            <li><a href="beranda.php">Beranda</a></li>
            <li><a href="informasi.php">Informasi Ruangan</a></li>
            <li><a href="Login.php">Login</a></li>
        </ul>
    </nav>

    <div class="content">
        <!-- Konten Halaman -->
        <h1 class="h1">Selamat datang!</h1>
        <table>
            <tr>
                <td>
                    <p class="aturan">Berikut adalah aturan yang ada dalam ruangan:</p>
                    <ul class="apa">
                        <li>Selalu rapikan kembali ruangan lab.</li>
                        <li>Tidak boleh membawa makanan ke dalam ruangan.</li>
                        <li>Matikan kembali AC dan komputer.</li>
                        <li>Kunci kembalikan pada admin.</li>
                    </ul>
                </td>
            </tr>
        </table>

        <table border="1" id="dataTables1" class="table">
            <!-- tampilan tabel header -->
            <thead>
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Jenis Ruangan</th>
                    <th class="center">Nama Ruangan</th>
                    <th class="center">Kapasitas</th>
                </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
                <?php
                $no = 1;
                // fungsi query untuk menampilkan data dari tabel obat
                $query = mysqli_query($mysqli, "SELECT * FROM ruangan  ")
                    or die('Ada kesalahan pada query tampil Data Obat: ' . mysqli_error($mysqli));

                // tampilkan data
                while ($data = mysqli_fetch_assoc($query)) {
                    // menampilkan isi tabel dari database ke tabel di aplikasi
                    echo "<tr>
                          <td width='30' class='center'>$no</td>
                          <td nowrap width='80' class='center'>$data[jenis_ruangan]</td>
                          <td width='180'class='center'>$data[nama_ruangan]</td>
                          <td width='100' align='left'>$data[kapasitas]</td>";
                ?>
                <?php
                    echo '</td>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
