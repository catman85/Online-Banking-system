<?php
session_start();

if(!isset($_SESSION['customer_login']))
    header('location:index.php');
?>
<?php
                $sender_id=$_SESSION["login_id"];
                $sender_name=$_SESSION["name"];

                $Payee_name=$_REQUEST['name'];
                $acc_no=$_REQUEST['account_no']; //receiver_customer_id
                $branch=$_REQUEST['branch_select'];
                $ifsc=$_REQUEST['ifsc_code'];

                //Beneficiary query
                //looks for login_id and account number of receiver
                include '_inc/dbconn.php';
                $sql1="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND reciever_id='$acc_no'";
                $result1=  mysqli_query($con, $sql1);
                $rws1=  mysqli_fetch_array($result1);
                $s1=$rws1[1];//sender_id
                $s2=$rws1[3];//receiver_id




                //Customer Query
                //search for the receiving customer by the account number we provide
                $sql="SELECT * FROM customer WHERE id='$acc_no'";
                $result=  mysqli_query($con, $sql) or die(mysqli_error($con));
                $rws=  mysqli_fetch_array($result) ; //εδώ πρέπει να έχουμε μια γραμμή με έναν πελάτη









                //$rws[0]==receiver_id
                if($sender_id==$rws[0]) //can't send request to himself
                {
                      echo '<script>alert("You cant add yourself as a beneficiery!");';
                      echo 'window.location= "add_beneficiary.php";</script>';
                }
                //beneficiary query already exists ($s1,$s2  are in db) ($sender_id,$acc_no  are user input)
                elseif($s1==$sender_id && $s2==$acc_no)
                {
                      echo '<script>alert("You cant add a beneficiery twice!");';
                      echo 'window.location= "add_beneficiary.php";</script>';
                }
                /*
                $rws[0]==customer id
                $rws[1]==cust_name
                $rws[11]==cust_branch
                $rws[12]==cust_ifsc
                */
                elseif($rws[1]!=$Payee_name && $rws[0]!=$acc_no && $rws[11]!=$branch)// && $rws[12]!=$ifsc
                {
                echo '<script>alert("Beneficiary Not Found!\nPlease enter correct details");';
                     echo 'window.location= "add_beneficiary.php";</script>';
                }


                else{

                $status="PENDING";
                $sql="insert into beneficiary1 values(default,'$sender_id','$sender_name','$acc_no','$Payee_name','$status')";
                mysqli_query($con, $sql) or die(mysqlii_error($con));
                header("location:display_beneficiary.php");
                }
