<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($className) {
    require './app/models/' . $className . '.php';
});

$productModel = new ProductModel();
$perPage = 4;
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

// $totalRow = $productModel->getTotalProduct();

$productList = $productModel->getProductList($perPage, $page);

$categoryModel = new CategoryModel();
$categoryList = $categoryModel->getCategoryList();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Project BackEnd</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://mooxdronestore111.000webhostapp.com/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://mooxdronestore111.000webhostapp.com/public/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="https://mooxdronestore111.000webhostapp.com/public/css/styles.css">
</head>

<body>
<?php
    // if (isset($_SESSION["isLoginUser"]) && $_SESSION["isLoginUser"] == true)
    // {
  ?>
  <div class="container">
    <form action="<?php echo BASE_URL;?>/result.php" method="get">
      <div class="input-group col-md-4">
        <input class="btn border-right-0 border" type="submit" value="Search">
        <input class="form-control border-left-0 border" type="text" id="example-search-input" name="keyword">
      </div>
    </form>
  </div>

  <div class="cart">
    <div class="container">
      <a href="#"><i class="fas fa-shopping-cart"></i><span>(0)</span></a>
      <a href="#"><i class="fas fa-balance-scale"></i><span>(0)</span></a>
      <a href="login.php" alt="login"><i class="fas fa-user"></i></a>
    </div>
  </div>

  <header class="top-header">
    <nav class="navbar navbar-expand-sm navbar-light bg-nav">
      <div class="container">
        <a href="https://mooxdronestore111.000webhostapp.com/index.php">
          <img src="https://mooxdronestore111.000webhostapp.com/public/images/logo.png" alt="logo" class="img-fluid">
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
          aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="https://mooxdronestore111.000webhostapp.com/index.php">HOME
                <span class="sr-only">(current)</span></a>
            </li>
            <?php
                foreach ($categoryList as $cat) {
                $catName = strtolower(str_replace(' ', '-', $cat['category_name']));
              ?>
            <li class="nav-item active">
              <a class="nav-link"
                href="https://mooxdronestore111.000webhostapp.com/category.php/<?php echo $catName . '-' . $cat['category_id'] ?>"><?php echo strtoupper($cat['category_name']); ?></a>
            </li>
            <?php
                }
              ?>
            <li class="nav-item active">
              <a class="nav-link" href="#">CONTACTS
                <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">BLOG <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="banner">
      <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
          <div class="carousel-item active mr-auto mt-2 mt-lg-0">
            <img src="https://mooxdronestore111.000webhostapp.com/public/images/slider-01.jpg" alt="Flycam Erida" class="img-fluid">
            <div class="carousel-caption">
              <h1 class="text">Cam-equipped <br> Quadcopters</h1>
              <p class="text-nav">Purchase one of these copters and enable yourself
                <br> to take 4K quality videos and photos!</p>
              <div class="canh-0">
                <p><a class="shop-1" href="https://mooxdronestore111.000webhostapp.com/index.php">Shop Now!</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://mooxdronestore111.000webhostapp.com/public/images/slider-02.jpg" alt="Flycam 3DR" class="img-fluid">
            <div class="carousel-caption">
              <p class="sale-1">Drones, quadcopters, hexacopter and octocopters all come at a staggering 10% discount
                this summer! </p>
              <h1 class="sale-2">10% OFF</h1>
              <h3 class="sale-3">Your 1st Drone!</h3>
              <div class="canh-1">
                <p><a class="shop-2" href="https://mooxdronestore111.000webhostapp.com/index.php">Shop Now!</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://mooxdronestore111.000webhostapp.com/public/images/slider-3.jpg" alt="Flycam EPD" class="img-fluid">
            <div class="carousel-caption">
              <h2 class="text-1">Variety of <br> Gimbals</h2>
              <p class="text-2">On par with a wide range of drones,
                <br> we also offer a wide variety of gimbals!</p>
              <div class="canh-2">
                <p><a class="shop-3" href="https://mooxdronestore111.000webhostapp.com/index.php">Shop Now!</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </div>
  </header>
  <br>

  <section class="bg-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="https://mooxdronestore111.000webhostapp.com/public/images/mt-1169_home_bg01.png" alt="flycam-1" class="img-fluid">
          <div class="centered">
            <h2><b>DJI Ph<span>antom 4</span></b></h2>
            <a href="https://mooxdronestore111.000webhostapp.com/index.php">SHOP NOW!</a>
          </div>
        </div>
        <div class="col-md-6">
          <img src="https://mooxdronestore111.000webhostapp.com/public/images/mt-1169_home_bg02.png" alt="flycam-2" class="img-fluid">
          <div class="centered">
            <h2><b>DJI Ph<span>antom 4</span></b></h2>
            <a class="text-shopnow" href="https://mooxdronestore111.000webhostapp.com/index.php">SHOP NOW!</a>
          </div>
        </div>
      </div>
    </div>

    <div class="top-rated">
      <div class="container">
        <center>
        <h2>
          Top Rated Drones & Quadcopters
        </h2>
        </center>
        <p>
          What differs our drone store from the rest of the crowd is our range and prices!
        </p>
      </div>
    </div>

    <div class="drones">
      <div class="container">
        <div class="row">
          <?php
          foreach ($productList as $item) {
          ?>
          <div class="col-md-3">
            <div class="item">
              <img class="img-fluid" src="https://mooxdronestore111.000webhostapp.com/public/images/<?php echo $item['product_image'];?>">
              <a href="https://mooxdronestore111.000webhostapp.com/product.php?id=<?php echo $item['product_id'];?>" class="none-decor">
                <h5><?php echo $item['product_name'];?></h5>
              </a>
              <p><?php echo "$".$item['product_price'];?></p>
              <a href="https://mooxdronestore111.000webhostapp.com/cart.php?id=<?php echo $item['product_id'];?>" class="btn btn-add"><i class="fas fa-shopping-cart"></i> Add to cart</a>
            </div>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>

    <p class="view"><u><a href="https://mooxdronestore111.000webhostapp.com/index.php">View More Items</a></u></p>

    <div class="arrivals">
      <div class="container">
      <center>
        <h2>
          New Arrivals
        </h2>
      </center>
        <p>
          Featuring as many drones and quadcopters as we do, new arrivals are a daily routine!
        </p>
        <div class="row">
          <?php
          $page = 2;
          $productList = $productModel->getProductList($perPage, $page);
          foreach ($productList as $item) {
          ?>
          <div class="col-md-3">
            <div class="item">
              <img class="img-fluid" src="https://mooxdronestore111.000webhostapp.com/public/images/<?php echo $item['product_image'];?>">
              <a href="https://mooxdronestore111.000webhostapp.com/product.php?id=<?php echo $item['product_id'];?>" class="none-decor">
                <h5><?php echo $item['product_name'];?></h5>
              </a>
              <p><?php echo "$".$item['product_price'];?></p>
              <a href="https://mooxdronestore111.000webhostapp.com/cart.php?id=<?php echo $item['product_id'];?>" class="btn btn-add"><i class="fas fa-shopping-cart"></i> Add to cart</a>
            </div>
          </div>
          <?php
          }
          ?>
        </div>
        <p class="view"><u><a href="https://mooxdronestore111.000webhostapp.com/index.php">View More Items</a></u></p>
      </div>
    </div>

    <div class="support">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p><i class="far fa-hdd fa-3x"></i></p>
            <h3>Free Shipping</h3>
            <p>One thing we are confident will make anyone happy is our free delivery policy.</p>
            <br>
            <p><a class="read" href="#">Read more</a></p>
          </div>
          <div class="col-md-6">
            <p><i class="fas fa-headphones fa-3x"></i></p>
            <h3>Support Online</h3>
            <p>Besides selling complicated drones we also provide lessons on how to fly them…</p>
            <br>
            <p><a class="read" href="#">Contact us</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="arrivals">
      <div class="container">
      <center>
        <h2>
          Testimonials
        </h2>
      </center>
        <p>
          With thousands of happy customers, it looks like they all have something nice to say!
        </p>
        <div class="row">
          <div class="col-md-6">
            <p>Working in a private military company, providing the best technologies for the security sake of our
              clients is essential. This is why we’ve decided to find drones at this store, because of the variety of
              drones these guys’ve accumulated here…</p>
            <br>
            <div class="row">
              <div class="col-md-2">
                <img src="https://mooxdronestore111.000webhostapp.com/public/images/nu.jpg" alt="Nữ" class="img-fluid">
              </div>
              <div class="col-md-3">
                <a class="tacgia" href="#">Mary Wilkins</a>
                <b class="dev">Developer</b>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <p>I am a doctor in a small rural area in the state of Ohio. Just recently after seeing awesome videos on
              YouTube we’ve decided that our local medical emergency team might make use of a medical drone. And we
              bought it here!</p>
            <br>
            <div class="row">
              <div class="col-md-2">
                <img src="https://mooxdronestore111.000webhostapp.com/public/images/nam.jpg" alt="Nam" class="img-fluid">
              </div>
              <div class="col-md-3">
                <a class="tacgia" href="#">Roger Harriets</a>
                <b class="dev">Developer</b>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br><br><br>
    </div>

    <div class="email">
      <h2>Email Newsletters</h2>
      <br>
      <p>Get on our newsletter list and get all the tips, new arrivals and all the promos!</p>
      <br>
      <form class="from" action="#">
        <input class="input" type="email" name="Email" placeholder="Enter your email*" />
      </form>
      <br><br>
      <a class="sub" href="#">Subscribe!</a>
    </div>

    <div class="main-content">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <p class="content">
              About
            </p>
            <p class="content-1">
              It’s amazing that in a matter of just a few recent years, drones and quadcopters have become a very
              integral part of our lifestyle. Delivery drones, military drones, camera-equipped quadcopters - we’ve got
              it all here - at the best price in the world and at a sky-high quality!
            </p>
          </div>
          <div class="col-md-3">
            <p class="content">
              Categories
            </p>
            <?php
                  foreach ($categoryList as $cat) {
                    $catName = strtolower(str_replace(' ', '-', $cat['category_name']));
                ?>
            <a class="content-2"
              href="https://mooxdronestore111.000webhostapp.com/category.php/<?php echo $catName . '-' . $cat['category_id'] ?>"><?php echo $cat["category_name"]; ?></a>
            <br>
            <?php
                }
                ?>
          </div>
          <div class="col-md-3">
            <p class="content">
              Custom Posts
            </p>
            <p class="drone">
              Drone Tips, Live View Drones
              <br>
              <a class="content-3" href="#">Link Format</a>
              <br>
              <a class="content-1" href="#">
                Recently, many environmental activists began to use drones too
              </a>
            </p>
            <p class="drone">
              Drone Tips, Live View Drones
              <br>
              <a class="content-3" href="#">Quote Format</a>
              <br>
              <a class="content-1" href="#">
                Such monitoring option is more secure for wildlife activists. Especially when dealing…
              </a>
            </p>
          </div>
          <div class="col-md-3">
            <p class="content">
              Contacts
            </p>
            <i class="fas fa-phone"></i> &nbsp;
            <a class="content-2" href="#"> (123) 456-7890</a>
            <br>
            <i class="far fa-clock"></i> &nbsp;
            <a class="content-5" href="#"> 7 Days a week from 9 am to 7 pm</a>
            <br>
            <i class="far fa-envelope"></i> &nbsp;
            <a class="content-4" href="#">info@demolink.org</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <img src="https://mooxdronestore111.000webhostapp.com/public/images/footer_logo02.png" alt="MOOX" class="img-fluid">
        </div>
        <div class="col-md-3">
          <p class="content-1">
            &copy; 2019 Moox. All Right Reserved.
            <a class="content-4" href="#"> Privacy Policy.</a>
          </p>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-3">
          <a href="#"><i class="fab fa-cc-visa fa-2x"></i></a>
          <a href="#"><i class="fab fa-cc-mastercard fa-2x"></i></a>
          <a href="#"><i class="fab fa-cc-amex fa-2x"></i></a>
          <a href="#"><i class="fab fa-cc-paypal fa-2x"></i></a>
          <a href="#"><i class="fab fa-cc-discover fa-2x"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="to-top">
    <i class="fas fa-arrow-circle-up"></i>
  </a>
  <?php 
    // }
  ?>

</body>

</html>