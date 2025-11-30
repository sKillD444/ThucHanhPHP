<?php
    function xuatHCN($d,$r){
        for($i=0;$i<$d;$i++){
            for($j=0;$j<$r;$j++){
                if($i==0||$i==$d-1)
                    echo    "*";
                else  
                    echo "m";
            }
        }
    }
    xuatHCN(6,4);
?>