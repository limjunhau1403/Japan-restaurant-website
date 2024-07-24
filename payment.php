<?php
session_start();

function checkCart() {
    if (isset($_SESSION['booking_date'])) {
        // If booking date is set in session, proceed to payment page
        return true;
    } else {
        // If booking date is not set in session, show error message and prevent form submission
        echo '<script>alert("Please choose a booking date before proceeding to checkout.");</script>';
        return false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="public/sushi.png">
    <link rel="stylesheet" href="css/style.css">
    <title>MADOKA JAPANESE RESTAURANT - Payment</title>
</head>   

<body>
    <header>
        <?php include ('includes/navheader.php')?>
    </header>
<div class="payment">
<h1>Payment</h1>

<div id="shopping-cart">
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>  
    <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">Product ID</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="10%">Unit Price</th>
                <th style="text-align:right;" width="10%">Price</th>
            </tr>   
    <?php       
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["product_price"];
    ?>
                <tr>
                <td><img src="<?php echo $item["product_image"]; ?>" class="cart-item-image" /><?php echo $item["product_name"]; ?></td>
                <td><?php echo $item["product_id"]; ?></td>
                <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                <td  style="text-align:right;"><?php echo "RM ".$item["product_price"]; ?></td>
                <td  style="text-align:right;"><?php echo "RM ". number_format($item_price,2); ?></td>
                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["product_price"]*$item["quantity"]);
        }
        ?>

        <tr>
        <td colspan="2" align="right">Total:</td>
        <td align="right"><?php echo $total_quantity; ?></td>
        <td align="right" colspan="2"><strong><?php echo "RM ".number_format($total_price, 2); ?></strong></td>
        <td></td>
        </tr>
        <tr>
            <td align="left" colspan="5"> 
                <p><strong>Booking Date:</strong> <?php echo isset($_SESSION['booking_date']) ? $_SESSION['booking_date'] : 'Not specified'; ?></p>
            </td>
        </tr>
        </tbody>
        </table>
    
  <?php
}
?>
</div>

<div class="payment__form">
    <form method="post" action="post.php" id="payment-form">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required placeholder="Enter your name">
    <span id="name-error" class="error"></span>
    
    <label for="card_number">Card Number:</label>
    <input type="text" id="card_number" name="card_number" required placeholder="0000 0000 0000 0000">
    <span class="error" id="card_number-error"></span>
    <span id="card_number-error" class="error"></span>
    
    <label for="expiry_date">Expiry Date:</label>
    <input type="text" id="expiry_date" name="expiry_date" required 
    oninput="autoSlash(this)" maxlength="5" placeholder="MM/YY" autocomplete="off">
    <span id="expiry_date-error" class="error"></span>
    <script>
    function autoSlash(input) {
      if (input.value.length === 2) {
        input.value += '/';
      }
    }
    </script>
    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" required placeholder="000" maxlength="3" class="cvv-input">
    <span id="cvv-error" class="error"></span><br>
    <button type="submit">Submit Payment</button>

</form>
</div>
</div>


    
    <?php include('includes/footer.php')?>
    <script src="js/script.js" type="module"></script>
</body>
</html>