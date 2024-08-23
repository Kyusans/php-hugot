<?php
include "connection.php";
include "headers.php";
$userId = $_POST["userId"];
$message = $_POST["hugot"];
$categoryId = $_POST["categoryId"];
$sql = "INSERT INTO tbl_post (post_userId, post_hugot, post_categoryId) 
  VALUES (:userId, :message, :categoryId)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userId', $userId);
$stmt->bindParam(':message', $message);
$stmt->bindParam(':categoryId', $categoryId);
$stmt->execute();
echo $stmt->rowCount() > 0 ? 1 : 0;
