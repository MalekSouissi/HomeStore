<?php
session_start();
require_once("..\models/Model.php");
$db_handle = new DBController();
require_once("..\controllers/cartController.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--fontawesomeCDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!--style link-->
    <link rel="stylesheet" href="..\css/style.css">
    <link rel="stylesheet" href="..\css/cartstyle.css">
    <title>Cart</title>
</head>

<body>
<div id="shopping-cart">	
<div class="container">
  <h1 class="title">Cart</h1>
  <div class="row">
    <div class="col-md-4 price">
    <h4>Product Name</h4>
    </div>
    <div class="col-md-2 price">
      <h4>Quantity</h4>
    </div>
    <div class="col-md-2 price">
    <h4>Unit Price</h4>
    </div>
    <div class="col-md-2 price">
      <h4>Price</h4>
    </div>
    <div class="col-md-2">
    <a id="btnEmpty" href="index.php?action=empty"><button type="button" class="btn">Empty cart</button></a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>
    </div>
  </div>
  <?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
  <div class="row">
    <div class="col-md-4 ">
      <div class="prod-name">
<h5><?php echo $item["name"]; ?></h5>  
  </div>
<div class="cart-btns">
  <form method="post" action="cart.php?action=update&code=<?php echo $item["code"]; ?>">
  <div class="cart-action">  <input type="number" id="quantity" name="quantity" min="-20"  max="20" step="1" value=<?php echo $item["quantity"] ?>>
  <input type="submit" value="update" class="btnAddAction" /></div>
  </form>
  <a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><button type="button" class="btn">Delete</button></a></div>

    </div>
    <div class="col-md-2 price">
      <h5><?php echo $item["quantity"]; ?></h5>
    </div>
    <div class="col-md-2 price">
<h5><?php echo $item["price"]."DT"; ?></h5>  
</div>
<div class="col-md-2 price">
<h5><?php echo  number_format($item_price,2)."DT"; ?></h5>  
</div>
  </div>
  <hr>
  <?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

  <div class="total">
    <h5>Total</h5>
    <h6><?php echo number_format($total_price, 2). "DT"; ?></h6>
    <button type="button" class="btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-shopping-cart"></i>Place Order </button>
  </div>
</div>
</body>
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Your order has been successfully placed.Thank you!</p>
      </div>
      <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>


