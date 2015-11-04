<html>

<head>
<title>Form Input Data</title>
</head>

<body>

<table border="1">
  <tr>
    <td align="center">Form Input Employees Data</td>
  </tr>
  <tr>
  <td>
  <table>
    <form action="try.php" method="POST">
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" size="20">
      </td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="address" size="40">
      </td>
    </tr>
    <tr>
      <td></td>
      <td align="right"><input type="submit" 
      name="submit" value="Sent"></td>
    </tr>
    </table>
  </td>
</tr>
</table>
</html>
<?php

$user_name = "root";
$password = "";
$database = "trial";
$server = "localhost";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");
if (isset($_POST['submit'])){
$name=$_POST["name"];
$address=$_POST["address"];
$order = "INSERT INTO try

        (name, address)

        VALUES

        ('$name',

        '$address')";


$result = mysql_query($order);

if($result){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}
}
?>