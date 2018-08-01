<?php
session_start();

if(!isset($_SESSION['customer_login']))
    header('location:index.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Κινήσεις</title>

        <link rel="stylesheet" href="newcss.css">
        <style>
            .content_customer table,th,td {
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

        <div class="customer_top_nav">
                     <div class="text">Καλωσήρθες <?php include "name.php" ?></div>
                    </div>
        <div class='content_customer'>
                  <?php include 'customer_navbar.php'?>
            <h3 style="text-align:center;color:#2E4372;"><u>Κινήσεις εντός διαστήματος:</u></h3>
            <table align="center">

                        <th>Id</th>
                        <th>Ημ/μνια Συναλλαγής</th>
                        <th>Κατάσταση</th>
                        <th>Πίστωση</th>
                        <th>Χρέως</th>
                        <th>Υπόλοιπο</th>

                        <?php if(isset($_REQUEST['summary_date'])) {
                         $date1=$_REQUEST['date1'];
                         $date2=$_REQUEST['date2'];

                         include '_inc/dbconn.php';
                         $sender_id=$_SESSION["login_id"];
                         $sql="SELECT * FROM passbook".$sender_id." WHERE transactiondate BETWEEN '$date1' AND '$date2'";
                         $result=  mysqli_query($con, $sql) or die(mysqli_error($con));

                              while($rws=  mysqli_fetch_array($result)){

                                  echo "<tr>";
                                  echo "<td>".$rws[0]."</td>";
                                  echo "<td>".$rws[1]."</td>";
                                  echo "<td>".$rws[8]."</td>";
                                  echo "<td>".$rws[5]."</td>";
                                  echo "<td>".$rws[6]."</td>";
                                  echo "<td>".$rws[7]."</td>";

                                  echo "</tr>";
                              }
                        }?>
</table>
    </div>
  </body>
