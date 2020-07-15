<?php
define("TITLE", "Menu | Linus & Pepper's Raleigh");
include('includes/header.php');
?>

<div id="menu-items">
    <h1>Our Delicious Menu</h1>
    <p>all sammies come with choice of 1 side, but you should choose the potato salad
    </p>
    <p><em>Click any menu item to learn more about it.</em></p>
    <hr>

    <ul>
        <?php foreach ($menuItems as $dish => $item) { ?>

            <li><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item[title]; ?> </a><sup>$</sup> <?php echo $item[price]; ?> </li>

        <?php } ?>

    </ul>
</div>

<hr>
<?php include('includes/footer.php');