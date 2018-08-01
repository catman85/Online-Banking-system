<?php
session_start();

if(!isset($_SESSION['customer_login']))
    header('location:index.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Transfer Funds</title>

        <link rel="stylesheet" href="newcss.css">
          <style>
            .content_customer table,th,td {
                padding:6px;
                /* border: 1px solid #2E4372; */
               border-collapse: collapse;
               text-align: center;
            }
            .content_customer td{
                padding:10px;
            }
            .head{
              text-align:center;
                color:#2E4372;
                font-weight:bold;
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
            <br><br><br><br>
        <h3 style="text-align:center;color:#2E4372;"><u>Μεταφορά Κεφαλαίου</u></h3>


    <?php
        include '_inc/dbconn.php';
        $sender_id=$_SESSION["login_id"];


        $sql="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
        $result=  mysqli_query($con, $sql);
        $rws=mysqli_fetch_array($result);
        $s_id=$rws[1];//benef_sender_id
    ?>


    <?php
        $sender_id=$_SESSION["login_id"];
        if($sender_id==$s_id)
        {
        echo "<form action='customer_transfer_process.php' method='POST'>";
        echo "<table align='center'>";
        echo "<tr><td>Επιλογή Παραλήπτη:</td><td> <select name='transfer'>" ;

        $sql1="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
        $result=  mysqli_query($con, $sql);

        while($rws=mysqli_fetch_array($result)) {
        echo "<option value='$rws[3]'>$rws[4]</option>";
        }

        echo "</select></td></tr>";

        echo "<tr><td>Ποσότητα: </td><td><input type='number' name='t_val' required></td></table>";
        echo "<table align='center'><tr><td>";
        echo "<input type='submit' name='submitBtn' value='Μεταφορά' class='btn btn-primary'></form>";
        echo "</td></tr></table>";
        }
        else{
            echo "<br><br><div class='head'><h3>Δέν έχετε προσθέσει παραλήπτη.</h3></div>";
        }
    ?>
    </div>
<body>
