<?php
session_start();
session_unset();
session_destroy();

// Remove cookie
setcookie("user", "", time() - 3600, "/");

header("Location: index.php");
exit();
?>
