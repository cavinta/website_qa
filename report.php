<?php
$host = "localhost";
$user = "root";
$password = "123!";
$dbname = "db_comp";


$conn = new mysqli($host, $user, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$complaint_type = $_POST['complaint_type'];
$location = $_POST['location'];
$description = $_POST['description'];


$stmt = $conn->prepare("INSERT INTO complaints (fullname, email, phone, complaint_type, location, description) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $fullname, $email, $phone, $complaint_type, $location, $description);


if($stmt->execute()){
    echo "success";
}

