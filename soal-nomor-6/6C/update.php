<?php
require_once "config/config.php";


$cashier = trim(mysqli_real_escape_string($con, $_POST['cashier']));
$product = trim(mysqli_real_escape_string($con, $_POST['product']));
$category = trim(mysqli_real_escape_string($con, $_POST['category']));
$price = trim(mysqli_real_escape_string($con, $_POST['price']));
$idproduct = $_POST['id'];

$qsubmit = "UPDATE product SET name_product = '$product', price = '$price', id_category = '$category', id_cashier = '$cashier' WHERE id_product = '$idproduct' ";
$result = mysqli_query($con,$qsubmit) or die (mysqli_error($con));

if ($result) {
    $response["value"] = 1;
    $response["message"] = "Berhasil menyimpan perubahan data";
} else {
    $response["value"] = 0;
    $response["message"] = "Gagal merubah data";
}
echo json_encode($response);


?>