<?php
session_start();

if(!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>
<!DOCTYPE html>
<?php
include '_inc/dbconn.php';
$sql="SELECT * FROM `staff`";
$result=  mysqli_query($con, $sql) or die(mysqli_error($con));
$sql_min="SELECT MIN(id) from staff";
$result_min=  mysqli_query($con, $sql_min);
$rws_min=  mysqli_fetch_array($result_min);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Staff Details</title>
        <style>
            .displaystaff_content table,th,td {
                padding:6px;
                border: 1px solid #2E4372;
               border-collapse: collapse;
            }
            #button{
                border:none;
            }
        </style>
        <link rel="stylesheet" href="newcss.css">
        <?php include "boot.php";?>
        <?php include "header.php";?>
    </head>

<body>

    <div class="displaystaff_content">
       <?php include 'admin_navbar.php'?>
                    <div class="displaystaff">
                <form action="editstaff.php" method="POST">

                    <table align="center">
                        <caption align='center' style='color:#2E4372'><h3><u>Στοιχεία Υπαλλήλων</u></h3></caption>
                        <th></th>
                        <th>Όνομα</th>
                        <th>Φύλο</th>
                        <th>Γενήθηκε</th>
                        <!--<th>Σχέση</th>-->
                        <th>Εργασία</th>
                        <th>Προσελήφθη</th>
                        <th>Διεύθυνση</th>
                        <!--<th>Κινητό</th>-->
                        <th>email</th>
                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            echo "<tr><td><input type='radio' name='staff_id' value=".$rws[0];
                            if($rws[0]==$rws_min[0]) echo' checked';
                            echo " /></td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[10]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            //echo "<td>".$rws[3]."</td>";
                            echo "<td>".$rws[4]."</td>";
                            echo "<td>".$rws[5]."</td>";
                            echo "<td>".$rws[6]."</td>";
                            //echo "<td>".$rws[7]."</td>";
                            echo "<td>".$rws[8]."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>


                    <table align="center" id='button'>


                    </table>
                    <input type="submit" name="submit1_id" value="Τροποποίηση Στοιχέιων Υπαλλήλων" class='btn btn-primary button_cust2' style='margin-left:330px'>
                    </form>


</div>

    </body>
</html>
