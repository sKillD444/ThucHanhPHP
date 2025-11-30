<?php
    function showArray($arr){
        echo "<table border=\"1px\"><tr><th>STT</th><th>Ma</th><th>Ten</th></tr>";
        foreach ($arr as $k =>$v){
            echo "<tr> <td>$k</td>";
            foreach($v as $value){
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    $arr= array();
    $r = array("id"=> "sp1", "name "=> "Sản phẩm 1 ");
    $arr[] = $r;
    $r = array("id"=> "sp2", "name "=> "Sản phẩm 2 ");
    $arr[] = $r;
    $r = array("id"=> "sp3", "name "=> "Sản phẩm 3 ");
    $arr[] = $r;
    showArray($arr);
?>