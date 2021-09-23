
<?php

require 'includes/common.php';

    if(isset($_POST['login'])){
                         $email=$_POST['email'];
                         $password=$_POST['password'];
                         $password=md5($password);
                     $select=mysqli_query($con, "SELECT id,email FROM user WHERE email='$email' AND password='$password'");
                     $row= mysqli_fetch_array($select);
                     
                     if(is_array($row)){
                         $_SESSION["id"]=$row['id'];
                         $_SESSION["email"]=$row['email'];
                        
                     } else {
                         echo"<script>alert('Email or password is wrong')</script>";
                   
                     }
                     }
                     
                     if(isset($_SESSION["email"])){
                        
                         header("location:products.php");
                     }
                        
                      
                         

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login | Life Style Store</title>
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
        <div id="content">
            <div class="container-fluid decor_bg" id="login-panel">
       
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="panel panel-primary">
                        <div class=" panel-heading"><h4>LOGIN</h4></div>
                        <div style="background-color:#ccccff" class="panel-body body_style">
                            <form action="" method="POST">
                                <p class="text-warning"><i>Login to make a purchase</i></p>
                                <div class="form-group">
                                    <label id="email">Email</label>
                                    <input type="email" class="form-control" name="email"id="email" >
                                </div>
                                
                                <div class=" form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required="true">
                                </div>
                                
                                <button type="submit" name="login" class="btn btn-primary ">Login</button> <br/>
                                
                            </form> <br/>
                            
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php">Register</a></p></div>
                       
                        </div>
                   
                    </div>
                </div>
            </div>
       
            </div>
        </div>
       
        <?php
        include 'includes/footer.php';
        ?>
        
    </body>     
</html>
