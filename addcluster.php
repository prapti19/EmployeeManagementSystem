<?php
//session_start();

include('connsp.php');
if(isset($_REQUEST['submit']))
{
	
	
	$cluster_name=$_REQUEST['cluster_name'];
 	
 	$ins="insert into cluster(cluster_name) values ('$cluster_name')";

	$res=$connsp->query($ins);
	
if($res)
{
	//alert("insert success");
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
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>Add Cluster</title>
	<style>
		body{
			background-color: lightgray;
		}
		.bg {

    background-image: url("m1.jpg");
 background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
		
	</style>
</head>
<body >
<div class="bg">
<br><br><br>
<h1 style="font-family: georgia; color:white;" align="center"><b>Add your details:</b></h1>
<br><br><br>	
<form action="" method="POST">
 <table border="0" align="center" width="50%" cellpadding="90px" cellspacing="90px" >
 
	<tr>
		<td style="font-family: georgia;width: 25%;font-size: 25px; color:white"><center>CLUSTER_NAME</center></td>
		<td  style="width: 25%;"><input type="text" style="width:150%; height: 30px; border-radius: 10px;" name="cluster_name"></td>
	</tr>
	
	<br>
	<br>
	
	
	<tr>
		<td></td>
		<td style="font-family: georgia;width: 25%;font-size: 20px;color: white;"><input class="btn btn-success" type="submit" name="submit" style="width:20%; height: 45%;" value="Add"></td>
	</tr>
 </table>
</form>
</div>
</body>
</html>
