<?php
//session_start();

include('connsp.php');


if(isset($_REQUEST['submit']))
{
  $user = $_REQUEST['user'];
  $pass = $_REQUEST['pass'];
 
 //  $ins2="ALTER TABLE main_p AUTO_INCREMENT = '1'";
        $ins1 = "DELETE FROM main_p WHERE id='1'" ;
    $ins="insert into main_p(pass,user) values ('$pass','$user') ";

 
$res1=$connsp->query($ins1);
//$res2=$connsp->query($ins2);
   $res=$connsp->query($ins);
    if($res)
    {
      ?> 
      <script type="text/javascript">
        alert('change success'); 
        window.location="coordinator_profile1.php";
      </script>
      <?php
    }
    else
    {
      echo "change not success";

    }
  }
  
?>

<!DOCTYPE html>
<html>
<head>
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
    <title>sign up</title>
  <style> 
  .bg {
    background-image: url("m1.jpg");
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding-bottom: 200px;
        }
</style>

  <script type="text/javascript" src="backfix.min.js"></script>
  <script type="text/javascript">
  bajb_backdetect.OnBack = function()
  {
    window.location = "indexsp.php";
  }
  </script>

</head>
<body>
<div class="bg">
 <div class="second" style="float:right; "><button class="btn btn-primary" onclick="back()" type="button" style="padding: 10px;">Back</button></div>
<br><br><br>

<h1 style="font-family: georgia;color:white;" align="center"><b>Add your details:</b></h1>
<br><br><br>  
<form action="" method="POST">
 <table border="0" align="center" width="50%" cellpadding="90px" cellspacing="90px" >
 
  <tr>
    <td style="font-family: georgia;width: 25%;font-size: 25px; color:white"><center>Username</center></td>
    <td  style="width: 25%;"><input type="text" style="width:150%; height: 30px; border-radius: 10px;" name="user"></td>
  </tr>
  <tr>
    <td style="font-family: georgia;width: 25%;font-size: 25px; color:white"><center>Password</center></td>
    <td  style="width: 25%;"><input type="text" style="width:150%; height: 30px; border-radius: 10px;" name="pass"></td>
  </tr>

    <td></td>
    
    <td style="font-family: georgia;width: 25%;font-size: 20px;color: white;"><input class="btn btn-success" type="submit" name="submit" style="width:20%; height: 45%;" value="submit"></td>
  </tr>


  
 </table>
</form>
</div>
</body>
</html>
