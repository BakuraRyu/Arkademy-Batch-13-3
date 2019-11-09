<?php
require_once "config/config.php";

if (isset($_POST['saveadd'])) {
    $cashier = trim(mysqli_real_escape_string($con, $_POST['cashier']));
    $product = trim(mysqli_real_escape_string($con, $_POST['product']));
    $category = trim(mysqli_real_escape_string($con, $_POST['category']));
    $pricerp = trim(mysqli_real_escape_string($con, $_POST['price']));
    $pricerp1 = str_replace("Rp. ", "", $pricerp);
    $price = str_replace(".", "", $pricerp1);
        
    $qsubmit = "INSERT INTO product (name_product, price, id_category, id_cashier) VALUES ('$product', '$price', '$category', '$cashier')";
    $result = mysqli_query($con,$qsubmit) or die (mysqli_error($con));
    
    
    if ($result) {
        $response["value"] = 1;
        $response["message"] = "Berhasil menyimpan data";
    } else {
        $response["value"] = 0;
        $response["message"] = "Gagal merubah data";
    }
    echo json_encode($response);
} else {
    $response["value"] = 0;
    $response["message"] = "Error!!";
    echo json_encode($response);
}



?>