<?php
$apiUrl = "http://localhost/Qwerty/nextbid-auction-website-main/api/user/delete.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the item name from the hidden input field
    $id = $_POST["id"];

    // Create an array with the data to send in the request
    $data = array(
        "id" => $id
    );

    // Initialize cURL and set the request options
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);

    // Get the response status code
    $status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

    // Close the cURL session
    curl_close($ch);

    // Check if the request was successful
    if ($status_code === 204) {
        echo "Unexpected status code: $status_code";
        var_dump($data);    
    exit;
    } 

    header("Location: ../../view/user/delete.php");
}
