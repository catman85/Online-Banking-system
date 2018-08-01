<?php
$serverName="localhost";
$dbusername="root";
$dbpassword="DBPASSWORD";
$dbname="bank_db";
$con = @mysqli_connect($serverName,$dbusername,$dbpassword,$dbname) or die('the website is down for maintainance');
if(mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
    //you need to exit the script, if there is an error
    exit();
}
mysqli_select_db($con, $dbname);
?>
