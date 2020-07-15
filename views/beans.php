<?php
require_once("..\models/Model.php");
$db_handle = new DBController();
require_once("..\controllers/cartController.php");
?>
<!--the perfect blend-->
<section class="perfect-blend between">
    <div class="container">
        <div class="global-headline">
            <div class="animate-top">
                <h2 class="sub-headline">
                    <span class="first-letter">D</span>iscover Our
                </h2>
            </div>
            <div class="animate-bottom">
                <h1 class="headline"> Grains and beans</h1>
            </div>
        </div>
    </div>
</section>
<!--end of the perfect blend-->
<!--culinary delight-->
<section class="culinary-delight">
    <div class="container">
        <div class="restaurant-info">
            <div class="image-group padding-right animate-left">
            <?php
	$product_array = $db_handle->runQuery("SELECT * FROM products WHERE category = 'beans'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
    			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                <div class="card" style="width: 250px;">
                    <img src="../img/<?php echo $product_array[$key]["image"]; ?>" class="card-img-top image" alt="...">
                    <div class="card-body">
                        <h3 class="product-title"> <?php echo $product_array[$key]["name"]; ?></h3>
                        <p class="product-description"><?php echo $product_array[$key]["description"]; ?></p>
                        <h4 class="product-price"><?php echo $product_array[$key]["price"]."DT"; ?></h4>
                        <div class="cart-action"><input type="number" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                    </div>
                </div>
                </form>
                <?php
		}
	}
	?>
                </div>
                
            </div>
        </div>
</section>
<!--end of culinary delight-->