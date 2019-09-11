<?php
include('connsp.php');
session_start();

if(isset($_REQUEST['login']))  //name
{
	
	$id=$_REQUEST['id'];
	
	$lgn1="select * from teacher_mentor where empid='$id'";
  $lgn2="select * from teacher where empid='$id'"; 
  $lgn3="select * from locam where empid='$id'";
	$res1=$connsp->query($lgn1);  //string is passed in query and executed by connection
	$chk1=$res1->num_rows; 
  $res2=$connsp->query($lgn2);  //string is passed in query and executed by connection
  $chk2=$res2->num_rows;
  $res3=$connsp->query($lgn3);
  $chk3=$res3->num_rows;
	if($chk1==1)  //IF INSERT get success then ...
	{
		$_SESSION['id']=$id;
		?> 
		<script type="text/javascript">
			alert('teacher mentor exists');
			window.location="search_tm.php";
		</script>	
		<?php
		
	}
  else if($chk2==1)
  {
         
    $_SESSION['id']=$id;
    ?> 
    <script type="text/javascript">
      alert('teacher  exists');
      window.location="search_tt.php";
    </script> 

  <?php
    }
    else if($chk3==1)
  {
         
    $_SESSION['id']=$id;
    ?> 
    <script type="text/javascript">
      alert('locam teacher exists');
      window.location="search_locam.php";
    </script> 

  <?php
    }
	else
  {
		?> 
		<script type="text/javascript">
			alert('Incorrect correct employee name');
		</script>
		<?php
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Teacher Mentor</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>

<script>
  function back(){
    window.location="coordinator_profile1.php";
  }
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
    <body style="background-color:#7a5230">
   <div class="first" style="background-image:url('subback.jpg'); background-repeat: no-repeat; background-position: center;  background-size: '20%';  padding-bottom: 50px;">
    <br>
    <div class="second" style="float:right; "><button class="btn btn-primary" onclick="back()" type="button">Back</button></div>
    
   
    <br><br>
    <span class="firstsub_a" style="float:center;" align="center">
      <h1 style="color: white; font-family: arial;font-size: 30px">Search Here</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>

<form action="" method="POST">
<table  align="center" cellpadding=25px>
<caption><h4 font-size="10px" style="color: white;" ><u><b>ENTER THE ID OF EMPLOYEE HERE</b></u></h4></caption>
 <br>
 <br>
  <tr>
    <td style="color: white;"><h4 font-size="15px"><b>ID</b></h4></td>
    <td><input type="text" name="id" style="width:250px; height: 25px;"></td>
  </tr>
  <tr>`
  <tr>
  <td></td>
    <td style="padding: 10px;padding-left:20%;"><input type="submit" name="login" value="ENTER" style="width:90px; height:45px; font-weight:bold; border-radius: 5px;color: white; background-color: orange;" class="btn btn-primary"></td>
    <td></td>
  </tr>
 </table>
</form>
  <br><br>
  </body>
</html>
