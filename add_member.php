<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connect.php';

$name = $_POST['name'];
$phone = $_POST['phone'];

$sql = "INSERT INTO members (name, phone) VALUES ('$name', '$phone')";

if ($conn->query($sql) === TRUE) {
  echo "New member added successfully!";
} else {
  echo "Error: " . $conn->error;
}
?>
