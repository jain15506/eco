
<!DOCTYPE>
<?php
session_start();
include("function/function.php");
include("includes/db.php");
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
<?php cart(); ?>
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
 </div>
<form action="customer_register.php" method="post" enctype="multipart/form-data">
<table align="center" width="750">
<tr align="center"><td colspan="6"><h2> Create an Account</h2></td></tr>

<tr>
<td align="right">Customer Name:</td>
<td><input type="text" name="c_name" required/></td>
</tr>
<tr>
<td align="right">Customer Email:</td>
<td><input type="text" name="c_email"required /></td>
</tr>
<tr>
<td align="right">Customer Password:</td>
<td><input type="password" name="c_pass"required /></td>
</tr>
<tr>
<td align="right">Customer Image</td>
<td><input type="file" name="c_image" required/></td>
</tr>
<tr>
<td align="right">Customer Country</td>
<td>
<select name="c_country"required >
<option>Select a Country</option>
<option>India</option>
<option>Japan</option>
<option>China</option>
<option>England</option>
<option>South Africa</option>

</select>
</td>
</tr>
<tr>
<td align="right">Customer City</td>
<td><input type="text" name="c_city"required /></td>
</tr>
<tr>
<td align="right">Customer Contact</td>
<td><input type="text" name="c_contact"required /></td>
</tr>
<tr>
<td align="right">Customer Address</td>
<td><input type="text" name="c_address"required /></td>
</tr>
<tr align="center">
<td colspan="6"><input type="submit" name="register" value="Create Account"/></td>
</tr>
</table>
</form>

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
<?php
if(isset($_POST['register'])){
	
	$ip=getIp();
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	$c_image=$_FILES['c_image']['name'];
	$c_image_tmp=$_FILES['c_image']['tmp_name'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address'];
	
	move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
	$insert_c="insert into customer (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
	
	$run_c=mysqli_query($con,$insert_c);
	$sel_cart="select * from cart where ip_add='$ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_cart==0){
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Account has been created successfully,Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		
	}
	else{
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Account has been created successfully,Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		
	}
}


?>