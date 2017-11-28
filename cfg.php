<?php

$servername = "localhost";
$username = "root";
$password = "305neowNEOW";
$dbname = "tangut";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//$conn->close();

?>