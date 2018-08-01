<?php
session_start();

if(!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Προσθήκη Πελάτη</title>
        <link rel="stylesheet" href="newcss.css">
        <?php include "boot.php";?>
        <?php include "header.php";?>

    </head>
<body>
<div class='content_addstaff'>
    <?php include 'admin_navbar.php'?>
            <div class='addstaff'>

<form action="add_customer.php" method="POST">
            <table align="center">
                <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Προσθήκη Πελάτη</u></h3></td></tr>
                <tr>
                    <td>Όνομα Πελάτη</td>
                    <td><input type="text" name="customer_name" required=""/></td>
                </tr>
                <tr>
                    <td>Φύλο</td>
                    <td>
                        M<input type="radio" name="customer_gender" value="M" checked/>
                        F<input type="radio" name="customer_gender" value="F" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Γενέθλια
                    </td>
                    <td>
                        <input type="date" name="customer_dob" required=""/>
                    </td>
                </tr>
  <!--              <tr>
                    <td>Nominee</td>
                    <td><input type="text" name="customer_nominee" required=""/></td>
                </tr>-->
                <tr>
                    <td>
                        Υποκατάστημα
                    </td>
                    <td>
                        <select name="branch">
                            <option>Αθήνα</option>
                            <option>Πειραιάς</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Τύπος Λογαριασμού</td>
                    <td>
                        <select name="customer_account">
                            <option>ταμιευτηρίου</option>
                            <option>τρεχούμενος</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Ποσό</td>
                    <td><input type="text" name="initial" value="1000" min="1000" required=""/></td>
                </tr>

                <tr>
                    <td>Διεύθυνση:</td>
                    <td><textarea name="customer_address" required=""></textarea></td>
                </tr>
                <tr>
                    <td>Τηλέφωνο</td>
                    <td><input type="text" name="customer_mobile" required=""/></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type="email" name="customer_email" required=""/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="customer_pwd" required=""/></td>
                </tr>
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="add_customer" value="Add Customer" class="btn btn-primary"/></td>
                </tr>
            </table>
            </div>
    </div>
        </form>
    </body>
</html>
