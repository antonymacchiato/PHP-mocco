<?php
// Repository: php-email-sender
// Description: A script to send emails using PHP's mail() function.

// Email sending script
$to = "recipient@example.com";
$subject = "Test Email from PHP";
$message = "This is a test email sent using PHP.";
$headers = "From: sender@example.com\r\n";
$headers .= "Reply-To: sender@example.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}
?>
