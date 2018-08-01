<?php
session_start();

if(!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="newcss.css">
        <title>Διαχειριστής</title>

        <?php include "boot.php";?>
        <?php include "header.php";?>
    </head>
<body>
        <div class='content'>

           <?php include 'admin_navbar.php'?>
            <div class='admin_staff'>

                <ul>
                    <li><b><u>Προσωπικό</u></b></li>
       <li> <a href="addstaff.php">Προσθήκη Προσωπικού</a></li>
        <li><a href="display_staff.php">Τροποποίηση Στοιχείων Υπαλλήλου</a></li>
        <li> <a href="delete_staff.php">Διαγραφή Υπαλλήλου</a></li>
        </ul>
        </div>
            <div class='admin_customer'>
                <ul>
                   <li><b><u> Customer</u></b></li>
        <li><a href="addcustomer.php">Προσθήκη Πελάτη</a></li>
       <li> <a href="display_customer.php">Τροποποίηση Στοιχείων Πελάτη</a></li>
       <li> <a href="delete_customer.php">Διαγραφή Πελάτη</a></li>
        </div>
        </div>
    </body>
</html>
