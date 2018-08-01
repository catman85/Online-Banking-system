<?php
session_start();

if(!isset($_SESSION['staff_login']))
    header('location:staff_login.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Αιτήσεις Καρτών</title>

        <link rel="stylesheet" href="newcss.css">
        <style>
            .displaystaff_content table,th,td {
                padding:6px;
                border: 1px solid #2E4372;
               border-collapse: collapse;
               text-align: center;
            }
        </style>
        <?php include "boot.php";?>
        <?php include "header.php";?>
    </head>
<body>
<div class="displaystaff_content">

           <?php include 'staff_navbar.php'?>
    <h3 style="text-align:center;color:#2E4372;"><u>Αιτήσεις Καρτών</u></h3>
            <?php
            include '_inc/dbconn.php';
            $sql="SELECT * FROM atm WHERE atm_status='PENDING'";
            $result=  mysqli_query($con, $sql) or die(mysqli_error($con));
            ?>
           <form action="staff_atm_approve_process.php" method="POST">
<table align="center">
                        <th>id</th>
                        <th>Όνομα</th>
                        <th>Αριθμός Λογαριασμού</th>
                        <th>Κατάσταση Κάρτας</th>


                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                            echo ' checked';
                            echo " /></td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[3]."</td>";

                            echo "</tr>";
                        } ?>
</table>
            <table align="center">
                    </table>
                    <input type="submit" name="submit_id" value="Αποδοχή Αίτησης" class='btn btn-primary button_cust2' style="margin-left:350px"/>
               </form>
</div>
</body>
