<!DOCTYPE>
<?php
include ("includes/db.php");
if(isset($_GET['edit_pro'])){
$pro_id=$_GET['edit_pro'];	
$get_pro="select * from products where product_id='$pro_id'";
$run_pro=mysqli_query($con,$get_pro);

$row_pro=mysqli_fetch_array($run_pro);
	$pro_id=$row_pro['product_id'];
	$pro_title=$row_pro['product_title'];
	$pro_image=$row_pro['product_image'];
	$pro_price=$row_pro['product_price'];
	$pro_desc=$row_pro['product_desc'];
	$pro_keywords=$row_pro['product_keywords'];
	$pro_cat=$row_pro['product_cat'];
	$pro_brand=$row_pro['product_brand'];
	
$get_cat="select * from categories where cat_id='$pro_cat'";
	
	$run_cat=mysqli_query($con,$get_cat);
	
	$row_cat=mysqli_fetch_array($run_cat);
	$cat_id=$row_cat['cat_id'];
	$cat_title=$row_cat['cat_title'];

$get_brand="select * from brands where brand_id='$pro_brand'";
	
	$run_brand=mysqli_query($con,$get_brand);
	
	$row_brand=mysqli_fetch_array($run_brand);
	
	$brand_id=$row_brand['brand_id'];
	$brand_title=$row_brand['brand_title'];

}
?>
<html>
<head>
<title>Edit & Update Products </title>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="1000" border="2" bgcolor="antiquewhite">
<tr>
<td><h2>Edit & update product<h2></td>
</tr>
<tr>
<td align="right">Product Title</td>
<td><input type="text" name="new_product_title" value="<?php echo $pro_title;?>"/></td>
</tr>

<tr>
<td align="right">Product decription</td>
<td><textarea name="new_product_desc" cols="20" rows="20" ><?php echo $pro_desc; ?></textarea></td>
</tr>
<tr>
<td align="right">Product price</td>
<td><input type="text" name="new_product_price" value="<?php echo $pro_price; ?>"/></td>
</tr>
<tr>
<td align="right">Product Keyword</td>
<td><input type="text" name="new_product_keywords" value="<?php echo $pro_keywords; ?>"/></td>

</tr>
<tr>
<td align="right">Product image</td>
<td><input type="file" name="new_product_image" /><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"/></td>

</tr>
<tr>
<td><input type="submit" name="update_product" value="Update Product Now" /></td>
</tr>

</table>
</form>
</body>
</html>

<?php

if (isset($_POST['update_product'])){
	$update_pro_id=$pro_id;
	//getting text
	$new_product_title=$_POST['new_product_title'];
	$new_product_price=$_POST['new_product_price'];
	$new_product_desc=$_POST['new_product_desc'];
	$new_product_keywords=$_POST['new_product_keywords'];
	$new_product_image=$_FILES['new_product_image']['name'];
	$new_product_image_tmp=$_FILES['new_product_image']['tmp_name'];
	
	move_uploaded_file($new_product_image_tmp,"product_images/$new_product_image");
	$update_pro="update products set product_title='$new_product_title',product_price='$new_product_price',product_desc='$new_product_desc',product_keywords='$new_product_keywords',product_image='$new_product_image' where product_id='$update_pro_id'";
$run_pro=mysqli_query($con,$update_pro);

if($run_pro){
	echo "<script>alert('Product has been updated!')</script>";
	echo " <script>window.open('index.php?view_products','_self')</script>";
	
	
	
}
else{
	
	 echo"<script>not inserted</script>";
}

}

?>












	