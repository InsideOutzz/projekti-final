<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

header("Location: login.php");
exit();
?>