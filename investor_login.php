<?php
session_start();

?>
<html>
<head>
<title>signup</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" type="text/css">


<style type="text/css">
input[type=email], input[type=password] {
font-size:20px;
 box-sizing:border-box;
 border-radius:5px;
 padding:12px;
}

input[type=email]:hover, input[type=password]:hover{
font-size:20px;
 box-sizing:border-box;
 border:2px solid  #0099cc;
 border-radius:5px;
 padding:12px;
}

input[type=submit],input[type=reset]{
background-color:33BDFF;
border: none;
color: white;
padding: 16px 32px;
text-decoration: none;
margin: 4px 2px;
cursor:pointer;
}
input[type=submit]:hover , input[type=reset]:hover{
background-color:FF3342;
}
select{
font-size:16px;
color:blue;
border:0px;
border-bottom:2px solid red;
}
select:hover{
border-bottom:2px solid black;
}
div.login{
	
position:absolute;
left:800px;
top:100px;
width:20%;
height:50%;
border:0px solid gray;
border-radius:9px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
body{
	background-color: #ffffcc;
}

.dropdown {
 position:relative;
left:300px;
top:10px;
 display: inline-block;
}
.dropbtn {
	background-color:Transparent; 
  padding: 16px;
  font-size: 20px;
  border: none;
  cursor: pointer;
  border-radius:4px;
}
.dropbtn:hover{
	background-color: #2eb82e;
  color: white;
  padding: 16px;
  font-size: 20px;
  border: none;
  cursor: pointer;
}
a{
text-decoration:none;
font-size:16px;
}
a:hover{
text-decoration:none;
}
caption{
	font-size:22px;
	padding:12px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

}

</style>
</head>
<body>
<div class="dropdown">
<a href="menu.php" target="a" class="dropbtn"><span class="glyphicon glyphicon-user white"></span>Home</a>
</div>

<div class="login">
<form method="post" action="">
<table width="200" height="400" cellpadding="12" align="center">
<caption>LOGIN AS INVESTOR</caption>
<tr>
<td><span><h3>Email</h3></span></td>
</tr>

<tr>
<td><input type="email" placeholder="enter email" required name="email" autocomplete="off"></td>
</tr>

<tr>
<td><span><h3>Password</h3></span></td>
</tr>

<tr>
<td><input type="password" placeholder="enter password" required name="upass"></td>
</tr>

<tr>
<tr>
<td><input type="submit" value="login" name="submit">&nbsp&nbsp<input type="reset" value="Reset"></td>
</tr>
</table>
</form>
</div>
</body>
<?php
$con=mysqli_connect("localhost","root","","excite");
$temp=0;
if(isset($_POST['submit']))
{
$res=mysqli_query($con,"SELECT * FROM investor_registration WHERE email='$_POST[email]'");

if(mysqli_num_rows($res)>0)
	{
	while($data=mysqli_fetch_assoc($res))
		{	
		if($_POST['email']==$data['email'] && sha1($_POST['upass'])==$data['password'])
			{
				echo $_SESSION['username'];
				$_SESSION["id"]=$data["id"];
				header("Location:frames_2.php");
			}
		else
			{
				echo "<script>alert('incorrect password');</script>";
			}
		}
	}
else{
	echo "<script>alert('no such email registered');</script>";
   }

}
?>
</html>