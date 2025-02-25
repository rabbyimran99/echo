<?php
// Database connection configuration
$servername = "localhost"; // or your database server
$username = "root";        // your MySQL username
$password = "";            // your MySQL password (if any)
$dbname = "echo_desk";     // name of your database

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
            overflow: hidden;
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

        .login-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background: white;
        }

        .login-container h1 {
            font-size: 32px;
            margin-bottom: 5px;
        }

        .login-container h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .login-form {
            width: 100%;
            max-width: 350px;
            display: flex;
            flex-direction: column;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button {
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

        .login-form button:hover {
            background: #102b2e;
        }

        .google-btn {
            background: #4285F4;
        }

        .google-btn:hover {
            background: #357ae8;
        }

        .illustration-container {
            flex: 1;
            background:  #006D77;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .illustration {
            width: 60%;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="oswald">
    <div class="container">
        <div class="login-container">
            <h1>EchoDesk</h1>
            <h2>Welcome Back</h2>
            <form class="login-form" action="{{ url_for('login') }}" method="post">
                <input type="email" name="email" placeholder="Email address" required>
                <input type="password" name="password" placeholder="Password" required>
                <button class="oswald" type="submit">Sign In</button>
                <button type="button" class="google-btn oswald">Sign in with Google</button>
            </form>
            
            <p>Don't you have an account? <a href="signup.php" style="color:  #006D77;">Sign Up</a></p>
        </div>
        <div class="illustration-container">
            <img src="images/11.png" alt="Illustration" class="illustration">
        </div>
    </div>
</body>
</html>
<?php
include 'conn.php';  // Include the connection file

// Sample data to insert
$email = "example@example.com";
$password = "securepassword";  // Plaintext password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);  // Hash the password

$role = "user";  // Assign a role (admin, user, or agency)

// SQL query to insert a new user
$query = "INSERT INTO users (email, password, role) VALUES ('$email', '$hashed_password', '$role')";

// Execute the query
if (mysqli_query($conn, $query)) {
    echo "New user registered successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
