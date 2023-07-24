<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Set the recipient email address where you want to receive the contact form data
    $to = "contact@amigo.com";
    
    // Set the subject of the email
    $subject = "Contact Form Submission from $name";
    
    // Compose the email message
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";
    
    // Set the additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send the email
    $mailSent = mail($to, $subject, $body, $headers);
    
    // Check if the email was sent successfully
    if ($mailSent) {
        echo json_encode(array("status" => "success", "message" => "Thank you! Your message has been sent."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Oops! Something went wrong. Please try again later."));
    }
} else {
    // Return an error if accessed directly without a POST request
    echo json_encode(array("status" => "error", "message" => "Invalid request."));
}
?>
