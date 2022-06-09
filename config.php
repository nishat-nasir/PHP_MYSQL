<?php

$server = "localhost";
$user = "root";
$password = "Admin123!@#";
$name_database = "ecommerce";

$db = mysqli_connect($server, $user, $password, $name_database);

if (!$db)
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
