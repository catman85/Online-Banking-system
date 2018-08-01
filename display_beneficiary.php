<?php
session_start();

if(!isset($_SESSION['customer_login']))
    header('location:index.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Προβολή Παραλήπτη</title>

        <link rel="stylesheet" href="newcss.css">
        <style>
            .content_customer .borderArr table,th,td{
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
<div class='content_customer'>

           <?php include 'customer_navbar.php'?>
    <div class="customer_top_nav">
             <!-- <div class="text">Καλωσήρθες <?php include "name.php" ?></div> -->
            </div>

            <?php
include '_inc/dbconn.php';
$sender_id=$_SESSION["login_id"];
$sql="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id'";
$result=  mysqli_query($con, $sql) or die(mysqli_error($con));
?>
     <br><br><br>
        <h3 style="text-align:center;color:#2E4372;"><u>Παραλήπτες</u></h3>
    <form action="delete_beneficiary.php">
<table class="borderArr" align="center">
                        <th></th>
                        <th> Όνομα </th>
                        <th> Αριθμός Λογαριασμού Πραλήπτη </th>
                        <th> Κατάσταση </th>

                        <?php
                        while($rws=  mysqli_fetch_array($result)){

                            echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                            echo ' checked';
                            echo " /></td>";
                            echo "<td>".$rws[4]."</td>";
                            echo "<td>".$rws[3]."</td>";
                            echo "<td>".$rws[5]."</td>";

                            echo "</tr>";
                        } ?>
</table>
    <table align="center"><tr><td>
    <input type="submit" name="submit_id" value="Διαγραφή Παραλήπτη" class='btn btn-primary'/>
  </td></tr></table>
    </form>
</div>
</body>
