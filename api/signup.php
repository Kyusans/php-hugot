<?php 
include "connection.php";
include "headers.php";
$username = $_POST["username"];
$password = $_POST["password"];
$sql = "INSERT INTO tbl_users (user_username, user_password) VALUES (:username, :password)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();
echo $stmt->rowCount() > 0 ? 1 : 0;