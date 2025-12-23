<?php
ob_start();  // Start output buffering
session_start();  // Start session
include 'db.php';  // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Check if the email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
        exit;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        // ❌ User already exists — alert and redirect to login
        echo "<script>
                alert('User already exists! Redirecting to Login...');
                window.location.href = 'login.html';
              </script>";
    } else {
        // ✅ Register new user
        $insert = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if (!$insert) {
            echo "Insert prepare failed: " . $conn->error;
            exit;
        }

        $insert->bind_param("sss", $username, $email, $password);

        if ($insert->execute()) {
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;

            // ✅ Redirect to homepage after registration
            header("Location: index.php");
            exit;
        } else {
            echo "Insert execute failed: " . $insert->error;
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}

ob_end_flush();  // End output buffering
?>
