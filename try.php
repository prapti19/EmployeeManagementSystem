<?php
include ('tm_prof.php');
//session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title>Teacher Details</title>
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
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<br><br>
<body style="background-color: #7a5230">
  
<div class="first" style="background-color: #F2F4F4; background-size: '20%';">
    
    <br>
    
    <br>
    <br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: black; font-family: arial;font-size: 30px">Teachers</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
  <table align="center" cellpadding=20px style="background-color: #e5e5f2;" border="0" width="90%">
    <tr style="background-color: #4c4c4c;" height="50px">
    <td width="5%" style="color: white;"><b>#</b></td>
      <td width="20%" style="color: white;"><b>Employee Name</b></td>
      <td width="20%" style="color: white;"><b>E-mail</b></td>
      <td width="15%" style="color: white;"><b>Phone Number</b></td>
    </tr>  
    <?php
  include('connsp.php');
  $sq1="select * from teacher";
  $res1 = $connsp->query($sq1);

  while($fe1=$res1->fetch_object())
  {
  if($fe1->tmid==$var){
    ?>
    
    <tr  height="50px">
      <td><?php echo $fe1->tmid;?></td>
      <td><?php echo $fe1->user;?></td>
      <td><?php echo $fe1->email;?></td>
      <td><?php echo $fe1->phone_no;?></td>
    </tr>

    <?php
  }
}
?>
</table>


  <br><br>
  </body>


</html>
