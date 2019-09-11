<?php
//session_start();

include('connsp.php');
?>

<head>
  <title>Resign Applicants</title>
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



<body style="background-color: lightgray">
<div class="first" style="background-color: #F2F4F4; background-size: '20%';">
    
    <br>
    <div class="second" style="float:right"><button class="btn btn-primary" onclick="back()" type="button">Back</button></div>
    <br>
    <br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: black; font-family: arial;font-size: 30px">resignated teacher Details</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
  <form method="POST">
  <table align="center" cellpadding=20px style="background-color: white;" border="0" width="90%">
    <tr style="background-color: lightblue;" height="50px">
 
  
      <td width="20%"><b>Employee Name</b></td>
      <td width="20%"><b>Employee ID</b></td>
    </tr>  
    <?php
  

  $sq="SELECT * FROM resign";
  $res = $connsp->query($sq);
  
  while($fe=$res->fetch_object())
    { $date1 = "0000-00-00";
    if($fe->dol==$date1)
    { 
      $v1=$fe->emlid;
    ?>
    <tr  height="50px">
      <td><?php echo $fe->person;?></td>
      <td><?php echo $fe->emlid;?></td>   
      <!-- <td><button class="btn btn-primary" onclick="fun()" type="button">Fire</button> -->
       <td style="font-family: georgia;width: 5%;font-size: 15px;color: black;"><center>Date of leaving</center></td>
    <td  style="width: 25%;"><input type="date" style="width:55%; height: 30px;border-radius: 5px;" name="dol"></td>
    <!--<td>Empid</td>
    
   <td><input type="number" name="emlid"></td>-->
   <td><input type="submit" name="submit" value="submit"></td></td>
  <?php
 if(isset($_REQUEST['submit']))
{

  $dol=$_REQUEST['dol'];
     
  //exit();
  $dateTime = new DateTime($dol);
  $dol= date_format($dateTime,'Y-m-d');
//  echo $dol;

  $upd="UPDATE resign SET dol='$dol' WHERE emlid='$v1' ";
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
}}?>
<!-- <td><button onclick="fun3()">click</button></td> -->
</tr>

<?php
  
  }
}

  ?>
    
  </table>
  <br><br>
  </form>
  </body>
