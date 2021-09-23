<?php
require 'includes/common.php';
if (isset($_POST['register'])){
    
$email= mysqli_real_escape_string($con, $_POST['email']);
$first_name= mysqli_real_escape_string($con,  $_POST['first_name']);
$last_name= mysqli_real_escape_string($con, $_POST['last_name']);
$phone=$_POST['phone'];


$password=$_POST['password'];
$password=md5($password);

$errors = array();

$e="SELECT email FROM user WHERE email='$email'";
$ee= mysqli_query($con, $e);


if (empty($email)){
    $errors['e']= "Email is Required";
    //To avoid duplication of Email
}elseif (mysqli_num_rows($ee)>0) {
    $errors['e']="Email already exist";
        
    }
    
    if (empty($first_name)){
    $errors['fn']= "First Name is  Required";
    }
    
    if(empty($last_name)){
        $errors['ln']="Last Name is Reqiired";
    }
    //To validate the phone Number
    if(strlen($phone)!=10){
        $errors['ph']="Phone Number must be 10 digit";
       }
    
       if(empty($password)){
         $errors['pas']="Password is Required";
     }  
    
     

if(count($errors)==0){
    
    $query="insert into user(email,first_name,last_name,phone,password) values ('$email', '$first_name','$last_name', '$phone', '$password')";

$result=mysqli_query($con, $query);

//echo "User Successfully Inserted";

if($result){
    $_SESSION['email']=$email;
    $_SESSION['id']= mysqli_insert_id($con);
 
    header('location:products.php');
    
}else{
    echo "<script>alert('Error')</script>";
}
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up | Life Style Store</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <!-- J query Library-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
        <!-- Latest complied and  minified java script -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <style>
            .body_style{
                background-color:powderblue;
            }
            
            
        </style>
        
    </head>
    <body style="background-color:#ccccff">
        
      <?php
      include 'includes/header.php';
      ?>
        <div class="container">
            <div class="row margin_top">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading"> SIGN UP </div>
                        
                        <div style="background-color:#ccccff" class="panel-body">
                            
                            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                                
                                 <div class="form-group">
                                     <label id="name">Email</label>
                                     <input type="email" class="form-control" id="email" name="email" autocomplete="off" required="true">
                                    <p class="text-danger"><?php if(isset($errors['e'])){ echo $errors['e'] 
                                    ;} ?> </p>
                                </div>
                                
                                <div class="form-group">
                                    <label id="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required="true">
                                    <p class="text-danger"><?php if(isset($errors['fn'])){ echo $errors['fn'] 
                                    ;} ?> </p>
                                </div>
                                 
                                <div class="form-group">
                                    <label id="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required="true">
                                    <p class="text-danger"><?php if (isset($errors['ln'])){echo $errors['ln'];}?> </p>
                                </div>
                                
                                <div class="form-group">
                                    <label id="phone">Contact:</label>
                                    <input type="number" class="form-control" name="phone" maxlength="10" size="10"id="phone" >
                                    <p class="text-danger"> 
                                        <?php 
                                        if(isset($errors['ph'])){
                                            echo $errors["ph"];
                                        } 
                                            
                                            ?>
                                    </p>
                                </div>
                                
                                <div class="form-group">
                                    <label id="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                           required="true" pattern=".{6,}" >
                               
                                </div>
                                
                               
                                <button type="submit" class="btn btn-primary" name="register" value="register">Register</button> <br>
                                
                                  
                            </form>
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
