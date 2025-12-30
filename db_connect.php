<?php
$servername = "yourServerNameHere";
$username = "YourUsernameHere";
$password = "YourPasswordHere";
$database = "YOUR_DATABASE_NAME";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
