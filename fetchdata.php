<?php
 
$servername = "localhost";  
$username = "root";  
$password = "";  
$database = "contact"; 

 
$conn = new mysqli($servername, $username, $password, $database);

 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 
if(isset($_POST['logout'])) {
    
    header("Location: logout.php");
    exit;
}

 
$sql = "SELECT * FROM contact_submissions";  
 
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    
    echo "<style>
            table {
                width: 80%; /* Adjust as needed */
                margin: 20px auto; /* Centers the table */
                border-collapse: collapse;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }
            th, td {
                padding: 12px;
                border: 1px solid #ddd;
                text-align: left;
                font-size: 16px;
            }
            th {
                background-color: #f2f2f2;
            }
            tr:nth-child(even) {
                background-color: #f8f8f8;
            }
            tr:hover {
                background-color: #f0f0f0;
            }
            button {
                margin: 20px auto;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                display: block;
                font-size: 16px;
                transition: background-color 0.3s;
            }
            button:hover {
                background-color: #45a049;
            }
          </style>";

 
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>";
   
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["name"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["message"]."</td>
              </tr>";
    }
    echo "</table>";
    
    echo "<button onclick='window.print()'>Print</button>";
    
    // Back button
    echo "<button onclick='goBack()'>Go Back</button>";
    echo "<script>
            function goBack() {
                window.history.back();
            }
          </script>";
}
    
// Close connection
$conn->close();
?>
