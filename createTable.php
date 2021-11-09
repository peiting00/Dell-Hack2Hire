<?php

include "dbConnection.php";

// Create table user if not exists
$userSql = "CREATE TABLE IF NOT EXISTS user (
    userID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(100) NOT NULL UNIQUE, 
    password CHAR(60) NOT NULL)";

// Create table profile if not exists
$productSql= "CREATE TABLE IF NOT EXISTS product(
    productID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(100) NOT NULL,
    price INT NOT NULL,
    quanitty INT NOT NULL)";

if (mysqli_query($conn, $userSql) && mysqli_query($conn, $productSql)) {
    header("Location:login.php");
    exit;
} else {
    echo "Failed to create table: ".mysqli_error($conn);
}

mysqli_close($conn);

?>