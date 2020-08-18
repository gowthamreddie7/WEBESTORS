<html>
<head>
<title>search for investors</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" type="text/css">
<style type="text/css">
.filters{
position:absolute;
left:0px;
top:10px;
width:15%;
height:90%;
background-color:#e0e0d1;
}
.container{
	position:relative;
	background-color:;
	left:100px;
width:70%;
}
.results{
position:relative;
padding:12px;
left:0px;
top:10px;
width:30%;
height:50%;	

}
.result_data{
	margin:0px;
	padding:12px;
	width:100%;
	height:120%;
	border-radius:6px;
	background-color:#ebebe0;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.6);
	
}

td a{
	margin-left:20px;
	margin-top:20px;
}


</style>
<head>
<?php
session_start();
if($_SESSION['id'])
{
$con=mysqli_connect("localhost","root","","excite");
$res=mysqli_query($con,"SELECT * FROM investor_registration");
echo "<br>";
echo "<div class='filters'>";
echo "<h1>Filters to be added soon</h1>";
echo "</div>";

$i=mysqli_num_rows($res);
echo "<div class='container'>";

while($i>0)
{	
while($data=mysqli_fetch_assoc($res))
{
	
	echo "<div class='col-xs-3 results'>";
	
	echo "<div class='result_data'>";
	echo "<table width='400' height='400' border='0' cellpadding='12'>";
	echo "<tr>";
	echo "<td><img src='investors/".$data['pro_pic']."'width='100' height='auto'></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>about</td>";
	echo "<td>".$data['about']."</h3></td>";
	echo "</tr>";
		echo "<tr>";
	echo "<td>Expertise</td>";
	echo "<td>".$data['expertise']."</h3></td>";
	echo "</tr>";
		echo "<tr>";
	echo "<td>Investment Size</td>";
	echo "<td>".$data['investment_size']."</h3></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Investment Criteria</td>";
	echo "<td>".$data['investment_criteria']."</h3></td>";
	echo "</tr>";
		echo "<tr>";
	echo "<td>Sector Preference</td>";
	echo "<td>".$data['sector_preference']."</h3></td>";
	echo "</tr>";
	echo "<td>Location Preference</td>";
	echo "<td>".$data['location_preference']."</h3></td>";
	echo "</tr>";
		echo "<tr>";
	echo "<td>Twitter id</td>";
	echo "<td>".$data['twitter']."</h3></td>";
	echo "</tr>";
		echo "<tr>";
	echo "<td>Linkedin id</td>";
	echo "<td>".$data['linkedin']."</h3></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td colspan='2'><a href='contact_investor.php?id=$data[id]' target='body' class='btn btn-success'>SEND PROPOSAL</a></td>";
	echo "<td></td>";
	echo "</tr>";
	
	echo "</table>";
	echo "</div>";
	echo "</div>";
	$i--;
}
}

echo "</div>";
}
else
{
	echo "<script>alert('SESSION OUT');</script>";
}
?>
</html>