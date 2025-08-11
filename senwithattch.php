<?php
// Repository: php-email-sender
// New Feature: Send HTML emails with attachments

$to = "recipient@example.com";
$subject = "Test Email with Attachment";
$message = "<h1>This is a test email</h1><p>With an attachment.</p>";
$headers = "From: sender@example.com\r\n";
$headers .= "Reply-To: sender@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

$body = "--boundary\r\n";
$body .= "Content-Type: text/html; charset=UTF-8\r\n\r\n";
$body .= "$message\r\n";
$body .= "--boundary\r\n";
$body .= "Content-Type: application/octet-stream; name=\"example.txt\"\r\n";
$body .= "Content-Disposition: attachment; filename=\"example.txt\"\r\n\r\n";
$body .= file_get_contents("example.txt") . "\r\n";
$body .= "--boundary--";

if (mail($to, $subject, $body, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}
?>
