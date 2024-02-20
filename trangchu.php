<!DOCTYPE html>
<html>
<head>
    <title>Quản lý thông tin bệnh nhân</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-KjyLYS9c3bIZHp1+Z/E5umMnOHC0N+MSnZAPwuWfBLvHDwe0X8h+PP2LOenRpDPM" crossorigin="anonymous">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 100%;
            height: 100%;
        }
        .form-container {
            width: 80%;
            height: 800px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            margin-right: 20px;
        }
        #sidebar {
            min-width: 20%;
            max-width: 20%;
            height: 800px;
            background: #4CAF50;
            color: #fff;
            margin-top: 18px
        }
        #sidebar .sidebar-header {
            padding: 20px;
        }
        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }
        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }
        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }
        #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
        }
        #sidebar ul li.active a {
            background: #6d7fcc;
            color: #fff;
        }
        legend, h3 {
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"], select, textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        input[type="submit"], input[type="reset"] {
            width: calc(50% - 10px);
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #45a049;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container">
        <fieldset id="sidebar">
            <h3>Trang chủ</h3>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#admin">
                        Đăng ký thêm bệnh nhân mới 
                    </a>
                </li>
                <li>
                    <a href="danhsachbenhnhan.php">
                        <i class="fas fa-users"></i>
                        Danh sách bệnh nhân
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        Sign out
                    </a>
                </li>
            </ul>
        </fieldset>
        <fieldset class="form-container">
            <legend>Thông tin đăng ký bệnh nhân mới</legend>
            <form action="xulythongtin.php" method="post" >
                <label for="khoa">Khoa/Phòng bệnh:</label><br>
                <select id="khoa" name="khoa">
                    <option value="">-- CHỌN KHOA BỆNH --</option>
                    <option value="Khoa Nội">Khoa Nội</option>
                    <option value="Khoa Ngoại">Khoa Ngoại</option>
                    <option value="Khoa Sản">Khoa Sản</option>
                </select><br>
                <label for="id_card">Số chứng minh nhân dân:</label><br>
                <input type="text" id="id_card" name="id_card" required><br>
                <label for="name">Họ và tên:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="dob">Ngày sinh:</label><br>
                <input type="date" id="dob" name="dob" required><br>
                <label for="gender">Giới tính:</label><br>
                <select id="gender" name="gender">
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                </select><br>
                <label for="address">Địa chỉ:</label><br>
                <input type="text" id="address" name="address" required><br>
                <label for="reason">Lý do nhập viện:</label><br>
                <textarea id="reason" name="reason" required></textarea><br><br>
                <div class="button-container">
                    <input type="submit" value="Ghi nhận">
                    <input type="reset" value="Hủy">
                </div>
            </form>
        </fieldset>
    </div>
</body>
</html>
