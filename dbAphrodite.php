<?php
$servername="localhost";
$username="testuser";
$password="Enoch!2017";
$dbname ="dbaphrodite";
// creating connection 
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
    die("Connection failed: ".$conn->connect_error);

