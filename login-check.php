<?php
// panggil file untuk koneksi ke database
require_once "config.php";

// ambil data hasil submit dari form
$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($password)) {
    header("Location: index.php?alert=1");
} else {
    // ambil data dari tabel user untuk pengecekan berdasarkan inputan username dan password
    $query = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username' AND password='$password'")
        or die('Ada kesalahan pada query user: ' . mysqli_error($mysqli));
    $rows  = mysqli_num_rows($query);

    // jika data ada, jalankan perintah untuk membuat session
    if ($rows > 0) {
        $data  = mysqli_fetch_assoc($query);

        session_start();
        $_SESSION['id_user']   = $data['id_user'];
        $_SESSION['username']  = $data['username'];
        $_SESSION['password']  = $data['password'];
        $_SESSION['level']  = $data['level'];

        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
                document.addEventListener("DOMContentLoaded", function () {
                    Swal.fire({
                        icon: "success",
                        title: "Login berhasil!",
                        text: "Selamat datang, ' . $data['username'] . '",
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function () {
                        window.location.href = "informasi.php";
                    });
                });
              </script>';
        exit(); // Stop execution to prevent further redirection
    } else {
        $error = "Password yang dimasukkan salah.";
        $redirect = "registrasi.php"; // Redirect to the login page if the password is incorrect
    }
}

// Display SweetAlert for errors and redirect
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
echo '<script>
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire({
            icon: "error",
            title: "Login Gagal!",
            text: "' . $error . '",
            showConfirmButton: false,
            timer: 3000
        }).then(function () {
            window.location.href = "' . $redirect . '"; // Adjust to your login page
        });
    });
  </script>';
exit();
?>
