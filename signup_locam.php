<?php
include('connsp.php');

if(isset($_REQUEST['submit']))
{
	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];
	$empid=$_REQUEST['empid'];
 	$email = $_REQUEST['email']; 	
 	$phone_no = $_REQUEST['phone_no'];
 	$confirm_pass = $_REQUEST['confirm_pass']; 	
 	$aadhar_no = $_REQUEST['aadhar_no'];
    $pan_no = $_REQUEST['pan_no'];
    $probation = $_REQUEST['probation'];
    $school = $_REQUEST['school'];
    $bloodg=$_REQUEST['bloodg'];
    $address = $_REQUEST['address'];
    $gid = $_REQUEST['gid'];
    $doj = $_REQUEST['doj']; 
    $tmid=$_REQUEST['tmid'];
    $dateTime = new DateTime($doj);
    $doj = date_format($dateTime,'Y-m-d');
    if($confirm_pass==$pass)
    {
    if($probation==1)
	{       //$dol = $_REQUEST['dol'];
		    $date = new DateTime($doj);
		    $date->modify('+90 day');
		    $dol = $date->format('Y-m-d');
		   
	
		$ins="insert into locam(probation,empid,pass,user,email,phone_no,pan_no,gid,bloodg,aadhar_no,address,doj,dol,school,tmid) values ('$probation','$empid','$pass','$user','$email','$phone_no','$pan_no','$gid','$bloodg','$aadhar_no','$address','$doj','$dol','$school','$tmid')";

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
		
	else{
			$ins="insert into locam(probation,empid,pass,user,email,phone_no,pan_no,gid,bloodg,aadhar_no,address,doj,school,tmid) values ('$probation','$empid','$pass','$user','$email','$phone_no','$pan_no','$gid','$bloodg','$aadhar_no','$address','$doj','$school','$tmid')";

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
  }

  else
	{
		?> 
		<script type="text/javascript">
			alert('Check your password and confirm password!'); 
			window.location="signup_locam.php";
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
            background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
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
		<td style="font-family: georgia;width: 25%;font-size: 25px; color:white"><center>Employee ID</center></td>
		<td  style="width: 25%;"><input type="text" style="width:150%; height: 30px; border-radius: 10px;" name="empid"></td>
	</tr>

	
	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Address</center></td>
		<td  style="width: 25%;"><input type="text" style="width:150%; height: 50px;border-radius: 10px;" name="address"></td>
	</tr>

	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Pan number</center></td>
		<td  style="width: 25%;"><input type="number" style="width:150%; height: 30px;border-radius: 10px;" name="pan_no"></td>
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
		<td  style="width: 25%;"><input type="text" style="width:150%; height: 30px;border-radius: 10px;" name="aadhar_no"></td>
	</tr>
	

	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Date of joining</center></td>
		<td  style="width: 25%;"><input type="Date" style="width:150%; height: 30px;border-radius: 10px;" name="doj"></td>
	</tr>

	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px; color:white"><center>School</center></td>
		<td  style="width: 25%;"><input type="text" style="width:150%; height: 30px; border-radius: 10px;" name="school"></td>
	</tr>

	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Blood group</center></td>
		<td  style="width: 25%;"><input type="text" style="width:150%; height: 30px;border-radius: 10px;" name="bloodg"></td>
	</tr>


	<tr>
	<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Probation Criteria</center></td>
	<td>
		<select name="probation">
		<?php
		$sq1="select * from probation";
		$res1=$connsp->query($sq1);
		while($r=$res1->fetch_object())
		{ 
		?>
		<option value="<?php echo $r->cid;?>"> <?php echo $r->name;?> </option> 
		<?php	
		}
		?>
		</select>  	
	</td>
	</tr>
	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Tmid</center></td>
		<td  style="width: 25%;"><input type="text" style="width:150%; height: 30px;border-radius: 10px;" name="tmid"></td>
	</tr>
	<tr>
		
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Cluster_name</center></td>
		<td>
		<select name="cluster_name">
		<?php
		$sq="select * from cluster";
		$res=$connsp->query($sq);
		while($r=$res->fetch_object())
		{ ?>
	<option value="<?php echo $r->tmid;?>"> <?php echo $r->cluster_name;?> </option> 
	<?php	
		}
			?>
		</select>  
		</td>
	</tr>
	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color:white;"><center>Password</center></td>
		<td  style="width: 25%;"><input type="password" style="width:150%; height: 30px;border-radius: 10px;" name="pass"></td>
	</tr>

<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px;color: white;"><center>Confirm Password</center></td>
		<td  style="width: 25%;"><input type="password" style="width:150%; height: 30px;border-radius: 10px;" name="confirm_pass"></td>
	</tr>	

	<tr></tr>
	<tr>
		<td></td>
		
		<td style="font-family: georgia;width: 25%;font-size: 20px;color: white;"><input class="btn btn-success" type="submit" name="submit" style="width:20%; height: 45%;" value="submit"></td>
	</tr>


	
 </table>
</form>

</body>
</html>