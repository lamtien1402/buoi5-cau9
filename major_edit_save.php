<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra xem dữ liệu có tồn tại không
if (isset($_POST['id']) && isset($_POST['name'])) {
    // Nhận dữ liệu từ form
    $id = $_POST['id'];
    $name = $_POST['name'];

    // Chuẩn bị và thực thi câu lệnh SQL
    $sql = "UPDATE major SET name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $name, $id);

    if ($stmt->execute()) {
        echo "Ngành học đã được cập nhật thành công.";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Dữ liệu không đầy đủ.";
}

$conn->close();
?>
<a href="major_index.php">Trở lại danh sách</a>