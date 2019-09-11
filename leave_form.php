<?php                                                               //NOTE
error_reporting(0);
                        //if any error is there the check query in mysql
include('connsp.php');                                       //whether it is perfectly working
if (isset($_REQUEST['submit']))                                     //exit(); breaks the code
{

	//for information
	$name = $_REQUEST['name'];
	$empid = $_REQUEST['empid'];
	$stdate = $_REQUEST['stdate'];
	$endate = $_REQUEST['endate'];
	$nol = $_REQUEST['nol'];
	$idcol = $_REQUEST['idcol'];
	$tmid = $_REQUEST['tmid'];
	
	
	//for image
	$img_name = $_FILES["image"]["name"];
	$type = $_FILES["image"]["type"];
	$get_content = file_get_contents($_FILES["image"]["tmp_name"]);
	$escape = mysql_real_escape_string($get_content);

	
	$sql = "SELECT leave_remain FROM teacher WHERE empid=$empid";
	
	$result = $connsp->query($sql);
	$row = $result->fetch_object();
//	if($idcol == 1)
//	{
//		$row->leave_remain = $row->leave_remain - $nol;
//	}
	
	$leave_left = $row->leave_remain;

/*	$upd = "UPDATE teacher SET leave_remain=$leave_left WHERE empid=$empid";
	$ress = $connsp->query($upd);*/

	$dateTime = new DateTime($stdate);
    $stdate = date_format($dateTime,'Y-m-d');

    $date = new DateTime($stdate);
    $date->modify('+'.$nol.'day');
    $endate = $date->format('Y-m-d');

	$sq = "insert into leave_app(empid,name,stdate,nol,idcol,leave_left,tmid,img_name,src,type,endate) values ('$empid','$name','$stdate','$nol','$idcol','$leave_left','$tmid','$img_name','$escape','$type','$endate')";
	$res = $connsp->query($sq);
	if ($res)
    {
		?>
		<script type="text/javascript">
			alert('Request is sent to your respective mentor.');
			window.location="t_prof.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert('Request not success. Please try again!');
		</script>
		<?php	
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Leave Form</title>
	<script>
		function back(){
			window.location="t_prof.php";
		}
	</script>
<style>
    .bg {
     background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-image:url("m1.jpg");
    
  }
  </style>
  </head>
  <body class="bg">
<div class="second" style="float:right; "><button class="btn btn-primary" onclick="back()" type="button" style="padding: 10px;">Back</button></div>
<br><br>
<form action="" method="POST" enctype="multipart/form-data">
<center><caption ><h1 style="color: white;"> LEAVE FORM </h1></caption></center>
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
		<td style="font-family: georgia;font-size: 25px;">Select your Cluster Name</td>
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
		<td style="font-family: georgia;font-size: 25px;">Starting date of leave</td>
		<td style=" height: 30px;"><input type="date" name="stdate" style="width: 100%; height: 30px;" ></td>
	</tr>
	<tr>
		<td style="font-family: georgia;font-size: 25px;">Type of Leave</td>
		<td style="height: 30px;">
		<select name="idcol" style="height: 30px;">
		<?php
		$sq="select * from tol";
		$res=$connsp->query($sq);
		while($r=$res->fetch_object())
		{
			?>
			<option value="<?php echo $r->idcol;?>"> <?php echo $r->type;?> </option> 
			<?php	
		}
		?>
		</select>  
		</td>
	</tr>
	<tr>
		<td style="font-family: georgia;font-size: 25px;">Number of days of leave</td>
		<td style=" height: 30px;"><input type="Number" min="1" name="nol" value="1" style="height: 30px; width: 100%;"></td>
	</tr>
	<tr>
		<td><input type="file" name="image" style="font-family: georgia; font-size: 15px;"></td>
<!--		<td><input type="submit" name="Upload Now" value="Upload Image" style=" height: 30px;"></td>
	</tr>
	<tr> -->
		<td style=" height: 30px;"><input type="submit" name="submit" value="submit" style="width:90px; height:30px; border-radius: 5px;  font-family: georgia;font-size: 15px;"></td>
	</tr>	
</table>
</form>
</body>
</html>
