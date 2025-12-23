<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: signup.html"); // Redirect if not logged in
    exit;
}

$username = $_SESSION["username"];
$email = $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile Dropdown</title>

</head>
<body>

<!-- Navbar with Profile Icon -->
<div class="navbar">
  <div class="profile-container" id="profileContainer" onclick="toggleDropdown()">
    <div class="profile-icon">
      &#128100; <!-- user icon -->
    </div>
    <div class="dropdown" id="profileDropdown">
      <p><strong>Username:</strong> <?= htmlspecialchars($username) ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
      <button class="logout-btn" onclick="logout()">Logout</button>
    </div>
  </div>
</div>

<script>
  function toggleDropdown() {
    document.getElementById('profileContainer').classList.toggle('active');
  }

  function logout() {
    window.location.href = 'logout.php'; 
    window.location.href = 'signup.html'; // Calls logout.php to destroy session
  }

  // Optional: Close dropdown if clicked outside
  window.addEventListener('click', function(e) {
    const container = document.getElementById('profileContainer');
    if (!container.contains(e.target)) {
      container.classList.remove('active');
    }
  });
</script>

</body>
</html>
