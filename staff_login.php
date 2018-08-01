<?php
session_start();

if(isset($_SESSION['staff_login']))
    header('location:staff_homepage.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
        <meta charset="UTF-8">
        <title>Σύνδεση Υπαλλήλου</title>

        <?php include "boot.php"?>
        <?php include "header.php" ?>
    </head>




<body>
<div class='row'>
      <div class="col-sm-4"></div>
      <div class="col-sm-3 left_panel">
        <div class="panel panel-info">
            <div class="panel-heading caption"><p>Σύνδεση Υπαλλήλου</p></div>
            <div class="panel-body">
          <form action='' method='POST'>
              <table align="center">
                  <!--<tr><td colspan="2"><hr></td></tr>-->
                  <tr><td>E-mail:</td></tr>
                  <tr><td><input type="text" name="uname"></td></tr>
                  <tr><td>Password:</td></tr>
                  <tr><td><input type="password" name="pwd"></td></tr>
                  <tr><td><div class="button1"><input type="submit" name="submitBtn" value="Log In" class="btn btn-primary"></div>
                  </table>
              </form>

                  </div>
                </div>
            <?php
            if(isset($_REQUEST['submitBtn'])){
                include '_inc/dbconn.php';
                $username=mysqli_real_escape_string($con, $_REQUEST['uname']);
                $password=mysqli_real_escape_string($con,$_REQUEST['pwd']);

                $sql="SELECT email,pwd FROM staff WHERE email='$username' AND pwd='$password'";
                $result=mysqli_query($con, $sql) or die(mysqli_error($con));
                $rws=  mysqli_fetch_array($result);



                if($rws[0]==$username && $rws[1]==$password){

                    $_SESSION['staff_login']=1;
                    $_SESSION['staff_id']=$username;

                    echo '<script>window.location.replace("staff_homepage.php");</script>';
                }
                else
                    echo '<div class=" button1 alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Λάθος Κωδικός!</strong></div></td>';
                }

            // echo "</tr></table> </form>";
            ?>
          </div>

  </div>
</div>
</body>
</html>
