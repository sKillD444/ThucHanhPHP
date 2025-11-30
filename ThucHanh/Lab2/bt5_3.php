<?php
    function tinhPTBac2($a,$b,$c){
        if($a===0){
            if($b===0){
                if($c===0)
                    echo "Phuong trinh vo so nghiem";
                else
                    echo "Phuong trinh vo nghiem";
            }
            else{
                $x=-$c/$b;
                echo "Phuong trinh co nghiem la: $x";
            }
        }
        else {
            $delta=$b*$b-4*$a*$c;
            if($delta<0)
                echo "Phuong trinh vo nghiem";
            else if($delta>0){
                echo "Phuong trinh co 2 nghiem phan biet:";
                $x1=(-$b+sqrt($delta))/(2*$a);
                $x2=(-$b-sqrt($delta))/(2*$a);
                echo " x1= $x1";
                echo "; x2= $x2";
            }
            else{
                $x=-$b/(2*$a);
                echo "Phuong trinh co nghiem kep la: $x";
            }
        }
    }
    tinhPTBac2(0,0,0);//Phuong trinh vo so nghiem   
    echo "<br/>";
    tinhPTBac2(0,0,1);//Phuong trinh vo nghiem   
    echo "<br/>";
    tinhPTBac2(0,3,0);//Phuong trinh co 1 nghiem
    echo "<br/>";
    tinhPTBac2(2,4,2);//Phuong trinh vo nghiem   
    echo "<br/>";
    tinhPTBac2(2,3,1);//Phuong trinh co 2 nghiem phan biet  
    echo "<br/>";
    tinhPTBac2(0,0,3);//Phuong trinh co nghiem kep
    echo "<br/>";
?>
