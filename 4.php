<?php
function data($word)
{
    $data1 = '';
    $data2 = '';
    $pisahkan = str_split($word);
    for ($i = 0; $i < count($pisahkan); $i++) {
        if (
            $pisahkan[$i] == 'a' || $pisahkan[$i] == 'i' || $pisahkan[$i] == 'u' || $pisahkan[$i] == 'e' || $pisahkan[$i] == 'o'
            || $pisahkan[$i] == 'A' || $pisahkan[$i] == 'I' || $pisahkan[$i] == 'U' || $pisahkan[$i] == 'E' || $pisahkan[$i] == 'O'
        ) {
            $data1 .= $pisahkan[$i] . '</br>';
        } else {
            $data2 .= $pisahkan[$i] . '</br>';
        }
    }
    echo $data1 . $data2;
}
data("ARKADEMY");
?>
