<?php 
//session_start();
error_reporting(0);                        //if any error is there the check query in mysql
include('connsp.php');                                       //whether it is perfectly working
if (isset($_REQUEST['submit']))                                     //exit(); breaks the code
{
	//for information
	$name = $_REQUEST['name'];
	$empid = $_REQUEST['empid'];
	$tmid = $_REQUEST['tmid'];

	$sq1 = "SELECT permission FROM leave_app WHERE empid='$empid'";
	$res1 = $connsp->query($sq1);
	$fe1 = $res1->fetch_object();

	if($fe1->permission == '0')
	{
		$sq2 = "UPDATE leave_app SET permission='4' WHERE empid='$empid'";
		$res2 = $connsp->query($sq2);
		if($res2)
		{
			?>
			<script type="text/javascript">
				alert('Cancellation Done!')
				window.location = "t_prof.php"
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert('Cancellation Not Done!')
				window.location = "t_prof.php"
			</script>
			<?php	
		}
	}
	else if($fe1->permission == '1')
	{
		$sq3 = "UPDATE leave_app SET permission='3' WHERE empid='$empid'";
		$res3 = $connsp->query($sq3);
		?>
		<script type="text/javascript">
			alert('Message of Cancellation is sent to your respective Teacher Mentor.')
			window.location = "t_prof.php"
		</script>
		<?php
	}
	else if($fe1->permission == '2')
	{
		?>
		<script type="text/javascript">
			alert('Your leave request is rejected, so no need of Cancellation!')
			window.location = "t_prof.php"
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert('You have spent all those leave which you have requested for, so your request for Cancellation of leave is Rejected.')
			window.location = "t_prof.php"
		</script>
		<?php
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Leave Cancellation Form</title>
	<style>
    .bg {
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-image:url("m1.jpg");
    padding-bottom: 300px;
  }
  </style>
</head>
<body>
	<div class="bg">
		<br>
	<form action="" method="POST" enctype="multipart/form-data">
<center><caption ><h1 style="color: white;"> LEAVE CANCELLATION FORM </h1></caption></center>
<table border="1" align="center" cellpadding=0px cellspacing=40px style="background-color: white;">
	<tr>
		<td style="font-family: georgia;font-size: 25px;">Name</td>
		<td style="width: 50%;"><input type="text" name="name" style="height: 30px; width: 100%;"></td>
	</tr>
	<tr>
		<td style="font-family: georgia;font-size: 25px;" >Employee ID</td>
		<td style="width: 50%;"><input type="number" name="empid" style=" height: 30px; width: 100%;"></td>
	</tr>
	<tr>
		<td style="font-family: georgia;font-size: 25px;">Select your Teacher Mentor</td>
		<td style=" height: 30px; ">
		<select name="tmid" style="height: 30px;">
		<?php
		$sq="select * from cluster";
		$res=$connsp->query($sq);
		while($r=$res->fetch_object())
		{
			?>
			<option value="<?php echo $r->tmid;?>"> <?php echo $r->cluster_name;?> </option> 
			<?php	
		}
		?>
		</select>  
		</td>
	</tr>
	<tr>
		<td style=" height: 30px;"><input type="submit" name="submit" value="submit" style="width:90px; height:30px; border-radius: 5px;  font-family: georgia;font-size: 15px;"></td>
	</tr>	
</table>
</form>
</body>
</html>
