<html>
<head>
<title>signup</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" type="text/css">
<script type="text/javascript">
function remove()
{
	var table=document.getElementById('ex');
	table.deleteRow(0);
}


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
span{
color:#000000;
font-family:"Courier New", Courier, monospace;

}

input[type=text],input[type=email],input[type=file], input[type=password],input[type=number],select {
font-size:20px;
 box-sizing:border-box;
 border-radius:5px;
 padding:12px;
}
input[type=text]:hover ,input[type=email]:hover, input[type=password]:hover,input[type=number]:hover {
font-size:20px;
 box-sizing:border-box;
 border:2px solid #0099cc;
 border-radius:5px;
 padding:12px;
}

input[type=submit],input[type=reset],input[type=button]{
background-color:33BDFF;
border: none;
color: white;
padding: 16px 32px;
text-decoration: none;
margin: 4px 2px;
cursor:pointer;
}
input[type=submit]:hover,input[type=reset]:hover,input[type=button]:hover
{
background-color:FF3342;
}
caption{
	text-align:center;
	font-size:20px;
	padding:9px;
	width:90%;
}
div.signup{
position:absolute;
padding:12px;
left:600px;
top:15px;
width:40%;
border:0px solid gray;
border-radius:9px;
background-color:  #e0e0d1;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.9);
}

body{
	background-color: #f5f5f0;
}
a{
	position:absolute;
	left:300px;
	top:10px;
}

</style>
</head>
<body>
<a href="menu.php" class="btn btn-success">HOME</a>
<div class="signup">
<form method="post" action="" enctype="multipart/form-data">
<table width="100" cellpadding="12" align="center" >
<caption><b>INVESTOR SIGN UP<b></caption>

<tr>
<td><span><h4>Username</h4></span></td>
</tr>

<tr>
<td><input type="text" placeholder="enter username" required id="username" autofocus name="uname" autocomplete="off" onkeyup="verify()"><br><font color="red"><p id="us_name"></p></font></td>
</tr>

<tr>
<td><span><h4>Phone Number</h4></span></td>
</tr>

<tr>
<td><input type="text" placeholder="enter phone number" required id="phno" name="phno" autocomplete="off"></td>
</tr>

<tr>
<td><span><h4>Gender</h4></span></td>
</tr>

<tr>
<td>
<select name="gender">
<option value="" disabled selected hidden>Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</td>
</tr>


<tr>
<td><span><h4>Email</h4></span></td>
</tr>

<tr>
<td><input type="email" placeholder="enter email" required name="email" autocomplete="off"></td>
</tr>

<tr>
<td><span><h4>Password</h4></span></td>
</tr>

<tr>
<td><input type="password" placeholder="enter password" required name="upass" id="password" onkeyup="verify()"><br><font color="red"><p id="ps_name"></p></font></td>
</tr>

<tr>
<td><span><h4>Re-enter password</h4></span></td>
</tr>
<tr>
<td><input type="password" placeholder="re-enter password" name="rpass" required</td>
</tr>
<tr>
<td><span><h4>Investment Size</h4></span></td>
</tr>
<tr>
<td><input type='text' placeholder='Enter size' name='inv_size' id='inv_size' required></td>
</tr>
<tr>
<td><span><h4>Investment Criteria</h4></span></td>
</tr>
<tr>
<td><input type='text' placeholder='Enter Criteria' name='criteria' id='criteria' required></td>
</tr>
<tr>
<td><span><h4>Sector Preference</h4></span></td>
</tr>
<tr>
<td><input type='text' placeholder='Enter your preference' name='sector' id='sector' required></td>
</tr>
<tr>
<td><span><h4>Location Preference</h4></span></td>
</tr>
<tr>
<td><input type='text' placeholder='Enter location preference' name='location' id='location' required></td>
</tr>

<td><span><h4>About You (50 words)</h4></span></td>
</tr>
<tr>
<td>
<textarea name='about' rows="4" cols="50" placeholder="Donot exceed more than 50"></textarea>
</td>
</tr>
<tr>
<td><span><h4>Your Area of expertise</h4></span></td>
</tr>
<tr>
<td>
<textarea rows="4" cols="50" name="expertise" placeholder="Short answer"></textarea>
</td>
</tr>

<tr>
<td><span><h4>Twitter</span></h4></td>
</tr>

<tr>
<td><input type="text" name="twitter" id="twitter" placeholder="Mention twitter id" pattern="^[A-Za-z0-9_]{1,15}$"></td>
</tr>
<tr>
<td><span><h4>LinkedIn</span></h4></td>
</tr>

<tr>
<td><input type="text" name="linkedin" id="linkedin" placeholder="Mention linkedin id" pattern="^[A-Za-z0-9_]{1,15}$"></td>
</tr>
<tr>
<td><span><h4>Upload Your photo</h4></span></td>
</tr>
<tr>
<td><input type="file" name="pro_pic" id="pro_pic"></td>
</tr>
<tr>
<td><span><h4>Upload Budget Sheet</h4></span></td>
</tr>
<tr>
<td><input type="file" name="budget" id="budget"></td>
</tr>

<tr>
<td>
<br>
<input type="submit" value="submit" name="submit">&nbsp&nbsp<input type="reset" value="clear">
</td>
</tr>
</table>
</form>
</div>
</body>
<?php
$con=mysqli_connect("localhost","root","","excite");
$res=mysqli_query($con,"SELECT email from investor_registration");
$temp=0;
if(isset($_POST['submit']))
{
	
	while($data=mysqli_fetch_assoc($res))
{
	if($_POST['email']==$data['email'])
	{
		$temp=1;
	}
}
if($temp==0)
{




$pro_pic=$_FILES['pro_pic']['name'];

$budget=$_FILES['budget']['name'];

$allowed=array('jpg','jpeg','png','pdf');
$pro_pic_img_ext=strtolower(end(explode('.',$_FILES['pro_pic']['name'])));
$budget_img_ext=strtolower(end(explode('.',$_FILES['budget']['name'])));
if($_POST['upass']==$_POST['rpass'])
{
	$upass=SHA1($_POST['upass']);
	if(in_array($pro_pic_img_ext,$allowed) && in_array($budget_img_ext,$allowed))
	{
		if($_FILES['pro_pic']['error']===0 && $_FILES['budget']['error']==0)
		{
			if(move_uploaded_file($_FILES['pro_pic']['tmp_name'],'investors/'.$_FILES['pro_pic']['name']) && move_uploaded_file($_FILES['budget']['tmp_name'],'investors/'.$budget))
			{
				if(mysqli_query($con,"INSERT INTO investor_registration VALUES(',','$_POST[uname]','$_POST[phno]','$_POST[gender]','$_POST[email]','$upass','$_POST[inv_size]','$_POST[criteria]','$_POST[sector]','$_POST[location]','$_POST[about]','$_POST[expertise]','$_POST[twitter]','$_POST[linkedin]','$pro_pic','$budget')"))
				{
					echo "<script> alert('registered successfully');</script>";
				}
				else{
					echo "<script> alert('registration failed');</script>";
					
				}
			}
			else{
				echo "<script>alert('Not uploaded Try again..');</script>";
			}
		}
		else{
			echo "<script>alert('Error in uploading');</script>";
		}
	}
	else
	{
		echo "<script>alert(''jpeg,jpg,png,pdf extensions are allowed');</script>";
	}
}
else{
	echo "<script>alert('passwords Mismatch');</script>";

}
}
else
{
	echo "<script>alert('email already exists');</script>";
}


}
?>
</html>


<!--Warning: move_uploaded_file(images/WIN_20200324_16_12_09_Pro.jpg): failed to open stream: No such file or directory in C:\xampp\htdocs\php\excite\investor_signup.php on line 320
Warning: move_uploaded_file(): Unable to move 'C:\xampp\tmp\phpEAAB.tmp' to 'images/WIN_20200324_16_12_09_Pro.jpg' in C:\xampp\htdocs\php\excite\investor_signup.php on line 320
Notice: Array to string conversion in C:\xampp\htdocs\php\excite\investor_signup.php on line 322
