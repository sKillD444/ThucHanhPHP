<?php
    $a=10.1;
    if(is_int($a)){
        echo 'Bien $a la so nguyen';
    }
    else if(is_double($a)){
        echo 'Bien $a la so thuc';
    }
    else
        echo 'Bien $a khong la so nguyen hay so thuc';
?>