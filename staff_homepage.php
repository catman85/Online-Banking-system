<?php
session_start();

if(!isset($_SESSION['staff_login']))
    header('location:staff_login.php');
?>
 <?php
                $staff_id=$_SESSION['staff_id'];
                include '_inc/dbconn.php';
                $sql="SELECT * FROM staff WHERE email='$staff_id'";
                $result=  mysqli_query($con, $sql) or die(mysqli_error($con));
                $rws=  mysqli_fetch_array($result);

                $id=$rws[0];
                $name=$rws[1];
                $dob=$rws[2];
                $department=$rws[4];
                $doj=$rws[5];
                $mobile=$rws[7];
                $email=$rws[8];
                $gender=$rws[10];
                $last_login=$rws[11];

                $_SESSION['login_id']=$email;
                $_SESSION['name1']=$name;
                $_SESSION['id']=$id;
                ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Staff Home</title>

        <link rel="stylesheet" href="newcss.css">
        <?php include "boot.php";?>
        <?php include "header.php";?>
    </head>
<body>

        <div class="displaystaff_content">

           <?php include 'staff_navbar.php'?>
           <table align=center><tr><td>
           <div class="staff_top_nav">
            <div class="text">Καλωσήρθες <?php echo $_SESSION['name1']?></div>
          </div></td></tr></table>

            <!-- <div class="staff_body"> -->
             <table align=center><tr><td>
             <div class="content1" style="height:140px; padding:10px;">
                <p><span class="heading">Όνομα: </span><?php echo $name;?></p>
            <p><span class="heading">Ειδικότητα: </span><?php echo $department;?></p>
            <p><span class="heading">Email: </span><?php echo $email;?></p>
            </div></td></tr></table>
             <table align=center><tr><td>
             <div class="content2" style="height:110px">
            <p><span class="heading">Προσλήφθηκες: </span><?php echo $doj;?></p>
            <p><span class="heading">Τελευταία Σύνδεση: </span><?php echo $last_login;?></p>
            </div></td></tr></table>
            </div>
        <!-- </div> -->
<?php
$date1=date('Y-m-d H:i:s');
$_SESSION['staff_date']=$date1;
?>
</body>
