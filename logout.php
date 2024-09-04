<?php
session_start();
session_destroy();
echo'<script>alert( "Logged out Successfully");</script>';
echo "<script> location.href='homepage.php'; </script>";
?>