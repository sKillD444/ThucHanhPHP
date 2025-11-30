<?php
    function showArray($arr){
        echo "<table border=\"1px\"><tr><th>Index</th><th>Value</th></tr>";
        foreach ($arr as $k =>$v){
            echo "<tr> <td>$k</td><td>$v</td></tr>";
        }
        echo "</table>";
    }
    $a=array (1,2,3,4,5,6);
    showArray($a);
?>