<?php
 
$servername = "localhost"; 
$username = "root";  
$password = ""; 
$database = "contact"; 
 
$conn = new mysqli($servername, $username, $password, $database);

 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
         
        $stmt = $conn->prepare("INSERT INTO Subscribers (email) VALUES (?)");
        $stmt->bind_param("s", $email);
        
      
        if ($stmt->execute() === TRUE) {
            echo "Thank you for subscribing!";
            
            header("Location: about-us.html");
            exit();  
        } else {
            echo "Error: " . $conn->error;
        }
        
 
        $stmt->close();
    } else {
        echo "Invalid email address";
    }
}

 
$conn->close();
?>
