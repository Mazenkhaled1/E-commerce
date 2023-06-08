<?php session_start() ; ?>
<?php include('databse/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ecommerce Dashboard</title>
    <!-- Font Awesome -->
    <link
      rel="ecommerce-dashboard-main/stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="ecommerce-dashboard-main/css/style.css" />
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
          <li><i class="fa fa-home"></i>Home</li>
          <li><a href="ecommerce-dashboard-main/profile.php" style="color: white;"  ><i class="fa fa-user"></i> Profile</li></a>
          <li><a href="ecommerce-dashboard-main/cart.php" style="color: white;"  ><i class="fa fa-user"></i> Cart</li></a>
          <?php if(isset($_SESSION['auth'] ) && $_SESSION['auth']['permision'] == 'admin' ) : ?>
          <li><a href="ecommerce-dashboard-main/users.php" style="color: white;"  ><i class="fa fa-user"></i> Users</li></a>
          <?php endif; ?>
          <li><a href="ecommerce-dashboard-main/signOut.php"  style="color: white;"><i class="fa fa-sign-out-alt"></i> Sign Out</li></a>
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
          <i class="fas fa-wallet"></i>
          <i class="fa fa-envelope" aria-hidden="true"></i>
          <label style="position: relative">
            <i id="bell" class="fa fa-bell" aria-hidden="true"></i>
          </label>

          <span><?php echo$_SESSION['auth']['name'];?></span>
          <i class="fas fa-chevron-down"></i>
        </div>
      </div>

      <h2 id="heading">Categories</h2>
      <div class="categories">
        <div class="category">
          <a href="ecommerce-dashboard-main/supplments.php" style="color: white;" ><h3>Supplments</h3></a>
          <img src="ecommerce-dashboard-main/img/dumbbell.webp" alt="" />
        </div>

        <div class="category">
          <a href="ecommerce-dashboard-main/vitamins.php" style="color: white;" ><h3>Vitamins</h3></a>
          <img src="ecommerce-dashboard-main/img/dumbbell.webp" alt="" />
        </div>

        <div class="category">
          <a href="ecommerce-dashboard-main/equipment.php" style="color: white;" ><h3>Equipments</h3></a>
          <img src="ecommerce-dashboard-main/img/dumbbell.webp" alt="" />
        </div>
      </div>

      <div class="all-products">
        <div class="title">
          <h2>All Products</h2>
        </div>

        <div class="products">
          <div class="product">
            <i class="fa fa-shopping-cart"></i>
            <img src="https://www.maxmuscleelite.com/web/image/product.template/7413/image_512/%5B6222023702073%5D%20Max%20Muscle%20No%20Joke%20Hardcore%20Pre-workout%20Reda%20Ragab%20Signature%20Series-60Serv.-579G.-Fruit%20Punch?unique=cf7dd79" alt="" />
            <div class="subtitle">
              <div class="name">
                <h5>Max Muscle No Joke</h5>
              </div>
              <div class="price"><h1>24.3 $</h1></div>
            </div>
          </div>

          <div class="product">
            <i class="fa fa-shopping-cart"></i>
            <img src="https://www.maxmuscleelite.com/web/image/product.template/1408/image_512/%5B631656710496%5D%20Muscletech%20Nitrotech%20100%25%20Whey%20Gold-69Serv.-2.27KG-Double%20Rich%20Chocolate?unique=cf7dd79" alt="" />
            <div class="subtitle">
              <div class="name">
                <h5>Muscletech Nitrotech</h5>
              </div>
              <div class="price"><h1>34.3 $</h1></div>
            </div>
          </div>

          <div class="product">
            <i class="fa fa-shopping-cart"></i>
            <img src="https://www.maxmuscleelite.com/web/image/product.product/1905/image_1920/%5B748927024524%5D%20Optimum%20Nutrition%20Opti-Women-60Serv.-120Caps.?unique=13788fe" alt="" />
            <div class="subtitle">
              <div class="name">
                <h5>Optimum Nutrition Opti-Women</h5>
              </div>
              <div class="price"><h1>33.4 $</h1></div>
            </div>
          </div>
        </div>

        <div class="products">
          <div class="product">
            <i class="fa fa-shopping-cart"></i>
            <img src="https://www.maxmuscleelite.com/web/image/product.product/6171/image_1920/%5B8437005602533%5D%20Stevia%20Castello-60Sachets?unique=8ba5a20" alt="" />
            <div class="subtitle">
              <div class="name">
                <h5>Stevia Castello</h5>
              </div>
              <div class="price"><h1>53.4 $</h1></div>
            </div>
          </div>

          <div class="product">
            <i class="fa fa-shopping-cart"></i>
            <img src="https://www.maxmuscleelite.com/web/image/product.product/5934/image_1920/%5B6224009096091%5D%20Max%20Muscle%20Traditional%20Lifting%20Straps?unique=6e32bda" alt="" />
            <div class="subtitle">
              <div class="name">
                <h5>Max Muscle Traditional Lifting Straps</h5>
              </div>
              <div class="price"><h1>16.4 $</h1></div>
            </div>
          </div>

          <div class="product">
            <i class="fa fa-shopping-cart"></i>
            <img src="https://www.maxmuscleelite.com/web/image/product.product/6998/image_1920/%5B6222023700932%5D%20Organic%20Nation%20Shaker%20With%20plastic%20shaking%20Ball-700Ml-Dark%20Green?unique=1702546" alt="" />
            <div class="subtitle">
              <div class="name">
                <h5>Organic Nation Shaker With plastic shaking</h5>
              </div>
              <div class="price"><h1>84.4 $</h1></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>
