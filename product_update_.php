<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// 1.Create connection
$conn = new mysqli("localhost", "root", "", "warehouse");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// 2.สร้าง SQL สร้าง record ใหม่
$sql = "UPDATE `products`
SET        `name`= ?, 
           `picture`= ?, 
           `cetegory`= ?, 
           `price`= ?, 
           `cost`= ?
           WHERE 
           `code` = ?";


$stmt = $conn->prepare($sql);
$stmt->bind_param("sssdds", $v1, $v2, $v3, $v4, $v5, $v6);

// set parameters and execute
$v1 = "โค็กลิตร";
$v2 = "coke.jpg";
$v3 = "เครื่องดื่ม";
$v4 = 24;
$v5 = 5.00;
$v6 = "A001";
$stmt ->execute();
        
// 3.ประมวลผล คำสั่ง SQL
$conn->close();
?>