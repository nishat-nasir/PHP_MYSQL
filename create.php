<?php
include("./config.php");

// check if the register button has been clicked blom
if (isset($_POST['create'])) {
    // fetch data from form
    $prodName = $_POST['prodName'];
    $price = $_POST['price'];
    $descriptions = $_POST['descriptions'];
    $images = $_POST['images'];
    $qty = $_POST['qty'];
    // query
    $sql = "INSERT INTO products(prodName, price, descriptions, images, qty)
    VALUES(' $prodName', '$price', '$descriptions', '$images', '$qty')";
    $query = mysqli_query($db, $sql);

    // check if the query was saved successfully?
    if ($query)
        header('Location: ./index.php?status=success');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Akses dilarang...");


