<html>
<head>
<title>signup</title>
<script type="text/javascript">



function verify()
{
if(document.getElementById('username').value.length>30)
{
document.getElementById('us_name').innerHTML="only 30 characters are allowed";
}
else{
document.getElementById('us_name').innerHTML="";
}
if(document.getElementById('password').value.length<6 && document.getElementById('password').value.length>1)
{
document.getElementById('ps_name').innerHTML="Weak password";
}

else
{
document.getElementById('ps_name').innerHTML="";

}
}
</script>
<style type="text/css">
input[type=text],input[type=email], input[type=password] {
font-size:22px;
 border: none;
  border-bottom: 2px solid blue;
}
input[type=text]:hover ,input[type=email]:hover , input[type=password]:hover {
font-size:22px;
 border: none;
  border-bottom: 2px solid black;
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
input[type=submit]:hover,input[type=reset]:hover
{
background-color:FF3342;
}

div.signup{
position:absolute;
left:600px;
top:15px;
width:20%;
height:auto;
border:4px solid gray;
border-radius:9px;
}
body{
overflow:hidden;
}
</style>
</head>
<body>
<div class="signup">
<form method="post" action="">
<table width="100" cellpadding="12" align="center">

<tr>
<td><span><h3>Username</h3></span></td>
</tr>

<tr>
<td><input type="text" placeholder="enter username" required id="username" autofocus name="uname" autocomplete="off" onkeyup="verify()"><br><font color="red"><p id="us_name"></p></font></td>
</tr>
<tr>
<td><h3>SELECT MODE</h3></td>
</tr>
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
<td><input type="password" placeholder="enter password" required name="upass" id="password" onkeyup="verify()"><br><font color="red"><p id="ps_name"></p></font></td>
</tr>

<tr>
<td><span><h3>Re-enter password</h3></span></td>
</tr>

<tr>
<td><input type="password" placeholder="re-enter password" name="rpass" required</td>
</tr>

<tr>
<td><input type="submit" value="submit" name="submit">&nbsp&nbsp<input type="reset" value="clear"></td>
</tr>

</table>
</form>
</div>
</body>
<?php
$con=mysqli_connect("localhost","root","","excite");
if(isset($_POST['submit']))
{
if($_POST['upass']==$_POST['rpass'])
{
$pass=sha1($_POST['upass']);
   if(mysqli_query($con,"INSERT INTO details VALUES(',','$_POST[uname]','$_POST[email]','$pass','$_POST[type]')"))
    {
       echo "<script>alert('data inserted successfully')</script>";
	
    }
   else
    {
       echo "<script>alert('not yet inserted')</script>";
    }
}
else
{
echo "<script>alert('Passwords Mismatch');</script>";
}
}
?>
</html>