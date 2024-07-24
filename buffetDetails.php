<?php 
session_start();
require_once('db.php');

$db_handle = new Database();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM ticket_item WHERE product_id='" . $_GET["product_id"] . "'");
			$itemArray = array($productByCode[0]["product_id"]=>array('product_name'=>$productByCode[0]["product_name"], 'product_id'=>$productByCode[0]["product_id"]
			, 'quantity'=>$_POST["quantity"], 'product_price'=>$productByCode[0]["product_price"], 'product_image'=>$productByCode[0]["product_image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["product_id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["product_id"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="public/sushi.png"></link>
	<link rel="stylesheet" href="css/style.css"></link>
	<title> MADOKA JAPANESE RESTAURANT </title>
</head>	
<header>
	<?php include ('includes/navheader.php')?>
</header>

<section class="trending" id="food">
		<section class="trending-sushi">
		<div class="trending__content">		
			<h3 class="sushi__title">Adult Ticket <br />(RM 95)</h3>
          
			<p class="sushi__description">Terms & condition below:</p>
			
			<ul class="trending__list">
				<li>
					<div class="trending__icon flex-center">
						<img src="assets/check.svg" alt="check" />
					</div>
					<p>1 ticket per person to access into restaurant. <br />Age for adult: above 13.</p>
				</li><br />
				<li>
					<div class="trending__icon flex-center">
						<img src="assets/check.svg" alt="check" />
					</div>
					<p>Time duration for buffet is 105 minutes.</p>
				</li><br />
				<li>
					<div class="trending__icon flex-center">
						<img src="assets/check.svg" alt="check" />
					</div>
					<p>Drinks are unlimited refills. Additional charge on alcohols based on its type.</p>
				</li><br />
				<li>
					<div class="trending__icon flex-center">
						<img src="assets/check.svg" alt="check" />
					</div>
					<p>Wasted food will be charge RM5 per 100gram. </p>
				</li><br />
				<li>
					<div class="trending__icon flex-center">
						<img src="assets/check.svg" alt="check" />
					</div>
					<p>Food are not available for take away. </p>
				</li><br />
				<li>
					<div class="trending__icon flex-center">
						<img src="assets/check.svg" alt="check" />
					</div>
					<p>Late Arrival Policy: We can only hold your Reservation for a maximum 
					of 15 minutes from the scheduled reservation time. 
					Late arrivals may result in the forfeiture of your table. </p>
				</li><br />
			</ul>
		</div>
		
		<div class="trending__image flex-center">
			<div id="product-grid">
					<?php
					$product_array = $db_handle->runQuery("SELECT * FROM ticket_item ORDER BY id ASC LIMIT 0, 1");
					if (!empty($product_array)) { 
						foreach($product_array as $key=>$value){
					?>
						<div class="product-item">
							<form method="post" action="cart.php?action=add">
								<input type="hidden" name="product_id" value="<?php echo $product_array[$key]["product_id"]; ?>">
								<div class="product-image"><img src="<?php echo $product_array[$key]["product_image"]; ?>"></div>
								<div class="product-tile-footer">
									<div class="product-title"><?php echo $product_array[$key]["product_name"]; ?></div>
									<div class="product-price"><?php echo "RM".$product_array[$key]["product_price"]; ?></div><br/><br/>
									<div class="cart-action">
										<input type="text" class="product-quantity" name="quantity" value="1" size="2" />
										<br><br>
										<button type="submit">Add to Cart</button>
									</div>
								</div>
							</form>
						</div>
					<?php
						}
					}
					?>
			</div>	
			
			<div class="trending__arrow trending__arrow-left">
				<img src="assets/arrow-vertical.svg"/>
			</div>
  
			<div class="trending__arrow trending__arrow-bottom">
				<img src="assets/arrow-horizontal.svg"/>
			</div>
        </div>
		
		</section>
		
		<section class="trending-drinks">
        <div class="trending__image flex-center">
			<div id="product-grid">
					<?php
					$product_array = $db_handle->runQuery("SELECT * FROM ticket_item ORDER BY id ASC LIMIT 1, 1");
					if (!empty($product_array)) { 
						foreach($product_array as $key=>$value){
					?>
						<div class="product-item">
							<form method="post" action="cart.php?action=add">
								<input type="hidden" name="product_id" value="<?php echo $product_array[$key]["product_id"]; ?>">
								<div class="product-image"><img src="<?php echo $product_array[$key]["product_image"]; ?>"></div>
								<div class="product-tile-footer">
									<div class="product-title"><?php echo $product_array[$key]["product_name"]; ?></div>
									<div class="product-price"><?php echo "RM".$product_array[$key]["product_price"]; ?></div><br/><br/>
									<div class="cart-action">
										<input type="text" class="product-quantity" name="quantity" value="1" size="2" /><br><br>
										<button type="submit">Add to Cart</button>
									</div>
								</div>
							</form>
						</div>
					<?php
						}
					}
					?>
			</div>	
  
          <div class="trending__arrow trending__arrow-top">
            <img src="assets/arrow-horizontal.svg" alt="arrow horizontal" />
          </div>
  
          <div class="trending__arrow trending__arrow-right">
            <img src="assets/arrow-vertical.svg" alt="arrow vertical" />
          </div>
        </div>

        <div class="trending__content">
          <h3 class="sushi__title">Children Ticket <br />(RM 50)</h3>
          
          <p class="sushi__description">Feel the taste of the most delicious Japense drinks here. </p>
         
  
          <ul class="trending__list ">
            <li>
              <div class="trending__icon flex-center">
                <img src="assets/check.svg" alt="check" />
              </div>
              <p>1 ticket per person to access into restaurant.<br /> Age for children:6 - 12.</p>
            </li><br />
			
            <li>
              <div class="trending__icon flex-center">
                <img src="assets/check.svg" alt="check" />
              </div>
              <p>Time duration for buffet is 105 minutes.</p>
            </li><br />
			
            <li>
              <div class="trending__icon flex-center">
                <img src="assets/check.svg" alt="check" />
              </div>
              <p>Drinks are unlimited refills. No alcohols for children.</p>
            </li><br />
			
            <li>
              <div class="trending__icon flex-center">
                <img src="assets/check.svg" alt="check" />
              </div>
              <p>Wasted food will be charge RM5 per 100gram.</p>
            </li><br />
			
            <li>
              <div class="trending__icon flex-center">
                <img src="assets/check.svg" alt="check" />
              </div>
              <p>Food are not available for take away.</p>
            </li><br />
			
            <li>
              <div class="trending__icon flex-center">
                <img src="assets/check.svg" alt="check" />
              </div>
              <p>Late Arrival Policy: We can only hold your Reservation for a maximum 
					of 15 minutes from the scheduled reservation time. 
					Late arrivals may result in the forfeiture of your table.</p>
            </li>
          </ul>
        </div>
      </section>
</section>
	
<?php include('includes/footer.php')?>
<script src="js/script.js" type="module"></script>
</body>
</html>