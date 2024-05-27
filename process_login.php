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

// Retrieve values from the form
$email = $_POST['email'];
$password = $_POST['password'];
$userType = $_POST['userType'];

// Email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address");
}

// Password strength check
 if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
     die("Password must have at least one uppercase letter, one lowercase letter, one special character, and one numeric character. It should be at least 8 characters long.");
}

// Retrieve user details from the database
$sql = "SELECT * FROM users WHERE email = '$email' AND user_type = '$userType'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verify password
    if (strcmp($password, $row['password']) == 0) {
        // Redirect to chatbot.php with a welcome message
        header("Location: chatbot.php");
        exit();
    } else {
        echo "Incorrect";
    }
} else {
    // Redirect to signup.php with a popup message
    echo "<script>alert('You are not registered. Please register to proceed further.');</script>";
    header("Location: signup.php");
    exit();
}

$conn->close();
?>
