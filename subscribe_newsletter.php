<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the email address from the form
    $email = $_POST["email-address"];

    // Validate the email address (you can add more validation if required)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save the email address in your database or send it to your email marketing platform
        // For example, you can use a database query to store the email address in a table

        // Here's an example using a database connection (replace with your database credentials)
        $dbHost = "your_database_host";
        $dbUser = "your_database_username";
        $dbPassword = "your_database_password";
        $dbName = "your_database_name";

        // Connect to the database
        $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

        if (!$conn) {
            // Connection failed
            die("Connection failed: " . mysqli_connect_error());
        }

        // Escape the email to prevent SQL injection (optional but recommended)
        $email = mysqli_real_escape_string($conn, $email);

        // Insert the email address into the database (replace "newsletter_subscribers" with your table name)
        $sql = "INSERT INTO newsletter_subscribers (email) VALUES ('$email')";
        if (mysqli_query($conn, $sql)) {
            // Success
            echo "Thank you for subscribing to our newsletter!";
        } else {
            // Error
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Invalid email address. Please enter a valid email address.";
    }
}
?>
