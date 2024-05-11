<?php
 
$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "contact"; 
 
$conn = new mysqli($servername, $username, $password, $dbname);

 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

     
    $sql = "INSERT INTO contact_submissions (name, email, message) VALUES (?, ?, ?)";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);
    // Execute SQL statement
    if ($stmt->execute()) {
        // Display a notification message using JavaScript
        echo '<script>alert("Message sent successfully");</script>';
        // Redirect to the same page
        echo '<script>window.location.href = "index.html";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>