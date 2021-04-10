<?php
session_start();
session_destroy();
echo "<h3 style='font-family:Segoe UI;'>You have been logged out!</h3>";
echo "<script>setTimeout(\"location.href ='login.html';\",1500);</script>";
?>