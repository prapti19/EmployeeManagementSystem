<?php
include('connsp.php');

if(isset($_REQUEST['submit']))
{
	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];
 	$email = $_REQUEST['email']; 	
 	$phone_no = $_REQUEST['phone_no'];
 	$confirm_pass = $_REQUEST['confirm_pass']; 	
 	$aadhar_no = $_REQUEST['aadhar_no'];
	$gid = $_REQUEST['gid'];
   
    if($confirm_pass==$pass)
    {
   
		$ins="insert into coord(pass,user,email,phone_no,gid,aadhar_no) values ('$pass','$user','$email','$phone_no','$gid','$aadhar_no')";

		$res=$connsp->query($ins);
		if($res)
		{
			?> 
			<script type="text/javascript">
				alert('insert success'); 
				window.location="indexsp.php";
			</script>
			<?php
		}
		else
		{
			echo "insert not success";

		}
	}
  else
	{
		?> 
		<script type="text/javascript">
			alert('Check your password and confirm password!'); 
			window.location="signup_coord.php";
		</script>
		<?php
	}
}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
	<script>
  function back(){
    window.location="choose_signup.php";
  }
  </script>
  	<title>sign up</title>
	<style>	
	.bg {
    background-image: url("m1.jpg");
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding-bottom: 100px;
        }
</style>

	<script type="text/javascript" src="backfix.min.js"></script>
	<script type="text/javascript">
	bajb_backdetect.OnBack = function()
	{
		window.location = "indexsp.php";
	}
	</script>

</head>
<body class="bg">
<br>
    <div class="second" style="float:right; padding-right: 2%;"><button class="btn btn-success" onclick="back()" type="button">Back</button></div>
<br><br><br>
<h1 style="font-family: georgia;color:white;" align="center"><b>Add your details:</b></h1>
<br><br><br>	
<form action="" method="POST">
 <table border="0" align="center" width="50%" cellpadding="90px" cellspacing="90px" >
 
	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px; color:white"><center>Username</center></td>
		<td  style="width: 25%;"><input type="text" style="width:150%; height: 30px; border-radius: 10px;" name="user"></td>
	</tr>
	
	

	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Gender</center></td>
	<td>
		<select name="gid">
		<?php
		$sq2="select * from gender";
		$res2=$connsp->query($sq2);
		while($r=$res2->fetch_object())
		{ 
		?>
		<option value="<?php echo $r->gid;?>"> <?php echo $r->gender;?> </option> 
		<?php	
		}
		?>
		</select>  	
	</td>
	</tr>

	
     <tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>E-mail</center></td>
		<td  style="width: 25%;"><input type="text" style="width:150%; height: 30px;border-radius: 10px;" name="email"></td>
	</tr>

	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Phone number</center></td>
		<td  style="width: 25%;"><input type="number" style="width:150%; height: 30px;border-radius: 10px;" name="phone_no"></td>
	</tr>

	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Aadhar number</center></td>
		<td  style="width: 25%;"><input type="number" style="width:150%; height: 30px;border-radius: 10px;" name="aadhar_no"></td>
	</tr>
	
	
	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Password</center></td>
		<td  style="width: 25%;"><input type="password" style="width:150%; height: 30px;border-radius: 10px;" name="pass"></td>
	</tr>

	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color: white;"><center>Confirm Password</center></td>
		<td  style="width: 25%;"><input type="password" style="width:150%; height: 30px;border-radius: 10px;" name="confirm_pass"></td>
	</tr>	

	
	<tr>
		<td></td>
		
		<td style="font-family: georgia;width: 25%;font-size: 20px;color: white;"><input class="btn btn-success" type="submit" name="submit" style="width:20%; height: 45%;" value="submit"></td>
	</tr>


	
 </table>
</form>
</body>
</html>