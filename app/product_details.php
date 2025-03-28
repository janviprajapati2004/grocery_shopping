<!DOCTYPE html>
<html lang="en">
<?php
include ("connection/connect.php"); // connection to db
error_reporting(0);
session_start();

include_once 'product-action.php'; //including controller

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Items </title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!--header starts-->
    <header id="header" class="header-scroll top-header headrom">
        <!-- .navbar -->
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php" style="color:black">GROCERY MART</a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php" style="color:black">Home <span
                                    class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="shop.php" style="color:black">Shop <span
                                    class="sr-only"></span></a> </li>

                        <?php
                        if (empty ($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active" style="color:black">login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active" style="color:black">signup</a> </li>';
                        } else {


                            echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active"style="color:black">your orders</a> </li>';
                            echo '<li class="nav-item"><a href="logout.php" class="nav-link active"style="color:black">logout</a> </li>';
                        }

                        ?>+

                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->
    </header>
    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">

                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="shop.php">Choose Shop</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a
                            href="items.php?res_id=<?php echo $_GET['res_id']; ?>">Pick Your Grocery</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Get Delivery</a></li>
                </ul>
            </div>
        </div>
        <!-- end:Top links -->
        <!-- start: Inner page hero -->
        <?php $ress = mysqli_query($db, "select * from store where rs_id='$_GET[res_id]'");
        $rows = mysqli_fetch_array($ress);

        ?>
        <section class="inner-page-hero bg-image" data-image-src="images/img/dish.jpeg">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <a href="product_details.php?id=<?php echo $rows['res_id'] ?>">
                                    <figure>
                                        <?php echo '<img src="admin/Res_img/65f5bc70ad575.jpg"' . $rows['image'] . '" alt="Shop logo">'; ?>
                                    </figure>
                                </a>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#">
                                        <?php echo $rows['title']; ?>
                                    </a></h6>
                                <p>
                                    <?php echo $rows['address']; ?>
                                </p>
                                <ul class="nav nav-inline">
                                    <li class="nav-item"> <a class="nav-link active" href="#"><i
                                                class="fa fa-check"></i> Min ₹ 50.00</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-motorcycle"></i>
                                            30 min</a> </li>
                                    <li class="nav-item ratings">
                                        <a class="nav-link" href="#"> <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <!-- end:Inner page hero -->
        <div class="breadcrumb">
            <div class="container">

            </div>
        </div>
        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Your Shopping Cart
                            </h3>


                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">


                                <?php

                                $item_total = 0;
                                // aa total fetch 
                                foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID 
                                {
                                    ?>

                                    <div class="title-row">
                                        <?php echo $item["title"]; ?><a
                                            href="items.php?id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
                                            <i class="fa fa-trash pull-right"></i></a>
                                    </div>

                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "₹" . $item["price"]; ?> readonly id="exampleSelect1">

                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" type="text" readonly
                                                value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        </div>

                                    </div>

                                    <?php
                                    $item_total += ($item["price"] * $item["quantity"]); // calculating current price into cart
                                }
                                ?>



                            </div>
                        </div>

                        <!-- end:Order row -->

                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>TOTAL</p>
                                <h3 class="value"><strong>
                                        <?php echo "₹" . $item_total; ?>
                                    </strong></h3>
                                <p>Free Shipping</p>
                                <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check"
                                    class="btn theme-btn btn-lg">Checkout</a>
                            </div>
                        </div>




                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">

                    <!-- end:Widget menu -->
                    <div class="menu-widget" id="2">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Quality Items from Quality Store <a class="btn btn-link pull-right"
                                    data-toggle="collapse" href="#popular2" aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="popular2">

                            <!-- end:Food item -->
                            <!-- <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9"> -->
                            <!-- <div class="bg-gray restaurant-entry"> -->
                            <div class="row">
                                <form method="post"
                                    action='items.php?d_id=<?php echo $_GET['res_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>

                                    <table>
                                        <thead>
                                            <!-- <tr>
                                                <th>Product Name</th>
                                                <th class="product-thumbnail">Product Image</th>
                                                <th class="product-name">Desc</th>
                                                <th class="product-price">Price</th>
                                            </tr> -->

                                        </thead>

                                        <tbody>
                                            <?php
                                            error_reporting(E_ALL);
                                            ini_set('display_errors', 1);

                                            // Assuming $db is your database connection
                                            $productId = isset ($_GET['d_id']) ? $_GET['d_id'] : ''; // Validate and sanitize
                                            
                                            if ($productId) {
                                                $stmt = $db->prepare("SELECT * FROM items WHERE d_id = ?");
                                                $stmt->bind_param("s", $productId);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                        <form method="post"
                                                            action='items.php?d_id=<?php echo htmlspecialchars($_GET['d_id']); ?>&action=add&id=<?php echo htmlspecialchars($row['d_id']); ?>'>
                                                            <table>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Product Name</th>
                                                                        <th>Product Image</th>
                                                                        <th>Desc</th>
                                                                        <th>Price</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo htmlspecialchars($row['title']); ?>
                                                                        </td>
                                                                        <td><img src="admin/Res_img/items/<?php echo htmlspecialchars($row['img']); ?>"
                                                                                alt="Product Image"
                                                                                style="width: 80px; height: auto;"></td>
                                                                        <td>
                                                                            <?php echo htmlspecialchars($row['slogan']); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo htmlspecialchars($row['price']); ?>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="quantity" value="1" size="2" />
                                                                            <input type="submit" class="btn theme-btn"
                                                                                value="Add to cart" />
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "No data found";
                                                }
                                            } else {
                                                echo "Product ID is required.";
                                            }
                                            ?>
                                            <style>
                                                body {
                                                    font-family: Arial, sans-serif;
                                                    line-height: 1.6;
                                                }

                                                table {
                                                    width: 100%;
                                                    border-collapse: collapse;
                                                }

                                                th,
                                                td {
                                                    text-align: left;
                                                    padding: 10px;
                                                    border: 1px solid #ddd;
                                                }

                                                th {
                                                    background-color: #f2f2f2;
                                                }

                                                tr:hover {
                                                    background-color: #f5f5f5;
                                                }
                                            </style>
                            </div>
                        </div>



                    </div>
                    <!-- end:Collapse -->
                </div>
                <!-- end:Widget menu -->

            </div>
            <!-- end:Bar -->

        </div>
        <!-- end:row -->
    </div>

    </div>
    <!-- end:page wrapper -->
    </div>
    <!--/end:Site wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span> </button>
                <div class="modal-body cart-addon">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn theme-btn">Add to cart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>