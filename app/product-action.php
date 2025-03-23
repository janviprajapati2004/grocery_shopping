<?php
// Check if 'action' parameter is not empty in the URL
if (!empty($_GET["action"])) {
    // Assign value of 'id' parameter to $productId, if set, else assign empty string
    $productId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
    // Assign value of 'quantity' parameter from POST data to $quantity, if set, else assign empty string
    $quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '';

    // Switch statement based on the value of 'action' parameter
    switch ($_GET["action"]) {
        case "add": // If action is 'add', add item to cart
            if (!empty($quantity)) { // Check if quantity is not empty
                // Prepare SQL query to select item details from database based on item id
                $stmt = $db->prepare("SELECT * FROM items where d_id= ?");
                $stmt->bind_param('i', $productId); // Bind parameters
                $stmt->execute(); // Execute the query
                $productDetails = $stmt->get_result()->fetch_object(); // Fetch object containing item details from result

                // Create an array containing item details and quantity
                $itemArray = array($productDetails->d_id => array(
                    'title' => $productDetails->title,
                    'd_id' => $productDetails->d_id,
                    'quantity' => $quantity,
                    'price' => $productDetails->price
                ));

                // Check if cart session variable is not empty
                if (!empty($_SESSION["cart_item"])) {
                    // If item already exists in cart, update its quantity
                    if (in_array($productDetails->d_id, array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productDetails->d_id == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                // Update quantity of existing item in cart
                                $_SESSION["cart_item"][$k]["quantity"] += $quantity;
                            }
                        }
                    } else {
                        // If item does not exist in cart, add it to cart
                        $_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
                    }
                } else {
                    // If cart session variable is empty, add item to cart
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;

        case "remove": // If action is 'remove', remove item from cart
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    // Check if item id matches with id in cart session variable, then unset it
                    if ($productId == $v['d_id']) {
                        unset($_SESSION["cart_item"][$k]);
                    }
                }
            }
            break;

        case "empty": // If action is 'empty', empty the cart
            unset($_SESSION["cart_item"]); // Unset the cart session variable
            break;

        case "check": // If action is 'check', redirect to checkout page
            header("location:checkout.php"); // Redirect to checkout.php
            break;
    }
}
?>
