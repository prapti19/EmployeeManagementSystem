<?php
include('connsp.php');
session_start();
//session_start();
if(isset($_REQUEST['login']))  //name
{
  
  $user=$_REQUEST['unm'];
  $lgn="select * from teacher_mentor where user='$user'"; //agar match karegi values AND  returns 1 when both same..count kitni no. of rows affect hui lgn se...wo batata hai
  $res=$connsp->query($lgn);  //string is passed in query and executed by connection
  $chk=$res->num_rows; // mysql function.
    if($chk==1)  //IF INSERT get success then ...
  {
    $_SESSION['unm']=$user;
    ?> 
    <script type="text/javascript">
      alert('entry success');
      window.location="coordinator_profile2.php";

    </script>
    <?php 
  }
  else
    ?> 
  {
    <script type="text/javascript">

      alert('Incorrect correct teacher mentor name');
    </script>
  }	

    <?php
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Coordinator profile</title>
  <style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f5f5f0}

.show {display:block;}
</style>
</head>

  <br><br>
<body style="background-color:#7a5230">
   <div class="first" style="background-image:url('subback.jpg'); background-repeat: no-repeat; background-position: center;  background-size: '20%';  padding-bottom: 50px;">

<div class="dropdown" >
<button onclick="myFunction()" class="dropbtn" style="font-color:black; border-radius: 10px; padding: 14px;">Menu</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="search.php">Search</a>
    <a href="alreadyresig.php">List of Resignated Employees</a>
    <a href="we1.php">Applications for resignations</a>
	 <a href="addcluster.php">Add cluster</a>
   <a href="probationnew.php">Probation</a>
   <a href="locam_profs.php">Locam teachers</a>
   <a href="changemainpage.php">Change password and username of main page</a>
   <a href="editleave.php">Edit Leave After 3 Months</a>
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

    
    
    <div class="second" style="float:right; "><button class="btn btn-primary" onclick="back()" type="button">Back</button></div>

    
    <div class="second" style="float:right; padding-right: 2%; "><button class="btn btn-primary" onclick="logout()" type="button">Logout</button></div>
    
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: white; font-family: arial;font-size: 30px">Teacher Mentor Details</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
  <form method="POST">
  <table align="center" cellpadding=20px style="background-color: #e5e5f2;" border="2" width="90%">
    <tr style="background-color: #4c4c4c;" height="50px">
    <td align="center" width="10%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Employee ID</b></td>
      <td align="center" width="20%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Employee Name</b></td>
      <td align="center" width="60%"></td>
    </tr>  
    <?php
  include('connsp.php');
  $sq="select * from teacher_mentor ";
  $res = $connsp->query($sq);
  while($fe=$res->fetch_object()){$v1=$fe->empid;
    ?>
    <tr  height="50px">
      <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><b><?php echo $fe->empid;?></b></td>
      <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><b><?php echo $fe->user;?></b></td> 
       
       <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><input type="checkbox" name="checkbox[]" value="<?php echo $fe->tmid; ?>"></td>
    </tr>
    <?php
  }
  ?>
  </table>
<br><br><br><br>
<input type="submit" name="delete" value="Delete" class="btn btn-primary" style="padding: 10px; float: right; margin-right: 2%; ">

</form>
</body>
<?php

include('connsp.php');
if(isset($_REQUEST['delete']))
{
  $checkbox=$_REQUEST['checkbox'];
  for($i=0;$i<count($checkbox);$i++)
  {
    $del_id=$checkbox[$i];
    $sql="DELETE FROM teacher_mentor WHERE tmid=' ".$_REQUEST["checkbox"][$i]." '";
    $result=$connsp->query($sql);
  }
  if($result)
  {
    ?>
    <script type="text/javascript">
    alert('Deleted successfully!')
      window.location="coordinator_profile1.php";
    </script>
    <?php
  }
  }
  ?>
</html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  

</script>

<script>
  function back(){
    window.location="choose_login.php";
  }
</script>
<script>
      function gotofile(){
        window.location="we1.php";
      }
       function alreadyresig(){
        window.location="alreadyresig.php";
      }
      function logout(){
        window.location="logout.html";
      }
      function search(){
        window.location="search.php";
      }
       function del()
    {
    window.location="delete_tm.php";
    }
	function edit(){
    window.location="edit.php";
  }
  function locamprofs()
  { //window.location="indexsp.php";
    window.location="locam_profs.php";
  }
  function probation()
  { //window.location="indexsp.php";
    window.location="probationnew.php";
  }
    </script>
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  
<br>
</body>
   <form method="POST">
<table  align="center" cellpadding=25px>
<caption><h4 font-size="10px"  style="color: white ;font-family:Georgia;" ><u><b>Enter the name of TM here</b></u></h4></caption>
 <br>
 <br>
  <tr>
    <td style="color: white;"><h4 font-size="15px"><b>Name:</b></h4></td>
    <td><input type="text" name="unm" style="width:250px; height: 25px;"></td>
  </tr>
  <tr>`
  <tr>
    <td style="padding: 10px;padding-left:20%;"><input type="submit" name="login" value="ENTER" style="width:90px; height:45px; font-weight:bold; border-radius: 5px;color: white; background-color: orange;" class="btn btn-warning"></td>
    
  </tr>
 </table>


</form>
  <br><br>
  </body>

<?php
  include('connsp.php');
?>
