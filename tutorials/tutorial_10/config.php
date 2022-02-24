<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'php_crud');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS php_crud";
$conn->query($sql);

$sql = "use php_crud;";
$conn->query($sql);

$sql = "CREATE TABLE `php_crud`.`users` (
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		first_name VARCHAR(100) NOT NULL,
		last_name VARCHAR(100) NOT NULL,
		age INT(10) NOT NULL,
		user_password VARCHAR(100) NOT NULL,
		email VARCHAR(255) NOT NULL,
		phone_number VARCHAR(15) NOT NULL,
    reset_link_token varchar(255) NULL,
    exp_date TIMESTAMP NULL,
		address VARCHAR(255) NOT NULL
	);";
$conn->query($sql);
