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

$sql = "SELECT * FROM major";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Trình bày dữ liệu với bảng HTML
    $result_all = $result->fetch_all(MYSQLI_ASSOC);
    ?>
    <h1>Bảng Dữ Liệu Ngành Học</h1>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Tên Ngành</th>
            <th colspan="2">Hành Động</th>
        </tr>
        <?php
        // Xuất dữ liệu của mỗi hàng
        foreach ($result_all as $row) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>";
            ?>
            <form method="post" action="major_edit.php">
                <input type="submit" name="action" value="Sửa" />
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            </form>
            <?php
            echo "</td><td>";
            ?>
            <form method="post" action="major_delete.php">
                <input type="submit" name="action" value="Xóa" />
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            </form>
            <?php
            echo "</td></tr>";
        }
        echo "</table>";
    ?>
    <a href="major_add.php">Thêm Ngành Mới</a>
    <?php
} else {
    echo "0 kết quả trả về";
}
$conn->close();
?>