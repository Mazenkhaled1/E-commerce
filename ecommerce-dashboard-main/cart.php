<?php
session_start () ;

?>


<?php include('../inc/header.php') ; ?>
<input type="checkbox" id="mobile-menu" />
<div class="sidebar">
  <div class="logo">
  <i class="fa-solid fa-dumbbell"></i>
    <h2>welcome</h2>
  </div>
  <div class="menu">
    <ul>
      <li><a href="../index.php" style="color: white;"><i class="fa fa-home"></i>Home</li></a>
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
      <th scope="col">title</th>
      <th scope="col">price</th>
      <th scope="col">Delete</th>
      
      
    </tr>
</thead>
<tbody>
<?php

if(isset($_SESSION['cart'])) :
foreach($_SESSION['cart'] as $key => $value):
    $sql = "SELECT * FROM `products` WHERE `id` = '$value' " ;
    $resutl = mysqli_query($conn,$sql) ; 
    $row = mysqli_fetch_assoc($resutl) ;
?>

    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td><img style = 'max-width:160px ' src="img/<?= $row['image'];?>" alt=""/></td>
      <td><?= $row['title'] ?></td>
      <td><?= $row['price'] ?></td>
      <td> 
        <a href="delete_cart.php?id=<?=$key?>"> <button type="button" class="btn-close" aria-label="Close"></button></a>
    </td>
    </tr>


<?php
endforeach; 

endif;
?>

</tbody>
</table>
</div>
<div class="d-grid gap-2 p-5">
     <a href="submit_cart.php"class="btn btn-primary " style ='background-color:#5443c3'  type="button"Button>Add</a>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include('../inc/footer.php') ; ?>