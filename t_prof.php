<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>My Profile</title>
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
    
  function logout(){
    window.location="logout.html";
  }
  function edit(){
    window.location="edit.php";
  }
 
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color:#7a5230">
   <div class="first" style="background-image:url('subback.jpg'); background-repeat: no-repeat; background-position: center;  background-size: '20%';  padding-bottom: 50px;">
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



<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function yFunction() {
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

</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<body style="background-color:#7a5230">
<br><br>
   <div class="first" style="background-image:url('subback.jpg'); background-repeat: no-repeat; background-position: center;  background-size: '20%';  padding-bottom: 50px;">
    <div class="dropdown" >
<button onclick="yFunction()" class="dropbtn" style="font-color:black; border-radius: 10px; padding: 7px;">Menu</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="resign.php">Resign</a>
    <a href="leave_form.php">Leave Form</a>
     <a href="cancel_form.php">Cancel Leave</a>

    <a href="edit.php">Edit Details</a>


  </div>
</div>
    
    <div class="second" style="float:right"><button class="btn btn-primary" onclick="back()" type="button">Back</button></div>
    <br><br>
    <div class="second" style="float:left;padding-left: 95%;"><button class="btn btn-primary" onclick="logout()" type="button">Logout</button></div>
    <br><br>
	
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: white; font-family: arial;font-size: 30px;margin-left: 57px;">Specialist Teacher Details</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
  <table align="center" cellpadding=20px style="background-color: white;" border="2" width="90%">
     

    <?php
  include('connsp.php');
  $sq="select * from teacher";
  $res = $connsp->query($sq);
  while($fe=$res->fetch_object())
  {
  if($fe->user== $_SESSION['unm']){
    ?>
    <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Teacher ID</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->tmid;?></td></tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Employee Name</b></td><td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->user;?></td></tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Employee ID</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->empid;?></td></tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Email Id</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->email;?></td></tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Phone Number</b></td><td  style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->phone_no;?></td></tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Address</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->address;?></td></tr>
 <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Aadhar no</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->aadhar_no;?></td></tr>
   <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Pan no</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->pan_no;?></td></tr>
    <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Date of Joining</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->doj;?></td></tr>
     <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>School</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->school;?></td></tr>
      <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Blood Group</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fe->bloodg;?></td></tr>
       <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Leave Remain</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;">
         <?php
        $sq1 = "SELECT leave_remain FROM teacher WHERE empid='$fe->empid'";
        $r2 = $connsp->query($sq1);
        $r1 = $r2->fetch_object();
        echo $fe->leave_remain;
        ?>
      </tr>

       <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Probation status</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;">
       <?php
        $sq1 = "SELECT probation FROM teacher WHERE empid='$fe->empid'";
        $r2 = $connsp->query($sq1);
    
        $r1 = $r2->fetch_object();
        if($r1->probation == '1')
        {
          echo "On Probation";
        }
        else if($r1->probation=="2")
          {echo "Permanent";}
        ?>
        </tr>
        <tr  height="50px"><td width="20%" style="background-color:#4c4c4c; font-size: 23px;color: white;"><b>Leave Status(if applied)</b></td><td style="font-size: 20px; text-align: center; background-color:#e5e5f2;">
 
        <?php
        $sq1 = "SELECT permission FROM leave_app WHERE empid='$fe->empid'";
        $r2 = $connsp->query($sq1);
        $r1 = $r2->fetch_object();

        if($r1)
        {
          switch ($r1->permission) 
          {
          case '2':
            echo "Rejected";
            $sq2 = "DELETE FROM leave_app WHERE empid='$fe->empid'";
            $r3 = $connsp->query($sq2);
            break;
          case '1':
            echo "Accepted";
            break;
          case '0':
            echo "Pending";
            break;  
          case '3':
            echo "Cancellation: pending";
            break;  
          case '4':
            echo "Cancellation: Accepted";
            $sq2 = "DELETE FROM leave_app WHERE empid='$fe->empid'";
            $r3 = $connsp->query($sq2);
            break;
          }
        }  
        else
        {
          echo "Not Applied";
        }
        ?>      
      
 
 </tr>
    <?php
  }
}
  ?>
    
  </table>
  <table>
  <tr><td width="25%"></td>
  <td width="20%">
  </td>

  <br><br>
  </body>

</html>
