<?php
session_start();
if($_SESSION['id'])
{
$con=mysqli_connect("localhost","root","","excite");
$res=mysqli_query($con,"SELECT * FROM investor_registration WHERE id='$_SESSION[id]'");
while($data=mysqli_fetch_assoc($res))
{
	$uname=$data['username'];
	$phno=$data['phone_number'];
	$email=$data['email'];
	$twitter=$data['twitter'];
	$linkedin=$data['linkedin'];
	$inv_size=$data['investment_size'];
	$criteria=$data['investment_criteria'];
	$sector=$data['sector_preference'];
	$location=$data['location_preference'];
}
?>
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
</style>
</head>
<body>
<div class="signup">
<form method="post" action="" enctype="multipart/form-data">
<table width="100" cellpadding="12" align="center" >
<caption><b>INVESTOR SIGN UP<b></caption>

<tr>
<td><span><h4>Username</h4></span></td>
</tr>

<tr>
<td><input type="text" placeholder="enter username" required id="username" autofocus name="uname" value="<?php if(isset($uname)) echo $uname  ?>" autocomplete="off" onkeyup="verify()"><br><font color="red"><p id="us_name"></p></font></td>
</tr>

<tr>
<td><span><h4>Phone Number</h4></span></td>
</tr>

<tr>
<td><input type="text" placeholder="enter phone number" required id="phno" name="phno" autocomplete="off" value="<?php if(isset($phno)) echo $phno  ?>"></td>
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
<td><input type="email" placeholder="enter email" required name="email" autocomplete="off" value="<?php if(isset($email)) echo $email  ?>" ></td>
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
<td><input type='text' placeholder='Enter size' name='inv_size' id='inv_size' value="<?php if(isset($inv_size)) echo $inv_size ?>"  required></td>
</tr>
<tr>
<td><span><h4>Investment Criteria</h4></span></td>
</tr>
<tr>
<td><input type='text' placeholder='Enter Criteria' name='criteria' id='criteria' value="<?php if(isset($criteria)) echo $criteria ?>" required></td>
</tr>
<tr>
<td><span><h4>Sector Preference</h4></span></td>
</tr>
<tr>
<td><input type='text' placeholder='Enter your preference' name='sector' id='sector' value="<?php if(isset($sector)) echo $sector ?>" required></td>
</tr>
<tr>
<td><span><h4>Location Preference</h4></span></td>
</tr>
<tr>
<td><input type='text' placeholder='Enter location preference' name='location' id='location' value="<?php if(isset($location)) echo $location ?>" required></td>
</tr>


<tr>
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
<td><input type="text" name="twitter" id="twitter" placeholder="Mention twitter id" value="<?php if(isset($twitter)) echo $twitter  ?>" pattern="^[A-Za-z0-9_]{1,15}$"></td>
</tr>
<tr>
<td><span><h4>LinkedIn</span></h4></td>
</tr>
<tr>
<td><input type="text" name="linkedin" id="linkedin" placeholder="Mention linkedin id" pattern="^[A-Za-z0-9_]{1,15}$" value="<?php if(isset($linkedin)) echo $linkedin ?>"></td>
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
if(isset($_POST['submit']))
{	
$pro_pic=$_FILES['pro_pic']['name'];
$budget=$_FILES['budget']['name'];
$allowed=array('jpg','jpeg','png','pdf');
$pro_pic_img_ext=strtolower(end(explode('.',$_FILES['pro_pic']['name'])));

$budget_img_ext=strtolower(end(explode('.',$_FILES['budget']['name'])));
if($_POST['upass']==$_POST['rpass'])
{
$upass=SHA1($_POST['upass']);
if(in_array($pro_pic_img_ext,$allowed))
{
if($_FILES['pro_pic']['error']===0 && $_FILES['budget']['error']==0)
{
if(move_uploaded_file($_FILES['pro_pic']['tmp_name'],'investors/'.$_FILES['pro_pic']['name']) && move_uploaded_file($_FILES['budget']['tmp_name'],'investors/'.$budget))
{
if(mysqli_query($con,"UPDATE investor_registration SET username='$_POST[uname]',phone_number='$_POST[phno]',gender='$_POST[gender]',email='$_POST[email]',password='$upass',investment_size='$_POST[inv_size]',investment_criteria='$_POST[criteria]',sector_preference='$_POST[sector]',location_preference='$_POST[location]',about='$_POST[about]',expertise='$_POST[expertise]',twitter='$_POST[twitter]',linkedin='$_POST[linkedin]',pro_pic='$pro_pic',budget='$_POST[budget]' WHERE id='$_SESSION[id]'"))
{
echo "<script>alert('Update Done Successfully');</script>";
}
else{
echo "<script>alert('Update Failed');</script>";
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
	echo "<script>alert('SESSION EXPIRED');</script>";
}

?>
</html>


<!--Warning: move_uploaded_file(images/WIN_20200324_16_12_09_Pro.jpg): failed to open stream: No such file or directory in C:\xampp\htdocs\php\excite\investor_signup.php on line 320
Warning: move_uploaded_file(): Unable to move 'C:\xampp\tmp\phpEAAB.tmp' to 'images/WIN_20200324_16_12_09_Pro.jpg' in C:\xampp\htdocs\php\excite\investor_signup.php on line 320
Notice: Array to string conversion in C:\xampp\htdocs\php\excite\investor_signup.php on line 322
