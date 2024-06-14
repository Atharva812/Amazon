<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming your form fields are named 'value' and 'password'
    $value = $_POST['value'];
    $password = $_POST['password'];

    // Replace these with your actual database connection details
    $conn = mysqli_connect("localhost:3306", "root", "", "amazon");

    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT name FROM account WHERE email = ? OR number = ? AND password = ?");
    $stmt->bind_param("sss", $value, $value, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Assuming 'name' is the column in your 'account' table
        $row = $result->fetch_assoc();
        $name = $row['name'];

        $_SESSION['name'] = $name;
        $_SESSION['value'] = $value;
        header("Location: Amazon.php");
        exit();
    } else {
        $error_message = "Invalid email or mobile number, or password";
    }

    $stmt->close();
    $conn->close();
}
?>


