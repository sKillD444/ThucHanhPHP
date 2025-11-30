<?php
    function kiemTraDoiXung($s1){
        trim($s1);
        $s2=strrev($s1);
        for($i=0;$i<strlen($s2)/2;$i++){
            if($s2[$i]!=$s1[$i])
                return false;
        }
        return true;
    }
    $s1="abcbac";
    echo " \"$s1\" co phai chuoi doi xung khong?<br/>";
    if(kiemTraDoiXung($s1))
        echo "Co";
    else
        echo "Khong";
?>