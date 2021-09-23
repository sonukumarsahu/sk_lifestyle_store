<?php
require 'includes/common.php';
if(!isset($_SESSION['email']))
{
    header('location:index.php');
}
$user_id=$_SESSION['id'];
$sql="select * from users_items where user_id='$user_id'";
    $result=$con->query($sql);
    
    if(mysqli_num_rows($result)>0)
    {
         $sql="update users_items set status='Confirmed' where user_id='$user_id'  ";
        
        if($con->query($sql))
        {
           
        }
    }
         else 
          {
      echo "<h4 style='color:red'>Add to cart First</h4>";
         }
    
?>
<!DOCTYPE html>
<!--Success Page-->
<html>
    <head>
        <title>Success | Life Style Store</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <!-- J query Library-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
        <!-- Latest complied and  minified java script -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="background-color:#ccccff">
        <?php
       include 'includes/header.php';
        ?>
        
        <div class="container-fluid" id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h2 align="center"  style="color:green">Your order is confirmed.</h2>
                    <h3 align="center">  Thank you for shopping with us.The order shall be delivered to you shortly.</h3><hr>
                    
                    <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
                </div>
            </div>
        </div>
        
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>
