<?php
require_once "config/config.php";

$id = trim($_POST['id']);
$qdelete = mysqli_query($con, "DELETE FROM product WHERE id_product = '$id'") or die (mysqli_error($con));

if ($qdelete) {
    $response["value"] = 1;
    $response["message"] = "Berhasil menghapus data";
    echo json_encode($response);
} else {
    $response["value"] = 0;
    $response["message"] = "Gagal menghapus data!";
    echo json_encode($response);
}


?>