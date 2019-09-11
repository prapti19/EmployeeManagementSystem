
<?php
include('connsp.php');
session_start();
//session_start();

if(isset($_REQUEST['login']))  //name
{
  //echo "come by submit";
  $leave=$_REQUEST['unm'];

   
  {
	  ?> 
	  <?php
    $_SESSION['unm']=$leave;   
     
   $up1="update teacher set leave_remain='$leave'";
   $up2="update teacher_mentor set leave_remain='$leave'";
   $up3="update locam set leave_remain='$leave'";

   
   $res_up1=$connsp->query($up1);
   $res_up2=$connsp->query($up2);
   $res_up3=$connsp->query($up3);
    if($res_up1 && $res_up2 && $res_up3)
    {
    ?> 
    <script type="text/javascript">
      alert('update success');
	  window.location="coordinator_profile1.php";
      
    </script>
    <?php
    
  }
  
   else
   {
    echo "update not success";
   }
  ?>    
    <?php
  }
}  
   
  

  

?>
<head>
<title>Edit</title>


<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  

</script>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  
  .bg
  {
   background-image: url('sunset.jpg');
    height: 100%;     
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding-bottom:300px;

    }
  
  </style>
</head>
<body style="background-color: #8a8a5c;">
<div class="first" style="background-color: #3d3d29; background-size: '20%';">
<br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: white; font-family: arial;font-size: 30px">Enter the number of leaves for your employees</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>

<form action="" method="POST">
<table  align="center" cellpadding=25px>

<tr>
  
    <td style="color: black;"><h3 font-size="5px">Enter the number of general leave you want to give to your employees</h3></td>
    <td><input type="text" name="unm" style="width:250px; height: 25px;"></td>
  </tr>
  
  <td></td>
    <td><input type="submit" name="login" value="Submit" style="width:90px; height:45px; font-weight:bold; border-radius: 5px; background-color: lightgreen"></td>
    <td></td>

  </tr>
  
  </table>
  </form>
  </body>
</html>
