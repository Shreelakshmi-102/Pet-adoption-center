<?php
    $fname = $_POST['fname'] ;
    $lname = $_POST['lname'] ;
    $email = $_POST['email'] ;
    $phone = $_POST['phone'] ;
    $petid = $_POST['petid'] ;

// Database credentials
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = "";     // Default password for XAMPP
$dbname = "pet_adoption";
    // Establish database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt=$conn->prepare("INSERT INTO request (fname, lname, email, phone, petid) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssis",$fname, $lname, $email, $phone, $petid);
    $stmt->execute();
    echo "<h2>Your adoption request has been submitted successfully!</h2>";
    $stmt->close();
    $conn->close();
}


