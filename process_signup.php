<?php
// Connect to your MySQL database (replace these variables with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume the form is submitted and the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $userType = $_POST['userType'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email address");</script>';
        die(); // Stop execution if validation fails
    }

    $sql_check_user = "SELECT * FROM users WHERE email = '$email' AND user_type = '$userType'";
$result_check_user = $conn->query($sql_check_user);

if ($result_check_user->num_rows > 0) {
    // User is already registered, redirect to login page with a toast message
    echo "<script>alert('You are already registered. Please log in to proceed.');</script>";
    header("Location: login.php");
    exit();
}

    // Password strength check
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        echo '<script>alert("Password must have at least one uppercase letter, one lowercase letter, one special character, and one numeric character. It should be at least 8 characters long.");</script>';
        die(); // Stop execution if validation fails
    }

    // Check if passwords match
    if ($password != $confirmPassword) {
        echo '<script>alert("Passwords do not match");</script>';
        die(); // Stop execution if validation fails
    }

    // Insert user details into the database
    $sql = "INSERT INTO users (user_type, name, email, phone, password) VALUES ('$userType', '$name', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Sign up successful! Redirecting to login page...");</script>';
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
