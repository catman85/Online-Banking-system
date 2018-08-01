<?php
session_start();

if(!isset($_SESSION['customer_login']))
    header('location:index.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ATM request</title>

        <link rel="stylesheet" href="newcss.css">
        <style>
            .content_customer table,th,td {
                  /* padding:6px; */
                  /* border: 1px solid #2E4372; */
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
        <table align="center"><tr><td>
     <div class="customer_top_nav">
             <!-- <div class="text"> Καλωσήρθες <?php include "name.php"?></div> -->
            </div>
            <br><br></td></tr></table>

    <form action="customer_issue_atm_process.php" method="POST">
          <table align="center">
              <tr><td>Αίτηση για: <select name="atm">
                                    <option value='ATM' selected>Κάρτα</option>
                                    <option value='CHEQUE'>Βιβλίο Επιταγών</option></td></tr>

                                </select>
          </table>

          <table align="center">
          <tr><td><input type="submit" name="submitBtn" value="Αίτηση" class='btn btn-primary'></td></tr>
          </table>

   </form>

    <?php
        include '_inc/dbconn.php';
        $sender_id=$_SESSION["login_id"];

        $sql="SELECT * FROM cheque_book WHERE account_no='$sender_id'";
        $result=mysqli_query($con, $sql) or die(mysqli_error($con));
        $rws=mysqli_fetch_array($result);
        $c_status=$rws[3];
        $c_id=$rws[2];

        $sql="SELECT * FROM atm WHERE account_no='$sender_id'";
        $result=mysqli_query($con, $sql) or die(mysqli_error($con));
        $rws=mysqli_fetch_array($result);
        $atm_status=$rws[3];
        $a_id=$rws[2];

        if(($a_id==$sender_id) || ($c_id==$sender_id))
        {

        echo "<table align='center' style='border: 1px solid #2E4372;'>";
        echo "<th>Αιτήσεις</th><th>Κατάσταση</th>";
        echo "<tr><td>Πρόοδος ΑΤΜ Κάρτας: </td><td>$atm_status</td></tr>";
        echo "<tr><td>Πρόοδος Βιβλίου Επιταγών: </td><td>$c_status</td></tr>";
            echo "</table>"; }?>
</body>
