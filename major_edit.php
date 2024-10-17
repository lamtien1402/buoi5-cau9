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

// Nhận ID từ yêu cầu POST
$id = $_POST['id'];

// Lấy dữ liệu của ngành học cần sửa
$sql = "SELECT * FROM major WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$major = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa Ngành Học</title>
</head>
<body>
    <h1>Sửa Ngành Học</h1>
    <form method="post" action="major_edit_save.php">
        <input type="hidden" name="id" value="<?php echo $major['id']; ?>" />
        <label for="name">Tên Ngành:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($major['name']); ?>" required />
        <br><br>
        <input type="submit" value="Cập Nhật Ngành" />
    </form>
    <a href="major_index.php">Trở lại danh sách</a>
</body>
</html>