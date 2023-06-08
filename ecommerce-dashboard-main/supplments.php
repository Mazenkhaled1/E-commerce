<?php session_start(); ?>
<?php include('../inc/header.php');?>
<input type="checkbox" id="mobile-menu" />

    <div class="sidebar">
      <div class="logo">
      <i class="fa-solid fa-dumbbell"></i>
       
      </div>
      <div class="menu">
        <ul>
          <li><i class="fa fa-home"><a href="../index.php" style="color: white;" ></i> Home</li></a>
          <li><a href="profile.php" style="color: white;"  ><i class="fa fa-user"></i> Profile</li></a>
          <li><a href="cart.php" style="color: white;"  ><i class="fa fa-user"></i> Cart</li></a>
          <?php if(isset($_SESSION['auth'] ) && $_SESSION['auth']['permision'] == 'admin' ) : ?>
          <li><i class="fa-sharp fa-solid fa-plus"><a href="add.php" style="color: white;" ></i> Add</li></a>
          <?php endif; ?>

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

      <div class="all-products">
        <div class="title">
          <h2>Supplments</h2>
        </div>
         <!-- categories -->
        <div class="products space">
            <?php 
            $sql = " SELECT * FROM `products` WHERE `category_id` = 1 ";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)):
              ?>
            <div class="product">
            <i class="fa fa-shopping-cart"></i>
            <img src="img/<?= $row['image'];?>" alt="" />
            <div class="addbutton">
              <form action="delete.php" method ='GET'>
                <input type="hidden" value= '<?= $row['id']?>' name ='id'>
                <?php if(isset($_SESSION['auth'] ) && $_SESSION['auth']['permision'] == 'admin' ) : ?>
                <button class="addtocart">Delete</button>
                <?php endif;  ?>
              </form>
              <form action="../handelers/handelCart.php" method ='POST'>
                <input type="hidden" value= '<?= $row['id']?>' name ='id'>
                <?php if(isset($_SESSION['auth'] ) && $_SESSION['auth']['permision'] == 'user' ) : ?>
                <button class="addtocart">Add To Cart</button>
                <?php endif;?>
              </form>
              <form action="edit.php" method ='GET'>
                <input type="hidden" value= '<?= $row['id']?>' name ='id'>
                <?php if(isset($_SESSION['auth'] ) && $_SESSION['auth']['permision'] == 'admin' ) : ?>
                <button class="addtocart">Edit</button>
                <?php endif; ?>
              </form>
            </div>
            <div class="subtitle">
              <div class="name">
                <h5><?= $row['title'];?></h5>
              </div>
              <div class="price"><h1><?= $row['price']. '$' ?></h1></div>
            </div>
          </div>
          <?php 
          endwhile ;
          ?> 

          </div>
        </div>
      </div>
    </div>
<?php include('../inc/footer.php') ;?>