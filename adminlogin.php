<?php
session_start();

if(isset($_SESSION['admin_login']))
    header('location:admin_hompage.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
        <meta charset="UTF-8">
        <title>Σύνδεση Διαχειριστή</title>

        <?php include "boot.php";?>
        <?php include "header.php";?>
    </head>

<body>
<div class='row'>
    <div class="col-sm-4"></div>
    <div class="col-sm-3 left_panel">
    <div class="panel panel-info">
        <div class="panel-heading caption"><p>Σύνδεση Διαχειριστή</p></div>
        <div class="panel-body">
    <form action='' method='POST'>
        <table align="center">

            <tr><td>Username:</td></tr>
            <tr><td><input type="text" name="uname" required></td></tr>
            <tr><td>Password:</td></tr>
            <tr><td><input type="password" name="pwd" required></td></tr>
            <tr><td><div class="button1"><input type="submit" name="submitBtn" value="Log In" class="btn btn-primary"></div>
        </table>
    </form>

        </div>
      </div>

<?php
      if(isset($_REQUEST['submitBtn'])){
          include '_inc/dbconn.php';
          $username=  mysqli_real_escape_string($con, $_REQUEST['uname']);
          $password=  mysqli_real_escape_string($con, $_REQUEST['pwd']);

          $sql="SELECT * FROM admin WHERE id='1'";
          $result=mysqli_query($con, $sql);
          $rws=  mysqli_fetch_array($result);

                if($username==$rws[8] && $password==$rws[9]) {
                    $_SESSION['admin_login']=1;
                    // header('location:admin_hompage.php'); we can't use the header function because we have already sent oputput starting with the header
                    echo '<script>window.location.replace("admin_hompage.php");</script>';
                  }else{
                    echo '<div class=" button1 alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Λάθος Κωδικός!</strong></div></td>';
                  }
        }
?>
</div>

</div>
</div>
</body></html>
