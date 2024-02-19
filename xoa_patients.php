<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

if(isset($_GET['id_card'])) {
    $id_card = $_GET['id_card'];
    $sql = "DELETE FROM patients WHERE id_card = $id_card";

    if ($conn->query($sql) === TRUE) {
        echo "Thông tin bệnh nhân đã được xóa thành công.";
    } else {
        echo "Lỗi". $sql . "<br>" . $conn->error;
    }
} else {
    echo "Thiếu thông tin bệnh nhân.";
    exit();
}

$conn->close();
?>
