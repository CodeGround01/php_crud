<?php
  include 'config.php';
   $id =$_GET['id'];
   $equery ="select * from user where user_id='$id'";
    $query =mysqli_query($con,$equery);
      if ($query) {
          while ($row =$query->fetch_assoc()) {
               $name =$row['user_name'];
               $email =$row['user_email'];
               $address =$row['user_address'];
               $image =$row['user_image'];
          }
      }else {
        ?>
        <script>alert('Some Database Issue!!!');</script>
       <?php
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit||User</title>
</head>
<body>
   <?php
      if (isset($_POST['update'])) {
           $name =$_POST['name'];
           $email =$_POST['email'];
           $address =$_POST['address'];
            
           $image = $_FILES['image']['name'];
	          $target = "images/".basename($image);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                 header('location:index.php');
            }else{
                header('location:inex.php');
            }
             
              $uquery ="update user set user_name='$name',user_email='$email',user_address='$address',user_image='$image' where user_id='$id'";
               $uqry =mysqli_query($con,$uquery);
                if ($uqry) {
                    header('location:index.php');
                }else {
                  ?>
                  <script>alert('User Not Updated Now!!!');</script>
                 <?php
                }
      }

    ?>
<form  method="post" enctype="multipart/form-data">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <br><br>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
        <br><br>
        <label>Address</label>
        <input type="text" name="address" value="<?php echo $address; ?>">
        <br><br>
        <label>User Image</label>
        <input type="file" name="file" value=""><br>
        <img src='<?php echo"images/$image" ?>' width='50px' height='50px' style='border-radius: 5px'>
        <br><br>
        <input type="submit" value="update" name="update">
    </form>
</body>
</html>