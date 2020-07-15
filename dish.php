<?php
define("TITLE", "Dish | Linus & Pepper's Raleigh");
include('includes/header.php');

// Preventing injection of malicious characters into the header
function strip_bad_chars($input)
{
    $output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
    return $output;
}

if (isset($_GET['item'])) {

    $menuItem = strip_bad_chars($_GET['item']);

    $dish = $menuItems[$menuItem];
}

function suggestedTip($price, $tip)
{
    $totalTip = $price * $tip;
    echo money_format('%.2n', $totalTip);
}

?>

<hr>

<div id="dish">
    <h1><?php echo $dish[title]; ?> <span class="price"><sup>$</sup><?php echo $dish[price]; ?></span></h1>
    <p><strong>Dish description: </strong> <?php echo $dish[blurb]; ?></p>
    <br>
    <p><strong>Suggested beverage: </strong><?php echo $dish[drink]; ?></p>

    <p><em><strong>Suggested tip: </strong><sup>$</sup><?php suggestedTip($dish[price], 0.20); ?></p></em>

</div>

<hr>

<a href='menu.php' class='button previous'>&laquo; Back to Menu</a>

<?php include('includes/footer.php');
?>