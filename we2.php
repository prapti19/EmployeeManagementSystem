<!DOCTYPE html>
<html>
<head>
  <title>Resign Applicants</title>
</head>
</html>


<?php

include ('connsp.php');
include('we1.php');
session_start();


 if(isset($_REQUEST['submit']))
{

  $dol=$_REQUEST['dol'];
     
  //exit();
  $dateTime = new DateTime($dol);
  $dol= date_format($dateTime,'Y-m-d');
//  echo $dol;
 
  $upd="UPDATE resign SET dol='$dol' WHERE emlid=$v1 ";
  $sql = "DELETE FROM teacher WHERE empid=$v1";
//  echo $upd;
//  exit();
  $res=$connsp->query($upd);
  
if($res AND $connsp->query($sql))
{
  //alert("insert success");
  ?> 
    <script type="text/javascript">
      alert(' dol insert success and deleted successfully'); 
      //window.location="applicants.php";
    </script>
    <?php
}
else
{
  echo "insert not success";
}
}
?> 
<div style="color: black; font-color:red; font-family: arial;font-size: 30px">Following is the list of updated list of resignants:
</div>
<?php
include('we1.php');
?>
