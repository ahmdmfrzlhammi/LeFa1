<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Beranda</title>
  <link rel="stylesheet" href="registrasi.css">
</head>
<body>

<div class="login-container">
    <h2>Registrasi</h2>
    <form class="form-group" method="post" action="proses.php?act=insert">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password2">Konfirmasi Password:</label>
            <input type="password" id="password2" name="password2" required>
        </div>
        <div class="email">
            <label for="email">email:</label>
            <input type="text" id="email" name="email" required>
            <input name="level" type="hidden" id="level" value="2" required>      
      <div class="form-group">
    <select id="prodi" name="prodi" required>
      <option value="">Pilih Prodi</option>
      <option value="Teknik Informatika">Teknologi Informasi</option>
      <option value="Bisnis Digital">Bisnis Digital</option>
      <option value="MekaTronika">MekaTronika</option>
      <option value="Bahasa Jepang">Bahasa Jepang</option>
      <!-- Tambahkan opsi sesuai dengan prodi yang diinginkan -->
    </select>
  </div>
        <div class="submit">
            <input type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>
</body>
</html>
