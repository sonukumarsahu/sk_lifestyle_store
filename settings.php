
<?php
require 'includes/common.php';
//for password Authentication and to change the password

if(isset($_POST["curpass"])){

$cur=$_POST["curpass"];
$cur=md5($cur);
$new=$_POST["newpass"];
$new=md5($new);
$conf=$_POST["conpass"];
$conf= md5($conf);
$email=$_SESSION["email"];
if($new <> $conf){
    echo "<h3 style='color:red' align='center'>New password and Confirm Password is not Matched</h3>";
}else{
    $sql="select * from user where email='$email' and password='$cur'";
    $result=$con->query($sql);
    
    if(mysqli_num_rows($result)>0)
    {
        $sql="update user set password='$new' where email='$email' and password='$cur'";
        
        if($con->query($sql))
        {
            echo "<h3 style='color:green' align='center'>Password has been changed successfully</h3>";
            //header("location:index.php");
        }
         else 
          {
      echo "<h3 style='color:red'>Invalid current password first</h3>";
         }
    }

else 
{
    echo "<h3 style='color:red' align='center'>Invalid Current password</h3>";
}
}
}
?>

<!DOCTYPE html>
<!--Setting Page-->
<html>
    <head>
        <title>Settings | Life Style Store</title>
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
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4" id="settings-container">
                    <h4>Change Password</h4>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="password" class="form-control" name="curpass"  placeholder="old-password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="newpass" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="conpass"  placeholder="Re-type New Password" required>
                        </div>
                        <button type="submit" name="change"  class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
        
        
        <?php
        include 'includes/footer.php';
        ?>
        
    </body>
</html>

