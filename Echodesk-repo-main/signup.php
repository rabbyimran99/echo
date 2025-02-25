<?php
include 'conn.php';
session_start();  // Start the session

// Check if the form has been submitted
if (isset($_POST['user'])) {
    if ($_POST['user'] == 'admin') {
        header('Location: Admin/dashboard.php');
        exit();
    } elseif ($_POST['user'] == 'user') {
        header('Location: user/dashboard.php');
        exit();
    } elseif ($_POST['user'] == 'agency') {
        header('Location: Agency/dashboard.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            background: #121212;
            color: white;
        }
                /* font */
.oswald {
    font-family: "Oswald", serif;
    font-optical-sizing: auto;
    font-style: normal;
}

        .container {
            display: flex;
            width: 100%;
            height: 100vh;
        }

        .signup-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background: #1e1e1e;
        }

        .signup-container h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .signup-form {
            width: 100%;
            max-width: 350px;
            display: flex;
            flex-direction: column;
        }

        .signup-form input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #333;
            border-radius: 5px;
            background: #222;
            color: white;
        }

        .signup-form button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            background:  #006D77;
            color: white;
            transition: background 0.3s;
        }

        .signup-form button:hover {
            background: #004d40;
        }

        .testimonials-container {
            flex: 1;
            background: #1e1e1e;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
        }

        .testimonial {
            max-width: 400px;
            margin-bottom: 20px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .testimonial img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="oswald">
    <div class="container">
        <div class="signup-container">
            <h1>Let's Get Started</h1>
            <form class="signup-form" action="signup.php" method="POST">
                <input name="username" type="text" placeholder="Username" required>
                <input name="email" type="email" placeholder="Email Address" required>
                <input name="phone" type="tel" placeholder="Phone Number" required>
                <input name="password" type="password" placeholder="Password" required>
                <input name="confirm_password" type="password" placeholder="Confirm Your Password" required>
                <button class="oswald" type="submit" name="Submit">Continue with Email</button>
            </form>
            <p>Already have an account? <a href="Sign In.php" style="color: #006D77;">Sign In</a></p>
        </div>
        <div class="testimonials-container">
            <div class="testimonial">
                <img src="images/photo-1.jpeg.jpg" alt="User Profile">
                <p>"Echodesk ensures that its users remain informed by providing authentic news coverage related to ongoing investigations."</p>
                <p><strong>Empowering Public Voices</strong></p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// Handle the form submission
if (isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
    } else {
        // Hash the password before saving it to the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO `signup` (username, email, phone_number, password) 
                                VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $phone, $hashed_password);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }
}
?>