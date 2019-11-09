<?php
function thirdHighest($data)
{
    if (is_array($data)) {
        if (count($data) > 2) {
            rsort($data);
            echo $data[2];
        } else {
            echo 'Minimal array length is 3!';
        }
    } else {
        echo 'Parameter should be an array!';
    }
}
thirdHighest([1, 2, 3, 5, 6]);
?>