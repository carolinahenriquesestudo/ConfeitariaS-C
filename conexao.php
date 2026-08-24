<?php
$host = "localhost";
$user = "root";         
$pass = "26102005";              
$dbname = "confeitaria"; 


$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>