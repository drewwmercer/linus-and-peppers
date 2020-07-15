<?php
define("TITLE", "Team | Linus & Pepper's Raleigh");
include('includes/header.php');

?>
<div id="team-members" class="clearfix">

    <h1>The Linus & Pepper's Team</h1>
    <p>Our team is a disciplined, enthusiastic, fun loving group of people with great attitude, passion and integrity.</p>
    <hr>

    <?php

    foreach ($teamMembers as $member) {

    ?>

        <div class="member">
            <img src='img/<?php echo $member[img]; ?>.png' alt='<?php echo $member[name]; ?>'>
            <h2><?php echo $member[name]; ?></h2>
            <p><?php echo $member[bio]; ?></p>
        </div>

    <?php

    }
    ?>


</div>

<hr>

<?php include('includes/footer.php');
?>