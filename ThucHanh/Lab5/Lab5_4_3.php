<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab5_3</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Ten dang nhap <input type="text" name="ten" require><br>
        Mat khau <input type="password" name="matkhau" require><br>
        Nhap lai mat khau <input type="password" name="nhaplaimatkhau" require><br>
        Gioi tinh 
        <input type="radio" name="gioitinh" value="Nam" checked>Nam
        <input type="radio" name="gioitinh" value="Nu" checked>Nu<br>
        So thich
        <input type="checkbox" name="sothich" value="Du lich"> Du lich <br>
        <input type="checkbox" name="sothich" value="Xem phim"> Xem phim <br>
        <input type="checkbox" name="sothich" value="The thao"> The thao <br>
        Hinh 
        <input type="file" name="hinh"><br>
        Tinh 
        <select name="tinh" id="" require>
            <option value="TP HCM">Thanh Pho Ho Chi Minh</option>
            <option value="An Giang">An Giang</option>
            <option value="Dong Thap">Dong Thap</option>
            <option value="Long An">Long An</option>
        </select><br>
        <input type="submit" name="submit" value="Dang Ky">
        <input type="reset" name="reset" value="Xoa">
    </form>

    <?php
        function postIndex($index, $value="")
        {
            if (!isset($_POST[$index]))	return $value;
            return $_POST[$index];
        }
        $submit=postIndex("submit");
        $ten=postIndex("ten");
        $matkhau=postIndex("matkhau");
        $nhaplaimatkhau=postIndex("nhaplaimatkhau");
        $gioitinh=postIndex("gioitinh");
        $sotich=postIndex("sothich");
        $tinh=postIndex("tinh");
        $arrImg = array("image/png", "image/jpeg", "image/bmp","image/gif");
        $flag=0;
        if($submit)
        {
            $err="";
            if($matkhau!=$nhaplaimatkhau){
                $err.="Khong khop mat khau";
            }
            if(strlen($matkhau)<8)
                $err.="Mat khau phai hon 8 ky tu";
            if(isset($_POST["hinh"])){
                $errFile = $_FILES["hinh"]["error"];
                $flag=1;
                if ($errFile>0)
                    $err .="Lỗi file hình <br>";
                else
                {
                    $type = $_FILES["hinh"]["type"];
                    if (!in_array($type, $arrImg))
                        $err .="Không phải file hình <br>";
                    else
                    {	$temp = $_FILES["hinh"]["tmp_name"];
                        $name = $_FILES["hinh"]["name"];
                        if (!move_uploaded_file($temp, "image/".$name))
                            $err .="Không thể lưu file<br>";
                        
                    }
                }
            }
            if ($err !="")
                echo $err;
            else{
                echo "Dang ky thanh cong. Chao " .$ten;
                echo "<hr>";
                if($flag)
                    echo "<img src='image/$name'>";
            }
        }
    ?>
</body>
</html>