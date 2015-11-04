
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
<input type="submit" name="search" value="Search"/>
</form>

</div>

</div>
<!-- navigation end!-->

<!--content wrapper start!-->
<div class="content_wrapper">
<!--sidebar!-->
<div class="sidebar">
<div class="sidebar_title">categories</div>
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
 <span style=" font-size:10px;padding:10px;" ><h1><center>
 <?php
 if(isset($_SESSION['customer_email'])){
 
 echo "<b>Welcome :</b>".$_SESSION['customer_email']."<b style='color:yellow;'>YOUR :</b>";
 }
 else{
echo "<b>Welcome Guest!</b>";	 
	 
	 
 }
 ?>
 
<br><b style="color:skyblue">Shopping Cart:</b> TOTAL ITEMS:<?php total_items();?> TOTAL PRICE: <?php total_price();?><a href="dex.php" style="text-decoration:none">Go back</a>
 
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
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="700"bgcolor="khaki" >
<tr align="center">
<th>Remove</th>
<th colspan="3">Product(s)</th>

<th colspan="4">Total Price</th>
</tr>
<!-- getting total price!-->
<?php

$total=0;
		 global $con;
		 $ip=getIp();
		 $sel_price="select * from cart where ip_add='$ip'";
		 $run_price=mysqli_query($con,$sel_price);
		 while($p_price=mysqli_fetch_array($run_price)){
			 $pro_id=$p_price['p_id'];
			 $pro_price="select * from products where product_id='$pro_id'";
			 $run_pro_price=mysqli_query($con,$pro_price);
			 while($pp_price=mysqli_fetch_array($run_pro_price)){
				 $product_price=array($pp_price['product_price']);
				 $product_title=$pp_price['product_title'];
				 $product_image=$pp_price['product_image'];
				 $single_price=$pp_price['product_price'];
				 $values=array_sum($product_price);
					$total+=$values;

?>
<tr align="center">
<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
<td colspan="3"><?php echo $product_title;?><br>
<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/></td>


<td colspan="4"><?php echo "$".$single_price;?></td>

</tr>

		<?php	 }
		 }?>
		 <tr align="right">
<td colspan="4"><b>Sub Total:</b></td>
<td ><?php echo "$".$total;?></td>

</tr>
<tr align="center">
<td colspan="2"><input id="login" type="submit" name="update_cart" value="Update cart"/></td>
<td><input type="submit" id="login" name="continue" value="Continue Shopping"/></td>
<td><input type="submit" id="login" name="checkout" value="checkout now!"/></td>

</tr>
</table>
</form>
<?php

	global $con;
$ip=getIp();
if(isset($_POST['update_cart'])){
	foreach($_POST['remove'] as $remove_id){
	$delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'"	;
	$run_delete=mysqli_query($con,$delete_product)	;
	if($run_delete){
		echo "<script>window.open('cart.php','_self')</script>";
		
		
	}
			
	}
}
if(isset($_POST['continue'])){
	echo "<script>window.open('dex.php','_self')</script>";
}
if(isset($_POST['checkout'])){
	echo "<script>window.open('checkout.php','_self')</script>";
}

if(isset($_POST['back_shop'])){
	echo "<script>window.open('dex.php','_self')</script>";
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