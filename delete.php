<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // fetch id from query string
    $id = $_POST['delete_id'];

    // query for delete data
    $sql = "DELETE FROM products WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // was the query deleted successfully?
    if ($query) {
        header('Location: ./index.php?delete=success');
    } else
        die('Location: ./index.php?delete=gagal');
} else
    die("akses dilarang...");
