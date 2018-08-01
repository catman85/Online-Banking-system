<?php
session_start();

if(!isset($_SESSION['staff_login']))
    header('location:staff_login.php');
?>
<?php
if(isset($_REQUEST['submit_id']))
{
    include '_inc/dbconn.php';
    $id=$_REQUEST['customer_id'];

    $sql="SELECT * FROM atm WHERE id='$id'";
    $result=  mysqli_query($con, $sql) or die(mysqli_error($con));
    $rws=  mysqli_fetch_array($result);

    if($rws[3]=="PENDING")
    $sql="UPDATE atm SET atm_status='ISSUED' WHERE id='$id'";

    mysqli_query($con, $sql) or die(mysqli_error($con));

   echo '<script>alert("Επιτυχής Έκδοση Κάρτας");';
   echo 'window.location= "staff_atm_approve.php";</script>';
}
