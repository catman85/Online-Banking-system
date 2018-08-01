<?php
session_start();

if(!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>
<!DOCTYPE html>
<?php
include '_inc/dbconn.php';
$sql="SELECT * FROM `customer`";
$result=  mysqli_query($con, $sql) or die(mysqli_error($con));
$sql_min="SELECT MIN(id) from customer";
$result_min=  mysqli_query($con, $sql_min);
$rws_min=  mysqli_fetch_array($result_min);
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="newcss.css"/>
        <style>
            .displaystaff_content table,th,td {
                padding:6px;
                border: 1px solid #2E4372;
               border-collapse: collapse;
            }
        </style>
        <?php include "boot.php";?>
        <?php include "header.php";?>
        <title>Delete Customer</title>
    </head>
<body>

                <div class="displaystaff_content">
                    <?php include 'admin_navbar.php'?>
                <form action="editcustomer.php" method="POST">

                    <table align="center">
                        <th></th>
                        <th>Άρ. Λογ.</th>
                        <th>Όνομα</th>
                        <th>Φύλο</th>
                        <th>Ημ/ωία Γέννησης</th>
                        <!--<th>nominee</th>-->
                        <th>Τύπος Λογαριασμού</th>
                        <th>Διεύθυνση</th>
                        <th>Τηλέφωνο</th>
                        <th>email</th>
                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                            if($rws[0]==$rws_min[0]) echo' checked';
                            echo " /></td>";
                            echo "<td>".$rws[0]."</td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[3]."</td>";
                            //echo "<td>".$rws[4]."</td>";
                            echo "<td>".$rws[5]."</td>";
                            echo "<td>".$rws[6]."</td>";
                            echo "<td>".$rws[7]."</td>";
                            echo "<td>".$rws[8]."</td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>
                    <table align="center">
                    </table>
                    <input type="submit" name="submit2_id" value="Διαγραφή Πελάτη" class='btn btn-primary button_cust2'/>
                </form>
                </div>

    </body>
</html>
