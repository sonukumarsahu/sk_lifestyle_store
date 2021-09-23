<?php
 require 'includes/common.php';

 $item_id=$_GET['id'];
$user_id=$_SESSION['id'];
echo "$item_id";
 
 $sql="select * from users_items where user_id='$user_id' AND item_id='$item_id'";
    $result=$con->query($sql);
    
    if(mysqli_num_rows($result)>0)
    {
        $sql="DELETE FROM users_items  WHERE user_id='$user_id'AND status='Added to cart' AND item_id='$item_id' ";
        if($con->query($sql))
        {
            header("location:cart.php");
        }
    }
         else 
          {
             header("location:cart.php");
         }
    ?>

 
      
 
