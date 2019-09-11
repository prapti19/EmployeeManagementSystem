
<?php
include('connsp.php');
session_start();
//session_start();

if(isset($_REQUEST['login']))  //name
{
  //echo "come by submit";
  $user=$_REQUEST['unm'];
  $aadhar=$_REQUEST['aadhar'];
  $pass=$_REQUEST['pass'];
  $cpass=$_REQUEST['confirmpass'];
   $lgn="select * from teacher_mentor where user='$user' AND aadhar_no='$aadhar'"; //agar match karegi values AND  returns 1 when both same
  #exit();
  $res =$connsp->query($lgn);  //string is passed in query a executed by connection
  $chk=$res->num_rows; // mysqul function...count kitni no. of rows affect hui lgn se...wo batata hai
  if($chk==1)  //IF INSERT get success then ...
  {
    $_SESSION['unm']=$user;
    $_SESSION['aadhar']=$aadhar;
    if($pass==$cpass)
   {
   $up="update teacher_mentor set pass='$pass' where user='$user'";
   $res_up=$connsp->query($up);
   if($res_up)
    {
    ?> 
    <script type="text/javascript">
      alert('update success');
      
    </script>
    <?php
    }
  }
  
   else
   {
    echo "update not success";
   }
  ?>    
    <?php
  }
  else
    echo "login not success";
}
?>
<head>
<title>Reset Password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  
</script>

<script>
  function back(){
    window.location="tm_login.php";
  }
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  
  .bg
  {
   background-image: url('m1.jpg');
    height: 100%;     
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    padding-bottom:300px;
    }
  
  </style>
</head>
<body>
<div class='bg'>
 
<br>
<div class="second" style="float:right; "><button class="btn btn-success" onclick="back()" type="button">Back</button></div>
 <br><br>
<form action="" method="POST">
<table  align="center" cellpadding=25px>
<caption><h1 font-size="20px" style="color:white;" ><u><b>Reset Password Details</b></u></h1></caption>
<tr>
  
    <td style="color:white;"><h2 font-size="15px"><b>Username</b></h2></td>
    <td><input type="text" name="unm" style="width:250px; height: 25px;"></td>
  </tr>
  <tr>

    <td style="color: white;"><h2 font-size="15px"><b>Adhar Card Number</b></h2></td>
    <td><input type="text" name="aadhar" style="width:250px; height: 25px;"></td>
  </tr>
  <tr>
    <td style="color:white;"><h2 font-size="15px"><b>New Password</b></h2></td>
    <td><input type="password" name="pass" style="width:250px; height: 25px;"></td>
  </tr>
  <tr>
    <td style="color:white;"><h2 font-size="15px"><b>Confirm Password</b></h2></td>
    <td><input type="password" name="confirmpass" style="width:250px; height: 25px;"></td>
  </tr> 
  <tr> 
  <td></td>
    <td><input type="submit" name="login" value="Submit" style="width:90px; height:45px; font-weight:bold; border-radius: 5px; background-color: dark-green"></td>
    <td></td>

  </tr>
  
  <?php
  include('connsp.php');
  //include('tm_new.php');
    $sq="select * from teacher_mentor ";
  $res = $connsp->query($sq);
  while($fe=$res->fetch_object())
  {
    
    ?>
      
    <?php
   }
  ?>
  </table>
  </form>
  </body>
</html>
