<?php
include "connection.php";
include "headers.php";
$postId = $_GET["hugotId"];
$sql = "SELECT a.comment_message, b.user_username FROM tbl_comment a 
        INNER JOIN tbl_users b ON b.user_id = a.comment_userId 
        WHERE a.comment_postId = :postId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':postId', $postId);
$stmt->execute();
echo $stmt->rowCount() > 0 ? json_encode($stmt->fetchAll(PDO::FETCH_ASSOC)) : 0;
