<?php
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $conn = mysqli_connect("localhost:3306", "root", "", "amazon");
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO account(name, number, email, password) VALUES(?, ?, ?, ?)");
        $stmt->bind_param("siss", $name, $number, $email, $password);
        $execval = $stmt->execute();

        if ($execval) {
            // Registration successful, store the name in the session
            session_start();
            $_SESSION['name'] = $name;
            header("Location: Amazon.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
?>


