<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['name'])) {
    // Get values from the form
    $fullname = $_POST['fullname'];
    $mobile = $_POST['mobile'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    $address = $_POST['address'];
    $landmark = $_POST['landmark'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    // Database connection
    $conn = mysqli_connect("localhost:3306", "root", "", "amazon");
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        // Assuming you have a session variable for the username
        $name = $_SESSION['name'];

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO addresses (name, fullname, mobile, country, pincode, address, landmark, city, state) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $name, $fullname, $mobile, $country, $pincode, $address, $landmark, $city, $state);

        if ($stmt->execute()) {
            // Set city and pincode in session
            $_SESSION['city'] = $city;
            $_SESSION['pincode'] = $pincode;

            // Debugging: Check if execute is successful
            echo "Execute successful<br>";

            // Fetch additional data from the database
            $query = "SELECT city, pincode FROM addresses WHERE name = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['pincode'] = $row['pincode'];
                $_SESSION['city'] = $row['city'];
               

                // Debugging: Output the retrieved values
                echo "City: " . $_SESSION['city'] . "<br>";
                echo "Pincode: " . $_SESSION['pincode'] . "<br>";
            } else {
                echo "No results found";
            }

            // Redirect to the home page
            header("Location: Amazon.php");
            exit(); // Make sure to exit after the header redirect
        } else {
            // Debugging: Output the error if execute fails
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>
