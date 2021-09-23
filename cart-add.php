<?php
require 'includes/common.php';
$user_id=$_SESSION['id'];
$item_id=$_GET['id'];
   $cart_add_Query="INSERT INTO users_items(user_id, item_id, status) VALUES('$user_id', '$item_id', 'Added to cart')";
   $cart_add_submit=mysqli_query($con, $cart_add_Query);
   echo "<h3 style='color:green' align='center'>Item added to cart successfully</h3>";
   echo'<script>window.location="products.php"</script>';
    ?>
