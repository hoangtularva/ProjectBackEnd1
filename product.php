<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($className) {
    require_once './app/models/' . $className . '.php';
});
$id= '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$productModel = new ProductModel();
$perPage = 4;
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$ProductsList = new ProductModel();
$viewProducts = $ProductsList->getProductByID($id);
$productList = $productModel->getProductList($perPage, $page);

$categoryModel = new CategoryModel();
$categoryList = $categoryModel->getCategoryList();
$viewName = new CategoryModel();
$getName="";
if (isset($_GET['id'])) {
    $name = $viewName->getNameCategory($id);
    $getName = $name["category_name"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $viewProducts[0]['product_name'];?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/styles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/styleproduct.css">
</head>

<body>
    <div class="container">
        <!-- search & navbar -->
        <form action="<?php echo BASE_URL;?>/result.php" method="get">
            <div class="input-group col-md-4">
                <input class="btn border-right-0 border" type="submit" value="Search">
                <input class="form-control border-left-0 border" type="text" id="example-search-input" 
                name = "keyword">
            </div>
        </form>
        </div>
            <div class="cart">
                <div class="container">
                <a href="#"><i class="fas fa-shopping-cart"></i><span>(0)</span></a>
                <a href="#"><i class="fas fa-balance-scale"></i><span>(0)</span></a>
                <a href="<?php echo BASE_URL; ?>/login.php"><i class="fas fa-user"></i></a>
            </div>
        </div>
        <header class="top-header">
            <nav class="navbar navbar-expand-sm navbar-light bg-nav">
            <div class="container">
                <a href="<?php echo BASE_URL; ?>/index.php">
                    <img src="<?php echo BASE_URL; ?>/public/images/logo.png" alt="logo" class="img-fluid">
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/index.php">HOME
                        <span class="sr-only">(current)</span></a>
                    </li>
                    <?php
                        foreach ($categoryList as $cat) {
                            $catName = strtolower(str_replace(' ', '-', $cat['category_name']));
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/category.php/<?php echo $catName . '-' . $cat['category_id'] ?>"><?php echo strtoupper($cat['category_name']); ?></a>
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
        </header>
        <!-- View product -->
        <div class="container">
            <div class="direct">
                <ul class="nav-mini">
                    <li>Home</li>
                    <li><?php echo $getName; ?></li>
                    <li><?php echo $viewProducts[0]["product_name"]; ?></li>
                </ul>
            </div>
        </div>
        
        <div class="container">
            <div class="show" style="margin-top:4rem;">
                <div class="row">
                    <div class="col-md-6 col-6 col-sm-6">
                        <div class="image-border">
                            <img class="img-fluid"
                                src="<?php echo BASE_URL; ?>/public/images/<?php echo $viewProducts[0]['product_image'];?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-6 col-sm-6">
                        <div class="content">
                            <h2 class="name"><?php echo $viewProducts[0]['product_name'];?></h2>
                            <div class="properties">
                                <?php
                                    $arr = explode('–',$viewProducts[0]['product_name']);
                                    $brand = $arr[0];
                                ?>
                                <b>Brand: <?php echo $brand; ?></b>
                                <br>
                                <b>SKU: N/A</b>
                            </div>
                            <i class="price"><?php echo "$" .$viewProducts[0]['product_price'];?></span> </i>
                            <div class="buy">
                                <b class="available">QUANTITY: </b>
                                <input type="number" name="soluong" id="soluong" min="1" max="100" value="1">
                            </div>
                            <div class="atc">
                                <a href="<?php echo BASE_URL; ?>/cart.php?id=<?php echo $viewProducts[0]['product_id'];?>">
                                    <button type="button" class="btn btn-primary">Add to cart <i class="fas fa-shopping-cart"></i></button>
                                </a>
                                <button type="button" class="btn btn-primary">Buy now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description">
                    <div class="card text-center">
                      <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                          <li class="nav-item">
                            <a class="nav-link active" href="#">Description</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Rate</a>
                          </li>
                        </ul>
                      </div>
                      <div class="card-body">
                        <h4 class="card-title"><?php echo $viewProducts[0]['product_name']; ?></h4>
                        <p class="card-text"><?php echo $viewProducts[0]['product_description']; ?></p>
                      </div>
                    </div>
                </div>
            </div>    
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
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="<?php echo BASE_URL; ?>/public/images/footer_logo02.png" alt="MOOX" class="img-fluid">
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
</body>

</html>