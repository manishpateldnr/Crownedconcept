<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "contact"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if logout button is clicked
if(isset($_POST['logout'])) {
    // Redirect to logout page or perform logout action
    header("Location: logout.php");
    exit;
}

// SQL query to fetch data
$sql = "SELECT * FROM contact_submissions"; // Change your_table to your actual table name

// Execute query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Start styling and table
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

    // Output data in a table
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["name"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["message"]."</td>
              </tr>";
    }
    echo "</table>";
    // Print button
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
