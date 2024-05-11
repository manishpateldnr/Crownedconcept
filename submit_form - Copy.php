<?php

$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "cotactdata";  
 

$conn = new mysqli($servername, $username, $password, $dbname);

 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $website = $_POST['website'];
    $comment = $_POST['comment'];
    $save_info = isset($_POST['save_info']) ? 1 : 0;

    // Prepare SQL statement
    $sql = "INSERT INTO comments (name, email, number, website, comment, save_info) VALUES (?, ?, ?, ?, ?, ?)";
    
    
    // Bind parameters and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
    echo "<script>alert('Contact Sent');</script>";
    // Redirect back to the contact page or wherever you want to redirect after form submission
    header("Location: contact.html"); // Change this to the appropriate URL
    exit();
}
?>
