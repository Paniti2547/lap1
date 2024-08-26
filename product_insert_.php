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
$sql = "INSERT INTO
products (`productCode`,`productName`,`productLine`,`productScale`,`productVendor`,`productDescription`quantityInStock`,`buyPrice`,`MSRP)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssdd", $v1, $v2, $v3, $v4, $v5, $v6);

// set parameters and execute
$v1 = "111";
$v2 = "111";
$v3 = "111";
$v4 = "111";
$v5 =  11.11;
$v6 =  11.11;
$stmt ->execute();

if($stmt->execute()==true){
  echo "บันทึกสำเร็จ";
}
else {
  echo "ลบไม่สำเร็จ";
}

$conn->close();
?>