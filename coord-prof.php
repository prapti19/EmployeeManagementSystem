<?php
session_start();
if(!$_SESSION['user'])
{
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>My Profile</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  

</script>

<script>
  function back(){
    window.location="indexsp.php";
  }
  //function myFunction()
  //{
    //window.location="try.php";
  //}
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>



<body style="background-color: lightgray">
 
<div class="first" style="background-color: #F2F4F4; background-size: '20%';">
    
    <br>
    <div class="second" style="float:right"><button class="btn btn-primary" onclick="back()" type="button">Logout</button></div>
    <br>
    <br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: black; font-family: arial;font-size: 30px">Teacher mentors under me</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
  <table align="center" cellpadding=20px style="background-color: white;" border="0" width="90%">
    <tr style="background-color: lightblue;" height="50px">
    <td width="5%"><b>#</b></td>
      <td width="20%"><b>Employee Name</b></td>
      <td width="20%"><b>E-mail</b></td>
      <td width="15%"><b>Phone Number</b></td>
    </tr>  
    <?php
  include('connsp.php');
  $sq="select * from teacher_mentor";
  $res = $connsp->query($sq);
  while($fe=$res->fetch_object())
  {
  //if($fe->user== $_SESSION['unm']){$var=$fe->tmid;    
    ?>
    
    <tr  height="50px">
      <td><?php echo $fe->tmid;?></td>
      <td><?php echo $fe->user;?></td>
      <td><?php echo $fe->email;?></td>
      <td><?php echo $fe->phone_no;?></td>
    </tr>

    <?php
  
}
?>
</table>
<br><br>
</body>
</html>
