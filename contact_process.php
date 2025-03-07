<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $to = "deepkrmishra8@gmail.com"; // Your email
    $from = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $name = htmlspecialchars($_REQUEST['name'], ENT_QUOTES, 'UTF-8');
    $subject = htmlspecialchars($_REQUEST['subject'], ENT_QUOTES, 'UTF-8');
    $number = htmlspecialchars($_REQUEST['number'], ENT_QUOTES, 'UTF-8');
    $cmessage = htmlspecialchars($_REQUEST['message'], ENT_QUOTES, 'UTF-8');

    // Validate email format
    if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Email headers
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $email_subject = "You have a message from your Deep Music Site.";

    // Email content
    $logo = 'img/Spidyorg.png'; // Change path if needed
    $link = 'https://iftikhariscoding.netlify.app'; // Change link if needed

    $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
    $body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
    $body .= "</td></tr></thead><tbody><tr>";
    $body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
    $body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
    $body .= "</tr>";
    $body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
    $body .= "<tr><td style='border:none;'><strong>Phone:</strong> {$number}</td></tr>";
    $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
    $body .= "</tbody></table>";
    $body .= "</body></html>";

    // Send email
    if (mail($to, $email_subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Error sending message.";
    }
} else {
    echo "Invalid request.";
}

?>
