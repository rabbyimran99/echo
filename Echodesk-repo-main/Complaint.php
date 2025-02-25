<?php
$host = 'localhost'; // Change to your host if it's different
$username = 'root'; // Your MySQL username
$password = ''; // Your MySQL password
$dbname = 'complaint_system'; // The name of your database

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #006D77;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #218838;
        }
        .success-message {
            display: none;
            color: #006D77;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container" id="complaintTypeContainer">
        <h2>Select Type of Complaint</h2>
        <select id="complaintType" onchange="showComplaintForm()">
            <option value="">-- Select Complaint Type --</option>
            <option value="service">Service Issue</option>
            <option value="product">Product Issue</option>
            <option value="other">Other</option>
        </select>
    </div>

    <div class="container" id="complaintFormContainer" style="display:none;">
        <h2>Complaint Form</h2>
        <form id="complaintForm" method="POST" action="submit_complaint.php" enctype="multipart/form-data">
    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" placeholder="Enter your address" required>

    <label for="complaint">Complaint:</label>
    <textarea id="complaint" name="complaint" rows="4" placeholder="Enter your complaint here..." required></textarea>

    <label for="file">Attach File (Audio, Video, Picture, Document):</label>
    <input type="file" id="file" name="file" accept="audio/*,video/*,image/*,.pdf,.doc,.docx">

    <button type="submit">Submit Complaint</button>
</form>

        <p class="success-message" id="successMessage">Your complaint has been submitted successfully!</p>
    </div>

    <script>
        function showComplaintForm() {
            var complaintType = document.getElementById("complaintType").value;
            if (complaintType) {
                document.getElementById("complaintTypeContainer").style.display = "none";
                document.getElementById("complaintFormContainer").style.display = "block";
            }
        }

        document.getElementById("complaintForm").addEventListener("submit", function(event) {
            event.preventDefault(); 
            document.getElementById("successMessage").style.display = "block";
            this.reset();
        });
    </script>
</body>
</html>

<?php
include 'conn.php'; // Include the connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $complaint = $_POST['complaint'];

    // Handle file upload
    $filePath = null;
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        // Set the target directory to save the uploaded file
        $targetDir = "uploads/"; // Specify your uploads directory
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        
        // Move the file to the target directory
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            $filePath = $targetFile; // Store file path if upload is successful
        } else {
            // Handle upload error
            echo "Error uploading file.";
        }
    }

    // Prepare and bind the SQL query to insert the complaint
    $stmt = $conn->prepare("INSERT INTO complaints (name, email, address, complaint, file_path) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $address, $complaint, $filePath);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "Complaint submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
