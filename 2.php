<?php
    $nama = 'arkademy';
    if(!preg_match("/^[a-z]{5,}(?=\.)*$/",$nama)){
        $type_nama = 'return false </br>';
    } else {
        $type_nama = 'return true </br>';
    }
    echo $type_nama;

    $username = '29@PASS';
    if(!preg_match("/^(\d{2}+)[@&+](\b[A-Z]{4}+)$/x", $username)){
        $type3_username = 'return false';
    } else {
        $type3_username = 'return true';
    }
    echo $type3_username;
