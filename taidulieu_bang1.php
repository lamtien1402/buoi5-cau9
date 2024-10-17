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

// Sửa câu lệnh SQL để kết hợp bảng student với bảng major
$sql = "SELECT student.id, student.fullname, student.email, student.Birthday, major.id AS major_id, major.name AS major_name
        FROM student
        LEFT JOIN major ON student.major_id = major.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Trình bày dữ liệu với bảng HTML
    $result_all = $result->fetch_all(MYSQLI_ASSOC);
    ?>
    <h1>Bảng Dữ Liệu Sinh Viên</h1>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Ngày Sinh</th>
            <th>Mã Chuyên Ngành</th>
            <th>Tên Chuyên Ngành</th>
            <th colspan="2">Hành Động</th>
        </tr>
        <?php
        // Xuất dữ liệu của mỗi hàng
        foreach ($result_all as $row) {
            $date = date_create($row['Birthday']);
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["fullname"] . "</td><td>" . $row["email"] . "</td><td>" .
                $date->format('d-m-Y') . "</td><td>" . $row["major_id"] . "</td><td>" . $row["major_name"] . "</td><td>";

            ?>
            <form method="post" action="xoa.php">
                <input type="submit" name="action" value="Xóa" />
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            </form>
            <?php
            echo "</td><td>";

            ?>
            <form method="post" action="form_sua.php">
                <input type="submit" name="action" value="Sửa" />
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            </form>
            <?php
            echo "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 kết quả trả về";
    }

$conn->close();
?>