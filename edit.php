<?php include 'db.php';
    $id = $_GET['id'];
    $user = mysqli_fetch_assoc (mysqli_query($conn,"SELECT * FROM users WHERE id=$id"));
?>

    <link rel="stylesheet" href="style.css">
    <div class="container">
        <h2>Edit User</h2>
        <form action="" method="post">
            <input type="text" name="name" value="<?=$user['name']?>" required>
            <input type="email" name="email" value="<?=$user['email']?>" required>
            <input type="submit" name="update" value="Update">
        </form>
   </div>

   <?php 
       if(isset($_POST['Update'])){
           $name = $_POST['name'];
           $email = $_POST['email'];
           mysqlin_query($conn,"UPDATE users SET name='$name', email='$email' WHERE id=$id");
           header("Location: index.php");
       }
       ?>