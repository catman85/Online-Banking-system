<?php
session_start();
include '_inc/dbconn.php';

if(!isset($_SESSION['staff_login']))
    header('location:staff_login.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Αλλαγή Κωδικού</title>
        <style>
            .displaystaff_content table,th,td {
                padding:6px;
                border: 1px solid #2E4372;
               border-collapse: collapse;
               text-align: center;
            }
        </style>
        <link rel="stylesheet" href="newcss.css">
        <?php include "boot.php";?>
        <?php include "header.php";?>
    </head>
<body>
        <div class='content'>
           <?php include 'staff_navbar.php'?>
            <div class="displaystaff_content">

                <h3 style="text-align:center;color:#2E4372;"><u>Αλλαγή Κωδικού</u></h3>
            <form action="" method="POST">
                <table align="center">
                    <tr>
                        <td>Παλιός Κωδικός</td>
                        <td><input type="password" name="old_password" required=""/></td>
                    </tr>
                    <tr>
                        <td>Νέος Κωδικός</td>
                        <td><input type="password" name="new_password" required=""/></td>
                    </tr>
                    <tr>
                        <td>Νεός Κωδικός Πάλι</td>
                        <td><input type="password" name="again_password" required=""/></td>
                    </tr></table>

                        <table align="center">
                </table>
                <input type="submit" name="change_password" value="Αλλαγή Κωδικού" class='btn btn-primary button_cust2' style="margin-left:350px"/>
            </form>
            <?php
            $user=$_SESSION['login_id'];
            if(isset($_REQUEST['change_password'])){
            $sql="SELECT * FROM staff WHERE email='$user'";
            $result=mysqli_query($con, $sql);
            $rws=  mysqli_fetch_array($result);
            $old=  mysqli_real_escape_string($con, $_REQUEST['old_password']);
            $new=  mysqli_real_escape_string($con, $_REQUEST['new_password']);
            $again=  mysqli_real_escape_string($con, $_REQUEST['again_password']);
            if($rws[9]==$old && $new==$again){
                $sql1="UPDATE staff SET pwd='$new' WHERE email='$user'";
                mysqli_query($con, $sql1) or die(mysqli_error($con));
                // header('location:staff_homepage.php'); exoyme html output pio panw
                echo '<script>window.location.replace("staff_homepage.php");</script>';
            }
            else{
                /*RASHID give the pop up window about something went wrong try again*/
                // header('location:change_password_staff.php');
                echo '<script>window.location.replace("change_password_staff.php");</script>';
            }
            }
            ?>

        </div>
</body>
