<?php
include('connsp.php');
session_start();
if(isset($_REQUEST['login']))  //name
{
  //echo "come by submit";
  $user=$_REQUEST['unm'];
  $pass=$_REQUEST['pass'];
  
  //echo "donnnee";
  $lgn="select * from coord where user='$user' AND pass='$pass'  "; //agar match karegi values AND  returns 1 when both same..count kitni no. of rows affect hui lgn se...wo batata hai
  $res=$connsp->query($lgn);  //string is passed in query and executed by connection
  $chk=$res->num_rows; // mysql function.
    if($chk==1)  //IF INSERT get success then ...
  {
    $_SESSION['unm']=$user;
    
    ?> 
    <script type="text/javascript">
      alert('login success');
      window.location="coordinator_profile1.php";

    </script>
  
  
    <?php
    //echo "insert success";
    /*header('location:show.php'); //this will show directly the show file as it cannot execute this form and this simltaneouly*/
  }
  else
    ?> 
    <script type="text/javascript">
      alert('Incorrect username or password. Please check!');
    window.location="coord_login.php";
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login page</title>
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

    .btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
   
    cursor: pointer;
    
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
  
  </style>
  <script >
    function back(){
    window.location="choose_login.php";
  }
  </script>
</head> 
<body>
  <div class='bg'>
  <div class="second" style="float:right; padding-right: 2%;">
  <button class="btn btn-success" onclick="back()" type="button">Back</button></div>
<form action="" method="POST">
<table  align="center" cellpadding=25px style="margin-top:125px;padding-bottom:300px;">
<br><br><br>
<caption><h1 font-size="20px" style="color:white;" ><u><b>Login Here</b></u></h1></caption>
 <br>
 <br>
  <tr>
    <td style="color:white;"><h2 font-size="15px"><b>UserName</b></h2></td>
    <td><input type="text" name="unm" style="width:250px; height: 25px;"></td>
  </tr>
  <tr>`
    <td style="color:white;"><h2 font-size="15px"><b>Password</b></h2></td>
    <td><input type="password" name="pass" style="width:250px; height: 25px;"></td>
  </tr>

  <tr>
  <td></td>
    <td><input type="submit" name="login" value="Log In" style="width:90px; height:45px; font-weight:bold; border-radius: 5px; background-color: dark-green"></td>
    <td></td>
  </tr>
 </table>
</form>
</body>
</html>