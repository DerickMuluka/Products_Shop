<?php
session_start();

// Clear session data
session_unset();
session_destroy();

// Redirect back to customer login page
header("Location: ../index.php");
exit();
?>