<?php
// thong tin ve chuoi ket noi gom server name, username va mat khau de
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);// Check connection
if ($conn->connect_error) {
//hien thi loi neu ket noi khong duoc
die("Connection failed: " . $conn->connect_error);
}
//neu ket noi thanh cong
echo "Connected successfully";
?>