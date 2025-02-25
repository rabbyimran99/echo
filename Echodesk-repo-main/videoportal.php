<?php
$host = 'localhost';  // Database host (usually localhost)
$username = 'root';   // Database username (change if different)
$password = '';       // Database password (change if different)
$dbname = 'echodesk'; // Database name

// Create a new connection using MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echodesk - Video Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
      
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* font */
.oswald {
    font-family: "Oswald", serif;
    font-optical-sizing: auto;
    font-style: normal;
}




        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: white;
            border-bottom: 2px solid #ddd;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .logo h1 {
            font-size: 22px;
            color: #006D77;
            margin: 0;
            font-weight: bold;
        }
        
        .nav-links {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
        }
        
        .nav-links li {
            display: inline;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #006D77;
            font-size: 16px;
            font-weight: bold;
        }
        
        .right-section {
            display: flex;
            align-items: center;
        }
        
        .sign-in {
            background-color: #0097A7;
            color: white;
            border: none;
            padding: 8px 13px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            border-radius: 3px;
        }
        
        .sign-in:hover {
            background-color: #007B8E;
        }
        
        .log-in {
            background-color: #004d40;
            color: white;
            border: none;
            padding: 8px 13px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            border-radius: 3px;
        }
        
        .log-in:hover {
            background-color: #004d40;
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .video-grid video {
            width: 100%;
            height: auto;
           
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
            color: #222;
        }


        .upload-container {
            margin: 20px 0;
            text-align: center; /* Center the upload button */
        }
        
        .upload-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color:  #006D77;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .upload-btn:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        
        input[type="file"] {
            display: none; /* Hide the default file input */
        }
        

        
            .footer {
                background-color: #006D77;
               
                color: white;
                padding: 20px;
                font-family: Arial, sans-serif;
            }
            
            .footer-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                max-width: 1200px;
                margin: auto;
                flex-wrap: wrap;
            }
            
            
            .footer-left {
                display: flex;
                align-items: center;
                gap: 20px;
            }
            
            .footer-logo img {
                height: 50px;
            }
            
            .footer-nav {
                display: flex;
                gap: 10px;
            }
            
            .footer-nav a {
                color: white;
                text-decoration: none;
                font-weight: bold;
            }
            
            .footer-nav span {
                color: white;
            }
            
            
            .footer-right {
                display: flex;
                flex-direction: column;
                align-items: flex-end;
            }
            
            .footer-contact p {
                font-size: 18px;
                font-weight: bold;
            }
            
            .footer-social {
                display: flex;
                gap: 10px;
            }
            
            .footer-social a img {
                height: 30px;
            }
            
            
            .footer-bottom {
                text-align: center;
                margin-top: 10px;
                font-size: 12px;
            }
            
            
            @media (max-width: 768px) {
                .footer-container {
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                }
            
                .footer-left {
                    flex-direction: column;
                    align-items: center;
                    gap: 10px;
                }
            
                .footer-right {
                    align-items: center;
                    margin-top: 10px;
                }
            }
            
            
            
            
            .footer-contact {
                font-size: 18px;
                font-weight: bold;
                text-align: center;
            }
            
            .footer-join-image {
                margin-top: 10px;
                height: 80px; 
                width: auto; 
                border-radius: 50%;
                object-fit: cover;
            }
            
            
            .contact-info {
                background: none;
                padding: 20px;
                color: white;
                font-size: 18px;
            }
            .contact-info h2 {
                margin-bottom: 10px;
            }
            .contact-info p {
                margin: 8px 0;
                display: flex;
                align-items: center;
            }
            .contact-info img {
                width: 18px;
                margin-right: 10px;
            }
        
       

    </style>
</head>

<body class="oswald">


    
    <nav class="navbar">
        <div class="logo">
            <img src="images/photo-1.jpeg.jpg" alt="Public Safety Testing">
            <h1>Echodesk</h1>
        </div>
        <ul class="nav-links">
            <li><a href="#">HOME</a></li>
            <li><a href="Complaint.php">COMPLAINT</a></li>
            <li><a href="agency.html">AGENCIES</a></li>
            <li><a href="FAQ.html">FREQUENTLY ASKED QUESTIONS</a></li>
            <li><a href="#">CONTACT</a></li>
        </ul>
        <div class="right-section">
            <a href="signup.php"><button class="sign-in oswald"> SIGN UP</button></a> 
            <a href="login.php"><button class="log-in oswald"> Log IN</button></a>
           </div>
    </nav>




    <section class="container">
        <h2>Featured Videos</h2>
        <div class="video-grid">
            <video src="video/4K ANIME CLIPS FOR EDITS (BLUE LOCK).mp4" controls></video>
            <video src="video/Attack on Titan Twixtor Clips 4k 60fps..mp4" controls></video>
            <video src="video/Black Clover 4K - Scenes from Captain Battle EP 151.mp4" controls></video>
            <video src="video/Denji 4k Twixtor Clips 「Chainsaw Man Twixtor 」.mp4" controls></video>
            <video src="video/THIS IS 4K ANIME Ultra HD Anime ｜ Demon Slayer.mp4" controls></video>
            <video src="video/THIS IS 4K ANIME (Anime Mix).mp4" controls></video>
            <video src="video/THIS IS 4K ANIME (Jujutsu Kaisen).mp4" controls></video>
            <video src="video/THIS IS 4K ANIME (Solo Leveling).mp4" controls></video>
            <video src="video/THIS IS 4K ANIME (Tanjiro Kamado).mp4" controls></video>
        </div>
    </section>

    <div class="upload-container">
    <form action="upload_video.php" method="POST" enctype="multipart/form-data">
        <label for="videoTitle" class="upload-btn">Enter Video Title:</label>
        <input type="text" id="videoTitle" name="title" placeholder="Enter video title" required>
        
        <label for="videoUpload" class="upload-btn">Upload Your Video</label>
        <input type="file" id="videoUpload" name="video" accept="video/*" required>
        
        <button type="submit" class="upload-btn">Submit Video</button>
    </form>
</div>




    <footer class="footer ">
        <div class="footer-container">
            <!-- Left Section: Navigation + Logo -->
            <div class="footer-left">




                <div class="contact-info oswald">
                    <h2>Contact Info</h2>
                    <p>📞+8801521401674 Mohammad Ebtesham</p>
                    <p>📞+880 1865-406920 Towkir Akib</p>
                    <p>📞+880 1402-734714 Md Imran Hossain </p>
                    <p>📧 mohammadebtesham757@gmail.com</p>
                    <p>📧 imranrb09@gmail.com</p>
                    <p> City – Chittagong</p>
                </div>




            </div>

            <!-- Right Section: Contact + Social Media -->
            <div class="footer-right">
                <div class="footer-contact oswald">
                    <p>Join Us</p>
                </div>
                <div class="footer-social">
                    <a href="https://www.facebook.com"><img src="images/fb.png" alt="Facebook"></a>
                    <a href="https://www.instagram.com"><img src="images/insta.png" alt="Instagram"></a>
                    <a href="https://www.linkedin.com"><img src="images/in.png" alt="LinkedIn"></a>
                </div>
            </div>
        </div>

        <div class="footer-contact">

            <img src="images/8564221.jpg" alt="Join Our Team" class="footer-join-image">
        </div>



        <div class="footer-bottom oswald">
            <p>© 2025 Public Safety Testing, Inc., All Rights Reserved. v3.1.12</p>
        </div>


    </footer>

</body>

</html>

<?php
include 'conn.php'; // Include the database connection file

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the title of the video
    $title = isset($_POST['title']) ? $_POST['title'] : '';

    // Handle file upload
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $uploadDirectory = "uploads/";  // Directory where videos will be stored
        $fileName = basename($_FILES['video']['name']);  // Get the original file name
        $filePath = $uploadDirectory . $fileName;  // The full path to the video

        // Move the uploaded video file to the target directory
        if (move_uploaded_file($_FILES['video']['tmp_name'], $filePath)) {
            // Insert video information into the database
            $stmt = $conn->prepare("INSERT INTO videos (title, file_path) VALUES (?, ?)");
            $stmt->bind_param("ss", $title, $filePath);

            if ($stmt->execute()) {
                echo "Video uploaded successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file uploaded or there was an error uploading the file.";
    }
}

// Close the database connection
$conn->close();
?>
