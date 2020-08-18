<?php
session_start();

if($_SESSION['id'])
{
	$con=mysqli_connect("localhost","root","","excite");
	$res=mysqli_query($con,"SELECT * FROM startup_registration WHERE id='$_SESSION[id]' ");
	if($data=mysqli_fetch_assoc($res))
	{
		$uname = $data['username'];
		$email = $data['email'];
		$gender=$data['gender'];
		$phno = $data['phone_number'];
		$company_name = $data['company_name'];
		$location = $data['location'];
		$size = $data['market_size'];
		$inr=$data['inr'];
		$summary=$data['summary'];
		
	}
	
?>
<html>
<head>
<title>signup</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" type="text/css">
<script type="text/javascript">
function expand(){
	var table=document.getElementById('ex');
	
	var i=0;
	while(i<document.getElementById('t_count').value)
	{
		
		var row=table.insertRow(0);
		var cell1=row.insertCell(0);
		var cell2=row.insertCell(1);
		cell1.innerHTML="<input type='text' placeholder='enter name' name='team_member'>";
		cell2.innerHTML="<input type='text' placeholder='enter position' name='team_position'>";
		
		i++;	
	}

}
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
	width:50%;
}
div.signup{
position:absolute;
left:600px;
top:15px;
width:40%;
min-height: 280vh;
border:0px solid gray;
border-radius:9px;
background-color: Transparent;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
div.container-1{
position:absolute;
left:0px;
top:0px;
width:100%;
}
body{
	background-color: #ffffcc;
}

</style>
</head>
<body>
<div class="signup">


<div class="container-1 " align="center">
<form method="post" action="" enctype="multipart/form-data">
<table width="100" cellpadding="12" align="center">
<caption><b>PERSONAL INFORMATION<b></caption>

<tr>
<td><span><h4>Username</h4></span></td>
</tr>

<tr>
<td><input type="text" placeholder="enter username" required id="username" autofocus value="<?php if(isset($uname)) echo $uname ?>" name="uname" autocomplete="off" onkeyup="verify()"><br><font color="red"><p id="us_name"></p></font></td>
</tr>

<tr>
<td><span><h4>Phone Number</h4></span></td>
</tr>

<tr>
<td><input type="text" placeholder="enter phone number" required id="phno" name="phno" autocomplete="off" value="<?php if(isset($phno)) echo $phno ?>"></td>
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
<td><input type="email" placeholder="enter email" required name="email" value="<?php if(isset($email)) echo $email ?>" autocomplete="off"></td>
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
</table>
<hr>
<table width="100" cellpadding="12" align="center">
<caption><b> COMPANY INFORMATION<b></caption>
<tr>
<td><span><h4>Company logo</h4></span></td>
</tr>

<tr>
<td>
<input type="file" required id="logo_upload" autofocus name="logo">
</td>

</tr>

<tr>
<td><span><h4>Company Name</h4></span></td>
</tr>

<tr>
<td><input type="text" placeholder="enter company name" required name="comp_name" value="<?php if(isset($company_name)) echo $company_name ?>" autocomplete="off"></td>
</tr>

<tr>
<td><span><h4>Google Location</h4></span></td>
</tr>

<tr>
<td><input type="text" placeholder="latitude" required name="latitude" id="lat"></td><td><input type="text" value="<?php if(isset($location)) echo $location ?>" placeholder="longitude address" required name="longitude" id="lon"> </td>
</tr>

<tr>
<td><span><h4>upload company images</h4></span></td>
</tr>

<tr>
<td>
<input type="file" name="comp_img" required>
</td>

</tr>
</table>

<hr>
<table width="100" cellpadding="12" align="center">
<caption><b>PITCH AND DETAILS<b></caption>
<tr>
<td><span><h4>Short Summary</h4></span></td>
</tr>

<tr>
<td>
<textarea rows="4" cols"50" name="summary" placeholder="Donot exceed more than 100 words"></textarea>
</td>
</tr>

<tr>
<td><span><h4>MARKET SIZE</h4></span></td>
</tr>

<tr>
<td><input type="text" placeholder="enter size" required name="size" autocomplete="off" value="<?php if(isset($size)) echo $size ?>"></td>
</tr>

<tr>
<td><span><h4>upload required docs(*bussiness plan , financials , other docs)</h4></span></td>
</tr>

<tr>
<td>
<input type="file" required name="bplan" id="bplan">&nbsp&nbsp<input type="file" required name="fplan" id="fplan">&nbsp&nbsp<input type="file" name="oplan" id="oplan">
</td>

</tr>

</table>


<hr>
<table width="100" cellpadding="12" align="center">
<caption><b>TEAM INFORMATION<b></caption>
<tr>
<td><span><h4>Team count</h4></span></td>
</tr>

<tr>
<td>
<input type="number" name="team_count" id="t_count" required autocomplete="off" min=1 >&nbsp&nbsp<input type="button" onclick="expand()" value="Go">&nbsp&nbsp<input type="button" onclick="remove()" value="remove">
</td>
</tr>
<tr>
<table id='ex'>

</table>
</table>
<hr>
<table width="100" cellpadding="12" align="center">
<caption><b> REVENUE GENERATION<b></caption>
<tr>
<td><span><h4>INR</h4></span></td>
</tr>

<tr>
<td><input type="text" placeholder="Enter Amount "required id="inr" value="<?php if(isset($inr)) echo $inr ?>"  name="inr" autocomplete="off"></td>
</tr>

<tr>
<td><span><h4>upload projected balanced sheet</h4></span></td>
</tr>

<tr>
<td>
<input type="file" name="pro_sheet" required>
</td>
</tr>
</table>

<input type="submit" value="submit" name="submit">&nbsp&nbsp<input type="reset" value="clear">

</form>
</div>

</div>
</body>
<?php

if(isset($_POST['submit']))
{
/*
echo $_POST['uname'].'<br>';
echo $_POST['email'].'<br>';
echo $_POST['upass'].'<br>';
$file=$_FILES['logo']['tmp_name'];
echo $file.'<br>';
echo $_POST['comp_name'].'<br>';
echo $_POST['latitude'].'<br>';
echo $_POST['longitude'].'<br>';
$location=$_POST['latitude'].",".$_POST['longitude'];
echo $_FILES['comp_img']['tmp_name'].'<br>';

echo $_POST['summary'].'<br>';
echo $_POST['size'].'<br>';	

echo $_FILES['fplan']['tmp_name'].'<br>';
echo $_FILES['bplan']['tmp_name'].'<br>';
echo $_FILES['oplan']['tmp_name'].'<br>';

echo $_POST['team_member'].'<br>';
echo $_POST['team_position'].'<br>';
$team_member=$_POST['team_member']."-".$_POST['team_position'];
echo $_POST['profits_1'].'<br>';
echo $_POST['profits_2'].'<br>';
echo $_POST['profits_3'].'<br>';
echo $_FILES['pro_sheet']['tmp_name'].'<br>';*/




$location=$_POST['latitude'].",".$_POST['longitude'];
$team_member=$_POST['team_member']."-".$_POST['team_position'];

$logo=$_FILES['logo']['name'];
$comp_img=$_FILES['comp_img']['name'];
$fplan=$_FILES['fplan']['name'];
$oplan=$_FILES['oplan']['name'];
$bplan=$_FILES['bplan']['name'];
$pro_sheet=$_FILES['pro_sheet']['name'];

$allowed=array('jpg','jpeg','png','pdf');
$logo_img_ext=strtolower(end(explode('.',$_FILES['logo']['name'])));
$comp_img_ext=strtolower(end(explode('.',$_FILES['comp_img']['name'])));
$fplan_img_ext=strtolower(end(explode('.',$_FILES['fplan']['name'])));
$bplan_img_ext=strtolower(end(explode('.',$_FILES['bplan']['name'])));
$oplan_img_ext=strtolower(end(explode('.',$_FILES['oplan']['name'])));
$pro_sheet_img_ext=strtolower(end(explode('.',$_FILES['pro_sheet']['name'])));
if($_POST['upass']==$_POST['rpass'])
{
	$upass=SHA1($_POST['upass']);
	
	if(in_array($logo_img_ext,$allowed) && in_array($comp_img_ext,$allowed) && in_array($fplan_img_ext,$allowed) && in_array($oplan_img_ext,$allowed) && in_array($bplan_img_ext,$allowed) && in_array($pro_sheet_img_ext,$allowed))
	{
		if($_FILES['logo']['error']===0 && $_FILES['comp_img']['error']===0 && $_FILES['fplan']['error']===0 && $_FILES['bplan']['error']===0 && $_FILES['oplan']['error']===0 && $_FILES['pro_sheet']['error']===0 )
		{
			if(move_uploaded_file($_FILES['logo']['tmp_name'],'images/'.$_FILES['logo']['name']) && move_uploaded_file($_FILES['comp_img']['tmp_name'],'images/'.$_FILES['comp_img']['name']) && move_uploaded_file($_FILES['fplan']['tmp_name'],'images/'.$_FILES['fplan']['name']) && move_uploaded_file($_FILES['bplan']['tmp_name'],'images/'.$_FILES['bplan']['name']) && move_uploaded_file($_FILES['oplan']['tmp_name'],'images/'.$_FILES['oplan']['name']) && move_uploaded_file($_FILES['pro_sheet']['tmp_name'],'images/'.$_FILES['pro_sheet']['name']))
			{
				if(mysqli_query($con,"UPDATE startup_registration SET username='$_POST[uname]' , phone_number='$_POST[phno]' ,gender='$_POST[gender]',email='$_POST[email]' , password='$upass',logo='$logo',company_name='$_POST[comp_name]',location='$location',comp_images='$comp_img',summary='$_POST[summary]',market_size='$_POST[size]',fplan='$fplan',bplan='$bplan',oplan='$oplan',team_members='$team_member' , inr='$_POST[inr]' , balanced_sheet='$pro_sheet' WHERE id='$_SESSION[id]' "))
				{
					echo "<script> alert('updated successfully');</script>";
				}
				else{
					echo "<script> alert('failed to update');</script>";
					
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

?>
<?php

}
else
{
	echo "<script> alert('SESSION TIME OUT');</script>";
}
?>
</html>


<!--Warning: move_uploaded_file(images/WIN_20200324_16_12_09_Pro.jpg): failed to open stream: No such file or directory in C:\xampp\htdocs\php\excite\investor_signup.php on line 320
Warning: move_uploaded_file(): Unable to move 'C:\xampp\tmp\phpEAAB.tmp' to 'images/WIN_20200324_16_12_09_Pro.jpg' in C:\xampp\htdocs\php\excite\investor_signup.php on line 320
Notice: Array to string conversion in C:\xampp\htdocs\php\excite\investor_signup.php on line 322
