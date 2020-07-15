<?php
define("TITLE", "Contact | Linus & Pepper's Raleigh");
include('includes/header.php');
?>

<div id="contact">

    <hr>

    <h1>Contact Us</h1>

    <?php

    function has_header_injection($str)
    {
        return preg_match("/[\r\n]/", $str);
    }

    if (isset($_POST['contact_submit'])) {

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $msg = $_POST['message'];

        if (has_header_injection($name) || has_header_injection($email)) {

            die(); // If true, kill the script

        }

        if (!$name || !$email || !$msg) {
            echo '<h4 class="error">All contact fields are required.</h4><a href="contact.php" class="button block">Back</a>';
            exit;
        }

        // Add the recipient email to a variable
        $to    = "awmercer@gmail.com";

        // Create a subject
        $subject = "$name sent a message via Linus & Pepper's contact form";

        // Construct the message
        $message .= "Name: $name\r\n";
        $message .= "Email: $email\r\n\r\n";
        $message .= "Message:\r\n$msg";

        // If the subscribe checkbox was checked
        if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe') {

            // Add a new line to the $message
            $message .= "\r\n\r\nNew subscriber! Please add $email to the mailing list.\r\n";
        }

        $message = wordwrap($message, 72); // Keep the message neat

        // Set the mail headers into a variable
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: " . $name . " <" . $email . ">\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n\r\n";

        // Send the email
        mail($to, $subject, $message, $headers);
    

    ?> 
    
    <h5>Thanks for contacting Linus & Pepper's!</h5>
		<p>Please allow some time for a response.</p>
		<p><a href="/" class="button block">&laquo; Go Home</a></p>

    <?php } else { ?>

    <form method="post" action="" id="contact-form">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name">

        <label for="email">Your email</label>
        <input type="email" id="email" name="email">

        <label for="message">Your Message</label>
        <textarea id="message" name="message"></textarea>

        <input type="checkbox" id="subscribe" name="subscribe" value="Subscribe">
        <label for="subscribe">Subscribe to our newsletter</label>

        <input type="submit" class="button next" name="contact_submit" value="Send Message">

    </form>

    <?php } ?>

</div>

<hr>

<?php include('includes/footer.php');
?>