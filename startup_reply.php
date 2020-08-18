<?php
session_start();
if($_SESSION['id'])
{
echo $_GET['sno'];
$_SESSION['ID']=$_GET['sno'];
$con=mysqli_connect("localhost","root","","excite");

?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" type="text/css">
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
	margin-left:400px;
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

.r{
	border-radius:9px;
	background-color: #ecffb3;

}
.m{
	border-radius:9px;
	background-color: #e0e0d1;
}
</style>
</head>
<body>
<div class="container">
<form method="post" action="">
<table width="600" cellpadding="12">
<caption>
<?php 
$res=mysqli_query($con,"SELECT * FROM investor_registration WHERE id='$_SESSION[ID]'");
while($data=mysqli_fetch_assoc($res))
{
echo $data['username'];
}

if(isset($_POST['delete']))
{
if(mysqli_query($con,"DELETE FROM startup_message_box WHERE (from_user='$_SESSION[ID]' AND to_user='$_SESSION[id]') OR (from_user='$_SESSION[id]' AND to_user='$_SESSION[ID]')"))
{
	echo "<script>alert('Chat Deleted');</script>";
}
else{
	echo "<script>alert('Chat not deleted');</script>";
}
}
?>
</caption>
<?php
echo "<tr>";
echo "<td align='right'><button name='delete'><span class='glyphicon glyphicon-trash'></span></button></td>";
echo "</tr>";
$res=mysqli_query($con,"SELECT * FROM startup_message_box");

while($data=mysqli_fetch_assoc($res))
{	
if($data['to_user']==$_SESSION['id'] && $data['from_user']==$_SESSION['ID'] && $data['seen']==1)
{
echo "<tr>";
echo "<td><span class='m'>".$data['message']."</span></td>";
echo "</tr>";
}
else if($data['to_user']==$_SESSION['id'] && $data['from_user']==$_SESSION['ID'] && $data['seen']==0)
{
echo "<tr>";
echo "<td><span class='m'>".$data['message']."</span></td>";

echo "</tr>";
}
else if($data['to_user']==$_SESSION['ID'] && $data['from_user']==$_SESSION['id'] && $data['seen']==0)
{
echo "<tr>";
echo "<td align='right'><span class='r'>".$data['reply']."</span></td>";
echo "</tr>";
}
}
mysqli_query($con,"UPDATE startup_message_box SET seen='1' WHERE to_user='$_SESSION[id]' AND seen='0' AND from_user='$_SESSION[ID]'");

?>
<tr>
<td><textarea rows='4' cols='60' name='comment' placeholder="comment here!!!"></textarea></td>
</tr>
<tr>
<td><input type='submit' value="SEND MESSAGE" name="send_message"></td>
</tr>
</table>
</form>
</body>
<?php
if(isset($_POST['send_message']))
{
	if(mysqli_query($con,"INSERT INTO investor_message_box(from_user,to_user,message,seen) VALUES('$_SESSION[id]','$_SESSION[ID]','$_POST[comment]','0')") && mysqli_query($con,"INSERT INTO startup_message_box(from_user,to_user,reply) VALUES('$_SESSION[id]','$_SESSION[ID]','$_POST[comment]')"))
	{
		echo "<script>alert('message sent');</script>";
	}
	else{
		echo "<script>alert('message not sent');</script>";
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
