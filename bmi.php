<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลลัพธ์การคำนวณค่า BMI</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #ffccda, #ffe6f0);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            padding: 30px;
            box-sizing: border-box;
            text-align: center;
            border: 2px solid #ff99c8;
        }

        h1 {
            font-size: 28px;
            color: #ff66a3;
            margin-bottom: 20px;
            background: linear-gradient(to right, #ff99c8, #ffcce6);
            -webkit-background-clip: text;
            color: transparent;
        }

        p, h3 {
            font-size: 16px;
            color: #555;
            margin: 10px 0;
        }

        .result {
            font-size: 18px;
            font-weight: bold;
            margin: 15px 0;
            color: #ff1493;
        }

        .category {
            font-size: 16px;
            font-weight: normal;
            color: #db7093;
        }

        .back-link {
            margin-top: 20px;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            background: linear-gradient(45deg, #ff99c8, #ff66a3);
            padding: 10px 20px;
            border-radius: 8px;
            transition: background 0.3s ease-in-out;
            display: inline-block;
        }

        .back-link:hover {
            background: linear-gradient(45deg, #ffcce6, #ff99c8);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>ผลลัพธ์การคำนวณ BMI</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $age = $_POST['age'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];

        $heightInMeters = $height / 100;
        $bmi = $weight / ($heightInMeters * $heightInMeters);

        echo "<div class='result'>";
        echo "<h3>ชื่อ: $firstName $lastName</h3>";
        echo "<h3>อายุ: $age ปี</h3>";
        echo "<h3>น้ำหนัก: $weight กิโลกรัม</h3>";
        echo "<h3>ส่วนสูง: $height เซนติเมตร</h3>";
        echo "<h3>BMI: " . number_format($bmi, 2) . "</h3>";

        if ($bmi < 18.5) {
            echo "<p class='category'>ผลการประเมิน: น้ำหนักน้อยกว่ามาตรฐาน</p>";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            echo "<p class='category'>ผลการประเมิน: น้ำหนักปกติ</p>";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            echo "<p class='category'>ผลการประเมิน: น้ำหนักเกิน</p>";
        } else {
            echo "<p class='category'>ผลการประเมิน: โรคอ้วน</p>";
        }

        echo "</div>";
    } else {
        echo "<p>กรุณากรอกข้อมูลในฟอร์มเพื่อคำนวณ BMI</p>";
    }
    ?>

</div>
</body>
</html>