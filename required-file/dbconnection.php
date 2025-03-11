
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$table_name_1 = "booking";
$table_name_2 = "query";
$table_name_3 = "user";


$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($sql_create_db) === false) {
    echo "Error creating database: " . $conn->error;
}

$conn->select_db($dbname);

$sql_create_table_1 = "CREATE TABLE IF NOT EXISTS $table_name_1 (
    no INT(4) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    email VARCHAR(20) NOT NULL,
    phone INT(10) NOT NULL,
    age INT(3) NOT NULL,
    gender TEXT NOT NULL,
    departure VARCHAR(17) NOT NULL,
    returndate VARCHAR(17) NOT NULL,
    destination TEXT NOT NULL,
    package TEXT NOT NULL
)";

if ($conn->query($sql_create_table_1) === false) {
    echo "Error creating table: " . $conn->error;
}

$sql_create_table_2 = "CREATE TABLE IF NOT EXISTS $table_name_2 (
    no INT(3) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(10) NOT NULL,
    email VARCHAR(20) NOT NULL,
    subject VARCHAR(50) NOT NULL,
    message VARCHAR(100) NOT NULL
)";

if ($conn->query($sql_create_table_2) === false) {
    echo "Error creating table: " . $conn->error;
}

$sql_create_table_3 = "CREATE TABLE IF NOT EXISTS $table_name_3 (
    no INT(4) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(15) NOT NULL,
    lastname VARCHAR(15) NOT NULL,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL
)";

if ($conn->query($sql_create_table_3) === false) {
    echo "Error creating table: " . $conn->error;
}

?>


