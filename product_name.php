<?php

include('connect.php');


$connectDB = new PDO($dns, $username, $password);
$connectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $connectDB->prepare("SELECT * FROM pro");
$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);
?>