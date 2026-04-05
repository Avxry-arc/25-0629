<?php
// Database details
$host = "localhost";
$user = "root";
$pass = "";
$db   = "registration_db";
$port = 3307; // Match this to your XAMPP MySQL port

// 1. Create connection
$conn = new mysqli($host, $user, $pass, $db, $port);

// 2. Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = $_POST['fname'];
    $second = $_POST['sname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 4. SQL Insert Query
    $sql = "INSERT INTO users (firstname, secondname, email, password) 
            VALUES ('$first', '$second', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='text-align: center; margin-top: 50px; font-family: Arial;'>";
        echo "<h2 style='color: green;'>Form submitted successfully!</h2>";
        echo "<p>Thank you, $first $second. Your registration has been received.</p>";
        echo "<a href='index.html'>Go back to form</a>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
