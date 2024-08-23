<?php
include "connection.php";
include "headers.php";
$postId = $_POST["hugotId"];
$userId = $_POST["userId"];
$message = $_POST["message"];
$sql = "INSERT INTO tbl_comment (comment_postId, comment_userId, comment_message) 
  VALUES (:postId, :userId, :message)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':postId', $postId);
$stmt->bindParam(':userId', $userId);
$stmt->bindParam(':message', $message);
$stmt->execute();
echo $stmt->rowCount() > 0 ? 1 : 0;
