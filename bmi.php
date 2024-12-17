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
// ฟังก์ชันคำนวณ BMI: รับน้ำหนัก (kg) และส่วนสูง (cm) คืนค่า BMI
function calculateBMI($weight, $height) {
    $heightInMeters = $height / 100;
    return $weight / ($heightInMeters * $heightInMeters);
}

// ฟังก์ชันแปลผล BMI: รับค่า BMI และคืนข้อความแปลผล
function interpretBMI($bmi) {
    if ($bmi < 18.5) {
        return "น้ำหนักน้อยกว่ามาตรฐาน";
    } elseif ($bmi >= 18.5 && $bmi < 24.9) {
        return "น้ำหนักปกติ";
    } elseif ($bmi >= 25 && $bmi < 29.9) {
        return "น้ำหนักเกิน";
    } else {
        return "โรคอ้วน";
    }
}

// ตรวจสอบว่าเป็นการส่งข้อมูลแบบ POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    // เรียกใช้ฟังก์ชันคำนวณ BMI
    $bmi = calculateBMI($weight, $height);

    // เรียกใช้ฟังก์ชันแปลผล BMI
    $bmiResult = interpretBMI($bmi);
}
?>

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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 500px;
        }
        h1 {
            color: #ff66a3;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            color: #555;
            margin: 5px 0;
        }
        .bmi-result {
            font-weight: bold;
            color: #ff1493;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            background: #ff66a3;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .back-link:hover {
            background: #ff99c8;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <p>ชื่อ: <?php echo htmlspecialchars($firstName . " " . $lastName); ?></p>
            <p>อายุ: <?php echo htmlspecialchars($age); ?> ปี</p>
            <p>น้ำหนัก: <?php echo htmlspecialchars($weight); ?> กิโลกรัม</p>
            <p>ส่วนสูง: <?php echo htmlspecialchars($height); ?> เซนติเมตร</p>
            <p class="bmi-result">ค่า BMI: <?php echo number_format($bmi, 2); ?></p>
            <p class="bmi-result">ผลการประเมิน: <?php echo $bmiResult; ?></p>
        <?php else: ?>
            <p>กรุณากรอกข้อมูลให้ถูกต้องในฟอร์ม</p>
        <?php endif; ?>
        <a href="bmi_form.php" class="back-link">ย้อนกลับ</a>
    </div>
</body>
</html>
