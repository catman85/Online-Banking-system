<?php
session_start();

if(!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Προσθήκη Υπαλλήλου</title>

        <link rel="stylesheet" href="newcss.css">
        <?php include "boot.php";?>
        <?php include "header.php";?>
    </head>

<body>

        <div class='content_addstaff'>
            <?php include 'admin_navbar.php'?>
            <div class='addstaff'>
        <form action="add_staff.php" method="POST">
             <table align='center'>
                 <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Προσθήκη Υπαλλήλου</u></h3></td></tr>
                <tr>
                    <td>Όνομα</td>
                    <td><input type="text" name="staff_name" required=""/></td>
                </tr>
                <tr>
                    <td>Φύλο</td>
                    <td>
                        Α<input type="radio" name="staff_gender" value="M" checked/>
                        Γ<input type="radio" name="staff_gender" value="F" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Ημ/νια Γέννησης
                    </td>
                    <td>
                        <input type="date" name="staff_dob" required=""/>
                    </td>
                </tr>

                <tr>
                    <td>Κατάσταση</td>
                    <td>
                        <select name="staff_status">
                            <option>ανύπαντρος</option>
                            <option>παντρεμένος</option>
                            <option>διαζευγμένος</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Ειδικότητα</td>
                    <td>
                        <select name="staff_dept">
                            <option>revenue</option>
                            <option>developer</option>
                            <option>security</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Ημ/νία Πρόσληψης
                    </td>
                    <td>
                        <input type="date" name="staff_doj" required=""/>
                    </td>
                </tr>

                <tr>
                    <td>Διεύθυνση</td>
                    <td><textarea name="staff_address" required=""></textarea></td>
                </tr>
                <tr>
                    <td>Τηλέφωνο</td>
                    <td><input type="text" name="staff_mobile" required=""/></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type="email" name="staff_email" required=""/></td>
                </tr>
                <tr>
                    <td>Κωδικός</td>
                    <td><input type="password" name="staff_pwd" required=""/></td>
                </tr>

                <tr >
                    <td colspan="2" align='center' style='padding-top:20px' ><input type="submit" name="add_staff" value="Προσθήκη Υπαλλήλου" class='btn btn-primary'/></td>
                </tr>
                </table>
        </form>
                </div>
        </div>
    </body>
</html>
