<?php
session_start();
require_once('db.php');
$db_handle = new Database();

// Process form submission when user checks out
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['booking']) && !empty($_POST['booking'])) {
        // Store booking date in session
        $_SESSION['booking_date'] = $_POST['booking'];
    }
}

// Process removal or emptying of cart
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["product_id"] == $k) {
                        unset($_SESSION["cart_item"][$k]);
                    }
                    if (empty($_SESSION["cart_item"])) {
                        unset($_SESSION["cart_item"]);
                    }
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}

// Process adding items to cart
if (!empty($_POST["quantity"]) && !empty($_POST["product_id"])) {
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];

    $productDetails = $db_handle->runQuery("SELECT * FROM ticket_item WHERE product_id = '$product_id'");

    if (!empty($productDetails)) {
        $itemArray = array(
            $product_id => array(
                'product_name' => $productDetails[0]["product_name"],
                'product_id' => $productDetails[0]["product_id"],
                'quantity' => $quantity,
                'product_price' => $productDetails[0]["product_price"],
                'product_image' => $productDetails[0]["product_image"]
            )
        );

        if (!empty($_SESSION["cart_item"])) {
            if (array_key_exists($product_id, $_SESSION["cart_item"])) {
                $_SESSION["cart_item"][$product_id]["quantity"] += $quantity;
            } else {
                $_SESSION["cart_item"] += $itemArray;
            }
        } else {
            $_SESSION["cart_item"] = $itemArray;
        }
    }
}

// Redirect to payment page if booking date is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['booking']) && !empty($_POST['booking'])) {
    // Store booking date in session
    $_SESSION['booking_date'] = $_POST['booking'];
    // Redirect to payment.php
    header("Location: payment.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MADOKA JAPANESE RESTAURANT - Shopping Cart</title>
    <link rel="icon" type="image/png" href="public/sushi.png">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <header>
        <?php include ('includes/navheader.php')?>
    </header>
    
    <div id="shopping-cart">
        <div class="txt-heading">Shopping Cart</div>

        <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>

        <?php if(isset($_SESSION["cart_item"])): ?>
            <table class="tbl-cart" cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th style="text-align:left;">Name</th>
                        <th style="text-align:left;">Product ID</th>
                        <th style="text-align:right;" width="5%">Quantity</th>
                        <th style="text-align:right;" width="10%">Unit Price</th>
                        <th style="text-align:right;" width="10%">Price</th>
                        <th style="text-align:center;" width="5%">Remove</th>
                    </tr>
                    
                    <?php
                    $total_quantity = 0;
                    $total_price = 0;
                    foreach ($_SESSION["cart_item"] as $item):
                        $item_price = $item["quantity"] * $item["product_price"];
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["product_price"] * $item["quantity"]);
                    ?>
                        <tr>
                            <td><img src="<?php echo $item["product_image"]; ?>" class="cart-item-image" /><?php echo $item["product_name"]; ?></td>
                            <td><?php echo $item["product_id"]; ?></td>
                            <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                            <td style="text-align:right;"><?php echo "RM ".$item["product_price"]; ?></td>
                            <td style="text-align:right;"><?php echo "RM ". number_format($item_price,2); ?></td>
                            <td style="text-align:center;"><a href="cart.php?action=remove&product_id=<?php echo $item["product_id"]; ?>" class="btnRemoveAction"><img src="assets/icon-delete.png" alt="Remove Item" /></a></td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td colspan="2" align="right">Total:</td>
                        <td align="right"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="2"><strong><?php echo "RM ".number_format($total_price, 2); ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="elem-group inlined">
                    <label for="booking-date">Booking Date</label>
                    <input type="date" id="booking-date" name="booking" required>
                </div>
                <button id="btnPayment" type="submit" onclick="return checkCart();">Checkout</button>
            </form>
        <?php else: ?>
            <div class="no-records">Your Cart is Empty</div>
        <?php endif; ?>

        <script>
        function checkCart() {
            if ('<?php echo !empty($_SESSION["cart_item"]) ? 'true' : 'false'; ?>' === 'true') {
                return true;
            } else {
                alert('Your cart is empty. Please add items to your cart before checking out.');
                return false;
            }
        }
        </script>
    </div>

    <?php include('includes/footer.php') ?>
    <script src="js/script.js" type="module"></script>
</body>
</html>