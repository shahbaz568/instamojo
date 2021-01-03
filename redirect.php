<?php
session_start();
echo $_SESSION['TID'];
echo "<pre>";
print_r($_REQUEST);
?>