<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(strip_tags(trim($_POST["fullname"])));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "dcvmrao@gmail.com";
        $subject = "New Message from DeinterioCafe Website";
        $body = "You have received a new message from your website contact form.\n\n";
        $body .= "Here are the details:\n\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n\n";
        $body .= "Message:\n$message\n";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Oops! Something went wrong, and we couldn't send your message.";
        }
    } else {
        echo "Please complete the form and try again.";
    }
} else {
    echo "There was a problem with your submission. Please try again.";
}
?>
