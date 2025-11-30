<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        Ten San Pham: <input type="text" name="ten"><br>
        <input type="radio" name="lc" value="Gan dung" checked>Gan dung
        <input type="radio" name="lc" value="Chinh xac">Chinh xac<br>
        Loai
        <select name="Loai" id="">
            <option value="tatca">
                Tat ca
            </option>
            <option value="loai1">
                Loai 1
            </option>
            <option value="loai2">
                Loai 2
            </option>
            <option value="loai3">
                Loai 3
            </option>
        </select><br>
        <input type="submit" name="submit" value="Tim">
    </form>
    <?php
        if(isset($_GET["submit"])){
            echo "Ten san pham: " .$_GET["ten"] ."<br>" ;
            echo "Cach tim: " .$_GET["lc"] ."<br>";
            echo "Loai San: " .$_GET["Loai"] ."<br>";
        }
    ?>
</body>
</html>