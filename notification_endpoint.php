<?php

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $data = file_get_contents('php://input');
    
    // Decode the JSON data into an associative array
    $report = json_decode($data, true);
    
    // Process the data as needed
    // For example, you can log it or store it in a database
    file_put_contents('harassment_reports.txt', json_encode($report) . PHP_EOL, FILE_APPEND);
    
    // Send a response back
    http_response_code(200);
    echo json_encode(array('message' => 'Received harassment report'));
} else {
    // If the request method is not POST, return a 405 Method Not Allowed response
    http_response_code(405);
    echo json_encode(array('error' => 'Method Not Allowed'));
}
