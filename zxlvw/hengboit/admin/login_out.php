<?php
session_start();
unset($_SESSION['uname']);
echo "<script language='javascript'>";
echo "location='index.php';";
echo "</script>";

?>