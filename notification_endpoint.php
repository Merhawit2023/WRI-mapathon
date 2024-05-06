<?php
// Get the JSON data from the POST request
$data = json_decode(file_get_contents("php://input"), true);

// Process the notification data
if ($data) {
    // Handle the notification data (e.g., store in database, update dashboard)
    // For example, you can store the data in your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "harassment_reports";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $date = $data['date'];
    $time = $data['time'];
    $location = $data['location'];
    $description = $data['description'];
    $contact = $data['contact'];

    $sql = "INSERT INTO harassment_reports (date, time, location, description, contact) VALUES ('$date', '$time', '$location', '$description', '$contact')";
    if ($conn->query($sql) === TRUE) {
        echo "Report stored successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "No data received.";
}
?>
