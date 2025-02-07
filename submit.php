<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    // Validate the email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Append the email to a text file
        file_put_contents("emails.txt", $email . PHP_EOL, FILE_APPEND | LOCK_EX);
        echo "Thank you for subscribing!";
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request.";
}
?>