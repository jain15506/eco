<!DOCTYPE >
<html >
  <head>
   
    <title>Login Form</title>
    
    
    
    
        <link rel="stylesheet" href="styles/login_style.css" media="all">

    
    
    
  </head>

    <body class="align">

  <div class="site__container">

    <div class="grid__container">
<h2 style="text-align:center;color:floralwhite;"><?php echo @$_GET['logged_out']; ?></h2>
<h2 style="text-align:center;color:red;"><?php echo @$_GET['not_admin']; ?></h2>
<h1 style="text-align:center;color:white;"> Admin Login </h1>
      <form action="" method="post" class="form form--login">

        <div class="form__field">
          <label class="fontawesome-user" for="login__username"><span class="hidden">Admin Email</span></label>
          <input id="login__username" name="email" type="text" class="form__input" placeholder="Admin Email" required>
        </div>

        <div class="form__field">
          <label class="fontawesome-lock" for="login__password"><span class="hidden">Admin Password</span></label>
          <input id="login__password" type="password" name="pass"class="form__input" placeholder="Admin Password" required>
        </div>

        <div class="form__field">
          <input type="submit" name="login" value="login">
        </div>

      </form>

      <p class="text--center">Not an admin? <a href="#">Sign up now</a> <span class="fontawesome-arrow-right"></span></p>

    </div>

  </div>

</body>
    
  </html>  
    
   <?php
   session_start();
   include("includes/db.php");
   if(isset($_POST['login'])){
	   
	   $email=mysql_real_escape_string($_POST['email']);
	   $pass=mysql_real_escape_string($_POST['pass']);
	   $sel_user="select * from admins where user_email='$email' AND user_pass='$pass'";
	   $run_user=mysqli_query($con,$sel_user);
	   $check_user=mysqli_num_rows($run_user);
	   if($check_user==0){
		   echo "<script>alert('Password or Email is wrong try again!' )</script>";
		   
	   }
	   
	   
	   else{
		   
		   $_SESSION['user_email']=$email;
		   echo"<script>window.open('index.php?logged_in=You have successfully logged in!','_self')</script>";
	   }
   }
   
   
   
   
   
   
   
   
   
   
   
   
   ?>