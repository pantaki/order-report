<?php
$host = 'localhost';
$username = 'phanlif1_shopify';
$password = 'sMvN8BWKNDeL79e';
$database = 'phanlif1_shopify';
$conn = new mysqli($host, $username, $password, $database);
//$conn = mysqli_connect($host, $username, $password, $database);

if($conn->connect_error) {
    die('Connection Error: ' . $conn->connect_error);
}