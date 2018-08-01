<?php
session_start();

if(!isset($_SESSION['customer_login']))
    header('location:index.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Personal Details</title>

        <link rel="stylesheet" href="newcss.css">
        <?php include "boot.php";?>
        <?php include "header.php";?>
    </head>
<body>
        <div class='content_customer'>

           <?php include 'customer_navbar.php'?>
           <table align=center><tr><td>
            <div class="customer_top_nav">

             <div class="text">Καλωσήρθες <?php include "name.php" ?></div>
            </div>
            </td></tr></table>
            <!-- <br><br><br><br> -->
            <h3 style="text-align:center;color:#2E4372;"><u>Προσωπικές Πληροφορίες</u></h3>

            <?php
                $cust_id=$_SESSION['cust_id'];
                include '_inc/dbconn.php';
                $sql="SELECT * FROM customer WHERE email='$cust_id'";
                $result=  mysqli_query($con, $sql) or die(mysqli_error($con));
                $rws=  mysqli_fetch_array($result);


                $name= $rws[1];
                $account_no= $rws[0];
                $dob=$rws[3];
                $nominee=$rws[4];
                $branch=$rws[10];
                $branch_code= $rws[11];

                $gender=$rws[2];
                $mobile=$rws[7];
                $email=$rws[8];
                $address=$rws[6];

                $last_login= $rws[12];

                $acc_status=$rws[13];
                $acc_type=$rws[5];
?>




          <!-- <div class="customer_body"> -->
            <div class="content3" style="height:220px">
            <p><span class="heading">Όνομα: </span><?php echo $name;?></p>
            <p><span class="heading">Φύλο: </span><?php if($gender=='M') echo "Άνδρας"; else echo "Γυναίκα";?></p>
            <p><span class="heading">Τηλέφωνο: </span><?php echo $mobile;?></p>
            <p><span class="heading">Email: </span><?php echo $email;?></p>
            <p><span class="heading">Διεύθυνση: </span><?php echo $address;?></p>
            </div>
            <div class="content4" style="height:180px">
            <p><span class="heading">Αριθμός Λογαριασμού: </span><?php echo $account_no;?></p>
            <!--<p><span class="heading">Nominee: </span><?php echo $nominee;?></p>-->
            <p><span class="heading">Υποκατάστημα: </span><?php echo $branch;?></p>
            <!-- <p><span class="heading">Κωδικός Υποκαταστήματος: </span><?php echo $branch_code;?></p> -->

            <p><span class="heading">Τύπος Λογαριασμού: </span><?php echo $acc_type;?></p>
            </div>
            </div>
  

    </body>
</html>
