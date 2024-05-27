<?php
// Establish database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user inputs
$name = $_POST['name'];
$feedback = $_POST['feedback'];

// Validate inputs
if (empty($name) || empty($feedback)) {
    // Redirect back to feedback page with an error message if inputs are not filled
    header("Location: feedback.php?error=empty_fields");
    exit();
}

// Insert feedback into the database
$sql = "INSERT INTO feedback (Query, SuggestedAnswer) VALUES ('$name', '$feedback')";

if ($conn->query($sql) === TRUE) {
    // Redirect to chatbot.php after successful submission
    header("Location: chatbot.php");
    exit();
} else {
    // Redirect back to feedback page with an error message
    header("Location: feedback.php?error=db_error");
    exit();
}

// The closing tag is omitted intentionally to avoid potential issues
