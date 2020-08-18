
<?php
session_start();
$con=mysqli_connect("localhost","root","","excite");
if($_SESSION['id'])
{
?>
<html>
<head>
<style type="text/css">
table{
	margin-left:150px;
}
.pro_pic{
	width:10%;
	height:20%;
	position:absolute;
	left:50px;
	top:20px;
	border:0px solid black;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.personal_info{
	
	width:30%;
	height:70%;
	position:absolute;
	left:400px;
	top:250px;
	float:left;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	overflow:auto;
}
.company_info{
	width:30%;
	height:70%;
	position:absolute;
	left:1200px;
	top:250px;
	float:left;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	overflow:auto;
}

#a{
	text-decoration:none;
	position:absolute;
	left:1800px;
	top:200px;
	padding:12px;
	color:white;
	background-color: #00b300;
}
#a:hover{
	
	text-decoration:none;
	background-color: #ff3300;
}
/* Style The Dropdown Button */
.dropbtn {
  background-color:#4dd2ff;
  
  color: white;
  padding: 16px;
  font-size: 20px;
  width:160px;
  height:50px;
  border: none;
  cursor: pointer;
}
.dropbtn:hover{
  color: white;
  padding: 16px;
  font-size: 20px;
  border: none;
  cursor: pointer;
}
img:hover{
	border:2px black solid;
	transform:scale(2.5);
	transition: transform .2s;
}
/* The container <div> - needed to position the dropdown content */
.dropdown {
 position:relative;
left:2000px;
top:190px;
  display: inline-block;
}


/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}


/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}


a{
text-decoration:none;
font-size:16px;
}
a:hover{
text-decoration:none;

cursor:pointer;
}
</style>

</head>
<body>
<?php
echo "<a href=startup_edit.php?id='$_SESSION[id]' id='a'>EDIT PROFILE</a>"; 
$read=0;
$res=mysqli_query($con,"SELECT * FROM startup_message_box WHERE seen='0' AND to_user='$_SESSION[id]'");
echo "<div class='dropdown'>";
  echo "<button class='dropbtn'><span class='glyphicon glyphicon-envelope'></span> Messages <span class='badge'>".mysqli_num_rows($res)."</span></button>";
  echo "<div class='dropdown-content'>";
  while($data=mysqli_fetch_assoc($res))
  {
	echo "<a href='startup_reply.php?sno=$data[from_user]' target='body'>".$data['message']."</a>";  
  }
  echo "</div>";
echo "</div>";
?>
<div class="pro_pic">
<!--- ************ -->
<?php
$res=mysqli_query($con,"SELECT * FROM startup_registration WHERE id='$_SESSION[id]'");
while($data=mysqli_fetch_assoc($res))
{
echo "<img src='images/".$data['logo']."' height='183' width='230'>";	
}
?>
</div>
<div class="personal_info">
<!--- ************ -->
<?php
$res=mysqli_query($con,"SELECT * FROM startup_registration WHERE id='$_SESSION[id]'");
while($data=mysqli_fetch_assoc($res))
{

	echo "<table table width='300' cellpadding='12'>";
	echo "<caption><h2>PERSONAL INFO</h2></caption>";
	
	echo "<tr>";
	
	echo "<td><h4>ID</h4></td>";
	echo "<td>".$data['id']."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td><h4>YOU ARE</h4></td>";
	echo "<td>".$data['username']."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td><h4>PHONE NUMBER</h4></td>";
	echo "<td>".$data['phone_number']."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td><h4>GENDER</h4></td>";
	echo "<td>".$data['gender']."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td><h4>EMAIL</h4></td>";
	echo "<td>".$data['email']."</td>";
	echo "</tr>";
	
	echo "</table>";
	
}
?>
</div>

<div class="company_info">
<!--- ************ -->

<?php
$res=mysqli_query($con,"SELECT * FROM startup_registration WHERE id='$_SESSION[id]'");
while($data=mysqli_fetch_assoc($res))
{
	
	echo "<table width='300' cellpadding='12'>";
	echo "<caption><h2>COMPANY INFO</h2></caption>";
	echo "<tr>";
	echo "<td><h4>COMPANY NAME</h4></td>";
	echo "<td>".$data['company_name']."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td><h4> GOOGLE LOCATION</h4></td>";
	echo "<td>".$data['location']."</td>";
	echo "</tr>";
	
	echo "<tr>";
	
	echo "<td><h4>MARKET SIZE</h4></td>";
	echo "<td>".$data['market_size']."</td>";
	echo "</tr>";

	echo "<tr>";
	
	echo "<td><h4>SUMMARY</h4></td>";
	echo "</tr>";	
	 echo "<tr>";
	echo "<td>".$data['summary']."</td>";
	 echo "<tr>";
	
	echo "<tr>";
	echo "<td><h4>INR</h4></td>";
	echo "<td>".$data['inr']."/-</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td><h4>Balanced-Sheet</h4></td>";
	echo "<tr>";
	echo "<td><img src='images/".$data['balanced_sheet']."' height='183' width='230'></td>";
	echo"</tr>";
	
	echo "</table>";
	
}
?>
<?php
}
else
{
	echo "<script>alert('SESSION OUT');</script>";
}
?>
</div>
</body>
</html>