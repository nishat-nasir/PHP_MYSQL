<?php
    include("./config.php");
    $data = mysqli_query($db, "SELECT * FROM products");

    if ($data->num_rows > 0) {
        // output data of each row
        while($row = $data->fetch_assoc()) {
            echo json_encode($row, JSON_PRETTY_PRINT);
        }

    } else {
        echo "0 datas";
    }

?>