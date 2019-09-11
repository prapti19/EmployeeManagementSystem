<?php
include('connsp.php');
//session_start();

if(isset($_REQUEST['submit']))
{
  
  $person=$_REQUEST['person'];
  $emlid=$_REQUEST['emlid'];
  $dor=$_REQUEST['dor'];
  $dateTime = new DateTime($dor);
    $dor = date_format($dateTime,'Y-m-d');
  $ins="insert into resign(person,emlid,dor) values ('$person','$emlid','$dor')";


  $res=$connsp->query($ins);
  
if($res)
{
  ?> 
    <script type="text/javascript">
      alert('insert success');
      exit(); 
      window.location="t_prof.php";
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
  <title>Resign Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
}
</script>
<script>
  function back(){
    window.location="t_prof.php";
  }
</script>
  <style>
    .bg {
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-image:url("m1.jpg");
    padding-bottom: 20%;
  }
  </style>
  </head>
  <body>
<div class="bg">
<br>
 <div class="second" style="float:right; "><button class="btn btn-primary" onclick="back()" type="button">Back</button></div>
<br><br><br>
<h1 style="font-family: georgia; color: white;" align="center"><b>Resignation details</b></h1>
<br><br><br>  
<form action="" method="POST">
 <table border="0" align="center" width="50%" cellpadding="90px" cellspacing="90px" >
 
  <tr>
    <td style="font-family: georgia;width: 25%;font-size: 25px; color: white"><center>Username</center></td>
    <td  style="width: 25%;"><input type="text" style="width:150%; height: 30px; border-radius: 10px;" name="person"></td>
  </tr>
  <br>
  <br>
  <tr>
    <td style="font-family: georgia;width: 25%;font-size: 25px;color: white;"><center>Empid</center></td>
    <td  style="width: 25%;"><input type="text" style="width:150%; height: 30px;border-radius: 10px;" name="emlid"></td>
  </tr>
  <br>
  <br>
  <tr>
    <td style="font-family: georgia;width: 25%;font-size: 25px;color: white;"><center>Date Of Resignation</center></td>
    <td  style="width: 25%;"><input type="Date" style="width:150%; height:30px;border-radius: 10px;" name="dor"></td>
  </tr>
  <tr>
   <center><td style="font-family: georgia;width: 25%;font-size: 20px;color: white;"><input class="btn btn-success" type="submit" name="submit" style="width:20%; height: 45%;" value="submit"></td></center> 
  </tr>
 </table>
</form>
</div>
</body>
</html> 
