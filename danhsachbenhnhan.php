<!DOCTYPE html>
<html>
<head>
    <title>Danh sách bệnh nhân</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hospital_db";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM patients";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2 style='text-align: center;'>Danh sách bệnh nhân</h2>";
            echo "<table>
                    <tr>
                        <th>Khoa</th>
                        <th>Số CMND</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Lý do nhập viện</th>
                        <th></th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["khoa"] . "</td>";
                echo "<td>" . $row["id_card"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["dob"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["reason"] . "</td>";
                echo "<td><a href='sua_patients.php?id_card=" . $row["id_card"] . "'>Sửa</a> | <a href='xoa_patients.php?id_card=" . $row["id_card"] . "' onclick=\"return confirm('Chắc chắn xóa không?');\">Xóa</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Không có bệnh nhân nào.";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
