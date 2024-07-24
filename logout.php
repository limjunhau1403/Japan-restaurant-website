<?php

$conn = mysqli_connect('localhost','root','','assignment');

session_start();
session_unset();
session_destroy();

header('location:beforeLogInIndex.php');

?>