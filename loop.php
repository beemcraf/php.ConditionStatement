<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำสั่ง Loop ใน php</title>
</head>
<body>
    <h1>การใช้คำสั่งแบบวนรอบ Loop Statement</h1>
    <?php
        echo "<h2>While loop</h2>";
        echo "<br>";
        $x = 1;
        while ($x <= 5) {
            if ($x == 3) break; 
            echo "รอบที่ $x <br>";
            $x++;
        }
        
        $i = 1;
        while ($i <= 40) {
            echo "_"; 
            $i++;
        }
        echo "<br>";

        echo "<h2>do..While loop</h2>";
        echo "<br>";
        $y = 1;
        do {
            echo "รอบที่ $y <br>";
            $y++;
            if ($y >= 5) break;  
        } while ($y <= 99999999);  
        echo "_______________________________________ <br>";

        echo "<h2>For loop</h2>";
        for ($i = 0; $i < 10; $i++) {
            echo "For รอบที่ $i<br>";
        }
        echo "_______________________________________ <br>";
    ?>
</body>
</html>
