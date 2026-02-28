<?php
include('connect.php');

$connectDB = new PDO($dns, $username, $password);
$connectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$countQuery = "SELECT COUNT(*) AS unread_count FROM contact WHERE status = 'unread'";
$countStatement = $connectDB->query($countQuery);
$unreadCount = $countStatement->fetch(PDO::FETCH_ASSOC)['unread_count'];

?>