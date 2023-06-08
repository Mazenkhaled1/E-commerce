<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .space{
        display:flex ;
        justify-content:center;
        flex-wrap:wrap;
        flex-direction:center;
      }
    </style>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="../ecommerce-dashboard-main/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>


<input type="checkbox" id="mobile-menu" />

<div class="sidebar">
  <div class="logo">
  <i class="fa-solid fa-dumbbell"></i>
    <h2>welcome</h2>
  </div>
  <div class="menu">
    <ul>
      <li><a href="../index.php "  style="color: white;" ><i class="fa fa-home"></i>Home</li></a>
      <li><a href="cart.php" style="color: white;" ><i class="fa fa-user"></i> Cart</li></a>
      <li><a href="signOut.php"  style="color: white;"><i class="fa fa-sign-out-alt"></i> Sign Out</li></a>
    </ul>
  </div>
</div>

<label for="mobile-menu" id="mmenu">
  <i class="fa fa-bars"></i>
  <i class="fa fa-times"></i>
</label>

<div class="content">
  <div class="top">
    <div class="search">
      <input type="text" placeholder="Search Product" />
      <i class="fa fa-search"></i>
    </div>
    <div class="user">
      <span><?php echo$_SESSION['auth']['name'];?></span>
      <i class="fas fa-chevron-down"></i>
    </div>
  </div>


    <!-- Page Heading -->
<h1 class="h3 mb-3 text-center text-gray-800">profile</h1>





<div class="container">
<?php if(isset($_SESSION['success'])): ?>

<div class="alert alert-success">
    <?= $_SESSION['success']; ?>
</div>

<?php 

endif; 

unset($_SESSION['success']);

?>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0 ">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="p-5 d-flex justify-content-between">
                            <div class="form-group d-flex justify-content-center mr-3">
                            <img class=" img-fluid rounded"
                                    src="img/<?= $_SESSION['auth']['image'] ?>" width = '300' height = '300'>
                            </div>
                        <div>
                            <div class="form-group ">
                                    <p>name : <?= $_SESSION['auth']['name'] ?></p>
                            </div>
                            <div class="form-group ">
                                    <p>email : <?= $_SESSION['auth']['email'] ?></p>
                            </div>
                            <div class="form-group ">

                            <?php if(isset($_SESSION['auth'] ) && $_SESSION['auth']['permision'] == 'admin' ) : ?>
                                        <a type="submit" href='edit_admin.php' class='btn btn-success'>edit profile</a>
                                        <?php endif;  ?>
                                        <?php if(isset($_SESSION['auth'] ) && $_SESSION['auth']['permision'] == 'user' ) : ?>
                                        <a type="submit" href='edit_user.php' class='btn btn-success'>edit profile</a>
                                        <?php endif;  ?>
                                        
                            </div>  
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    unset($_SESSION['errors']);
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>