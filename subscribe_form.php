<?php
// Database connection parameters
$servername = "localhost"; 
$username = "root";  
$password = ""; 
$database = "contact"; 
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get email address from the form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Validate email address (basic validation)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Prepare SQL statement to insert email into database
        $stmt = $conn->prepare("INSERT INTO Subscribers (email) VALUES (?)");
        $stmt->bind_param("s", $email);
        
        // Execute the statement
        if ($stmt->execute() === TRUE) {
            echo "Thank you for subscribing!";
            // Redirect to index.html
            header("Location: about-us.html");
            exit(); // Make sure to exit after redirection
        } else {
            echo "Error: " . $conn->error;
        }
        

        // Close statement
        $stmt->close();
    } else {
        echo "Invalid email address";
    }
}

// Close connection
$conn->close();
?>
