<?php include('../inc/header.php') ; ?>
<?php session_start() ; ?>

<input type="checkbox" id="mobile-menu" />

<div class="sidebar">
  <div class="logo">
  <i class="fa-solid fa-dumbbell"></i>
    <h2>welcome</h2>
  </div>
  <div class="menu">
    <ul>
      <li><a href="../index.php"></a><i class="fa fa-home"></i>Home</li>
      <li><a href="profile.php" style="color: white;"  ><i class="fa fa-user"></i> Profile</li></a>
      <li><a href="signOut.php"  style="color: white;"><i class="fa fa-sign-out-alt"></i> Sign Out</li></a>
    </ul>
  </div>
</div>
<div class="container">
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0 ">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="p-5 d-flex justify-content-between">


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">Delete</th>
      
      
    </tr>
</thead>
<tbody>
<?php

$sql = " SELECT * FROM `users` " ;
$result = mysqli_query($conn,$sql) ;
if(!empty($result)) :

    while($row = mysqli_fetch_assoc($result)): 
?>
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td><img style = 'max-width:160px ' src="img/<?= $row['image'];?>" alt=""/></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['email'] ?></td>
      <td> 
        <a href="delete_table.php?id=<?= $row['id'] ?>"> <button type="button" class="btn-close" aria-label="Close"></button></a>
    </td>
    </tr>


<?php endwhile ; endif;  ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include('../inc/footer.php') ; ?>