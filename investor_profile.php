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
	position:relative;
	left:50px;
	overflow:auto;
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
	padding:12px;
	width:30%;
	max-height:130%;
	position:absolute;
	left:600px;
	top:100px;
	float:left;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

#a{
	text-decoration:none;
	position:absolute;
	left:1400px;
	top:80px;
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
  background-color: #4dd2ff;
  height:50px;
  width:200px;
  
  color: white;
  padding: 16px;
  font-size: 20px;
  border: none;
  cursor: pointer;
}
.dropbtn:hover{
background-color:red;
  color: white;
  padding: 16px;
  font-size: 20px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
 position:relative;
left:1600px;
top:70px;
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
echo "<a href=investor_edit.php?id='$_SESSION[id]' id='a'>EDIT PROFILE</a>"; 

$read=0;
$res=mysqli_query($con,"SELECT * FROM investor_message_box WHERE seen='0' AND to_user='$_SESSION[id]'");

echo "<div class='dropdown'>";
  echo "<button class='dropbtn'><span class='glyphicon glyphicon-envelope'></span> Messages <span class='badge'>".mysqli_num_rows($res)."</span></button>";
  echo "<div class='dropdown-content'>";
  while($data=mysqli_fetch_assoc($res))
  {
	echo "<a href='investor_reply.php?sno=$data[from_user]' target='inv_body'>".$data['message']."</a>";	
  }
  echo "</div>";
echo "</div>";

?>
<div class="pro_pic">
<!--- ************ -->
<?php
$res=mysqli_query($con,"SELECT pro_pic FROM investor_registration WHERE id='$_SESSION[id]'");
while($data=mysqli_fetch_assoc($res))
{
echo "<img src='investors/".$data['pro_pic']."' height='183' width='230'>";	
}
?>
</div>
<div class="personal_info">
<!--- ************ -->
<?php
$res=mysqli_query($con,"SELECT * FROM investor_registration WHERE id='$_SESSION[id]'");
while($data=mysqli_fetch_assoc($res))
{
	echo "<table table width='600' cellpadding='12' border='0'>";
	echo "<caption><h2 align='center'>PERSONAL INFO</h2></caption>";
	echo "<tr>";
	echo "<td><h4>ID</h4></td>";
	echo "<td><h4>".$data['id']."</h4></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h4>YOU ARE</h4></td>";
	echo "<td><h4>".$data['username']."</h4></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h4>PHONE NUMBER</h4></td>";
	echo "<td><h4>".$data['phone_number']."</h4></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h4>GENDER</h4></td>";
	echo "<td><h4>".$data['gender']."</h4></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h4>EMAIL</h4></td>";
	echo "<td><h4>".$data['email']."</h4></td>";
	echo "</tr>";
	
	echo "<td><h4>Investor Size</h4></td>";
	echo "<td><h4>".$data['investment_size']."</h4></td>";
	echo "</tr>";
	echo "<td><h4>Investor Criteria</h4></td>";
	echo "<td><h4>".$data['investment_criteria']."</h4></td>";
	echo "</tr>";
	echo "<td><h4>Sector Preference</h4></td>";
	echo "<td><h4>".$data['sector_preference']."</h4></td>";
	echo "</tr>";
	echo "<td><h4>Location Preference</h4></td>";
	echo "<td><h4>".$data['location_preference']."</h4></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h4>ABOUT</h4></td>";
	echo "<td><h4>".$data['about']."</h4></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h4> AREA OF EXPERTISE</h4></td>";
	echo "<td><h4>".$data['expertise']."</h4></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h4>TWITTER ID</h4></td>";
	echo "<td><h4>".$data['twitter']."</h4></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h4>LINKEDIN ID</h4></td>";
	echo "<td><h4>".$data['linkedin']."</h4></td>";
	echo "</tr>";	
	echo "</table>";	
}
?>
</div>
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