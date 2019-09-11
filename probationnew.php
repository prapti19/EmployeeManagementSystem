<?php
//session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Probation Details</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<script>
 function back(){
    window.location="coordinator_profile1.php";
  }
  function myFunction()
  {
    window.location="try.php"; 
  }
  function logout()
  {
    window.location="logout.html";
  }
</script>  

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<body style="background-color:#7a5230">
   <div class="first" style="background-image:url('subback.jpg'); background-repeat: no-repeat; background-position: center;  background-size: '20%';  padding-bottom: 50px;">
   
     
    <br>
    <div class="second" style="float:right"><button class="btn btn-primary" onclick="back()" type="button">Back</button></div>
    
    <div class="second" style="float:left; padding-left: 90%;"><button class="btn btn-primary" onclick="logout()" type="button">Logout</button></div>
    <br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: white; font-family: arial;font-size:30px;margin-left: 57px;">Probation Details</h1>
    </span>
	</div>
    <br><br><br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: white; font-family: arial;font-size:20px;margin-left: 57px;">Probation Details of Teacher Mentor</h1>
    </span>   
  
  <form method="POST">
  <table align="center" cellpadding=20px style="background-color: #7a5230;" border="2" width="90%">
  
     <tr>
	 <td align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Employee Name</b></td>
	 <td align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Employee Id</b></td>
	 <td  align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Date of Joining</b></td>
	 <td  align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Date of Leaving</b></td>
	 <td  align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Choose_service</b></td> 
	 
	 </tr>
     
    <?php
  include('connsp.php');
  $sq="select * from teacher_mentor where probation='1'";
  $res = $connsp->query($sq);
  while($fe=$res->fetch_object())
  {
   
    ?>
     <tr  height="50px">
	 <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->user;?></td>
	 <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->empid;?></td>
	 <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->doj;?></td>
	 <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->dol;?></td>
	 <td  style="text-align: center; background-color:#e5e5f2;"><input type="checkbox" name="checkbox[]" value="<?php echo $fe->empid; ?>"></td>
	  
	 </tr>
 
    <?php
  }
?>

</table>
  <table>
  <tr><td width="40%"></td>
  <td width="10%">
  <input type="submit" name="continue_service" value="Continue" class="btn btn-primary" style="padding: 5px 15px;margin-left:10%;font-size: 15px;margin-right:auto;display:block;margin-top:10%;margin-bottom:5%; border-radius: 10px;">
  </td><td width="10%"></td>
  <td>
  <input type="submit" name="discontinue_service" value="Discontinue" class="btn btn-primary" style="padding: 5px 15px;margin-left:10%;font-size: 15px;margin-right:auto;display:block;margin-top:10%;margin-bottom:5%; border-radius: 10px;">
   </td><td width="10%"></td>
  <td>
  <input type="submit" name="permanent_service" value="Permanent" class="btn btn-primary" style="padding: 5px 15px;margin-left:10%;font-size: 15px;margin-right:auto;display:block;margin-top:10%;margin-bottom:5%; border-radius: 10px;">
  </td><td width="10%"></td>
  <td>
  </table>

</form> 
<?php
include('connsp.php');
if(isset($_REQUEST['continue_service']))
{
  //echo "hi11";
  $checkbox = $_REQUEST['checkbox'];
for($i=0;$i<count($checkbox);$i++)
{
  $del_id = $checkbox[$i];
  $sq1 = "SELECT * FROM teacher_mentor WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $re1 =$connsp->query($sq1);
  $res1 = $re1->fetch_object();

  $f = date_create($res1->dol);
  $f->modify('+90 day');
  $f1 = $f->format('Y-m-d');

  $sql = "UPDATE teacher_mentor SET dol='$f1' WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $result = $connsp->query($sql);
}
if($result){
  ?>
  <script type="text/javascript">
    
    window.location = "probationnew.php";
  </script>
  <?php
}
}
?>

<?php
include('connsp.php');
if(isset($_REQUEST['discontinue_service']))
{
  //echo "hi11";
  $checkbox = $_REQUEST['checkbox'];
for($i=0;$i<count($checkbox);$i++)
{
  $del_id = $checkbox[$i];
  $sql = "DELETE FROM teacher_mentor WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $result = $connsp->query($sql);
}
if($result)
{
  ?>
  <script type="text/javascript">
   
    window.location = "probationnew.php";
  </script>
  <?php
}
}
?>

<?php
include('connsp.php');
if(isset($_REQUEST['permanent_service']))
{
  //echo "hi11";
  $checkbox = $_REQUEST['checkbox'];
for($i=0;$i<count($checkbox);$i++)
{
  $del_id = $checkbox[$i];
  $sql = "UPDATE teacher_mentor SET probation='2',dol='0000-00-00' WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $result = $connsp->query($sql);
}
if($result)
{
  ?>
  <script type="text/javascript">
        window.location = "probationnew.php";
  </script>
  <?php
}
}


?>



<br><br><br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: white; font-family: arial;font-size:20px;margin-left: 57px;">Probation Details of Teacher</h1>
    </span>   
  
  <form method="POST">
  <table align="center" cellpadding=20px style="background-color: #7a5230;" border="2" width="90%">
  
     <tr>
	 <td align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Employee Name</b></td>
	 <td align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Employee Id</b></td>
	 <td  align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Date of Joining</b></td>
	 <td  align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Date of Leaving</b></td>
	 <td  align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Choose_service</b></td> 
	 
	 </tr>
     
    <?php
  include('connsp.php');
  $sq="select * from teacher where probation='1'";
  $res = $connsp->query($sq);
  while($fe=$res->fetch_object())
  {
   
    ?>
     <tr  height="50px">
	 <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->user;?></td>
	 <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->empid;?></td>
	 <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->doj;?></td>
	 <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->dol;?></td>
	 <td  style="text-align: center; background-color:#e5e5f2;"><input type="checkbox" name="checkbox[]" value="<?php echo $fe->empid; ?>"></td>
	  
	 </tr>
 
    <?php
  }
?>

</table>
  <table>
  <tr><td width="40%"></td>
  <td width="10%">
  <input type="submit" name="continue_service" value="Continue" class="btn btn-primary" style="padding: 5px 15px;margin-left:10%;font-size: 15px;margin-right:auto;display:block;margin-top:10%;margin-bottom:5%; border-radius: 10px;">
  </td><td width="10%"></td>
  <td>
  <input type="submit" name="discontinue_service" value="Discontinue" class="btn btn-primary" style="padding: 5px 15px;margin-left:10%;font-size: 15px;margin-right:auto;display:block;margin-top:10%;margin-bottom:5%; border-radius: 10px;">
   </td><td width="10%"></td>
  <td>
  <input type="submit" name="permanent_service" value="Permanent" class="btn btn-primary" style="padding: 5px 15px;margin-left:10%;font-size: 15px;margin-right:auto;display:block;margin-top:10%;margin-bottom:5%; border-radius: 10px;">
  </td><td width="10%"></td>
  <td>
  </table>

</form> 
<?php
include('connsp.php');
if(isset($_REQUEST['continue_service']))
{
  //echo "hi11";
  $checkbox = $_REQUEST['checkbox'];
for($i=0;$i<count($checkbox);$i++)
{
  $del_id = $checkbox[$i];
  $sq1 = "SELECT * FROM teacher WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $re1 =$connsp->query($sq1);
  $res1 = $re1->fetch_object();

  $f = date_create($res1->dol);
  $f->modify('+90 day');
  $f1 = $f->format('Y-m-d');

  $sql = "UPDATE teacher SET dol='$f1' WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $result = $connsp->query($sql);
}
if($result){
  ?>
  <script type="text/javascript">
   
    window.location = "probationnew.php";
  </script>
  <?php
}
}
?>

<?php
include('connsp.php');
if(isset($_REQUEST['discontinue_service']))
{
  //echo "hi11";
  $checkbox = $_REQUEST['checkbox'];
for($i=0;$i<count($checkbox);$i++)
{
  $del_id = $checkbox[$i];
  $sql = "DELETE FROM teacher WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $result = $connsp->query($sql);
}
if($result)
{
  ?>
  <script type="text/javascript">
    //alert('Your change performed successfully')
    window.location = "probationnew.php";
  </script>
  <?php
}
}
?>

<?php
include('connsp.php');
if(isset($_REQUEST['permanent_service']))
{
  //echo "hi11";
  $checkbox = $_REQUEST['checkbox'];
for($i=0;$i<count($checkbox);$i++)
{
  $del_id = $checkbox[$i];
  $sql = "UPDATE teacher SET probation='2',dol='0000-00-00' WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $result = $connsp->query($sql);
}
if($result)
{
  ?>
  <script type="text/javascript">
    
    window.location = "probationnew.php";
  </script>
  <?php
}
}


?>



<br><br><br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: white; font-family: arial;font-size:20px;margin-left: 57px;">Probation Details of Locam</h1>
    </span>   
  
  <form method="POST">
  <table align="center" cellpadding=20px style="background-color: #7a5230;" border="2" width="90%">
  
     <tr>
   <td align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Employee Name</b></td>
   <td align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Employee Id</b></td>
   <td  align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Date of Joining</b></td>
   <td  align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Date of Leaving</b></td>
   <td  align="center" width="20%" style="background-color:#4c4c4c; font-size: 20px;color: white;"><b>Choose_service</b></td> 
   
   </tr>
     
    <?php
  include('connsp.php');
  $sq="select * from locam where probation='1'";
  $res = $connsp->query($sq);
  while($fe=$res->fetch_object())
  {
   
    ?>
     <tr  height="50px">
   <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->user;?></td>
   <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->empid;?></td>
   <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->doj;?></td>
   <td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->dol;?></td>
   <td  style="text-align: center; background-color:#e5e5f2;"><input type="checkbox" name="checkbox[]" value="<?php echo $fe->empid; ?>"></td>
    
   </tr>
 
    <?php
  }
?>

</table>
  <table>
  <tr><td width="40%"></td>
  <td width="10%">
  <input type="submit" name="continue_service" value="Continue" class="btn btn-primary" style="padding: 5px 15px;margin-left:10%;font-size: 15px;margin-right:auto;display:block;margin-top:10%;margin-bottom:5%; border-radius: 10px;">
  </td><td width="10%"></td>
  <td>
  <input type="submit" name="discontinue_service" value="Discontinue" class="btn btn-primary" style="padding: 5px 15px;margin-left:10%;font-size: 15px;margin-right:auto;display:block;margin-top:10%;margin-bottom:5%; border-radius: 10px;">
   </td><td width="10%"></td>
  <td>
  <input type="submit" name="permanent_service" value="Permanent" class="btn btn-primary" style="padding: 5px 15px;margin-left:10%;font-size: 15px;margin-right:auto;display:block;margin-top:10%;margin-bottom:5%; border-radius: 10px;">
  </td><td width="10%"></td>
  <td>
  </table>

</form> 
<?php
include('connsp.php');
if(isset($_REQUEST['continue_service']))
{
  //echo "hi11";
  $checkbox = $_REQUEST['checkbox'];
for($i=0;$i<count($checkbox);$i++)
{
  $del_id = $checkbox[$i];
  $sq1 = "SELECT * FROM locam WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $re1 =$connsp->query($sq1);
  $res1 = $re1->fetch_object();

  $f = date_create($res1->dol);
  $f->modify('+90 day');
  $f1 = $f->format('Y-m-d');

  $sql = "UPDATE locam SET dol='$f1' WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $result = $connsp->query($sql);
}
if($result){
  ?>
  <script type="text/javascript">
    //alert('Your change performed successfully')
    window.location = "probationnew.php";
  </script>
  <?php
}
}
?>

<?php
include('connsp.php');
if(isset($_REQUEST['discontinue_service']))
{
  //echo "hi11";
  $checkbox = $_REQUEST['checkbox'];
for($i=0;$i<count($checkbox);$i++)
{
  $del_id = $checkbox[$i];
  $sql = "DELETE FROM locam WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $result = $connsp->query($sql);
}
if($result)
{
  ?>
  <script type="text/javascript">
    //alert('Your change performed successfully')
    window.location = "probationnew.php";
  </script>
  <?php
}
}
?>

<?php
include('connsp.php');
if(isset($_REQUEST['permanent_service']))
{
  //echo "hi11";
  $checkbox = $_REQUEST['checkbox'];
for($i=0;$i<count($checkbox);$i++)
{
  $del_id = $checkbox[$i];
  $sql = "UPDATE locam SET probation='2',dol='0000-00-00' WHERE empid='".$_REQUEST["checkbox"][$i]."'";
  $result = $connsp->query($sql);
}
if($result)
{
  ?>
  <script type="text/javascript">
   // alert('Your change performed successfully')
    window.location = "probationnew.php";
  </script>
  <?php
}
}


?>

</body>
</html>
