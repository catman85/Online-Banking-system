<?php
session_start();

if(isset($_SESSION['customer_login']))
    header('location:customer_account_summary.php');
?>

<!DOCTYPE html>

<html>
    <head>

        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
        <meta charset="UTF-8">
        <title>Ελληνική Τρπάπεζα</title>

        <?php include "boot.php"?>
        <?php include "header.php" ?>
    </head>



    <body>
                  <div class="row">
                      <?php include "user_login.php" ?>
                      <?php include "list_modals.php" ?>
                  </div>


                    <div class="row">
                          <div class="col-sm-3 left_panel left_pane">
                            <div class="panel panel-info">
                              <div class="panel-heading"><p>Οι υπηρεσίες που προσφέρουμε είναι:</p></div>
                                  <div class="panel-body">
                                  <ul>
                                      <li>Εγγραφή στην online υπηρεσία</li>
                                      <li>Προσθήκη Λογαριασμού Παραλήπτη</li>
                                      <li>Μεταφορά Χρημάτων</li>
                                      <li>Καταμέτρηση Τελευταίας Σύνδεσης</li>
                                      <li>Πρόσφατη Δραστηριότητα</li>
                                      <li>Αίτηση για Κάρτα και Βιβλίο Επιταγών</li>
                                      <li>Έγκριση απο το Προσωπικό</li>
                                      <li>Δραστηριότητα βάση ημερομηνίας</li>


                                  </ul>
                                </div></div>
                        </div>
                        <div class="col-sm-8 right_panel">
                          <div class="panel panel-info">
                            <div class="panel-heading">    <h3>Προσωπική Τραπεζική</h3></div>
                            <div class="panel-body">    <ul>
                                    <li>Ποτέ μην μοιραστείτε τους μυστικούς κωδικούς σας με κάποιον.</li>
                                    <li>Το "Phishing" είναι μια απόπειρα κλοπής των προσωπικών σας στοιχείων, συνήθως γίνεται μέσω email, τηλεφωνικών κλήσεων και SMS.</li>
                                    <li>Η τραπεζά μας ή οποιοσδήποτε εκπροσωπός μας δέν προκειται ποτέ να σας ζητήσει προσωπικές ή μυστικές πληροφορίες όπως κωδικούς πρόσβασης.</li>
                                    <li>Εάν κάποιος προσπάθησε να αποσπάσει απο εσάς οποιαδήποτε μυστική πληροφορία <a data-toggle="modal" data-target="#myModal5" href="">επικοινωνήστε μαζί μας</a>.</li>
                              </ul></div>
                         </div>
                      </div>
                  </div>
      </div><!--END WRAPPER-->
    </body>
</html>
