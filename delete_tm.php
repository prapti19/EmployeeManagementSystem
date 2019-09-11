<?php
include('connsp.php');
session_start();
//session_start();

   // $var=$_POST['btn1'];
    $s1=$_SESSION['var'];
//$s1 = $_GET['variable1'];

//include('coordinator_profile1.php');
 $sql = "DELETE FROM teacher_mentor WHERE tmid=$s1";
 //echo $s1;
if ($connsp->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record";
}
//include('coordinator_profile1.php');

//exec ('indexsp.php');


?>
?>
<script type="text/javascript">
alert("Deleted successfully");
window.location.href = "coordinator_profile1.php";
</script>
