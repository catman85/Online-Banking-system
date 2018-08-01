<?php
session_start();

if(!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>
<?php
include '_inc/dbconn.php';
$id=  mysqli_real_escape_string($con, $_REQUEST['customer_id']);
$sql="SELECT * FROM `customer` WHERE id=$id";
$result=  mysqli_query($con, $sql) or die(mysqli_error($con));
$rws=  mysqli_fetch_array($result);
?>
<?php
                        $delete_id=  mysqli_real_escape_string($con, $_REQUEST['customer_id']);
                        if(isset($_REQUEST['submit2_id'])){
                            $sql_delete="DELETE FROM `customer` WHERE `id` = '$delete_id'";
                            $sql_drop="DROP TABLE passbook".$delete_id;
                            mysqli_query($con, $sql_delete) or die(mysqli_error($con));
                            mysqli_query($con, $sql_drop) or die(mysqli_error($con));
                            header('location:delete_customer.php');
                        }
                        ?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="newcss.css"/>

        <title>Τροποποίηση Στοιχείων</title>
        <?php include "boot.php";?>
        <?php include "header.php";?>

    </head>
<body>
        <div class='content_addstaff'>
    <?php include 'admin_navbar.php'?>
                <div class='addstaff'>
                <form action="alter_customer.php" method="POST">
            <table align="center">
                                <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
                 <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Τροποποίηση Στοιχείων Πελάτη</u></h3></td></tr>
                <tr>
                    <td>Όνομα Πελάτη</td>
                    <td><input type="text" name="edit_name" value="<?php echo $rws[1];?>" required=""/></td>
                </tr>
                <tr>
                    <td>Φύλλο</td>
                    <td>
                        Α<input type="radio" name="edit_gender" value="M" <?php if($rws[2]=="M") echo "checked";?>/>
                        Γ<input type="radio" name="edit_gender" value="F" <?php if($rws[2]=="F") echo "checked";?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Ημ/νία Γέννησης
                    </td>
                    <td>
                        <input type="date" name="edit_dob" value="<?php echo $rws[3];?>"/>
                    </td>
                </tr>
<!--            <tr>
                    <td>Nominee</td>
                    <td><input type="text" name="edit_nominee" value="<?php echo $rws[4];?>" required=""/></td>
                </tr>-->
                <tr>
                    <td>Τύπος Λογαριασμού</td>
                    <td>
                        <select name="edit_account">
                            <option <?php if($rws[5]=="savings") echo "selected";?>>ταμιευτηρίου</option>
                            <option <?php if($rws[5]=="current") echo "selected";?>>τρεχούμενος</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>Διεύθυνση</td>
                    <td><textarea name="edit_address"><?php echo $rws[6];?></textarea></td>
                </tr>

                    <td>Τηλέφωνο</td>
                    <td><input type="text" name="edit_mobile" value="<?php echo $rws[7];?>" required=""/></td>
                </tr>

<!--                <tr>
                    <td>email id</td>
                    <td><input type="text" name="edit_mobile" value="<?php echo $rws[8];?>" required=""/></td>
                </tr>-->

                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="alter_customer" value="Ενημέρωση" class='btn btn-primary'/></td>
                </tr>
            </table>
        </form>

        </div>
        </div>


    </body>
</html>
