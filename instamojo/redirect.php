<?php
session_start();
$_SESSION['TID'];
echo "<br/>";
echo '<pre>';
print_r($_REQUEST);
