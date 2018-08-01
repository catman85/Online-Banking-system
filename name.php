<?php
  //ένα σκριπτακι για τα ελληνικά ονόματα ανδρών
  //Πρόβλημα: Καλησπέρα Κώστας
  $nm = $_SESSION['name'];
  if(substr($nm,-2)=='ς'){
    echo substr($nm, 0, -2);
   }else{
     echo $nm;
   }
?>
