<?php
include ('coordinator_profile2.php');


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
    window.location="coordinator_profile2.php";
  }
   function del(){
    window.location="delete_t.php";
  }
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<br><br><br><br>
<body style="background-color: lightgray">
<div class="first" style="background-color: #F2F4F4; background-size: '20%';">
    
    <br>
    <div class="second" style="float:right"><button class="btn btn-primary" onclick="back()" type="button">Back</button></div>
    <br>
    <br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: black; font-family: arial;font-size: 30px">Specialist Teacher Details</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
<form method="POST">
<table align="center" cellpadding=20px style="background-color: #e5e5f2;" border="0" width="90%">
    <tr style="background-color: #4c4c4c;" height="50px">
    <td width="10%" style="color: white;"><b>#</b></td>
      <td width="40%" style="color: white;"><b>Employee Name</b></td>
     <td width="30%" style="color: white;"><b>Empid</b></td>
     <td width="10%"> 
    </tr>  
    <?php
  include('connsp.php');
  $sq="select * from teacher";
  $res = $connsp->query($sq);
  while($fe=$res->fetch_object())
  {
  if($fe->tmid==$var){  
     $v1=$fe->tmid;
      $v2=$fe->user;
    ?>
      <tr  height="50px">
      <td><?php echo $fe->tmid;?></td>
      <td><?php echo $fe->user;?></td>      
     <td><?php echo $fe->empid;?></td>
  <td><input type="checkbox" name="checkbox[]" value="<?php echo $fe->empid; ?>" ></td>
</td>
    </tr>
    <?php
  }
  }
  ?>
</table>
<br><br>
<center><input type="submit" name="delete" value="Delete" class="btn btn-primary"></center>
</form>
  <br><br>
   
  </body>
<?php
include('connsp.php');
if(isset($_REQUEST['delete']))
{
  //echo "hi11";
  $checkbox = $_REQUEST['checkbox'];
for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
$sql = "DELETE FROM teacher WHERE empid='".$_REQUEST["checkbox"][$i]."'";
$result = $connsp->query($sql);
}
if($result){
  ?>
  <script type="text/javascript">
    alert('Your deletion performed successfully')
    window.location = "coordinator_profile3.php";
  </script>
  <?php
}
 }

?>
