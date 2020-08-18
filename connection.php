<html>
<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"excite");

mysqli_query($con,"CREATE TABLE details(id INTEGER(4) PRIMARY KEY AUTO_INCREMENT,username VARCHAR(30),email VARCHAR(30),password VARCHAR(100),type VARCHAR(30))");


?>
</html>