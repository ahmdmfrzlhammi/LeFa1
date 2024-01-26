<!-- Aplikasi Persediaan Obat pada Apotek
*******************************************************
* Developer    : Vanny Hadiwijaya, S.Kom
* Company      : Wijaya Studio
* Release Date : 14 November 2018
* Blog         : vannyhadiwijaya.blogspot.com
* E-mail       : vannyhadiwijaya@gmail.com
* Phone        : +62-821-3297-2137
-->

<?php

session_start();
// Panggil koneksi database.php untuk koneksi database
require_once "config.php";


// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1

	// insert data
	if ($_GET['act']=='insert') {
		if (isset($_POST['simpan'])) {
			// ambil data hasil submit dari form
			$username  = mysqli_real_escape_string($mysqli, trim($_POST['username']));
			$password  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
			$prodi  = mysqli_real_escape_string($mysqli, trim($_POST['prodi']));
			$email  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
			$level  = mysqli_real_escape_string($mysqli, trim($_POST['level']));
			// perintah query untuk menyimpan data ke tabel users
            $query = mysqli_query($mysqli, "INSERT INTO user(username,password,prodi,email,level)
                                            VALUES('$username','$password','$prodi','$email','$level')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: login.php");
            
		}	
        }
    }

	// update data
					
?>