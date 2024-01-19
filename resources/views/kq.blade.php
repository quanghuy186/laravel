<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        echo "Mô tả : " . $description . "<br>"; 
        echo "Gía : " . $price . "<br>"; 
        echo "Tỷ lệ triết khấu : " . $discountPercent . "<br>"; 
        echo "Giá sau khi đã được triết khấu : " . $discountAmount. "<br>"; 
    ?>
</body>
</html>