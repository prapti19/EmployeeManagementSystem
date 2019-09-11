<?php
session_start();


?>
<head>
<title>Coordinator Profile</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  

</script>

<script>
  function back(){
    window.location="coordinator_profile1.php";
  
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color:#7a5230">
   <div class="first" style="background-image:url('subback.jpg'); background-repeat: no-repeat; background-position: center;  background-size: '20%';  padding-bottom: 50px;">
    <br>
    <div class="second" style="float:right"><button class="btn btn-primary" onclick="back()" type="button">Back</button></div>
    <br>
    <br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: white; font-family: arial;font-size: 30px;margin-left: 57px;">Teacher Mentor Details</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
  <table align="center">
  <tr><td ><h1 style="color: white;">Click on teacher mentor's name to view details of teachers under him/her</h1></td></tr> 
  </table>
  <br><br>
  <table align="center" cellpadding=20px style="background-color: white;" border="1" width="90%">
    
  <?php
  include('connsp.php');
  //include('tm_new.php');
    $sq="select * from teacher_mentor ";
  $res = $connsp->query($sq);
  while($fe=$res->fetch_object())
  {
  if($fe->user== $_SESSION['unm']){$var=$fe->tmid;    
    ?>
 <tr  height="30px"><td width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Teacher ID</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->tmid;?></td></tr>
 <tr  height="30px"><td width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Employee Name</b></td><td  style="font-size: 20px; text-align: center;background-color:#e5e5f2;"><a href="coordinator_profile3.php"><?php echo $fe->user;?></a></td></tr>
 <tr  height="30px"><td width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Employee ID</b></td><td style="font-size: 20px; text-align: center;background-color:#e5e5f2;"><?php echo $fe->empid;?></td></tr>
 <tr  height="30px"><td width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Email Id</b></td><td style="font-size: 20px; text-align: center;background-color:#e5e5f2;"><?php echo $fe->email;?></td></tr>
 <tr  height="30px"><td width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Phone Number</b></td><td  style="font-size: 20px; text-align: center;background-color:#e5e5f2;"><?php echo $fe->phone_no;?></td></tr>
 <tr  height="30px"><td width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Address</b></td><td style="font-size: 20px; text-align: center;background-color:#e5e5f2;"><?php echo $fe->address;?></td></tr>      
      
    </tr>

    <?php
  }
  }
  ?>
  </table>
  </body>
</html>
