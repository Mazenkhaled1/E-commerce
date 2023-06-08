<?php session_start();?>
<?php include('../databse/connection.php') ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-8 max-auto my-5">
            <h2 class =' border p-2 my-2 text-center'> Register </h2>
            <?php
                if(isset($_SESSION['errors'])) :
                foreach($_SESSION['errors'] as $error) :
            ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php
            endforeach;
            unset($_SESSION['errors']) ;
           endif; 

            ?>

 <?php
$id = $_SESSION['auth']['id'] ;
$sql = " SELECT * FROM `users` WHERE `id` = '$id' " ;
$result= mysqli_query($conn,$sql) ;

$row = mysqli_fetch_assoc($result) ;
 
 ?>
<form action = 'do_edit_user.php'  method ='POST' class = "border p-3 " enctype ='multipart/form-data'>

        <div class="form-group p-2 my-1">
			    <label for ='image'>Image</label>
			    <input type="file" name="image"  class="form-control" id = 'image'  >
                <input type="hidden" name="image" value = '<?= $row['image'] ?>'>
		 </div>


        <div class="form-group p-2 my-1">
                 <label for="name">Name</label>
                 <input type="text" name = 'name' value = '<?= $row['name'] ?>'class = 'form-control' id = 'name'>
       </div>

        

        <div class="form-group p-2 my-1">
                 <label for="email">Email</label>
                 <input type="email" name = 'email' value = '<?= $row['email'] ?>' class = 'form-control' id = 'email'>
        </div >



        <div class="form-group p-2 my-1">
                 <label for="password">Password</label>
                 <input type="password" name = 'password' value = '<?= $row['password'] ?>' class = 'form-control' id = 'password'>
        </div>


        <div class="form-group p-2 my-1">
          <input type="submit" value = 'Edit' class ='form-control' >
       </div > 
</form>    



            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
   