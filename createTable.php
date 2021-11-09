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
    quantity INT NOT NULL)";

$insertUserQuery = "INSERT INTO user (userName,password) VALUES ('Product Manager 1','123')";
$insertProductQuery = "INSERT INTO product (productName,price,quantity) VALUES ('White Chocolate','28','100'),('Milk Chocolate','48','58'),('Dark Chocolate','58','39')";



if (mysqli_query($conn, $userSql) && mysqli_query($conn, $productSql) && mysqli_query($conn,$insertUserQuery) && mysqli_query($conn,$insertProductQuery)){
    header("Location:login.php");
} else {
    echo "Failed to create table: ".mysqli_error($conn);
}

mysqli_close($conn);

?>