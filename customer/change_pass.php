
<div id="login_image"> 

<form action="" method="post">
<table id="login_table" width="400"  bgcolor="floralwhite">
<tr align="center">
<td colspan="7"><b><pre  id="login_write">C H A N G E   P A S S W O R D</pre></b></td>
<tr >
<tr>
<td id ="label" >
<b >Enter current password:<input type="password" id ="input"name="current_pass" required></b>
</td>
</tr>
<tr>
<td id ="label" >
<b>Enter new password:<input type="password" id ="input" name="new_pass" required ></b>
</td>
</tr>
<tr>
<td id ="label">
<b>Enter new password again:<input type="password" id ="input"name="new_pass_again" required ></b>
</td>
</tr>
<tr align="center" >
<td colspan="7"><input type="submit" id="login" name="change_pass" value="Change Password"/></td>
</table>
</form>
</div>
<?php
include("includes/db.php");
if(isset($_POST['change_pass'])){
	$user=$_SESSION['customer_email'];
	$current_pass=$_POST['current_pass'];
	$new_pass=$_POST['new_pass'];
	$new_again=$_POST['new_pass_again'];
	$sel_pass="select * from customer where customer_pass='$current_pass' AND customer_email='$user'";
	
	$run_pass=mysqli_query($con,$sel_pass);
	$check_pass=mysqli_num_rows($run_pass);
	if($check_pass==0){
	echo "<script>alert('Your current password is wrong!')</script>"	;
		exit();	
	}
	if($new_pass!=$new_again){
			echo "<script>alert('New Password does not match!')</script>"	;
			exit();
	}
	
	else{
		
	$update_pass="update customer set customer_pass='$new_pass' where customer_email='$user'";	
	$run_update=mysqli_query($con,$update_pass);
	echo "<script>alert('Password created succesfully!')</script>";
	echo"<script>window.open('my_account.php','_self')</script>";
	}
	}
	
?>