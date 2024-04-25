<?php
// Enable error reporting for development (remove for production)
error_reporting(E_ALL);

session_start();

// Database connection details (replace with your actual credentials)
$host = "localhost";
$user = "root";
$password = "";
$db = "managementsystem1";

$data = mysqli_connect($host, $user, $password, $db);

// Check connection error
if ($data === false) {
  die("Connection error: " . mysqli_connect_error());
}

// Check for POST method and validate user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = mysqli_real_escape_string($data, $_POST['username']);
  $pass = mysqli_real_escape_string($data, $_POST['password']);

  // Build the query with user input escaping
  $sql = "SELECT * FROM user WHERE username='" . $name . "' AND password='" . $pass . "'";

  $result = mysqli_query($data, $sql);

  // Check if a record is found (successful login)
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    // Set session variables based on user type
    $_SESSION['username'] = $name;
    $_SESSION['usertype'] = $row["usertype"];

    if ($row["usertype"] == "student") {
      header("location:studenthome.php");
    } elseif ($row["usertype"] == "admin") {
      header("location:adminhome.php");
    } else {
      // Unexpected usertype in database
      echo "An error occurred. Please contact the administrator.";
    }
  } else {
    // Login failed - username or password might be incorrect
    $message = "Invalid username or password.";
    $_SESSION['loginMessage'] = $message;
    header("location:login.php");
  }
}

// Close the database connection after use (optional, recommended practice)
mysqli_close($data);





