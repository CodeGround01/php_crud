<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP||CRUD</title>
</head>
<body>
    <?php
      include 'config.php';
        if (isset($_POST['submit'])) {
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
    
                     $insertquery ="insert into user(user_name,user_email,user_address,user_image) 
                     values('$name','$email','$address','$image')";
                     $iquery=mysqli_query($con,$insertquery);
                     if ($iquery) {
                        ?>
                        <script>alert('User Registered Successfully!!!');</script>
                       <?php
                     }else {
                        ?>
                        <script>alert('Fill Form Carefully!!!');</script>
                       <?php
                     }
                 }

    ?>
    <form  method="post" enctype="multipart/form-data">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter Name">
        <br><br>
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter Email">
        <br><br>
        <label>Address</label>
        <input type="text" name="address" placeholder="Enter Address">
        <br><br>
        <label>Select File</label>
        <input type="file" name="image">
        <br><br>
        <input type="submit" value="submit" name="submit">
    </form>
    <hr>
       <h3>User List</h3>
     <table style="width:80%; border:1; text-align:center;">
         <tr>
             <th>Sr#</th>
             <th>Name</th>
             <th>Email</th>
             <th>Address</th>
             <th>User Image</th>
             <th>Operations</th>
         </tr>
         <?php
           $squery ="select * from user";
            $qry =mysqli_query($con,$squery);
            if ($qry->num_rows>0) {
               while ($row =$qry->fetch_assoc()) { 
                   $id = $row['user_id'];
                  $name= $row['user_name']; 
                  $email= $row['user_email']; 
                  $address= $row['user_address'];
                  $image= $row['user_image']; 

                  echo"
                  <tr>
                  <td>$id</td>
                  <td>$name</td>
                  <td>$email</td>
                  <td>$address</td>
                  <td><img src='images/$image' width='50px' height='50px' style='border-radius: 5px'></td>
                  <td>
                      <a href='edit.php?id=$id'>Edit</a>
                      <a href='delete.php?id=$id' onclick='return confirm('Are You Sure?')'>Delete</a>
                  </td>
                </tr>   
                  ";
                  
         ?>
        
         <?php
        }
    }
        ?>
     </table>
</body>
</html>