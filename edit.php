
<?php
include('connsp.php');
session_start();
//session_start();

if(isset($_REQUEST['login']))  //name
{
  //echo "come by submit";
  $user=$_REQUEST['unm'];
  $aadhar=$_REQUEST['aadhar'];
  $email=$_REQUEST['email'];
  $phone_no=$_REQUEST['phone_no'];
  $address=$_REQUEST['address'];
  $lgn1="select * from teacher where user='$user' AND aadhar_no='$aadhar'";
  $lgn2="select * from teacher_mentor where user='$user' AND aadhar_no='$aadhar'";
  $lgn3="select * from locam where user='$user' AND aadhar_no='$aadhar'";
  #exit();
  $res1 =$connsp->query($lgn1);  //string is passed in query a executed by connection
  $chk1=$res1->num_rows; // mysqul function...count kitni no. of rows affect hui lgn se...wo batata hai
  $res2 =$connsp->query($lgn2);  //string is passed in query a executed by connection
  $chk2=$res2->num_rows; 
  $res3 =$connsp->query($lgn3);  //string is passed in query a executed by connection
  $chk3=$res3->num_rows; 
  if($chk1==1 || $chk2==1 || $chk3==1)  //IF INSERT get success then ...
  {
    $_SESSION['unm']=$user;
    $_SESSION['aadhar']=$aadhar; 
	$_SESSION['email']=$email;
    $_SESSION['phone_no']=$phone_no;    
    $_SESSION['address']=$address;

   if($chk1==1)   
   $up="update teacher set email='$email',phone_no='$phone_no',address='$address' where user='$user'";
   if($chk2==1)
   $up="update teacher_mentor set email='$email',phone_no='$phone_no',address='$address' where user='$user'";
   if($chk3==1)
   $up="update locam set email='$email',phone_no='$phone_no',address='$address' where user='$user'";	

   
   $res_up=$connsp->query($up);
   if($res_up)
    {
    ?> 
    <script type="text/javascript">
      alert('update success');
      
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
  else
    echo "login not success";
}
?>
<head>
<title>Edit</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  

</script>

<script>
  function back(){
    window.location="teacher_login.php";
  }
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
      <h1 style="color: white; font-family: arial;font-size: 30px">Enter correct aadhar no. and username to edit</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>

<form action="" method="POST">
<table  align="center" cellpadding=25px>

<tr>
  
    <td style="color: black;"><h3 font-size="5px">Username</h3></td>
    <td><input type="text" name="unm" style="width:250px; height: 25px;"></td>
  </tr>
  <tr>

    <td style="color: black;"><h3 font-size="10px">Adhar Card Number</h3></td>
    <td><input type="text" name="aadhar" style="width:250px; height: 25px;"></td>
  </tr>
  <tr>
    <td style="color: black;"><h3 font-size="10px"> New Email</h3></td>
    <td><input type="text" name="email" style="width:250px; height: 25px;"></td>
  </tr>
  <tr>
    <td style="color: black;"><h3 font-size="10px"> New Phone Number</h3></td>
    <td><input type="text" name="phone_no" style="width:250px; height: 25px;"></td>
  </tr> 
   <tr>
    <td style="color: black;"><h3 font-size="10px">New Address</h3></td>
    <td><input type="text" name="address" style="width:250px; height: 25px;"></td>
  </tr> 
  <tr> 
  <td></td>
    <td><input type="submit" name="login" value="Submit" style="width:90px; height:45px; font-weight:bold; border-radius: 5px; background-color: lightgreen"></td>
    <td></td>

  </tr>
  
  <?php
  include('connsp.php');
  //include('tm_new.php');
    $sq="select * from teacher ";
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
