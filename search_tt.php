<?php
session_start();
//session_start();

?>
<head>
<title>Search Specialist Teacher</title>
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
    <div class="second" style="float:right"><button class="btn btn-primary" onclick="back()" type="button">Back</button></div>
    <br>
    <br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color:white; font-family: arial;font-size: 30px">Teacher Mentors Details</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
  <table align="center" cellpadding=20px style="background-color: white;" border="0" width="90%">
    
  <?php
  include('connsp.php');
  //include('tm_new.php');
    $sq="select * from teacher";
  $res = $connsp->query($sq);
  while($fe=$res->fetch_object())
  {
  if($fe->empid== $_SESSION['id']){   
    ?>
      <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Teacher ID</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->tmid;?></td></tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Employee Name</b></td><td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->user;?></td></tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Employee ID</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->empid;?></td></tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Email Id</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->email;?></td></tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Phone Number</b></td><td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->phone_no;?></td></tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Address</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->address;?></td></tr>
  <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Aadhar no</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->aadhar_no;?></td></tr>
   <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Pan no</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->pan_no;?></td></tr>
    <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Date of Joining</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->doj;?></td></tr>
     <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>School</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->school;?></td></tr>
      <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Blood Group</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->bloodg;?></td></tr>
       <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Probation status</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;">
       <?php
        $sq1 = "SELECT probation FROM teacher WHERE empid='$fe->empid'";
        $r2 = $connsp->query($sq1);
    
        $r1 = $r2->fetch_object();
        if($r1->probation == '1')
        {
          echo "On Probation";
        }
        else if($r1->probation=="2")
          {echo "Permanent";}
        ?>
        </tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Leave Status(if applied)</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;">
 
        <?php
        $sq1 = "SELECT permission FROM leave_app WHERE empid='$fe->empid'";
        $r2 = $connsp->query($sq1);
    
        $r1 = $r2->fetch_object();
        if($r1->permission == '2')
        {
          echo "Rejected";
          $sq2 = "DELETE FROM leave_app WHERE empid='$fe->empid'";
          $r3 = $connsp->query($sq2);
        }
        else if($r1->permission == '1')
        {
          echo "Accepted";
        }
        else if($r1->permission == '0')
        {
          echo "Pending";
        }
        else
        {
          echo "Not Applied";
        }

        ?>      
      
 
 </tr>

    <?php
  }
  }
  ?>
  </table>
  </body>
</html>
