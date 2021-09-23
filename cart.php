<?php
require 'includes/common.php';
$user_id=$_SESSION['id'];
 $sql="SELECT * FROM users_items ui INNER JOIN items i ON i.id=ui.item_id  where user_id=$user_id and status='Added to cart'";
 $result = mysqli_query($con,$sql);
 $total=0;
 $id=0; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cart | Life Style Store</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!-- J query Library-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
        <!-- Latest complied and  minified java script -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
      
    </head>
    <body style="background-color:#ccccff">
        <?php
        include 'includes/header.php';
        ?>
        <div class="container-fluid" id="content">
        <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item Number</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Remove</th>    
                            </tr>
                                    
                    <?php
                    if(mysqli_num_rows($result)==0)
                    {    
                        echo "<h3 style='color:red' align='center'>Add to cart First</h3>";  
                        echo'<script>window.location="products.php"</script>';
                        
                    }else
                    {
                        while($row=mysqli_fetch_array($result))
                        {
                          
                            $total=$total + $row["price"];
                            $id=$id+1;
                            
                    ?>        
                        
                    <tr>  
                        <td><?php echo "$id"?></td>
                        <td><?php echo $row["name"];?></td>
                        <td><?php echo $row["price"];?></td>
                        <td><a href="cart-remove.php?action=delete& id=<?php echo"$row[item_id]" ?>"><span class="text-danger">Remove</span></a></td>
                    </tr>  
                  <?php
                        }
                        
                    }
                    ?>   
                        </thead>
                        <tbody>
                            <tr>
                                <td></td><td>Total</td><td>Rs<?php echo "$total";?> </td><td><a href='success.php?id={$row['id']}' class='btn btn-primary'>Confirm Order</a></td> 
                               
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
       <?php
       include 'includes/footer.php';
       ?>
      
    </body>
</html>


