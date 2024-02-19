<?php
session_start();
$khoa = $_SESSION['khoa'];
$id_card = $_SESSION['id_card'];
$name = $_SESSION['name'];
$dob = $_SESSION['dob'];
$gender = $_SESSION['gender'];
$address = $_SESSION['address'];
$reason = $_SESSION['reason'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}
$sql_update = "UPDATE patients SET khoa='$khoa', name='$name', dob='$dob', gender='$gender', address='$address', reason='$reason' WHERE id_card='$id_card'";

if ($conn->query($sql_update) === TRUE) {
    echo "Cập nhật thông tin bệnh nhân thành công.";
} else {
    echo "Lỗi: " . $sql_update . "<br>" . $conn->error;
}
$conn->close();
?>
