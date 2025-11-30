<?php
    $a=[
        "Cau1"=>["1+1",[1,2,3,4],0],
        "Cau2"=>["1+2",[1,2,3,4],1],
        "Cau3"=>["1+3",[1,2,3,4],3],
        "Cau4"=>["Hom nay la thu 2>",['dung','sai'],0],
        "Cau5"=>["Hom nay la thu may",['Hai','Ba','Tu'],0]
    ];
    $ranKey =array_rand($a,4);
    var_dump($ranKey);
    foreach($ranKey as $cauhoi){
        $luaChon=$a[$cauhoi][1];
        $luaChonKey=array_keys($luaChon);
        shuffle($luaChonKey);
        foreach($luaChonKey as $maLua){
            echo "<input type='radio' name= '{$cauHoi}' value='{$maLua}'> {$luaChon[$maLua]}<br>";
        }
        echo "<br>";
    }
?>