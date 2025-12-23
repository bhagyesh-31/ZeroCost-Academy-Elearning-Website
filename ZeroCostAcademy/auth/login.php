<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];

            header("Location: index.php");
            exit;
        } else {
            echo "<script>
                    alert('Invalid password!');
                    window.location.href = 'login.html';
                  </script>";
        }
    } else {
        echo "<script>
                alert('User not found! Redirecting to site back again....');
                window.location.href = 'login.html?signup=true';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
