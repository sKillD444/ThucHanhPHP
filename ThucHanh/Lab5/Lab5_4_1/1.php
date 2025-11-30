<?php
    $arr=array();
    $r=array("id"=>1,"name"=>"Produc1");
    $arr[]=$r;
    $r=array("id"=>2,"name"=>"Produc2");
    $arr[]=$r;
    $r=array("id"=>3,"name"=>"Produc3");
    $arr[]=$r;
    $r=array("id"=>4,"name"=>"Produc4");
    $arr[]=$r;
    foreach($arr as $v){
    ?>
    <a href="2.php?id=<?=$v["id"]?>"><?=$v["name"]?></a>
    <?php
    }
?>