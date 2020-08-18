<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" type="text/css">

<style>
/* Style The Dropdown Button */
.dropbtn {
  background-color: Transparent;
  color: white;
  padding: 16px;
  font-size: 20px;
  border: none;
  cursor: pointer;
}
.dropbtn:hover{
background-color:Transparent;
  color: white;
  padding: 16px;
  font-size: 20px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
 position:relative;
left:300px;
top:10px;
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
body{
background-image:url("viewSourceImage-3.jpg");
background-repeat:no-repeat;
background-size:cover;
overflow:hidden;
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
}

</style>
<body>
<div class="dropdown">
<a href="menu.php" target="a" class="dropbtn"><span class="glyphicon glyphicon-user blue"></span>Home</a>
</div>
<div class="dropdown">
  <button class="dropbtn">How to</button>
  <div class="dropdown-content">
    <a href="#">Find Investors</a>
    <a href="#">Find Companies</a>
    <a href="#">Find Startups</a>
	<a href="#">Buy Business</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Company</button>
  <div class="dropdown-content">
    <a href="#">About</a>
    <a href="#">Contacy Us</a>
    <a href="#">Press</a>
	<a href="#">Blog</a>
	<a href="#">Industry watch</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Q&A</button>
  </div>
  
  

<div class="dropdown">
<button class="dropbtn">LOGIN</button>
  <div class="dropdown-content">
    <a href="investor_login.php">INVESTOR</a>
    <a href="login.php">STARTUP</a>
    <a href="#">COMPANY</a>
  </div>

</div>
<div class="dropdown">
<button class="dropbtn">REGISTER</button>
  <div class="dropdown-content">
    <a href="investor_signup.php">INVESTOR</a>
    <a href="startup_signup.php">STARTUP</a>
    <a href="#">COMPANY</a>
  </div>

</div>
</body>