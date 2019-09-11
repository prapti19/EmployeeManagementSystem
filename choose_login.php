<!DOCTYPE html>
<html>
<title>Choose Login</title>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  </script>
  <style>
 .bg
  {
   background-image: url('hey.jpg');
     background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    
    }
    </style>
<script>
function back(){
    window.location="indexsp.php";
  }
  function Teacher(){
    window.location="teacher_login.php";
  }
  function T_M()
  {
    window.location="tm_login.php";
  }
  function Coordinator()
  {
  	window.location="coord-login.php";
 }
 function locam(){
  window.location="locam_login.php";
 }
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #FFC300;color: orange;">  
<div class="second" style="float:right; "><button class="btn btn-success" onclick="back()" type="button">Back</button></div>
<br>
<button type="button" onclick="Coordinator()" 
style="background-color:white; padding: 25px 35px;font-size: 25px;margin-left: 10%;margin-top: 5% ;border:solid;display:block;background-color: black;">
Coordinator</button> 
<button type="button" onclick="T_M()" 
style="background-color:white; padding: 25px 35px;margin-left: 30%;font-size: 25px;border:solid;background-color: black;">
Teacher Mentor</button> 
<button type="button" onclick="Teacher()" 
style="background-color:white; padding: 25px 35px;margin-left: 52%;font-size: 25px;border:solid;display:block;background-color: black;">
Specialist Teacher</button> 
<button type="button" onclick="locam()" 
style="background-color:white; padding: 25px 35px;margin-left: 77%;font-size: 25px;border: solid;display: block;background-color: black;">
Locam Teacher</button>
</body>
</html>