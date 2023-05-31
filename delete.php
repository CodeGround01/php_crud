<?php
  include 'config.php';
   $id =$_GET['id'];
   $dquery ="delete from user where user_id='$id'";
    $query =mysqli_query($con,$dquery);
      if ($query) {
          header('location:index.php');
      }else {
        ?>
        <script>alert('Some Database Issue!!!');</script>
       <?php
      }


?>