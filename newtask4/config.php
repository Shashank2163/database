<?php
$url = 'localhost';
$username = 'root';
$password = '';
$dbname = "user";
$conn = new mysqli($url, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
