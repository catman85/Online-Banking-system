<div class="col-sm-3 left_panel">
  <div class="panel panel-info">
      <div class="panel-heading caption"><p>Σύνδεση Πελάτη</p></div>
      <div class="panel-body">
    <form action='' method='POST'>
          <table align="left">

              <!--<tr><td colspan="2"><hr></td></tr>-->
              <tr><td>E-mail:</td></tr>
              <tr><td><input type="text" name="uname" required></td> </tr>
              <tr><td>Password:</td></tr>
              <tr><td><input type="password" name="pwd" required></td></tr>

               <tr><td><div class="button1"><input type="submit" name="submitBtn" value="Log In" class="btn btn-primary"></div></td></tr>

          </table>
    </form></div></div>
    </div>


<?php
if(isset($_REQUEST['submitBtn'])){
    include '_inc/dbconn.php';
    $username=$_REQUEST['uname'];

    //salting of password
    $salt="@g26jQsG&nh*&#8v";
    $password= sha1($_REQUEST['pwd'].$salt);

    $sql="SELECT email,password FROM customer WHERE email='$username' AND password='$password'";
    $result=mysqli_query($con, $sql) or die(mysqli_error($con));
    $rws=  mysqli_fetch_array($result);

    $user=$rws[0];
    $pwd=$rws[1];

    if($user==$username && $pwd==$password){
        // session_start();
        $_SESSION['customer_login']=1;
        $_SESSION['cust_id']=$username;
    // header('location:customer_account_summary.php'); we can't use the header function becasue we have html code above us
        echo '<script>window.location.replace("customer_account_summary.php");</script>';
    }

    else{
        // header('location:index.php');
        // echo '<div class="row"><div class="button1 alert alert-danger alert-dismissable fade in" style="width:200px"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Λάθος Κωδικός!</strong></div></td></div>';
        echo '<script>window.location.replace("index.php");</script>';
    }
}
?>
