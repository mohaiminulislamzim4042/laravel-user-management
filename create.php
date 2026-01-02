<?php include 'db.php';?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Add New User</h2>
    <form action="" method="POST">
     <input type="text" name="name" placeholder="YOUR NAME"required>
     <input type="email" name="Email" placeholder="YOUR E-MAIL"required>
     <input type="SUBMIT" name="submit" value="Create">
    </form>

</div>
<?php 
if(isset ($_post['submit'])){
$name =$_post['name'];
$email =$_post['email'];
mysqli_query($conn,"INSERT INTO user users (name,Email) VALUES ('$name','$email')");

}