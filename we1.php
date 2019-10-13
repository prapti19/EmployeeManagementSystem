
<!-- <td><button onclick="fun3()">click</button></td> -->
<?php
include('connsp.php');
//session_start();

?>
<head>
  <title>Resign Applicants</title>
  <title>Resign applications will be visible to the manager</title>
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
      <h1 style="color: white; font-family: arial;font-size: 30px;margin-left: 57px;">Applicants for resignation</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
  <form method="POST" action="/locam/we2.php">
  <table align="center" cellpadding=20px style="background-color: white;" border="2" width="90%">
    <tr style="background-color: #4c4c4c;" height="50px">
 
  
      <td align="center" width="20%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Employee ID</b></td>
      <td align="center" width="20%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Employee Name</b></td>
      <td align="center" width="20%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><center><b>Date of leaving</b></center></td>
      <td align="center" width="10%" style="color: white; background-color:#4c4c4c; font-size: 20px;"></td>
    </tr>  
    <?php
  

  $sq="SELECT * FROM resign";
  $res=$connsp->query($sq);
  
  while($fe=$res->fetch_object())
    { $date1 = "0000-00-00";
    if($fe->dol==$date1)
    { 
       $v1=$fe->emlid;
    ?>
    <tr  height="50px">
      <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->emlid;?></td>
      <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->person;?></td>   
      <!-- <td><button class="btn btn-primary" onclick="fun()" type="button">Fire</button> -->
       
    <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><input type="date" style="width:55%; height: 30px;border-radius: 5px;" name="dol"></td>
   <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><input  type="submit" name="submit" value="submit" ></td>
   
    </tr>
<?php  
}
}
?>
    
  </table>
  <br><br>
  </form>
  </body>
