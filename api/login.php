<?php
include "connection.php";
include "headers.php";
$username = $_POST["username"];
$password = $_POST["password"];
$sql = "SELECT * FROM tbl_users WHERE user_username = :username AND BINARY user_password = :password";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();
echo $stmt->rowCount() > 0 ? json_encode($stmt->fetch(PDO::FETCH_ASSOC)) : 0;