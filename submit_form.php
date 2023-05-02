<?php
// Connect to the database
$servername = "sql8.freemysqlhosting.net";
$username = "sql8615393";
$password = "xMkfiRMxxC";
$dbname = "sql8615393";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Sanitize form data to prevent SQL injection attacks
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
$message = mysqli_real_escape_string($conn, $message);

// Insert data into database
$sql = "INSERT INTO $table (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "Form data submitted successfully";
} else {
  echo "Error submitting form data: " . $conn->error;
}

$conn->close();
?>
