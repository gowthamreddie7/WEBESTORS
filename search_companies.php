<html>
<head>
<title>search for companies</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" type="text/css">

<script type="text/javascript">

</script>
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
	height:100%;
	border-radius:6px;
	background-color:#ebebe0;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.6);	
}
a{
	margin-left:140px;
}

</style>
<head>
<body>
<?php
session_start();
if($_SESSION['id'])
{
$con=mysqli_connect("localhost","root","","excite");
$res=mysqli_query($con,"SELECT * FROM startup_registration");
echo "<br>";
echo "<div class='filters' id='filters'>";
echo "<h1>Filters to be added soon</h1>";
echo "</div>";
$i=mysqli_num_rows($res);
echo "<div class='container' id='container'>";

while($i>0)
{	
while($data=mysqli_fetch_assoc($res))
{
	
	echo "<div class='col-xs-3 results'>";
	
	echo "<div class='result_data' id='result_data'>";
	echo "<table width='400' height='400' border='0' cellpadding='12'>";
	echo "<tr>";
	echo "<td><img src='images/".$data['logo']."'width='100' height='auto'></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Company</td>";
	echo "<td>".$data['company_name']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>About Company</td>";
	echo "<td>".$data['summary']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Market Size</td>";
	echo "<td>".$data['market_size']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>INR</td>";
	echo "<td>".$data['inr']."</td>";
	echo "</tr>";
	
	
	echo "<tr>";
	echo "<td colspan='2'><a href='contact_startup.php?id=$data[id]' target='inv_body' class='btn btn-success'>INTRESTED</a></td>";
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
</body>
</html>