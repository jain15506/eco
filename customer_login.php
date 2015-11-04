<?php

include("includes/db.php");


?>
<div id="login_image">  
<br>
<form  method="post" action="">
<table id="login_table" width="400"  bgcolor="floralwhite">

<tr align="center">
<td colspan="7"><b><pre  id="login_write">L O G I N </pre></b></td>
<tr >
<td id ="label" colspan="1"><pre>   Email:</pre></td>
<td id ="input"><input size="35" colspan="2" type="text" name="email" placeholder="enter email" required/></td>


</tr>
<tr >

<td id ="label"><pre>Password:</pre></td>
<td id ="input"><input size="35" type="password" name="pass" placeholder="enter password" required/></td>
<tr >
<td align="center" colspan="7"><input id="login" type="submit" name="login" value="Login"/></td>
</tr>
<tr >
<td align="center" colspan="7"><a href="checkout.php?forgot_pass"><h3>Forgot Password?<h3></a>
<a href="customer_register.php"  style="text-decoration:none;"><h3>NEW? Register Here</h3></a></td>
</tr>
</table>

</form>
</div>
<?php
if(isset($_POST['login'])){
	$c_email=$_POST['email'];
	$c_pass=$_POST['pass'];
	$sel_c="select * from customer where customer_pass='$c_pass' AND customer_email='$c_email'";
	$run_c=mysqli_query($con,$sel_c);
	$check_customer=mysqli_num_rows($run_c);
	if($check_customer==0){
		echo "<script>alert('Password or email is incorrect,please try again!')</script>";	
		exit();
		
	}
	$ip=getIp();
	$sel_cart="select * from cart where ip_add='$ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);	
	if($check_customer>0 AND $check_cart==0){
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('You logged in successfully,Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
	}
	
	else{
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Logged in successfully,Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
	}
	
}

?>

