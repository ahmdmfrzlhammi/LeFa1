<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Beranda</title>
    <link rel="stylesheet" href="stylesmenetapkan.css">
</head>

<body>

    <nav class="sidebar">
        <ul>
            <li><a href="beranda.php">Beranda</a></li>
            <li><a href="informasi.php">Informasi Ruangan</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="registrasi.php">Registrasi</a></li> <!-- Added registration link -->
        </ul>
    </nav>

    <div class="login-container">
        <h2 class="login">Login</h2>
        <form class="login-form" method="post" action="login-check.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="Login">
                
            </div>
        </form>
    </div>

</body>

</html>
