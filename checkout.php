
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
<li><a href="dex.php">Home</a></li>
<li><a  href="all_products.php">All Products</a></li>

<li><a href="#"><?php
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
<input type="submit" name"search" value="Search"/>
</form>

</div>

</div>
<!-- navigation end!-->

<!--content wrapper start!-->
<div class="content_wrapper">
<!--sidebar!-->
<div class="sidebar">
<div class="sidebar_title">Categories</div>
<ul id="cats">
<?php getCats();?>

</ul>

<div class="sidebar_title">Brands</div>
<ul id="cats">
<?php getBrands();?>
</ul>
</div>

<div id="content_area">


<div id="product_box">
<?php
if(!isset($_SESSION['customer_email'])){
	
	include("customer_login.php");
}
else{
	include("payment.php");
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