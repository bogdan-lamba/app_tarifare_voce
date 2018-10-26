<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "ihost.2ktelecom.ro";
$username = "cdr";
$password = "LoB1#Acx";
$dbname = "cdr";

try {
    $pdo_cdr = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $pdo_cdr->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}

$mi_cdr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mi_cdr->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
