<?php 
include 'conn.php'; 
session_start(); // Corrected from POST_start();

if(isset($_POST['user'])){
   if($_POST['user']=='admin'){
       header('Location: Admin/dashboard.php');
   }
   else if($_POST['user']=='user'){
       header('Location: user/dashboard.php');
   }
   else if ($_POST['user']=='agency'){
       header('Location: Agency/dashboard.php');
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echodesk</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">


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
            <a href="Sign In.php"><button class="sign-in oswald"> SIGN IN</button></a> 
            <a href="signup.php"><button class="log-in oswald"> SIGN UP</button></a>
           </div>
    </nav>

    <main>
        <div class="container">
            <h1>Empowering Public Voices</h1>
            <p>Join us in building a transparent platform for accountability and justice. Report grievances, share
                evidence, and collaborate with agencies.</p>
            <input type="email" placeholder="Enter your e-mail address">
            <button>Contact Us</button>
            <img src="images/4067812.png" alt="Empowering Voices" class="image">
        </div>









        <div class="complaint">
            <div class="image2">
                <img src="images/complaint.jpg" alt="Change Neon Sign">
            </div>
            <div class="content">
                <h1>User-Friendly Complaint Submission</h1>
                <p>Echodesk provides a seamless platform for citizens to report their grievances conveniently.</p>
                <a href="Complaint.php"> <button>Submit Your Complaint</button></a>
            </div>
        </div>





        <div class="complaint reversed">
            <div class="image2">
                <img src="images/photo 4.jpeg.jpg" alt="Report Issue">
            </div>
            <div class="content">
                <h1>Transparent Agency Collaboration</h1>
                <p>Our platform promotes transparency through direct collaboration between users and selected
                    investigative agencies such as police units and private detectives. Each agency will have a
                    dedicated interface where they can view detailed case files submitted by users along with multimedia
                    evidence. This allows agencies not only to track progress but also communicate updates directly back
                    to complainants thus fostering trust and accountability within the justice system.</p>
                    <a href="agency.html"><button type="button">Agencies</button></a>
            </div>
        </div>





        <div class="complaint">
            <div class="image2">
                <img src="images/photo 5.jpeg.jpg" alt="Change Neon Sign">
            </div>
            <div class="content">
                <h1>Verified News & Investigation Updates</h1>
                <p>Echodesk ensures that its users remain informed by providing authentic news coverage related to
                    ongoing investigations. Our team rigorously verifies user-generated content before publication
                    creating an extensive repository of reliable information accessible on our portal. By offering
                    real-time updates we aim to enhance public confidence in both media reporting and law enforcement
                    processes ultimately contributing towards justice delivery.</p>
                    <a href="newsportal-index.php"><button>Newsweb</button></a>
            </div>
        </div>



        <div class="complaint reversed">
            <div class="image2">
                <img src="images/49658.jpg" alt="Report Issue">
            </div>
            <div class="content">
                <h1>Crime Watch: Uncovering the Truth
                </h1>
                <p>
                    This section is dedicated to showcasing real crime incidents to raise awareness and promote crime
                    prevention. Here, you can watch videos of various criminal activities, helping to educate and inform
                    the public about the realities of crime. Our goal is to reveal the truth and contribute to a safer
                    society. However, please watch these videos with discretion and remain mindful of their sensitive
                    nature.</p>
                    <a href="videoportal.php"><button type="button">Watch Now</button>
            </div>
        </div>



        <div class="location-container">
            <h2>Our Location</h2>
            <p>Visit our shop</p>
            <a href="https://goo.gl/maps/Chittagong" target="_blank">Chittagong, Bangladesh</a>
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.962431950797!2d91.82596231495986!3d22.33593388530837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8962a86f7ed%3A0x9342a78a4c6abf32!2sChittagong%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1619239075306!5m2!1sen!2sbd"
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>







    </main>

    <footer class="footer">
        <div class="footer-container">
            <!-- Left Section: Navigation + Logo -->
            <div class="footer-left">




                <div class="contact-info">
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
                <div class="footer-contact">
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



        <div class="footer-bottom">
            <p>© 2025 Public Safety Testing, Inc., All Rights Reserved. v3.1.12</p>
        </div>


    </footer>

</body>

</html>

<?php 
if(isset($_POST['submit'])) { 
    $email = $_POST['email'];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format"; // Validate email format
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO `contact_us` (email) VALUES (?)");
        $stmt->bind_param("s", $email);
        
        if ($stmt->execute()) {
            echo "Mail successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        // Close statement
        $stmt->close();
    }
}
?>