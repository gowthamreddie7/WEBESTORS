<?php
session_start();
if($_SESSION['id'])
{
echo $_GET['id'];
$_SESSION['ID']=$_GET['id'];
$con=mysqli_connect("localhost","root","","excite");
$res=mysqli_query($con,"SELECT * FROM startup_registration WHERE id='$_SESSION[id]'");

while($data=mysqli_fetch_assoc($res))
{
$phno=$data['phone_number'];
$upass=$data['password'];
}
?>
<html>
<head>
<style type="text/css">
input[type=text], input[type=password] {
font-size:20px;
 box-sizing:border-box;
 border-radius:5px;
 padding:12px;
 margin-left:100px;
}


input[type=text]:hover, input[type=password]:hover{
font-size:20px;
 box-sizing:border-box;
 border:2px solid  #0099cc;
 border-radius:5px;
 padding:12px;
}
h3{
	 margin-left:100px;
	 font-size:30px
}

input[type=submit],input[type=reset]{
background-color:33BDFF;
border: none;
color: white;
padding: 16px 32px;
text-decoration: none;
cursor:pointer;
 margin-left:90px;
}
input[type=submit]:hover , input[type=reset]:hover{
background-color:FF3342;
}
table{
	margin-left:800px;
	margin-top:100px;
	border-radius:9px;
	box-sizing:
	background-color: #e0e0d1;
	width:25%;
	height:60%;
	
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.9);
}
caption{
	font-size:30px;
	background-color: #acac86;
	padding:12px;
	
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.9);
}

</style>
</head>
<body>
<div class="container">
<form method="post" action="">
<table width="600" cellpadding="12">
<caption>LOGIN FOR DETAILS</caption>
<tr>
<td><h3>Mobile Number<h3></td>
</tr>
<tr>
<td><input type='text' value="<?php if(isset($phno)) echo $phno ?>" readonly name="phno"></td>
</tr>
<tr>
<td><h3>Password<h3></td>
</tr>
<tr>
<td><input type='password' placeholder="Enter Password" required autofocus name="upass"></td>
</tr>
<tr>
<td><input type='submit' value="submit" name="submit"><input type="reset" value="clear"</td>
</tr>
</table>
</form>
</body>
<?php
if(isset($_POST['submit']))
{
	if($upass==SHA1($_POST['upass']))
	{
		header("Location:verify_investor.php");
	}
}
?>

</html>
<?php
}
else
{
	echo "<script>alert('SESSION EXPIRED');</script>";
}
?>
