<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/");
    include("../config.php");


    $data = mysqli_query($db, "SELECT * FROM products");

    $response = array();

    if($data){
        $i=0;
        while($row = mysqli_fetch_assoc($data)){
            $response[$i]['id'] = $row['id'];
            $response[$i]['prodName'] = $row['prodName'];
            $response[$i]['price'] = $row['price'];
            $response[$i]['descriptions'] = $row['descriptions'];
            $response[$i]['images'] = $row['images'];
            $response[$i]['qty'] = $row['qty'];
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }else{
        echo "NO DATA";
    }

?>