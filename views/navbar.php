<?php
require_once("..\models/Model.php");
$db_handle = new DBController();
$num_items_in_cart = isset($_SESSION['cart_item']) ? count($_SESSION['cart_item']) : 0;

?>
<head lang="en">
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>animated website</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       <script src="https://unpkg.com/scrollreveal"></script>
       <link rel="stylesheet" href="../css/style.css">

    </head>
    <body>
        <!--header-->
        <header>
            <div class="container">
              <nav class="nav"> 
                <div class="menu-toggle">
                    <i class="fa fa-bars"></i>
                    <i class="fa fa-times"></i>
                </div>
                <a href="index.html" class="logo"> <img src="../img/.png" alt="logo" height="25px" width="25px"> </a>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="font-weight: 500; color: black; font-size:15px"> Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="font-weight: 500; color: black; font-size:15px"> Our story</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="font-weight: 500; color: black; font-size:15px"> Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link" style="font-weight: 500; color: black; font-size:15px"> Log In</a>
                    </li>
                    <li class="nav-item">
                        <a href="signup.php" class="nav-link" style="font-weight: 500; color: black; font-size:15px"> Sign Up </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="font-weight: 500; color: black; font-size:15px"> Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.php" class="nav-link" style="font-weight: 500; color: black; font-size:15px">Cart<i class="fas fa-shopping-cart"></i>                        <?php
print_r($num_items_in_cart);
$num_items_in_cart;
?></a>
                    </li>
                </ul>
  <hr/>
              </nav>
            </div>
        </header>
        <!--end of header-->