<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $event_date = htmlspecialchars($_POST['event_date']);
    $place = htmlspecialchars($_POST['place']);
    $event_type = htmlspecialchars($_POST['event_type']);
    $message = htmlspecialchars($_POST['message']);

    // Store the form data in a text file (as a temporary solution)
    $data = "New Event Request\n";
    $data .= "----------------\n";
    $data .= "Name: $name\n";
    $data .= "Email: $email\n";
    $data .= "Event Date: $event_date\n";
    $data .= "Event Place: $place\n";
    $data .= "Event Type: $event_type\n";
    $data .= "Message: $message\n";
    $data .= "----------------\n\n";

    // Save to a file
    $file = 'event_requests.txt';
    file_put_contents($file, $data, FILE_APPEND);

    // Redirect back to the form with a success message
    header("Location: index.html?status=success");
    exit();
} else {
    // If not a POST request, redirect to the main page
    header("Location: index.html");
    exit();
}
?>
