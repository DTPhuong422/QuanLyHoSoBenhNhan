
<?php
session_start();
$khoa = $_POST['khoa'];
$id_card = $_POST['id_card'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$reason = $_POST['reason'];

$_SESSION['khoa'] = $khoa;
$_SESSION['id_card'] = $id_card;
$_SESSION['name'] = $name;
$_SESSION['dob'] = $dob;
$_SESSION['gender'] = $gender;
$_SESSION['address'] = $address;
$_SESSION['reason'] = $reason;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Kiểm tra xem bệnh nhân đã tồn tại trong cơ sở dữ liệu chưa
$sql_check = "SELECT * FROM patients WHERE id_card = '$id_card'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Nếu bệnh nhân đã tồn tại, hiển thị thông báo và xác nhận từ người dùng
    echo '<script>
            var confirmed = confirm("Thông tin bệnh nhân đã tồn tại. Bạn có muốn thay đổi thông tin không?");
            if (confirmed) {
                // Nếu người dùng đồng ý, thực hiện gửi yêu cầu cập nhật
                window.location.href = "update_patients.php?id_card=' . $id_card . '";
            } else {
                // Nếu người dùng không đồng ý, quay lại trang trước
                window.history.back();
            }
          </script>';         
} else {
    // Nếu bệnh nhân chưa tồn tại, thực hiện thêm thông tin mới
    $sql_insert = "INSERT INTO patients (khoa, id_card, name, dob, gender, address, reason)
    VALUES ('$khoa', '$id_card', '$name', '$dob', '$gender', '$address', '$reason')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "Thêm thông tin bệnh nhân mới thành công.";
    } else {
        echo "Lỗi: " . $sql_insert . "<br>" . $conn->error;
    }
}

$conn->close();
?>
