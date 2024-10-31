<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['phone'];  

    // Database connection
    $con = new mysqli('localhost', 'root', '', 'test');

    if ($con->connect_error) {
        die('Connection Failed: ' . $con->connect_error);
    } else {
        $stmt = $con->prepare("INSERT INTO registration(firstname, lastname, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
        $stmt->execute();
        echo "Registration Successful!";
        $stmt->close();
        $con->close();
    }
?>
