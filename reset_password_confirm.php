<?php
require_once "config.php"; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
    $token = mysqli_real_escape_string($mysqli, $_GET['token']);
    $checkTokenQuery = "SELECT email FROM password_reset WHERE token = '$token'";
    $result = mysqli_query($mysqli, $checkTokenQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        // Use $email to identify the user in your database and reset their password
        // ...
        // After completing the password reset, you might want to delete the entry from the password_reset table
        $deleteTokenQuery = "DELETE FROM password_reset WHERE token = '$token'";
        mysqli_query($mysqli, $deleteTokenQuery);

        echo "Password has been successfully reset.";
    } else {
        echo "Invalid or expired token.";
    }
}
?>
