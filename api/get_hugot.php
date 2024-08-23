<?php

include "connection.php";
include "headers.php";
$sql = "SELECT a.*, b.user_username FROM tbl_post a 
        INNER JOIN tbl_users b ON a.post_userId = b.user_id
        ORDER BY a.post_id DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
echo $stmt->rowCount() > 0 ? json_encode($stmt->fetchAll(PDO::FETCH_ASSOC)) : 0;
