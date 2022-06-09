<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id = $_POST['edit_id'];
    $prodName = $_POST['edit_prodName'];
    $price = $_POST['edit_price'];
    $descriptions = $_POST['edit_descriptions'];
    $images = $_POST['edit_images'];
    $qty = $_POST['edit_qty'];


    // query
    $sql = "UPDATE products SET prodName='$prodName', price='$price', descriptions='$descriptions', images='$images', qty='$qty' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Akses dilarang...");
