<?php 
include 'db.php';
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>User Management</h2>
<a href="create.php"class="button">Add New</a>
<table>
    <tr>
        <th>Name</th>
        <th>E-Mail</th>
        <th>E-Action</th>
    </tr>
    <?php
          $result=mysqli_query($conn,"SELECT * FROM user");
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>{$row['ID']}<td>
             <td>{$row['name']}<td>
              <td>{$row['email']}<td>
              <td>
              <a class='button' href='edit.php?id={$row['id']}'>Edit</a>
              <a class='button' href='delete.php?if={$row['id']}'
               onclick=\"return confirm('ARE YOU SURE?')\">Delete</a>
</td>
</tr>";
            
          }
    ?>
</table>
</div>