<?php
session_start();
include '_inc/dbconn.php';

if(!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="newcss.css">
        <title>Αλλαγή Κωδικού</title>
        <?php include "boot.php"?>
        <?php include "header.php" ?>
    </head>
    <body>
        <div class='content'>
           <?php include 'admin_navbar.php'?>
            <div class='admin_change_pwd' style="height:230px">
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
                    </tr>
                    <tr>

                        <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="change_password" value="Change Password" class="btn btn-primary" /></td>
                    </tr>
                </table>
            </form>
                </div>
            </div>
            <?php
            if(isset($_REQUEST['change_password'])){
            $sql="SELECT * FROM admin WHERE id='1'";
            $result=mysqli_query($con, $sql);
            $rws=  mysqli_fetch_array($result);
            $old=  mysqli_real_escape_string($con, $_REQUEST['old_password']);
            $new=  mysqli_real_escape_string($con, $_REQUEST['new_password']);
            $again=  mysqli_real_escape_string($con, $_REQUEST['again_password']);
                  if($rws[9]==$old && $new==$again){
                      $sql1="UPDATE admin SET pwd='$new' WHERE id='1'";
                      mysqli_query($con, $sql1) or die(mysqli_error($con));
                      // header('location:admin_hompage.php');
                      echo '<script>window.location.replace("admin_hompage.php");</script>';
                  }
                  else{

                      // header('location:change_password.php');
                      echo '<script>window.location.replace("change_password.php");</script>';
                  }
            }
            ?>

        </div>

      </body>
  </html>
