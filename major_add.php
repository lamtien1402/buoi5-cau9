<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm Ngành Mới</title>
</head>
<body>
    <h1>Thêm Ngành Học Mới</h1>
    <form method="post" action="major_index.php">
        <label for="name">Tên Ngành:</label>
        <input type="text" id="name" name="name" required />
        <br><br>
        <input type="submit" value="Thêm Ngành" />
    </form>
    <a href="major_index.php">Trở lại danh sách</a>
</body>
</html>