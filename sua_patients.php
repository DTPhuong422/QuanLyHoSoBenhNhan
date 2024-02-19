<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}
$khoa = $id_card = $name = $dob = $gender = $address = $reason = "";
if(isset($_GET['id_card'])) {
    $id_card = $_GET['id_card'];
    $sql = "SELECT * FROM patients WHERE id_card = '$id_card'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $khoa = $row['khoa'];
        $name = $row['name'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $address = $row['address'];
        $reason = $row['reason'];
    } else {
        echo "Không tìm thấy bệnh nhân.";
        exit();
    }
} else {
    echo "Thiếu thông tin bệnh nhân.";
    exit();
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sửa thông tin bệnh nhân</title>
    <style>
        .form-container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
        }
        .form-container input[type="text"],
        .form-container select,
        .form-container textarea {
            width: calc(100% - 10px);
            padding: 5px;
            margin-bottom: 10px;
        }
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            background-color: #dff0d8;
            border: 1px solid #3c763d;
            color: #3c763d;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Sửa thông tin bệnh nhân</h2>
        <form action="sua.php" method="post">
            <label for="khoa">Khoa/Phòng bệnh:</label>
            <select id="khoa" name="khoa">
                <option value="Khoa Nội" <?php if($khoa == 'Khoa Nội') echo 'selected'; ?>>Khoa Nội</option>
                <option value="Khoa Ngoại" <?php if($khoa == 'Khoa Ngoại') echo 'selected'; ?>>Khoa Ngoại</option>
                <option value="Khoa Sản" <?php if($khoa == 'Khoa Sản') echo 'selected'; ?>>Khoa Sản</option>
            </select>
            <label for="id_card">Số chứng minh nhân dân:</label>
            <input type="text" id="id_card" name="id_card" value="<?php echo $id_card; ?>" readonly>
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>">
            <label for="dob">Ngày sinh:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>">
            <label for="gender">Giới tính:</label>
            <select id="gender" name="gender">
                <option value="male" <?php if($gender == 'male') echo 'selected'; ?>>Nam</option>
                <option value="female" <?php if($gender == 'female') echo 'selected'; ?>>Nữ</option>
            </select>
            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>">
            <label for="reason">Lý do nhập viện:</label>
            <textarea id="reason" name="reason"><?php echo $reason; ?></textarea>
            <input type="submit" value="Cập nhật">
        </form>
        <?php
        if(isset($_GET['message'])) {
            echo '<div class="message">' . $_GET['message'] . '</div>';
        }
        ?>
    </div>
</body>
</html>
