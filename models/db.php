<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'docuploader';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    echo 'Connection Error '.mysqli_connect_error();
}
?php
$dsn = 'mysql:host=localhost;dbname=docuploader';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}