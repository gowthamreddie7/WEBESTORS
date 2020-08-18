

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" type="text/css">

<style>
.dropbtn {
  background-color: #e0e0d1;
  color: white;
  padding: 20px;
  font-size: 25px;
  border: none;
  cursor: pointer;
  padding-right:40px;
}
.dropbtn:hover{
background-color:  #007a99;
  color: white;
  padding: 20px;
  font-size: 25px;
  border: none;
  cursor: pointer;
  padding-right:40px;
}


.dropdown{
 position:relative;
left:600px;
top:20px;
display: inline-block;
}
.logout{
 position:absolute;
left:2000px;
top:20px;
display: inline-block;
}

body{
	background-color: #e0e0d1;
	overflow:hidden;
}



a{
text-decoration:none;
font-size:16px;
}
a:hover{
text-decoration:none;
}


</style>
<body>
<div class="dropdown">
<a href="startup_profile.php" target="body" class="dropbtn">MY PROFILE</a>
</div>
<div class="dropdown">
 <a href="search_investors.php" target="body" class="dropbtn">SEARCH INVESTORS</a>
</div>
  
<div class="dropdown">
  <a href="#" class="dropbtn">CONTACT ME</a>
 </div>
 <div class="logout">
<a href="startup_logout.php" target="_blank" class="dropbtn"><span class="glyphicon glyphicon-off"></span>LOGOUT</a>
</div>

</body>