<?php
session_start();

if(!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>
<!DOCTYPE html>
<?php
include '_inc/dbconn.php';
$id=  mysqli_real_escape_string($con, $_REQUEST['staff_id']);
$sql="SELECT * FROM `staff` WHERE id=$id";
$result=  mysqli_query($con, $sql) or die(mysqli_error($con));
$rws=  mysqli_fetch_array($result);
?>
<?php
                        $delete_id=  mysqli_real_escape_string($con, $_REQUEST['staff_id']);
                        if(isset($_REQUEST['submit2_id'])){
                            $sql_delete="DELETE FROM `staff` WHERE `id` = '$delete_id'";
                            mysqli_query($con, $sql_delete) or die(mysqli_error($con));
                            header('location:delete_staff.php');
                        }
                        ?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="newcss.css"/>
        <title>Τροποποίηση Υπαλλήλου</title>
        <?php include "boot.php";?>
        <?php include "header.php";?>
    </head>
<body>
        <div class='content_addstaff'>
    <?php include 'admin_navbar.php'?>
                <div class='addstaff'>
                <form action="alter_staff.php" method="POST">
            <table align="center" >
                <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
                <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Edit Staff Details</u></h3></td></tr>
                <tr>
                    <td>Όνομα</td>
                    <td><input type="text" name="edit_name" value="<?php echo $rws[1];?>" required=""/></td>
                </tr>
                <tr>
                    <td>Φύλλο</td>
                    <td>
                        Α<input type="radio" name="edit_gender" value="M" <?php if($rws[10]=="M") echo "checked";?>/>
                        Γ<input type="radio" name="edit_gender" value="F" <?php if($rws[10]=="F") echo "checked";?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Γενέθλια
                    </td>
                    <td>
                        <input type="date" name="edit_dob" value="<?php echo $rws[2];?>"/>
                    </td>
                </tr>

                <tr>
                    <td>Κατάσταση</td>
                    <td>
                        <select name="edit_status">
                            <option <?php if($rws[3]=="unmarried") echo "selected";?>>ανύπαντρος</option>
                            <option <?php if($rws[3]=="married") echo "selected";?>>παντρεμένος</option>
                            <option <?php if($rws[3]=="divorced") echo "selected";?>>διαζευγμένος</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Ιδικότητα</td>
                    <td>
                        <select name="edit_dept">
                            <option <?php if($rws[4]=="revenue") echo "selected";?>>revenue</option>
                            <option <?php if($rws[4]=="developer") echo "selected";?>>developer</option>
                            <option <?php if($rws[4]=="security") echo "selected";?>>security</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Ημ/νία Πρόσληψης
                    </td>
                    <td>
                        <input type="date" name="edit_doj" value="<?php echo $rws[5];?>"/>
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
                    <td>Email id</td>
                    <td><input type="text" name="edit_mobile" value="<?php echo $rws[8];?>" required=""/></td>
                </tr>-->

                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="alter" value=Ενημέρωση class='btn btn-primary'/></td>
                </tr>
            </table>
        </form>


                </div>
                </div>
    </body>
</html>
