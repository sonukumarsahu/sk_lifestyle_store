<footer>
 <div class="container">
     <div class="row">
         <?php
             if(isset($_SESSION['email'])){
             ?>
         <div class="col-xs-9">
             <h4>Information</h4>
             <p><a style="color:#9d9d9d;" href="about.php">About Us</a><br><a style="color:#9d9d9d;" href="contact.php">Contact Us</a></p>
         </div>
         
         <diV class="col-xs-3">
             <h4>Contact Us</h4>
             <p>Contact: +91-75419 07501</p>
         </diV>
         
         <?php
             }else {
         ?>
         <div class="col-xs-5">
             <h4>Information</h4>
             <p><a style="color:#9d9d9d;" href="about.php">About Us</a><br><a style="color:#9d9d9d;" href="contact.php">Contact Us</a></p>
         </div>
         
         <diV class="col-xs-4">
             <h4>My Account</h4>
             <p><a style="color:#9d9d9d;" href="login.php">Login</a><br><a style="color:#9d9d9d;" href="signup.php">Signup</a></p>
             
         </diV>
         <diV class="col-xs-3">
             <h4>Contact Us</h4>
             <p>Contact: +91-75419 07501</p>
         </diV>
         <?php
             }
             ?>
     </div>

 </div>
</footer>