<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>การใช้คำสั่งแบบ Conditione (กลุ่มคำสั่ง if)</h1>
    <?php   
        echo "<h2?>คำสั่ง if</h2>";
        $x = 5;
        $y = 8;
        echo "\$x = $x";
        echo "\$y = $y"
        if($x<$y){
            echo "ค่าในตัวแปร x น้อยกว่าต่าในตัวแปร y"
        }
        else{
            echo "ค่าในตัวแปร x น้อยกว่าต่าในตัวแปร x"
        }
        echo "------------------------------------------------------------------"
</body>
</html>