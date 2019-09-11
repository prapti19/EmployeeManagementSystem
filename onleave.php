
<!DOCTYPE html>
<html>
<head>
  <title>On Leave</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<script>
  function back(){
    window.location="tm_prof.php";
  }
</script>
  <title></title>
</head>

<body style="background-color:#7a5230">
   <div class="first" style="background-image:url('subback.jpg'); background-repeat: no-repeat; background-position: center;  background-size: '20%';  padding-bottom: 50px;">
    <br>
    <div class="second" style="float:right"><button class="btn btn-primary" onclick="back()" type="button">Back</button></div>
    <br>
    <br><br>
    <span class="firstsub_a" style="float:center; " align="center">
      <h1 style="color: white; font-family: arial;font-size: 30px;margin-left: 57px;">Specialist Teacher on Leave</h1>
    </span>
    <br>
    <br>
    <br><br>
  </div>
  <br><br><br><br>
<table align="center" cellpadding=20px style="background-color:#e5e5f2 ;" border="0" width="90%">
    <tr style="background-color: #4c4c4c;" height="50px">
    <td align="center" width="5%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Employee ID</b></td>
    <td align="center" width="20%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Name</b></td>
    <td align="center" width="20%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Type of Leave</b></td>
    <td align="center" width="15%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Number of Leave</b></td>
    <td align="center" width="10%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>First date of Leave</b></td>
    <td align="center" width="10%" style="color: white; background-color:#4c4c4c; font-size: 20px;"><b>Last date of Leave</b></td>
    </tr>  
    
    <?php
    include('connsp.php');
    $select = "SELECT * FROM leave_app WHERE permission='1'";
    $result = $connsp->query($select);
    while($fet = $result->fetch_object())
    {
      if($fet->stdate <= DATE("Y-m-d") && $fet->endate >= DATE("Y-m-d"))
      {
          ?>
          <tr height="50px">
            <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fet->empid; ?></td>
            <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fet->name; ?></td>
            <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;">
            <?php 
            $temp = $fet->idcol;
            $sel = "SELECT type FROM tol WHERE idcol=$temp";
            $res2 = $connsp->query($sel);
            $fe2 = $res2->fetch_object();
            echo $fe2->type;
            ?>                  
            </td>
            <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fet->nol; ?></td>
            <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fet->stdate; ?></td>
            <td style="font-size: 20px; text-align: center; background-color:#e5e5f2;"><?php echo $fet->endate; ?></td>
          </tr>
          <?php
      }
      else if($fet->endate < DATE("Y-m-d"))
      {
          $del = "DELETE FROM leave_app WHERE empid = '$fet->empid'";
          $fi = $connsp->query($del);
      }
    }

    ?>

</table>
</body>
</html>
