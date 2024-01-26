<?php
require_once "config.php"; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $token = bin2hex(random_bytes(32)); // Generate a random token
    ini_set('SMTP','smtpout.secureserver.net');
ini_set('smtp_port',80);

    $insertQuery = "INSERT INTO password_reset (email, token) VALUES ('$email', '$token')";
    mysqli_query($mysqli, $insertQuery);

    // Send email with a link containing the token
    $resetLink = "http://localhost/bookinglab/reset_password_confirm.php?token=$token";
    $subject = "Password Reset";
    $message = "Click the following link to reset your password: $resetLink";
    

    echo "An email has been sent with instructions to reset your password.";
}
?>
