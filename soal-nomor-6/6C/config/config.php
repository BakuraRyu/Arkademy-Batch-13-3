<?php

session_start();

// koneksi
include_once "conn.php";

$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (mysqli_connect_errno()) {
   echo mysqli_connect_error();
}

// fungsi base_url
function base_url($url = null) {
    $base_url = "http://localhost/6C";
    if ($url != null) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

?>