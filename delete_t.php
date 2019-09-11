<?php
//session_start();

include('connsp.php');
session_start();
   // $var=$_POST['btn1'];

    $s1=$_SESSION['var'];
    $s2=$_SESSION['var1'];
//$s1 = $_GET['variable1'];

 $sql = "DELETE FROM teacher WHERE user='$s2'";
 
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
window.location.href = "coordinator_profile3.php";
</script>
