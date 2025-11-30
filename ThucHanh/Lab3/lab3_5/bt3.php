<?php
    function tongSoTrongChuoi($s1){
        $kq=0;
        for($i=0;$i<strlen($s1);$i++){
            if(is_numeric($s1[$i]))
                $kq+=$s1[$i];
        }
        echo $kq;
    }
    tongSoTrongChuoi("ngay15thang7nam2015")
?>