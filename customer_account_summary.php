<?php
session_start();

if(!isset($_SESSION['customer_login']))
    header('location:index.php');
?>
<?php
                $cust_id=$_SESSION['cust_id'];
                include '_inc/dbconn.php';
                $sql="SELECT * FROM customer WHERE email='$cust_id'";
                $result=  mysqli_query($con, $sql) or die(mysqli_error($con));
                $rws=  mysqli_fetch_array($result);


                $name= $rws[1];
                $account_no= $rws[0];
                $branch=$rws[10];
                $branch_code= $rws[11];
                $last_login= $rws[12];
                $acc_status=$rws[13];
                $address=$rws[6];
                $acc_type=$rws[5];

                $gender=$rws[2];
                $mobile=$rws[7];
                $email=$rws[8];

                $_SESSION['login_id']=$account_no;
                $_SESSION['name']=$name;
                ?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="newcss.css">
        <?php include "boot.php";?>
        <?php include "header.php";?>
    </head>
    <body>
        <div class='content_customer'>

           <?php include 'customer_navbar.php'?>
            <!-- <div class="customer_top_nav">
             <div class="text">Καλωσήρθες <?php include "name.php" ?></div>
            </div> -->


            <?php
                $sql="SELECT * FROM passbook".$_SESSION['login_id'] ;
                $result=  mysqli_query($con, $sql) or die(mysqli_error($con));
                while($rws=  mysqli_fetch_array($result)){
                  $balance=$rws[7];
                }
              ?>
            <div class="customer_body">
              <table align="center" style='margin:10%'>
                <tr></tr>
                <tr><td></td><td>
                            <div class="admin_staff" style="height:100px">
                        <p><span class="heading">Αριθμός Λογαριασμού: </span><?php echo $account_no;?></p>
                        <p><span class="heading">Υποκατάστημα: </span><?php echo $branch;?></p>
                        <!-- <p><span class="heading">Κωδικός Υπο/τος: </span><?php echo $branch_code;?></p> -->
                      </div></td></tr>
  <tr><td></td><td>
                        <div class="admin_customer" style="align='center' height:140px">
                        <p><span class="heading">Υπόλοιπο: </span><?php echo $balance;?></p>
                        <p><span class="heading">Κατάσταση Λογαριασμού: </span><?php echo $acc_status;?></p>
                        <p><span class="heading">Τελευταία Σύνδεση: </span><?php echo $last_login;?></p>
                      </div></td></tr>
                    </table>

                    </div>

    </body>
</html>
