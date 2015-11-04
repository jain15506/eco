
<!DOCTYPE>
<?php
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
<div id="shopping_cart">
 <span style=" font-size:10px;padding:10;" ><h1><center>
 <?php
 if(isset($_SESSION['customer_email'])){
 
 echo "<b>Welcome :</b>".$_SESSION['customer_email']."<b style='color:yellow;'>YOUR :</b>";
 }
 else{
echo "<b>Welcome Guest!</b>";	 
	 
	 
 }
 ?>
 
<br><b style="color:skyblue">Shopping Cart:</b> TOTAL ITEMS:<?php total_items();?> TOTAL PRICE: <?php total_price();?><a href="cart.php" style="text-decoration:none">Go to cart</a>
 
 <?php
 if(!isset($_SESSION['customer_email'])){
echo "<a href='checkout.php' style='color:skyblue; text-decoration:none;'>Login</a>";
 }
 else{
	 echo"<a href='logout.php' style='color:white;text-decoration:none;'>Logout</a>";
	 
 }	 
 
 ?>
 </h1></center></span>
 

</div>
 
<div id="products_box">
<?php

	
	

	$get_pro="select * from products ";
	$run_pro=mysqli_query($con,$get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){
	$pro_id=$row_pro['product_id'];
	$pro_cat=$row_pro['product_cat'];
	$pro_brand=$row_pro['product_brand'];
	$pro_title=$row_pro['product_title'];
	$pro_price=$row_pro['product_price'];
	$pro_image=$row_pro['product_image'];
	
	echo"
	
	<div id='single_product'>
	<h3>$pro_title</h3>
	<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
	<p><b>$ $pro_price</b></p>
	<a href='details.php?pro_id=$pro_id'style='float:left;'>Details</a>
	<a href='dex.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
	</div>
	";
	
	
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