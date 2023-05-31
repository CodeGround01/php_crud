<?php
  $server ="localhost";
  $user ="root";
  $password ="";
  $db ="php_crud";
    
     $con = mysqli_connect($server,$user,$password,$db);
     if ($con) {
         ?>
          <script>alert('Database Connected');</script>
         <?php
     }else {
        ?>
        <script>alert('Database Not Connected');</script>
       <?php
     }
?>