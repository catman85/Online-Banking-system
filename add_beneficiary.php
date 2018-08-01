<?php
session_start();

if(!isset($_SESSION['customer_login']))
    header('location:index.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Προσθήκη Παραλήπτη</title>

        <link rel="stylesheet" href="newcss.css">
        <style>
            .content_customer table,th,td {
                padding:6px;
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
    <div class="customer_top_nav">
             <!-- <div class="text">Καλωσήρθες <?php include "name.php" ?></div> -->
            </div>
    <br><br>
    <form action='add_beneficiary_process.php' method='post'>
        <br><br>
        <h3 style="text-align:center;color:#2E4372;"><u>Προσθήκη Παραλήπτη</u></h3>
        <table align="center">

            <tr><td><span class="heading">Όνομα Παραλήπτη: </span></td>
                  <td><input type='text' name='name' required></td></tr>

            <tr><td><span class="heading">Άριθμός Λογαριασμού Παραλήπτη: </span></td>
                  <td><input type='text' name='account_no' required></td></tr>

          <!--  <tr><td><span class="heading">Υποκατάστημα: </span></td>
                  <td><select name='branch_select' required>

                        <option value='KOLKATA'>Kolkata</option>
                        <option value='DELHI'>Delhi</option>
                        <option value='BANGALORE'>Bangalore</option>
                      </select></td></tr>-->
            <!--<tr><td><span class="heading">Ifsc Code: </span></td>
                <td><input type='text' name='ifsc_code' required></td></tr>-->
        </table>
        <table align="center">
             <!-- <tr><td> -->
        </table>
        <table align="center" style='all: revert'><tr><td>
        <input type='submit' name='submitBtn' value='Προσθήκη' class="btn btn-primary">
        </td></tr></table>

    </form>

  </body>
