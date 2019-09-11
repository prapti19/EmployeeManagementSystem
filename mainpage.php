<?php
include('connsp.php');
session_start();
if(isset($_REQUEST['login']))  //name
{
	//echo "come by submit";
	$user=$_REQUEST['unm'];
	$pass=$_REQUEST['pass'];
	
	//echo "donnnee";
	$lgn="select * from main_p where user='$user' AND pass='$pass'  "; //agar match karegi values AND  returns 1 when both same..count kitni no. of rows affect hui lgn se...wo batata hai
	$res=$connsp->query($lgn);  //string is passed in query and executed by connection
	$chk=$res->num_rows; // mysql function.
		if($chk==1)  //IF INSERT get success then ...
	{
		$_SESSION['unm']=$user;
		?> 
		<script type="text/javascript">
			alert('login success');
			window.location="indexsp.php";

		</script>
		<?php
	}
	else
		?> 
		<script type="text/javascript">
			alert('Incorrect username or password. Please check!');
		window.location="mainpage.php";
		</script>
		<?php
}
?>
<!DOCTYPE html>
<html>
<head>

  	<title>CEE</title>
	<style>	
	.bg {
    background-image:url("collage.jpg")	;
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding-bottom: 500px;
    }
	

.btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
   
    cursor: pointer;
    
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
        
</style>
</head>
<script>
	function logout()
	{
		window.location="logout.html";
	}
</script>
<body>
<div class="bg">
<br>
    <h1 style="color: white; font-family: arial;font-size: 30px;margin-left: 57px;"align="center" ><u>WELCOME TO CEE</u></h1>
    <br> 
    <h3 style="color: white; font-family: arial;font-size: 30px;margin-left: 57px;"align="center" ><u>CENTRE FOR ENVIRONMENT EDUCATION</u></h3>   
<br><br><br>
 <div class="second" style="float:left;padding-left: 95%;"><button class="btn btn-success" onclick="logout()" type="button">Logout</button></div>
    <br><br>
<form action="" method="POST">
<table  style="background-color:white;" align="center" cellpadding=25px>
<br><br><br><br><br><br>
<div style="">

    <tr>
	<td style="color: black;" align="center"><u><h2 font-size="15px"><b>LOGIN HERE</b></h2><u></td>>
	<tr>
		<td style="color: black;"><h2 font-size="15px"><b>UserName</b></h2></td>
		<td><input type="text" name="unm" style="width:250px; height: 25px;"></td>
	</tr>
	<tr>`
		<td style="color:black;"><h2 font-size="15px"><b>Password</b></h2></td>
		<td><input type="password" name="pass" style="width:250px; height: 25px;"></td>
	</tr>
	
	<tr>
	<td></td>
		<td><input type="submit" name="login" value="Log In" style="width:90px; height:45px; font-weight:bold; border-radius: 5px; background-color: dark-green";padding-left: 30;></td>
		<td></td>
	</tr>
	</div>
 </table>
</form>
</div>
</body>
</html>