<!DOCTYPE>
<?php
session_start();
include("function/function.php");
?>
<html>
<head>
<link rel="stylesheet" href="styles/main.css" type="text/css" media="all">
</head>
<body>
  <!-- main container start here !-->
<div class="main_wrapper">
<!--header start here !-->
<div class="header_wrapper">
<div id="logo" ><a href="dex.php" id="logo_style"><pre style="text-align:center ;"><b>S</b></pre></a></div>
<div id="banner" >
</div>
</div>
<!--header ends here!-->
<!-- navigation bar start!-->
<div class="menubar">
<ul id="menu">
<li><a href="../dex.php">Home</a></li>
<li><a  href="../all_products.php">All Products</a></li>
<a href="#"><?php
 if(!isset($_SESSION['customer_email'])){
echo "<a href='checkout.php' style='color:white; text-decoration:none;'>My Account</a>";
 }
 else{
	 echo"<a href='customer/my_account.php' style='color:white;text-decoration:none;'>My Account</a>";
	 
 }	 
 
 ?></a></li>
<li><a href="cart.php">Shopping Cart</a></li>
<li><a href="#">Contact Us</a></li>
<li><a href="#"><?php
 if(!isset($_SESSION['customer_email'])){
echo "<a href='checkout.php' style='color:white; text-decoration:none;'>Login</a>";
 }
 else{
	 echo"<a href='logout.php' style='color:white;text-decoration:none;'>Logout</a>";
	 
 }	 
 
 ?></a></li>
</ul>

<div id="form">
<form method="get" action="results.php" enctype="multipart/form-data">
<input type="text" name="user_query" placeholder="search a product"/>
<input type="submit" name="search" value="Search"/>
</form>

</div>

</div>
<!-- navigation end!-->

<!--content wrapper start!-->
<div class="content_wrapper">
<!--sidebar!-->
<div class="sidebar">
<div class="sidebar_title">My Account</div>
<ul id="cats">
<?php
$user=$_SESSION['customer_email'];
$get_img="select * from customer where customer_email='$user'";
$run_img=mysqli_query($con,$get_img);
$row_img=mysqli_fetch_array($run_img);
$c_image=$row_img['customer_image'];
$c_name=$row_img['customer_name'];
echo "<p style='text-algn:center;border:2'><img style='border:8px solid olive ;border-style:groove;margin-top:10px ;'src='customer_images/$c_image' width='150' height='150'/></p>";

?>
<li><a href="my_account.php?my_orders">My Orders</a></li>
<li><a href="my_account.php?edit_account">Edit Account</a></li>
<li><a href="my_account.php?change_pass">Change Password</a></li>
<li><a href="my_account.php?delete_account">Delete Account</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>

</div>

<div id="content_area">


<div id="products_box">

<?php
if(!isset($_GET['my_orders'])){
if(!isset($_GET['edit_account'])){
if(!isset($_GET['change_pass'])){
		if(!isset($_GET['delete_account'])){
			
			
		
echo "

<h2 style='padding:20px;'>Welcome: $c_name</h2>
<b>You can see your orders progress by clicking this link<a href='my_account.php?my_orders'>Link</a></b>";
		}
	}
}
}
?>
<?php
if(isset($_GET['edit_account'])){
include("edit_account.php");	

}
?>
<?php
if(isset($_GET['change_pass'])){
include("change_pass.php");	

}
?>
<?php
if(isset($_GET['delete_account'])){
include("delete_account.php");	

}
?>
</div>
</div>
</div>
<!-- content wrapper end!-->
<div class="footer"> 
<h2 style="text-align:center;
padding-top:30px;">&copy my site</h2>
</div>
</div>
<!--main container end here!-->
</body>
</html>