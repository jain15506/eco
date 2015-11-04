<!DOCTYPE>
<?php
include ("db.php");
?>
<html>
<head>
<title>Insert Products Here</title>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

</head>
<body>
<form action="insert-product.php" method="post" enctype="multipart/form-data">
<table align="center" width="1000" border="2" bgcolor="pink">
<tr>
<td><h2>Insert New Product<h2></td>
</tr>
<tr>
<td align="right">Product Title</td>
<td><input type="text" name="product_title" required/></td>
</tr>
<tr>
<td align="right">Product category</td>
<td>
<select name="product_cat" required>
<option>Select a Category</option>
<?php
    $get_cats = "select * from categories";
 
$run_cats = mysqli_query($con, $get_cats);
 
while ($row_cats = mysqli_fetch_array($run_cats)) {
 
     $cat_id = $row_cats ['cat_id'];
     $cat_title = $row_cats['cat_title'];
 
     echo "<option value='$cat_id'>$cat_title</option>";
}
?>
</select>
</td>
</tr>
<td align="right">Product brands</td>
<td>
<select name="product_brand" required>
<option>Select a Brand</option>
<?php 
    $get_brands = "select * from brands";
 
$run_brands = mysqli_query($con, $get_brands);
 
while ($row_brands = mysqli_fetch_array($run_brands)) {
 
     $brand_id = $row_brands ['brand_id'];
     $brand_title = $row_brands['brand_title'];
 
     echo "<option value='$brand_id'>$brand_title</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td align="right">Product decription</td>
<td><textarea name="product_desc" cols="20" rows="20"></textarea></td>
</tr>
<tr>
<td align="right">Product price</td>
<td><input type="text" name="product_price" required/></td>
</tr>
<tr>
<td align="right">Product Keyword</td>
<td><input type="text" name="product_keywords" required/></td>
</tr>
<tr>
<td><input type="submit" name="insert_post" value="Insert Product Now" /></td>
</tr>
</table>
</form>
</body>
</html>
<?php
session_start();
if (isset($_POST['insert_post'])){
	//getting text
	$product_title=$_POST['product_title'];
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brand'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_keywords=$_POST['product_keywords'];
	
	
	$insert_product="INSERT INTO  products
(product_cat,product_brand,product_title,product_price,product_desc,product_keywords)values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_keywords')";
}
    
?>
