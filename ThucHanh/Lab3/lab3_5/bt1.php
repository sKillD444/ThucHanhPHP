<?php
    function kiemtranguyento($x)//Kiểm tra 1 số có nguyên tố hay không
    {
        if($x<2)
            return false;
        if($x==2)
            return true;
        for($i=2;$i<=sqrt($x);$i++)
            if($x%$i==0)
                return false;
        return true;
    }

    function xuatNSoNguyenTo($n){
        $i=2;
        $dem=0;
        do{
            if(kiemtranguyento($i)){
                echo "$i <br/>";
                $dem++;
            }
            $i++;
        }while($dem<$n);
    }
    xuatNSoNguyenTo(10);
?>