<?php
define("TITLE", "Contact | Linus & Pepper's Raleigh");
include('includes/header.php');
?>

<div id="contact">

    <hr>

    <h1>Contact Us</h1>

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

</div>

<hr>

<?php include('includes/footer.php');
?>