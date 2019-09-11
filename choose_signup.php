<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>

<script>
function back(){
  window.location="indexsp.php";
}
  function Teacher(){
    window.location="signup_teacher.php";
  }
  function T_M()
  {
    window.location="signup_tm.php";
  }
  function Coordinator(){
  	window.location="signup_coord.php";
 }
 function locam(){
  window.location="signup_locam.php";
 }
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #FFC300; color: orange;">  
<div class="second" style="float:right; "><button class="btn btn-success" onclick="back()" type="button">Back</button></div>
<br>
<button type="button" onclick="Coordinator()" 
style="background-color:white; padding: 25px 35px;font-size: 25px;margin-left: 10%;margin-top: 5%;border:solid;display:block;background-color: black;">
Coordinator</button> 
<button type="button" onclick="T_M()" 
style="background-color:white; padding: 25px 35px;margin-left: 30%;font-size: 25px;border:solid;background-color: black;">
Teacher Mentor</button> 
<button type="button" onclick="Teacher()" 
style="background-color:white; padding: 25px 35px;margin-left: 52%;font-size: 25px;border:solid;display:block;background-color: black;">
Specialist Teacher</button> 
<button type="button" onclick="locam()" 
style="background-color:white; padding: 25px 35px;margin-left: 75%;font-size: 25px;border: solid;display: block;background-color: black;">
Locam Teacher</button>
</body>
</html>