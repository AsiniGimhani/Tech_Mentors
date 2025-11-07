<?php
$servername = "localhost";
$username = "root"; // Default XAMPP user
$password = ""; // Default XAMPP password
$dbname = "tech_mentor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = md5($_POST['password']); // encrypt password for security

$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<script>alert('Login Successful! Welcome, $user'); window.location='index.html';</script>";
} else {
  echo "<script>alert('Invalid username or password'); window.history.back();</script>";
}

$conn->close();
?>
