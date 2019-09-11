<?php
//session_start();

include('tm_prof.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Leave Applicants</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  
</script>

<script>
  function back(){
    window.location="tm_prof.php";
  }
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<br><br>
<body style="background-color: lightgray">
  
<div class="first" style="background-color: #F2F4F4; background-size: '20%';">
    
    <br>
    <div class="second" style="float:right"><button class="btn btn-primary" onclick="back()" type="button">Back</button></div>
    <br>
    <br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: black; font-family: arial;font-size: 30px">Leave applicants</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
  <form method="POST">
  <table align="center" cellpadding=20px style="background-color: #e5e5f2;" border="2" width="100%">
    <tr style="background-color: #4c4c4c;" height="50px">
      <td align="center" width="15%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Teacher Name</b></td>
      <td align="center" width="10%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Number of dates applied</b></td>
      <td align="center" width="18%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Starting Date of Leave</b></td>
      <td align="center" width="18%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Type of Leave applied</b></td>
      <td align="center" width="20%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Application Image</b></td>
      <td align="center" width="5%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>CheckBox</b></td>
    </tr>

    <?php
    include('connsp.php');
    $sq1 = "select * from leave_app where permission='0'";
    $res1 = $connsp->query($sq1);

    while($fe1=$res1->fetch_object())
    {
      if($fe1->tmid==$var)
      {
        ?>
        <tr height="50px">
          <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe1->name;?></td>
          <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe1->nol;?></td>
          <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe1->stdate;?></td>
          <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;">
          <?php 
          $temp = $fe1->idcol;
          $sel = "SELECT type FROM tol WHERE idcol=$temp";
          $res2 = $connsp->query($sel);
          $fe2 = $res2->fetch_object();
          echo $fe2->type;
          ?>    
          </td>
          <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;">
            <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode($fe1->src).'">';
            ?>
          </td>
        <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;">
          <input type="checkbox" name="checkbox[]" value="<?php echo $fe1->empid; ?>">
        </td>
        </tr> 
        <?php
      }
  }
?>
</table>
<br><br>
<input type="submit" name="accept" value="Accept" class="btn btn-primary">
<input type="submit" name="reject" value="Reject" class="btn btn-primary">

</form>
</body>
<br><br>
</html>

<?php
include('connsp.php');
if(isset($_REQUEST['accept']))
{
  $checkbox = $_REQUEST['checkbox'];
  for($i=0;$i<count($checkbox);$i++)
  {
    $del_id = $checkbox[$i];

    $sel = "SELECT * FROM leave_app WHERE empid='".$_REQUEST["checkbox"][$i]."'";
    $result1 = $connsp->query($sel);
    $row1 = $result1->fetch_object();

//    $sql="SELECT * FROM teacher WHERE empid='".$_REQUEST["checkbox"][$i]."'";
//    $result2 = $connsp->query($sql);
//    $row = $result2->fetch_object();
//    echo $row->leave_remain;
//    exit();
    if($row1->idcol == 1)
    {
      $leave_left = $row1->leave_left - $row1->nol;
    }

    $upd="UPDATE teacher SET leave_remain='$leave_left' WHERE empid='".$_REQUEST["checkbox"][$i]."'";
    $ress = $connsp->query($upd);
    
    $sq = "UPDATE leave_app SET leave_left='$leave_left', permission='1' WHERE empid='".$_REQUEST["checkbox"][$i]."'";
    $result3 = $connsp->query($sq);
  }
  ?>
  <script type="text/javascript">
    window.location = "leavers.php";
  </script>
  <?php
}

if(isset($_REQUEST['reject']))
{
  $checkbox = $_REQUEST['checkbox'];
  for($i=0;$i<count($checkbox);$i++)
  {
    $sq2 = "DELETE FROM leave_app WHERE empid='".$_REQUEST["checkbox"][$i]."'";
    $result4 = $connsp->query($sq2);
  }
  ?>
  <script type="text/javascript">
    window.location = "leavers.php";
  </script>
  <?php
}
?>
<!-- Those who have applied for leave cancellation -->
<div class="first" style="background-color: #F2F4F4; background-size: '20%';">
<br>
    <br><br>

    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: black; font-family: arial;font-size: 30px">Leave Cancellation applicants</h1>
    </span
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
  <form method="POST">
  <table align="center" cellpadding=20px style="background-color:  #e5e5f2;" border="2" width="100%">
    <tr style="background-color: #4c4c4c;" height="50px">
      <td align="center" width="5%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Employee ID</b></td>
      <td align="center" width="15%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Teacher Name</b></td>
      <td align="center" width="10%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Number of dates applied</b></td>
      <td align="center" width="15%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Starting Date of Leave</b></td>
      <td align="center" width="15%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Type of Leave applied</b></td>
      <td align="center" width="5%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>CheckBox</b></td>
    </tr>

    <?php
    include('connsp.php');
    $sq1 = "select * from leave_app where permission='3'";
    $res1 = $connsp->query($sq1);

    while($fe1=$res1->fetch_object())
    {
      if($fe1->tmid==$var)
      {
        ?>
        <tr height="50px">
        <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe1->empid; ?></td>
          <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe1->name;?></td>
          <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe1->nol;?></td>
          <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe1->stdate;?></td>
          <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;">
          <?php 
          $temp = $fe1->idcol;
          $sel = "SELECT type FROM tol WHERE idcol=$temp";
          $res2 = $connsp->query($sel);
          $fe2 = $res2->fetch_object();
          echo $fe2->type;
          ?>    
          </td>
        <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;">
          <input type="checkbox" name="checkbox[]" value="<?php echo $fe1->empid; ?>">
        </td>
        </tr> 
        <?php
      }
  }
?>
</table>
<br><br>
<input type="submit" name="ok" value="Accept" class="btn btn-primary">
</form>
</body>
</html>

<?php
include('connsp.php');
if(isset($_REQUEST['ok']))
{
  $checkbox = $_REQUEST['checkbox'];
  for($j=0;$j<count($checkbox);$j++)
  {
    $del_id = $checkbox[$j];

    $sel = "SELECT * FROM leave_app WHERE empid='".$_REQUEST["checkbox"][$j]."'";
    $result1 = $connsp->query($sel);
    $row1 = $result1->fetch_object();

    if($row1->idcol == 1)
    {
      $leave_left = $row1->leave_left + $row1->nol;
    }
    else
    {
      $leave_left = $row1->leave_left;
    }
    
    $upd="UPDATE teacher SET leave_remain='$leave_left' WHERE empid='".$_REQUEST["checkbox"][$j]."'";
    $ress = $connsp->query($upd);
    
    $sq = "UPDATE leave_app SET leave_left='$leave_left', permission='4' WHERE empid='".$_REQUEST["checkbox"][$j]."'";
    $result3 = $connsp->query($sq);
  }
  ?>
  <script type="text/javascript">
    window.location = "leavers.php";
  </script>
  <?php
}
?>
