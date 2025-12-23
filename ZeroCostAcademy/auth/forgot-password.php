<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $newPass = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);

    $update = $conn->query("UPDATE users SET password='$newPass' WHERE email='$email'");
    if ($update) {
        echo "Password updated successfully!";
    } else {
        echo "Failed to reset password.";
    }
}
?>
