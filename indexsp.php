
<!DOCTYPE html>
<html>
<head>
	<title>CEE</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
	crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
	</script>

	<title>Employment Management System
	</title>

	<style>
	.bg {
    background-image:url("http://4.bp.blogspot.com/-kJwfu8wA_Tw/UDymfa0LBYI/AAAAAAAAAJQ/Cg1WLY_RyqU/s1600/_DSC7685.JPG");    
      background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    } 
		.head
		{
			color:#17202A;
		}
		
		.transparent_btn {
			display: inline-block;
			padding: 10px 14px;
			color: #FFF;
			border: 1px solid #FFF;
			text-decoration: none;
			font-size: 14px;
			line-height: 120%;
			background-color: rgba(255,255,255, 0);
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
			-webkit-transition: background-color 300ms ease;
			-moz-transition: background-color 300ms ease;
			transition: background-color 300ms ease;
			cursor: pointer;
		}
		.transparent_btn:hover {
			background-color: rgba(255,255,255, 0.3);
			color: #FFF;
		}

		/* Orange Button */
		.transparent_btn.orange {
			background-color: #006400;
			border-color: #ffc65d;
		}
		.transparent_btn.orange:hover {
			background-color: #32cd32;
		}

		/* Blue Button */
		.transparent_btn.blue {
			color: #aeddf5;
			border-color: #aeddf5;
		}
		.transparent_btn.blue:hover {
			background-color: rgba(174, 221, 245, 0.3);
		}

		/* Green Button */
		.transparent_btn.green {
			color: #86ec93;
			border-color: #86ec93;
		}
		.transparent_btn.green:hover {
			background-color: rgba(134, 236, 147, 0.3);
		}
		.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    padding-top: 10px
    padding-bottom:10px;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f5f5f0}

.show {display:block;}
	</style>
	<script>
		function signup(){
			window.location = "choose_signup.php";
		}
		function login(){
			window.location = "choose_login.php";
		}
		function back()
		{
			window.location = "mainpage.php";
		}
	</script>
</head>
<body class="bg">
	<div class="main"> 
	
	<br><br><br>
	<div class="dropdown" >
<button onclick="myFunction()" class="dropbtn" style="font-color:black; border-radius: 10px; padding-top: 10px;padding-left: 40px;padding-right:40px;font-size: 30px">Menu</button>
  <div id="myDropdown" class="dropdown-content">
   <a href="abtproj.php">About the website</a>
    <a href="choose_signup.php">Sign up</a>
    <a href="choose_login.php">Login</a>
    
	 <a href="mainpage.php">Back</a>
   
  </div>
</div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

	
<div>
<center>
<div style="background-color:#ADD8E6; width: 50%;align-self: center;border-radius: 15px;border: solid;">
<br>

<div class="head">
		<center><h1><b>Welcome To Employee Attendance</b></h1></center>
	</div>
	<div class="head">
<!--	<center><h3 style="font-family: Palatino;">Check your presence</h3>
	</center> -->
	</div>
</div>
</center>
</div>

<br>
<br>
<br><br><br>


<br>
</div>
</body>
</html>